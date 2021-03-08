<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use Repositories\CategoryRepository;
use Repositories\AttributeRepository;
use Repositories\PostHistoryRepository;

class CarController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CarRepository $carRepo, CategoryRepository $categoryRepo, AttributeRepository $attributeRepo, PostHistoryRepository $postHistoryRepo) {
        $this->carRepo = $carRepo;
        $this->categoryRepo = $categoryRepo;
        $this->attributeRepo = $attributeRepo;
        $this->postHistoryRepo = $postHistoryRepo;
    }

    public function index() {
        $records = $this->carRepo->all();
        return view('backend/car/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $options = $this->categoryRepo->readCategoryByType(\App\Category::TYPE_CAR);
        $category_html = \App\Helpers\StringHelper::getSelectRoleOptions($options);
        $attributes = $this->attributeRepo->readAttributeByParentAdmin();
        return view('backend/car/create', compact('category_html', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        // $validator = \Validator::make($input, $this->carRepo->validateCreate());
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $input['created_by'] = \Auth::user()->id;
        $car = $this->carRepo->create($input);
        //Thêm vào lịch sử đăng bài
        //$this->addPostHistory($car);
        //Thêm danh mục sản phẩm
        $car->categories()->attach($input['category_id']);
        //Thêm thuộc tính sản phẩm
        $attributes = $this->getcarAttributes($input);
        $car->attributes()->attach($attributes);
        if ($car) {
            return redirect()->route('admin.car.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.car.index')->with('error', 'Tạo mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $record = $this->carRepo->find($id);
        $options = $this->categoryRepo->readCategoryByType(\App\Category::TYPE_car);
        $category_ids = $record->categories()->get()->pluck('id')->toArray();
        $category_html = \App\Helpers\StringHelper::getSelectOptions($options, $category_ids);
        $attributes = $this->attributeRepo->readAttributeByParentAdmin();
        //Lấy danh sách id thuộc tính của sản phẩm
        $car_attribute_ids = $record->attributes()->get()->pluck('id')->toArray();
        //Lấy danh sách thuộc tính cúa sản phẩm
        $car_attribute = array();
        foreach ($record->attributes()->get() as $key => $val) {
            if ($val != null) {
                $car_attribute[$val->id] = $val->pivot->value;
            }
        }
        return view('backend/car/edit', compact('record', 'category_html', 'attributes', 'car_attribute', 'car_attribute_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->carRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//      status
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['is_hot'] = isset($input['is_hot']) ? 1 : 0;
        $input['is_new'] = isset($input['is_new']) ? 1 : 0;
        $input['created_by'] = \Auth::user()->id;
        $input['post_schedule'] = isset($input['post_schedule']) ? $input['post_schedule_submit'] : date('Y-m-d H:i:s');
        $res = $this->carRepo->update($input, $id);
        $car = $this->carRepo->find($id);
        //Thêm danh mục sản phẩm
        $car->categories()->sync($input['category_id']);
        //Thêm thuộc tính sản phẩm
        $attributes = $this->getcarAttributes($input);
        $car->attributes()->sync($attributes);
        if ($res) {
            return redirect()->route('admin.car.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.car.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $car = $this->carRepo->find($id);
        $car->categories()->detach();
        $car->attributes()->detach();
        $this->carRepo->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function getcarAttributes($input) {
        $attributes = array();
        foreach ($input['attribute'] as $key => $val) {
            $attributes[$key] = ['value' => $val];
        }
            // foreach ($input['attribute_select'] as $key => $val) {
            //     if ($val != null) {
            //         $attributes[$val] = ['value' => null];
            //     }
            // }
        return $attributes;
    }

    public function addPostHistory($car) {

        $post_history['item_id'] = $car->id;
        $post_history['created_at'] = $car->created_at;
        $post_history['updated_at'] = $car->post_schedule ?: $car->updated_at;
        $post_history['module'] = 'car';
        $this->postHistoryRepo->create($post_history);
    }

}
