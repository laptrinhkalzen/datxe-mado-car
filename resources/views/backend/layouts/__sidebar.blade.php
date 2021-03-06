<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{!!Auth::user()->avatar!!}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{!!Auth::user()->full_name!!}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Kalzen media
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                @if (\Auth::user()->role_id == \App\User::ROLE_ADMINISTRATOR)
               <!--  <li class="nav-item">
                    <a href="{{route('admin.config.index')}}" class="nav-link">
                        <i class="icon-cog"></i> 
                        <span>C???u h??nh website</span>
                    </a>
                </li> -->
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-user-tie"></i> <span>Ng?????i d??ng h??? th???ng</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link">
                                <span>Th??nh vi??n h??? th???ng</span>         
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link">
                                <span>Quy???n</span>         
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Qu???n l?? h??ng cung c???p d???ch v??? v???n t???i</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="S???n ph???m"> 
                        <li class="nav-item"><a href="{{route('admin.manufacturer.index')}}" class="nav-link">Qu???n l?? h??ng </a></li> 
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Qu???n l?? c??ng ty s??? d???ng d???ch v??? v???n t???i</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="S???n ph???m"> 
                        <li class="nav-item"><a href="" class="nav-link">Qu???n l?? c??ng ty</a></li> 
                    </ul>
                </li>
                
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-users"></i> <span>Qu???n l?? chuy??n gia</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Kh??ch h??ng">
                        
                        <li class="nav-item"><a href="{{route('admin.expert.index')}}" class="nav-link">Chuy??n gia</a></li>
                       
                        
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-users"></i> <span>Qu???n l?? t??i x???</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Kh??ch h??ng">
                        <li class="nav-item"><a href="{{route('admin.drive.index')}}" class="nav-link">T??i x???</a></li>
                            
                    </ul>
                </li>
                <!-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Qu???n l?? xe</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="S???n ph???m">
                        <li class="nav-item"><a href="{{route('admin.category.index',\App\Category::TYPE_CAR)}}" class="nav-link">H??ng xe</a></li>
                        <li class="nav-item"><a href="{{route('admin.car.index')}}" class="nav-link">Xe</a></li>
                        <li class="nav-item"><a href="{{route('admin.attribute.index')}}" class="nav-link">Thu???c t??nh</a></li>
                    </ul>
                </li> -->
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-newspaper"></i> <span>Th???ng k??</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Kh??ch h??ng">
                        <li class="nav-item"><a href="" class="nav-link">Th???ng k?? s??? l?????ng chuy??n gia theo t???ng h??ng cung c???p d???ch v???</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Th???ng k?? s??? l?????ng chuy??n gia theo t???ng c??ng ty s??? d???ng d???ch v???</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Th???ng k?? doanh thu theo t???ng h??ng cung c???p d???ch v???</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Th???ng k?? doanh thu theo t???ng c??ng ty s??? d???ng d???ch v???</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Th???ng k?? l???ch s??? chuy???n ??i</a></li>


                            
                    </ul>
                </li>
          


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>