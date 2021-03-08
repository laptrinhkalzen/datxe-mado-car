<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Drive;
use App\Attribute;
use App\Manufacturer;
use Carbon\Carbon;

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
        $countries=DB::table('country')->get();
        $manufacturer = Manufacturer::get();
        $manufacturer_html = \App\Helpers\StringHelper::getSelectRoleOptions($manufacturer);
        return view('backend/drive/create',compact('manufacturer_html','countries'));
    }

    public function store(Request $request) {
        $input = new Drive();
        $data = $request->except(['_token']);
        // $validator = \Validator::make($data, $input->validateCreate());
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $data['status'] = isset($input['status']) ? 1 : 0;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['country_id'] = $request->manufacturer_id;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image=$request->image;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('/image/',$new_image);
            $data['image'] = 'public/image/'.$new_image;
        }
        $drive=$input->insert($data);   
       //dd($drive);
        if ($drive) {
            return redirect()->route('admin.drive.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.drive.index')->with('error', 'Tạo mới thất bại');
        }
    }

    public function edit($id) {
        $record = Drive::find($id);
        $manufacturer = Manufacturer::get();
        $manufacturer_html = \App\Helpers\StringHelper::getSelectRoleOptions($manufacturer);
        return view('backend/drive/edit', compact(' $manufacturer', 'manufacturer_html'));
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