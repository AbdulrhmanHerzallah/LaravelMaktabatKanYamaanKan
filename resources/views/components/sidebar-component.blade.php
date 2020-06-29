<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/logo/logo.jpeg" alt="AdminLTE Logo" width="200" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">مكتبة كان ياما كان</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--      <div class="user-panel mt-3 pb-3 mb-3 d-flex">-->
        <!--        <div class="image">-->
        <!--          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        <!--        </div>-->
        <!--        <div class="info">-->
        <!--          <a href="#" class="d-block">Alexander Pierce</a>-->
        <!--        </div>-->
        <!--      </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('index.index')}}" class="nav-link active bg-success">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('layout.admin')}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
                        </p>
                    </a>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            الموظفون
                            <i class="fas fa-angle-left right"></i>
                            <!--                  <span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link">
                                <i class="fas fa-user-plus"></i>
                                <p>إنشاء موظف جديد</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.get_users_info')}}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>معلومات الموظفين</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.edit_account_sett')}}" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>إعدادات الحساب</p>
                            </a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/boxed.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>الاجازات</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>الغياب خلال الشهر</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-topnav.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>العقود</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-footer.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>الاطفال المشتركين</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                    </ul>
                </li>

{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-money-bill-wave"></i>--}}
{{--                        <p>--}}
{{--                            الملف المالي--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                            <!--                <span class="badge badge-info right">6</span>-->--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/top-nav.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>إحصائيات المبيعات</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/boxed.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>الاجازات</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>الغياب خلال الشهر</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-topnav.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>العقود</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-footer.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>الاطفال المشتركين</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Collapsed Sidebar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            {{__('layout.bills')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bill.create')}}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>{{__('layout.create_new_bill')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bill.showMyBill')}}" class="nav-link">
                                <i class="fas fa-money-bill"></i>
                                <p>الفواتير التي أنشأتها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bill.all_bills_admin')}}" class="nav-link">
                                <i class="far fa-money-bill-alt"></i>
                                <p>جميع الفواتير</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            {{__('layout.letters')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('letter.create')}}" class="nav-link">
                                <i class="fas fa-text-width"></i>
                                <p>{{__('layout.create_new_letter')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('letter.show')}}" class="nav-link">
                                <i class="fas fa-align-right"></i>
                                <p>الخطابات التي انشأتها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('letter.show_admin')}}" class="nav-link">
                                <i class="fas fa-align-center"></i>
                                <p>جميع خطابات الموظفين</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/UI/sliders.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Sliders</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/UI/modals.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Modals & Alerts</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/UI/navbar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Navbar & Tabs</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/UI/timeline.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Timeline</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/UI/ribbons.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Ribbons</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                             {{__('layout.storage_file')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('file.create')}}" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>{{__('layout.upload')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('my-files.index')}}" class="nav-link">
                                <i class="far fas fa-file-import nav-icon"></i>
                                <p>{{__('layout.my_file')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('public.file.index')}}" class="nav-link">
                                <i class="far fas fa-cloud-download-alt nav-icon"></i>
                                <p>{{__('layout.public_file')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('file_cat.create')}}" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>{{__('layout.file_cat')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.file.index')}}" class="nav-link">
                                <i class="far fa-save nav-icon"></i>
                                <p>{{__('layout.all_files')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{__('layout.demands')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('demand.create')}}" class="nav-link">
                                <i class="far fa-envelope nav-icon"></i>
                                <p>{{__('layout.create_demand')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('demand.create_admin')}}" class="nav-link">
                                <i class="fas fa-envelope-square nav-icon"></i>
                                <p>{{__('layout.create_admin_demand')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('demand.show-inbox-demand')}}" class="nav-link">
                                <i class="fas fa-inbox nav-icon"></i>
                                <p>الصندوق الوارد</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('demand.show-my-demand')}}" class="nav-link">
                                <i class="fas fa-reply-all nav-icon"></i>
                                <p>جميع الطالبات التي ارسلتها</p>
                            </a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/tables/jsgrid.html" class="nav-link">--}}
{{--                                <i class="fas fa-sticky-note nav-icon"></i>--}}
{{--                                <p>جميع طالبات الاعضاء</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}


                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-week"></i>
                        <p>
                            إدارة المشاريع
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('event.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('layout.add_a_new_project')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('my_events.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('layout.my_create_events')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>

@if(false)

                <li class="nav-header">EXAMPLES</li>
                <!--          <li class="nav-item">-->
                <!--            <a href="pages/calendar.html" class="nav-link">-->
                <!--              <i class="nav-icon far fa-calendar-alt"></i>-->
                <!--              <p>-->
                <!--                Calendar-->
                <!--                <span class="badge badge-info right">2</span>-->
                <!--              </p>-->
                <!--            </a>-->
                <!--          </li>-->
                <!--          <li class="nav-item">-->
                <!--            <a href="pages/gallery.html" class="nav-link">-->
                <!--              <i class="nav-icon far fa-image"></i>-->
                <!--              <p>-->
                <!--                Gallery-->
                <!--              </p>-->
                <!--            </a>-->
                <!--          </li>-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            مكتبة الكتب
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>بيع كتاب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إستعارة كتاب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إحصائيات</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/e_commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/login.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/register.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
