
@extends('backend.layouts.master')
@section('content')
<div class="content">

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Hãng xe </h5>
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
            <form action="{!!route('admin.manufacturer.update', $record->id)!!}" method="POST" enctype="multipart/form-data">
               @csrf    
                <div class="panel panel-body results">
                    <div class="row">
                        <div class="col-md-10 offset-1">
                               <fieldset>
                                <legend class="text-semibold"><i class="icon-reading position-left"></i> Tạo mới</legend>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Tên hãng xe</label>
                                        <input name="name" type="text" class="form-control" value="{!!is_null(old('name'))?$record->name:old('name')!!}">
                                        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Số điện thoại</label>
                                        <input name="mobile" type="number" class="form-control" value="{!!is_null(old('mobile'))?$record->mobile:old('mobile')!!}">
                                        {!! $errors->first('mobile', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Địa chỉ</label>
                                        <input name="address" type="text" class="form-control" value="{!!is_null(old('address'))?$record->address:old('address')!!}">
                                        {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Mã số thuế</label>
                                        <input name="tax_code" type="text" class="form-control" value="{!!is_null(old('tax_code'))?$record->tax_code:old('tax_code')!!}">
                                        {!! $errors->first('tax_code', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Người liên hệ</label>
                                        <input name="contacter" type="text" class="form-control" value="{!!is_null(old('contacter'))?$record->contacter:old('contacter')!!}">
                                        {!! $errors->first('contacter', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Số điện thoại liên hệ</label>
                                        <input name="contacter_mobile" type="text" class="form-control" value="{!!is_null(old('contacter_mobile'))?$record->contacter_mobile:old('contacter_mobile')!!}">
                                        {!! $errors->first('contacter_mobile', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                 <div class="row">
                                     <div class="form-group col-md-6">
                                        <label class="required">Email</label>
                                        <input name="email" type="email" class="form-control" value="{!!is_null(old('email'))?$record->email:old('email')!!}">
                                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="form-check col-md-6 form-check-right">
                                        <label class="form-check-label float-right">
                                            Hiển thị
                                            @if($record->status==1)
                                            <input type="checkbox" checked class="form-check-input-styled" name="status" data-fouc="">
                                            @else
                                            <input type="checkbox" class="form-check-input-styled" name="status" data-fouc="">
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="text-right">
                                <a type="button" href="{{route('admin.manufacturer.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
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

