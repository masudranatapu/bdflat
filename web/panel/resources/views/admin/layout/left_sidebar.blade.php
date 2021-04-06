<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item @yield('dashboard')">
        <a href="{{ route('admin.dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="@lang('left_menu.dashboard')">@lang('left_menu.dashboard')</span></a>
    </li>
    @if(hasAccessAbility('view_product', $roles))
    <li class=" nav-item @yield('Product Management')">
        <a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="@lang('left_menu.product')">@lang('left_menu.product')</span></a>
        <ul class="menu-content">
            @if(hasAccessAbility('view_product', $roles))
            <li class="nav-item @yield('product_list')"><a class="menu-item" href="{{ route('admin.product.list') }}"><i></i><span data-i18n="@yield('product_list')">@lang('left_menu.product_list')</span></a></li>
            @endif

           
           
        </ul>
    </li>
    @endif
     @if(hasAccessAbility('view_product', $roles))
    <li class="nav-item @yield('Package')">
        <a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="package_list">@lang('package.list_page_title')</span></a>
        <ul class="menu-content">
            <li class="nav-item @yield('package_list')"><a class="menu-item" href="{{route('admin.package.create')}}"><i></i><span data-i18n="@yield('package_list')">@lang('package.package_menu')</span></a></li>
        </ul>
    </li>
    @endif
     @if(hasAccessAbility('view_product', $roles))
    <li class="nav-item @yield('Promotion')">
        <a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="promotion_list">@lang('promotion.promotion_title')</span></a>
        <ul class="menu-content">
            <li class="nav-item @yield('promotion_list')"><a class="menu-item" href="{{route('admin.promotion.list')}}"><i></i><span data-i18n="@yield('promotion_list')">@lang('promotion.promotion_sub_title')</span></a></li>
        </ul>
    </li>
    @endif
    <li class="nav-item @yield('main_components')"><a class="menu-item" href="#"><i class="la la-calendar"></i><span class="menu-title" data-i18n="@yield('main_components')">@lang('left_menu.main_components')</span></a>
        <ul class="menu-content">
            <ul class="menu-content">
                <li class="@yield('category')"><a class="menu-item" href="{{route('product.category.list')}}"><i></i><span data-i18n="@yield('category')">@lang('left_menu.category')</span></a></li>
                
                <li class="@yield('sub_category')"><a class="menu-item" href="{{route('admin.sub_category.list')}}"><i></i><span data-i18n="@yield('sub_category')">@lang('left_menu.sub_category')</span></a></li>
                
                @if(hasAccessAbility('view_brand', $roles))
                <li class="@yield('product_brand')"><a class="menu-item" href="{{route('admin.brand.list')}}"><i></i><span data-i18n="@yield('product_brand')">@lang('left_menu.product_brand')</span></a></li>
                @endif
                 <li class="@yield('product_model')"><a class="menu-item" href="{{route('admin.product-model')}}"><span data-i18n="@yield('product_model')">@lang('left_menu.product_model')</span></a></li>
                
                <li class="@yield('cities')"><a class="menu-item" href="{{route('admin.city.list')}}"><i></i><span data-i18n="@yield('cities')">@lang('left_menu.cities')</span></a></li>

                <li class="@yield('divisions')"><a class="menu-item" href="{{route('admin.division.list')}}"><i></i><span data-i18n="@yield('divisions')">@lang('left_menu.divisions')</span></a></li>

                <li class="@yield('area')"><a class="menu-item" href="{{route('admin.area.list')}}"><i></i><span data-i18n="@yield('area')">@lang('left_menu.area')</span></a></li>
                <li class="@yield('product_type')"><a class="menu-item" href="{{route('admin.product_type.list')}}"><i></i><span data-i18n="@yield('product_type')">@lang('left_menu.product_type')</span></a></li>
            </ul>

        </ul>
    </li>

    @if(hasAccessAbility('view_customer', $roles))
        <li class=" nav-item @yield('Customer Management')">
            <a href="#">
                <i class="la la-user-plus"></i>
                <span class="menu-title"
                      data-i18n="@lang('left_menu.customer_management')">@lang('left_menu.customer_management')</span>
            </a>
            <ul class="menu-content">
                @if(hasAccessAbility('view_customer', $roles))
                    <li class="@yield('customer_list')">
                        <a href="{{ route('admin.customer.list') }}">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="@lang('left_menu.customer_list')">@lang('left_menu.customer_list')</span>
                        </a>
                    </li>
                @endif
                
                
            </ul>
        </li>
    @endif





    

   

    

    @if(hasAccessAbility('view_admin_user', $roles))
        <li class=" nav-item @yield('Admin Mangement')">
            <a href="#">
                <i class="la la-user-plus"></i>
                <span class="menu-title"
                      data-i18n="@lang('left_menu.admin_management')">@lang('left_menu.admin_management')</span>
            </a>
            <ul class="menu-content">
                @if(hasAccessAbility('view_admin_user', $roles))
                    <li class="@yield('admin-user')">
                        <a href="{{ route('admin.admin-user') }}">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="@lang('left_menu.admin_user')">@lang('left_menu.admin_user')</span>
                        </a>
                    </li>
                @endif
                @if(hasAccessAbility('view_user_group', $roles))
                    <li class=" nav-item @yield('user-group')">
                        <a href="{{ route('admin.user-group') }}">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="@lang('left_menu.user_category')">@lang('left_menu.user_category')</span>
                        </a>
                    </li>
                @endif
                @if(hasAccessAbility('assign_user_access', $roles))
                    <li class=" nav-item @yield('assign-access')">
                        <a href="{{ route('admin.assign-access') }}">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="@lang('left_menu.assign_access')">@lang('left_menu.assign_access')</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(hasAccessAbility('view_role', $roles))
        <li class=" nav-item @yield('Role Management')">
            <a href="#">
                <i class="la la-user-plus"></i>
                <span class="menu-title"
                      data-i18n="@lang('left_menu.role_management')">@lang('left_menu.role_management')</span>
            </a>
            <ul class="menu-content">
                @if(hasAccessAbility('view_role', $roles))
                    <li class="@yield('role')">
                        <a class="menu-item" href="{{ route('admin.role') }}">
                            <i></i>
                            <span data-i18n="@lang('left_menu.role')">@lang('left_menu.role')</span>
                        </a>
                    </li>
                @endif
                @if(hasAccessAbility('view_menu', $roles))
                    <li class="@yield('permission-group')">
                        <a class="menu-item" href="{{ route('admin.permission-group') }}">
                            <i></i>
                            <span data-i18n="@lang('left_menu.menus')">@lang('left_menu.menus')</span>
                        </a>
                    </li>
                @endif
                @if(hasAccessAbility('view_action', $roles))
                    <li class="@yield('permission')"><a class="menu-item" href="{{ route('admin.permission') }}"><i></i><span
                                data-i18n="@lang('left_menu.actions')">@lang('left_menu.actions')</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    <li class=" nav-item @yield('Web Setting')">
        <a href="#">
            <i class="la la-user-plus"></i>
            <span  data-i18n="web_setting" class="menu-title">Web Setting</span>
        </a>
        <ul class="menu-content">
            <li class="@yield('client_query')">
                <a class="menu-item" href="{{route('admin.client.query')}}">
                    <i></i>
                    <span data-i18n="client_query">Client Quries</span>
                </a>
            </li>
            <li class="@yield('about_us')">
                <a class="menu-item" href="{{route('admin.about.us')}}">
                    <i></i>
                    <span data-i18n="about_us">About Us</span>
                </a>
            </li>
            <li class="@yield('contact_us')">
                <a class="menu-item" href="{{route('admin.contact.us')}}">
                    <i></i>
                    <span data-i18n="contact_us">Contact Us</span>
                </a>
            </li>
            <li class="@yield('terms_condition')">
                <a class="menu-item" href="{{route('admin.terms.conditions')}}">
                    <i></i>
                    <span data-i18n="terms_condition">Terms & Conditions</span>
                </a>
            </li>
            <li class="@yield('privacy_policy')">
                <a class="menu-item" href="{{route('admin.privacy.policy')}}">
                    <i></i>
                    <span data-i18n="privacy_policy">Privacy Policy</span>
                </a>
            </li>
            <li class="@yield('quick_rules')">
                <a class="menu-item" href="{{route('admin.quick.rules')}}">
                    <i></i>
                    <span data-i18n="quick_rules">Quick Rules</span>
                </a>
            </li>
            <li class="@yield('howto_sell_first')">
                <a class="menu-item" href="{{route('admin.howtosell.fast')}}">
                    <i></i>
                    <span data-i18n="howto_sell_first">How to Sell Fast</span>
                </a>
            </li>
            <li class="@yield('why_membership')">
                <a class="menu-item" href="{{route('admin.why.membership')}}">
                    <i></i>
                    <span data-i18n="why_membership">Why membership</span>
                </a>
            </li>
            <li class="@yield('faq')">
                <a class="menu-item" href="{{route('admin.faq.list')}}">
                    <i></i>
                    <span data-i18n="faq">FAQ</span>
                </a>
            </li>
            <li class="@yield('mail_config')">
                <a class="menu-item" href="{{route('admin.mail.configuration')}}">
                    <i></i>
                    <span data-i18n="mail_config">Mail Configaration</span>
                </a>
            </li>
            <li class="@yield('footer')">
                <a class="menu-item" href="{{route('admin.footer')}}">
                    <i></i>
                    <span data-i18n="footer">Footer</span>
                </a>
            </li>
            <li class="@yield('copy_right')">
                <a class="menu-item" href="{{route('admin.copy.right')}}">
                    <i></i>
                    <span data-i18n="copy_right">Copyright</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- <li class=" nav-item @yield('gym')"><a href="{{ route('admin.gym') }}"><i class="la la-user"></i><span
                class="menu-title" data-i18n="@lang('left_menu.branch')">@lang('left_menu.gym')</span></a>
    </li>
    <li class=" nav-item @yield('gym-admin')"><a href="{{ route('admin.gym-admin') }}"><i class="la la-user"></i><span
                class="menu-title" data-i18n="@lang('left_menu.branch_admin')">@lang('left_menu.gym_admin')</span></a>
    </li>
    <li class=" nav-item @yield('workout-item')"><a href="{{ route('admin.workout-item') }}"><i
                class="la la-user"></i><span class="menu-title"
                                             data-i18n="@lang('left_menu.workout_item')">@lang('left_menu.workout_item')</span></a>
    </li> --}}


    {{-- <li class=" navigation-header"><span data-i18n="Apps">Apps</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps" ></i>
    </li> --}}

    

    {{--<li class=" nav-item @yield('Accounts')">
        <a href="#"><i class="la la-bitcoin"></i><span class="menu-title" data-i18n="Calendars">@lang('left_menu.account')</span></a>
        <ul class="menu-content">
            <li class=" nav-item @yield('Payment Management')"><a class="menu-item" href="{{route('admin.account.list')}}"><i></i><span data-i18n="Basic">@lang('left_menu.account list')</span></a></li>
            <li><a class="menu-item" href="#"><i></i><span data-i18n="Basic">@lang('left_menu.others')</span></a>
                <ul class="menu-content">
                    <li class="@yield('add product')"><a class="menu-item" href="{{route('admin.product.create')}}"><i></i><span data-i18n="Basic">@lang('left_menu.Vat')</span></a>
                    <li class="@yield('product sub-category')"><a class="menu-item" href="{{route('admin.sub_category.list')}}"><i></i><span data-i18n="Basic">@lang('left_menu.Name')</span></a></li>
                    <li class="@yield('product model')"><a class="menu-item" href="{{route('admin.product-model')}}"><i></i><span data-i18n="Extra">@lang('left_menu.Method')</span></a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class=" nav-item @yield('Procurement')">
        <a href="#"><i class="la la-clipboard"></i>
            <span class="menu-title" data-i18n="Calendars">@lang('left_menu.procurement')</span>
        </a>
        <ul class="menu-content">
            <li class="@yield('vendor')">
                <a class="menu-item" href="{{route('admin.vendor')}}"><i></i>
                    <span data-i18n="Basic">@lang('left_menu.vendor')</span>
                </a>
            </li>
        </ul>
        <ul class="menu-content">
            <li class="@yield('invoice')">
                <a class="menu-item" href="{{route('admin.invoice')}}"><i></i>
                    <span data-i18n="Basic">@lang('left_menu.invoice')</span>
                </a>
            </li>
        </ul>

        <ul class="menu-content">
            <li class="@yield('invoice-details')">
                <a class="menu-item" href="{{route('admin.invoice-details')}}"><i></i>
                    <span data-i18n="Basic">@lang('left_menu.invoice_details')</span>
                </a>
            </li>
        </ul> 

    </li>
    


    <li class=" nav-item"><a href="{{route('product.inventory.list')}}"><i class="la la-calendar"></i><span class="menu-title" data-i18n="Calendars">@lang('left_menu.inventory')</span></a>

    </li>
   <li class="@yield('product inventory')"><a class="menu-item" href="{{route('product.inventory.list')}}"><i></i><span data-i18n="Advance">@lang('left_menu.inventory')</span></a> --}}



</ul>
