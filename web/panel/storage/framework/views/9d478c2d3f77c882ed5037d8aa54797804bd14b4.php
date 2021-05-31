<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item <?php echo $__env->yieldContent('dashboard'); ?>">
        <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="<?php echo app('translator')->get('left_menu.dashboard'); ?>"><?php echo app('translator')->get('left_menu.dashboard'); ?></span></a>
    </li>
    <?php if(hasAccessAbility('view_product', $roles)): ?>
    <li class=" nav-item <?php echo $__env->yieldContent('Product Management'); ?>">
        <a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="<?php echo app('translator')->get('left_menu.product'); ?>"><?php echo app('translator')->get('left_menu.product'); ?></span></a>
        <ul class="menu-content">
            <?php if(hasAccessAbility('view_product', $roles)): ?>
            <li class="nav-item <?php echo $__env->yieldContent('product_list'); ?>"><a class="menu-item" href="<?php echo e(route('admin.product.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('product_list'); ?>"><?php echo app('translator')->get('left_menu.product_list'); ?></span></a></li>
            <?php endif; ?>

           
           
        </ul>
    </li>
    <?php endif; ?>
     <?php if(hasAccessAbility('view_product', $roles)): ?>
    <li class="nav-item <?php echo $__env->yieldContent('Package'); ?>">
        <a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="package_list"><?php echo app('translator')->get('package.list_page_title'); ?></span></a>
        <ul class="menu-content">
            <li class="nav-item <?php echo $__env->yieldContent('package_list'); ?>"><a class="menu-item" href="<?php echo e(route('admin.package.create')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('package_list'); ?>"><?php echo app('translator')->get('package.package_menu'); ?></span></a></li>
        </ul>
    </li>
    <?php endif; ?>
     <?php if(hasAccessAbility('view_product', $roles)): ?>
    <li class="nav-item <?php echo $__env->yieldContent('Promotion'); ?>">
        <a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="promotion_list"><?php echo app('translator')->get('promotion.promotion_title'); ?></span></a>
        <ul class="menu-content">
            <li class="nav-item <?php echo $__env->yieldContent('promotion_list'); ?>"><a class="menu-item" href="<?php echo e(route('admin.promotion.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('promotion_list'); ?>"><?php echo app('translator')->get('promotion.promotion_sub_title'); ?></span></a></li>
        </ul>
    </li>
    <?php endif; ?>
    <li class="nav-item <?php echo $__env->yieldContent('main_components'); ?>"><a class="menu-item" href="#"><i class="la la-calendar"></i><span class="menu-title" data-i18n="<?php echo $__env->yieldContent('main_components'); ?>"><?php echo app('translator')->get('left_menu.main_components'); ?></span></a>
        <ul class="menu-content">
            <ul class="menu-content">
                <li class="<?php echo $__env->yieldContent('category'); ?>"><a class="menu-item" href="<?php echo e(route('product.category.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('category'); ?>"><?php echo app('translator')->get('left_menu.category'); ?></span></a></li>
                
                <li class="<?php echo $__env->yieldContent('sub_category'); ?>"><a class="menu-item" href="<?php echo e(route('admin.sub_category.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('sub_category'); ?>"><?php echo app('translator')->get('left_menu.sub_category'); ?></span></a></li>
                
                <?php if(hasAccessAbility('view_brand', $roles)): ?>
                <li class="<?php echo $__env->yieldContent('product_brand'); ?>"><a class="menu-item" href="<?php echo e(route('admin.brand.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('product_brand'); ?>"><?php echo app('translator')->get('left_menu.product_brand'); ?></span></a></li>
                <?php endif; ?>
                 <li class="<?php echo $__env->yieldContent('product_model'); ?>"><a class="menu-item" href="<?php echo e(route('admin.product-model')); ?>"><span data-i18n="<?php echo $__env->yieldContent('product_model'); ?>"><?php echo app('translator')->get('left_menu.product_model'); ?></span></a></li>
                
                <li class="<?php echo $__env->yieldContent('cities'); ?>"><a class="menu-item" href="<?php echo e(route('admin.city.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('cities'); ?>"><?php echo app('translator')->get('left_menu.cities'); ?></span></a></li>

                <li class="<?php echo $__env->yieldContent('divisions'); ?>"><a class="menu-item" href="<?php echo e(route('admin.division.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('divisions'); ?>"><?php echo app('translator')->get('left_menu.divisions'); ?></span></a></li>

                <li class="<?php echo $__env->yieldContent('area'); ?>"><a class="menu-item" href="<?php echo e(route('admin.area.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('area'); ?>"><?php echo app('translator')->get('left_menu.area'); ?></span></a></li>
                <li class="<?php echo $__env->yieldContent('product_type'); ?>"><a class="menu-item" href="<?php echo e(route('admin.product_type.list')); ?>"><i></i><span data-i18n="<?php echo $__env->yieldContent('product_type'); ?>"><?php echo app('translator')->get('left_menu.product_type'); ?></span></a></li>
            </ul>

        </ul>
    </li>

    <?php if(hasAccessAbility('view_customer', $roles)): ?>
        <li class=" nav-item <?php echo $__env->yieldContent('Customer Management'); ?>">
            <a href="#">
                <i class="la la-user-plus"></i>
                <span class="menu-title"
                      data-i18n="<?php echo app('translator')->get('left_menu.customer_management'); ?>"><?php echo app('translator')->get('left_menu.customer_management'); ?></span>
            </a>
            <ul class="menu-content">
                <?php if(hasAccessAbility('view_customer', $roles)): ?>
                    <li class="<?php echo $__env->yieldContent('customer_list'); ?>">
                        <a href="<?php echo e(route('admin.customer.list')); ?>">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="<?php echo app('translator')->get('left_menu.customer_list'); ?>"><?php echo app('translator')->get('left_menu.customer_list'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                
                
            </ul>
        </li>
    <?php endif; ?>





    

   

    

    <?php if(hasAccessAbility('view_admin_user', $roles)): ?>
        <li class=" nav-item <?php echo $__env->yieldContent('Admin Mangement'); ?>">
            <a href="#">
                <i class="la la-user-plus"></i>
                <span class="menu-title"
                      data-i18n="<?php echo app('translator')->get('left_menu.admin_management'); ?>"><?php echo app('translator')->get('left_menu.admin_management'); ?></span>
            </a>
            <ul class="menu-content">
                <?php if(hasAccessAbility('view_admin_user', $roles)): ?>
                    <li class="<?php echo $__env->yieldContent('admin-user'); ?>">
                        <a href="<?php echo e(route('admin.admin-user')); ?>">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="<?php echo app('translator')->get('left_menu.admin_user'); ?>"><?php echo app('translator')->get('left_menu.admin_user'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasAccessAbility('view_user_group', $roles)): ?>
                    <li class=" nav-item <?php echo $__env->yieldContent('user-group'); ?>">
                        <a href="<?php echo e(route('admin.user-group')); ?>">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="<?php echo app('translator')->get('left_menu.user_category'); ?>"><?php echo app('translator')->get('left_menu.user_category'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasAccessAbility('assign_user_access', $roles)): ?>
                    <li class=" nav-item <?php echo $__env->yieldContent('assign-access'); ?>">
                        <a href="<?php echo e(route('admin.assign-access')); ?>">
                            <i></i>
                            <span class="menu-title"
                                  data-i18n="<?php echo app('translator')->get('left_menu.assign_access'); ?>"><?php echo app('translator')->get('left_menu.assign_access'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
    <?php if(hasAccessAbility('view_role', $roles)): ?>
        <li class=" nav-item <?php echo $__env->yieldContent('Role Management'); ?>">
            <a href="#">
                <i class="la la-user-plus"></i>
                <span class="menu-title"
                      data-i18n="<?php echo app('translator')->get('left_menu.role_management'); ?>"><?php echo app('translator')->get('left_menu.role_management'); ?></span>
            </a>
            <ul class="menu-content">
                <?php if(hasAccessAbility('view_role', $roles)): ?>
                    <li class="<?php echo $__env->yieldContent('role'); ?>">
                        <a class="menu-item" href="<?php echo e(route('admin.role')); ?>">
                            <i></i>
                            <span data-i18n="<?php echo app('translator')->get('left_menu.role'); ?>"><?php echo app('translator')->get('left_menu.role'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasAccessAbility('view_menu', $roles)): ?>
                    <li class="<?php echo $__env->yieldContent('permission-group'); ?>">
                        <a class="menu-item" href="<?php echo e(route('admin.permission-group')); ?>">
                            <i></i>
                            <span data-i18n="<?php echo app('translator')->get('left_menu.menus'); ?>"><?php echo app('translator')->get('left_menu.menus'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasAccessAbility('view_action', $roles)): ?>
                    <li class="<?php echo $__env->yieldContent('permission'); ?>"><a class="menu-item" href="<?php echo e(route('admin.permission')); ?>"><i></i><span
                                data-i18n="<?php echo app('translator')->get('left_menu.actions'); ?>"><?php echo app('translator')->get('left_menu.actions'); ?></span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
    <li class=" nav-item <?php echo $__env->yieldContent('Web Setting'); ?>">
        <a href="#">
            <i class="la la-user-plus"></i>
            <span  data-i18n="web_setting" class="menu-title">Web Setting</span>
        </a>
        <ul class="menu-content">
            <li class="<?php echo $__env->yieldContent('client_query'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.client.query')); ?>">
                    <i></i>
                    <span data-i18n="client_query">Client Quries</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('about_us'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.about.us')); ?>">
                    <i></i>
                    <span data-i18n="about_us">About Us</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('contact_us'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.contact.us')); ?>">
                    <i></i>
                    <span data-i18n="contact_us">Contact Us</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('terms_condition'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.terms.conditions')); ?>">
                    <i></i>
                    <span data-i18n="terms_condition">Terms & Conditions</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('privacy_policy'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.privacy.policy')); ?>">
                    <i></i>
                    <span data-i18n="privacy_policy">Privacy Policy</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('quick_rules'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.quick.rules')); ?>">
                    <i></i>
                    <span data-i18n="quick_rules">Quick Rules</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('howto_sell_first'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.howtosell.fast')); ?>">
                    <i></i>
                    <span data-i18n="howto_sell_first">How to Sell Fast</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('why_membership'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.why.membership')); ?>">
                    <i></i>
                    <span data-i18n="why_membership">Why membership</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('faq'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.faq.list')); ?>">
                    <i></i>
                    <span data-i18n="faq">FAQ</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('mail_config'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.mail.configuration')); ?>">
                    <i></i>
                    <span data-i18n="mail_config">Mail Configaration</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('footer'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.footer')); ?>">
                    <i></i>
                    <span data-i18n="footer">Footer</span>
                </a>
            </li>
            <li class="<?php echo $__env->yieldContent('copy_right'); ?>">
                <a class="menu-item" href="<?php echo e(route('admin.copy.right')); ?>">
                    <i></i>
                    <span data-i18n="copy_right">Copyright</span>
                </a>
            </li>
        </ul>
    </li>
    


    

    

    



</ul>
<?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/layout/left_sidebar.blade.php ENDPATH**/ ?>