<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use Carbon\Carbon;

class ManufacturerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $records = Manufacturer::all();
        return view('backend/manufacturer/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend/manufacturer/create');
    }

    public function store(Request $request) {
        $manu = new Manufacturer();
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $validator = \Validator::make($input, $manu->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //$input['created_by'] = \Auth::user()->id;
        $manufacturer = $manu->create($input);
        if ($manufacturer) {
            return redirect()->route('admin.manufacturer.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.manufacturer.index')->with('error', 'Tạo mới thất bại');
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
        $record = Manufacturer::find($id);
        return view('backend/manufacturer/edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $manu = new Manufacturer();
        $input =  request()->except(['_token']);;
        $validator = \Validator::make($input, $manu->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $res = $manu->where('id',$id)->update($input);
        if ($res) {
            return redirect()->route('admin.manufacturer.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.manufacturer.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $car = Manufacturer::where('id',$id)->delete();
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
