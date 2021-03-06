
@extends('backend.layouts.master')
@section('content')
<div class="content">

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Thành viên </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert bg-success alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">{{ Session::get('success') }}</span>
            </div>
            @endif
            <form action="{!!route('admin.drive.update', $record->id)!!}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input type="hidden" name="role_id" value="{!!$record->role_id!!}" />
                <div class="panel panel-body results">
                    <div class="row">
                        <div class="col-md-10 offset-1">
                               <fieldset>
                                <legend class="text-semibold"><i class="icon-reading position-left"></i> Tạo mới</legend>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Họ tên</label>
                                        <input name="name" type="text" class="form-control" value="{!!is_null(old('name'))?$record->name:old('name')!!}">
                                        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Số điện thoại</label>
                                        <input name="phone" type="number" class="form-control" value="{!!is_null(old('phone'))?$record->phone:old('phone')!!}">
                                        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Address</label>
                                        <input name="address" type="text" class="form-control" value="{!!is_null(old('address'))?$record->address:old('address')!!}">
                                        {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                     <div class="col-md-6">
                                           <label class="required">Chọn hãng xe</label>
                                            <select class="select-search form-control" name="category_id[]"data-placeholder="Chọn hãng xe">
                                                {!!$category_html!!}
                                            </select>
                                            {!! $errors->first('category_id', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Ngày sinh</label>
                                        <input name="birthday" type="date" class="form-control" value="{!!is_null(old('birthday'))?$record->birthday:old('birthday')!!}">
                                        {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Giới tính</label>
                                        <select name="sex" class="form-control">
                                            @if($record->sex==1)
                                            <option selected value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                            @else
                                            <option value="1">Nam</option>
                                            <option selected value="2">Nữ</option>

                                            @endif
                                            
                                           
                                        </select>
                                    </div>
                                </div>
                                 <div class="row">
                                     <div class="form-group col-md-6">
                                        <label class="required">Email</label>
                                        <input name="email" type="email" class="form-control" value="{!!is_null(old('email'))?$record->email:old('email')!!}">
                                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Ảnh chân dung</label>
                                        <input name="image" type="file" class="form-control" value="{!!is_null(old('image'))?$record->image:old('image')!!}">
                                        <img src="{{asset($record->image)}}">
                                        {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                                    </div>

                                    
                                </div>
                            </fieldset>
                            <div class="text-right">
                                <a type="button" href="{{route('admin.drive.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
                                <button type="submit" class="btn btn-primary legitRipple">Lưu lại <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('script')
@parent
<script src="{!! asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switch.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/validation/validate.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/inputs/touchspin.min.js') !!}"></script>
<script src="{!! asset('assets/backend/js/custom.js') !!}"></script>

@stop

