
@extends('backend.layouts.master')
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Chuyên gia</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{!!route('admin.expert.store')!!}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <div class="panel panel-body results">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend class="text-semibold"><i class="icon-reading position-left"></i> Tạo mới</legend>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Họ tên</label>
                                        <input name="name" type="text" class="form-control" value="{!!old('name')!!}">
                                        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Tên công ty</label>
                                        <input name="company_id" type="text" class="form-control" value="{!!old('company_id')!!}">
                                        {!! $errors->first('company_id', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Địa chỉ</label>
                                        <input name="address" type="text" class="form-control" value="{!!old('address')!!}">
                                        {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label class="required">Ngày sinh</label>
                                        <input name="birthday" type="date" class="form-control" value="{!!old('birthday')!!}">
                                        {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>

                                  <div class="row">
                                   
                                    <div class="form-group col-md-6">
                                        <label class="required">Giới tính</label>
                                        <select name="sex" class="form-control">
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Email</label>
                                        <input name="email" type="email" class="form-control" value="{!!old('email')!!}">
                                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                 <div class="row">
                                     
                                    <div class="col-md-6">
                                           <label class="required">Chọn quốc gia</label>
                                            <select class="select-search form-control" name="country" data-placeholder="Chọn quốc gia">
                                                {!!$country_html!!}
                                            </select>
                                            {!! $errors->first('country_id', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label class="required">Ảnh chân dung</label>
                                        <input name="images" type="file" class="form-control" value="{!!old('images')!!}">
                                        {!! $errors->first('images', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="row">
                                     
                                    <div class="form-group col-md-6">
                                        <label class="required">Số điện thoại</label>
                                        <input name="mobile" type="number" class="form-control" value="{!!old('mobile')!!}">
                                        {!! $errors->first('mobile', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                        <div class="form-group col-md-6">
                                        <label class="required">Hình thức thanh toán</label>
                                        <select name="payment_type" class="form-control">
                                            <option value="1">Tiền mặt</option>
                                            <option value="2">Thẻ</option>
                                        </select>
                                        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                              
                            </fieldset>
                            <div class="text-right">
                                <a type="button" href="{{route('admin.expert.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
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

