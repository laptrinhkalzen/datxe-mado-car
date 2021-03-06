<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

use DB;
use App\Drive;

class DriveController  extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(CategoryRepository $categoryRepo) {
        $this->categoryRepo = $categoryRepo;
     
    }    
   
    public function index()
    {   
        $drive=Drive::all();
        return view('backend/drive/index',compact('drive'));
    }

    public function create()
    {   
      
        $options = $this->categoryRepo->readCategoryByType(\App\Category::TYPE_CAR);
        $category_html = \App\Helpers\StringHelper::getSelectRoleOptions($options);
        return view('backend/drive/create',compact('category_html'));
    }

    public function store(Request $request) {
         
        $input= new Drive();
        $data = $request->all();
       
        // $validator = \Validator::make($input, $this->carRepo->validateCreate());
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $data['created_by'] = \Auth::user()->id;
        $get_image=$request->image;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('/image/',$new_image);
            $data['image'] = 'public/image/'.$new_image;
        }
        $drive=$input->create($data);
        //Thêm vào lịch sử đăng bài
        //$this->addPostHistory($car);
        //Thêm danh mục sản phẩm
        $drive->categories()->attach($data['category_id']);
        //Thêm thuộc tính sản phẩm
        if ($drive) {
            return redirect()->route('admin.drive.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.drive.index')->with('error', 'Tạo mới thất bại');
        }
    }

    public function edit($id) {
        $record = Drive::find($id);
        $options = DB::table('category')->where('type',4)->get();
        $category_ids = $record->categories()->get()->pluck('id')->toArray();
        $category_html = \App\Helpers\StringHelper::getSelectRoleOptions($options, $category_ids);
        //Lấy danh sách id thuộc tính của sản phẩm
        //Lấy danh sách thuộc tính cúa sản phẩm
        return view('backend/drive/edit', compact('record', 'category_html'));
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
        $get_image=$request->image;
         if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('/image/',$new_image);
            $input['image'] = 'public/image/'.$new_image;

        }
        $input['created_by'] = \Auth::user()->id;
        $car =Drive::find($id);
        $car->update($input);
        //Thêm danh mục sản phẩm
        $car->categories()->sync($input['category_id']);
        //Thêm thuộc tính sản phẩm
        if ($car) {
            return redirect()->route('admin.drive.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.drive.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $car = Drive::find($id);
        $car->categories()->detach();
        $car->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }



}