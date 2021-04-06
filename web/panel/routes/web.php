<?php
Route::get('/cc', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
    return 'DONE'; 
});

Route::get('/', function () {

    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('login');
});

Route::get('login', ['as' => 'login', 'uses' => 'Admin\AdminAuthController@getLogin']);
Route::post('admin', ['as' => 'admin', 'uses' => 'Admin\AdminAuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Admin\AdminAuthController@getLogout']);

Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    //Route::get('dashboard', ['middleware' => 'acl:dashboard', 'as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@homepage']);

    // Admin User
    Route::get('admin-users', ['middleware' => 'acl:view_admin_user', 'as' => 'admin.admin-user', 'uses' => 'AdminUserController@getIndex']);
    Route::get('admin-user/new', ['middleware' => 'acl:add_admin_user', 'as' => 'admin.admin-user.new', 'uses' => 'AdminUserController@getCreate']);
    Route::post('admin-user/store', ['middleware' => 'acl:add_admin_user', 'as' => 'admin.admin-user.store', 'uses' => 'AdminUserController@postStore']);
    Route::get('admin-user/{id}/edit', ['middleware' => 'acl:edit_admin_user', 'as' => 'admin.admin-user.edit', 'uses' => 'AdminUserController@getEdit']);
    Route::post('admin-user/{id}/update', ['middleware' => 'acl:edit_admin_user', 'as' => 'admin.admin-user.update', 'uses' => 'AdminUserController@putUpdate']);
    Route::get('admin-user/{id}/delete', ['middleware' => 'acl:delete_admin_user', 'as' => 'admin.admin-user.delete', 'uses' => 'AdminUserController@getDelete']);

    // User-Group
    Route::get('user-group', ['middleware' => 'acl:view_user_group', 'as' => 'admin.user-group', 'uses' => 'UserGroupController@getIndex']);
    Route::get('user-group/new', ['middleware' => 'acl:new_user_group', 'as' => 'admin.user-group.new', 'uses' => 'UserGroupController@getCreate']);
    Route::post('user-group/store', ['middleware' => 'acl:new_user_group', 'as' => 'admin.user-group.store', 'uses' => 'UserGroupController@postStore']);
    Route::get('user-group/{id}/edit', ['middleware' => 'acl:edit_user_group', 'as' => 'admin.user-group.edit', 'uses' => 'UserGroupController@getEdit']);
    Route::post('user-group/{id}/update', ['middleware' => 'acl:edit_user_group', 'as' => 'admin.user-group.update', 'uses' => 'UserGroupController@putUpdate']);
    Route::get('user-group/{id}/delete', ['middleware' => 'acl:delete_user_group', 'as' => 'admin.user-group.delete', 'uses' => 'UserGroupController@getDelete']);

    // User-Group
    Route::get('assign-access', ['middleware' => 'acl:assign_user_access', 'as' => 'admin.assign-access', 'uses' => 'AssignAccessController@getIndex']);
    Route::post('assign-access', ['middleware' => 'acl:assign_user_access', 'as' => 'admin.assign-access', 'uses' => 'AssignAccessController@postIndex']);

    // Role
    Route::get('role', ['middleware' => 'acl:view_role', 'as' => 'admin.role', 'uses' => 'RoleController@getIndex']);
    Route::get('role/new', ['middleware' => 'acl:add_role', 'as' => 'admin.role.new', 'uses' => 'RoleController@getCreate']);
    Route::post('role/store', ['middleware' => 'acl:add_role', 'as' => 'admin.role.store', 'uses' => 'RoleController@postStore']);
    Route::get('role/{id}/edit', ['middleware' => 'acl:edit_role', 'as' => 'admin.role.edit', 'uses' => 'RoleController@getEdit']);
    Route::post('role/{id}/update', ['middleware' => 'acl:edit_role', 'as' => 'admin.role.update', 'uses' => 'RoleController@postUpdate']);
    Route::get('role/{id}/delete', ['middleware' => 'acl:delete_role', 'as' => 'admin.role.delete', 'uses' => 'RoleController@getDelete']);

    // Permission-Group
    Route::get('permission-group', ['middleware' => 'acl:view_menu', 'as' => 'admin.permission-group', 'uses' => 'PermissionGroupController@getIndex']);
    Route::get('permission-group/new', ['middleware' => 'acl:new_menu', 'as' => 'admin.permission-group.new', 'uses' => 'PermissionGroupController@getCreate']);
    Route::post('permission-group/store', ['middleware' => 'acl:new_menu', 'as' => 'admin.permission-group.store', 'uses' => 'PermissionGroupController@postStore']);
    Route::get('permission-group/{id}/edit', ['middleware' => 'acl:edit_menu', 'as' => 'admin.permission-group.edit', 'uses' => 'PermissionGroupController@getEdit']);
    Route::post('permission-group/{id}/update', ['middleware' => 'acl:edit_menu', 'as' => 'admin.permission-group.update', 'uses' => 'PermissionGroupController@putUpdate']);
    Route::get('permission-group/{id}/delete', ['middleware' => 'acl:delete_menu', 'as' => 'admin.permission-group.delete', 'uses' => 'PermissionGroupController@getDelete']);

    // permission
    Route::get('permission', ['middleware' => 'acl:view_action', 'as' => 'admin.permission', 'uses' => 'PermissionController@getIndex']);
    Route::get('permission/new', ['middleware' => 'acl:new_action', 'as' => 'admin.permission.new', 'uses' => 'PermissionController@getCreate']);
    Route::post('permission/store', ['middleware' => 'acl:new_action', 'as' => 'admin.permission.store', 'uses' => 'PermissionController@postStore']);
    Route::get('permission/{id}/edit', ['middleware' => 'acl:edit_action', 'as' => 'admin.permission.edit', 'uses' => 'PermissionController@getEdit']);
    Route::post('permission/{id}/update', ['middleware' => 'acl:edit_action', 'as' => 'admin.permission.update', 'uses' => 'PermissionController@putUpdate']);
    Route::get('permission/{id}/delete', ['middleware' => 'acl:delete_action', 'as' => 'admin.permission.delete', 'uses' => 'PermissionController@getDelete']);

    // Gym Admin
    Route::get('gym-admin', ['as' => 'admin.gym-admin', 'uses' => 'GymAdminController@getIndex']);
    Route::get('gym-admin/new', ['as' => 'admin.gym-admin.new', 'uses' => 'GymAdminController@getCreate']);
    Route::post('gym-admin/store', ['as' => 'admin.gym-admin.store', 'uses' => 'GymAdminController@postStore']);
    Route::get('gym-admin/{id}/edit', ['as' => 'admin.gym-admin.edit', 'uses' => 'GymAdminController@getEdit']);
    Route::post('gym-admin/{id}/update', ['as' => 'admin.gym-admin.update', 'uses' => 'GymAdminController@putUpdate']);
    Route::get('gym-admin/{id}/delete', ['as' => 'admin.gym-admin.delete', 'uses' => 'GymAdminController@getDelete']);

    // Gym
    Route::get('gym', ['as' => 'admin.gym', 'uses' => 'GymController@getIndex']);
    Route::get('gym/new', ['as' => 'admin.gym.new', 'uses' => 'GymController@getCreate']);
    Route::post('gym/store', ['as' => 'admin.gym.store', 'uses' => 'GymController@postStore']);
    Route::get('gym/{id}/edit', ['as' => 'admin.gym.edit', 'uses' => 'GymController@getEdit']);
    Route::post('gym/{id}/update', ['as' => 'admin.gym.update', 'uses' => 'GymController@putUpdate']);
    Route::get('gym/{id}/delete', ['as' => 'admin.gym.delete', 'uses' => 'GymController@getDelete']);

    // Workout Body Parts
    Route::get('workout-body-parts', ['as' => 'admin.workout-body-parts', 'uses' => 'WorkoutBodyPartsController@getIndex']);
    Route::get('workout-body-parts/new', ['as' => 'admin.workout-body-parts.new', 'uses' => 'WorkoutBodyPartsController@getCreate']);
    Route::post('workout-body-parts/store', ['as' => 'admin.workout-body-parts.store', 'uses' => 'WorkoutBodyPartsController@postStore']);
    Route::get('workout-body-parts/{id}/edit', ['as' => 'admin.workout-body-parts.edit', 'uses' => 'WorkoutBodyPartsController@getEdit']);
    Route::post('workout-body-parts/{id}/update', ['as' => 'admin.workout-body-parts.update', 'uses' => 'WorkoutBodyPartsController@putUpdate']);
    Route::get('workout-body-parts/{id}/delete', ['as' => 'admin.workout-body-parts.delete', 'uses' => 'WorkoutBodyPartsController@getDelete']);

    // Workout item
    Route::get('workout-item', ['as' => 'admin.workout-item', 'uses' => 'WorkoutItemController@getIndex']);
    Route::get('workout-item/new', ['as' => 'admin.workout-item.new', 'uses' => 'WorkoutItemController@getCreate']);
    Route::post('workout-item/store', ['as' => 'admin.workout-item.store', 'uses' => 'WorkoutItemController@postStore']);
    Route::get('workout-item/{id}/edit', ['as' => 'admin.workout-item.edit', 'uses' => 'WorkoutItemController@getEdit']);
    Route::post('workout-item/{id}/update', ['as' => 'admin.workout-item.update', 'uses' => 'WorkoutItemController@putUpdate']);
    Route::get('workout-item/{id}/delete', ['as' => 'admin.workout-item.delete', 'uses' => 'WorkoutItemController@getDelete']);


    //product

    Route::get('product',['middleware' => 'acl:view_product', 'as' => 'admin.product.list', 'uses' => 'ProductController@getIndex']);
    Route::get('product/{id}/reports',['middleware' => 'acl:view_product', 'as' => 'product.reports', 'uses' => 'ProductController@getReport']);
    Route::get('product/{id}/edit',['middleware' => 'acl:edit_product', 'as' => 'admin.product.edit', 'uses' => 'ProductController@getEdit']);
    Route::get('product/{id}/view',['middleware' => 'acl:view_product', 'as' => 'admin.product.view', 'uses' => 'ProductController@getView']);
    Route::get('product/get-url-slug',[ 'middleware' => 'acl:edit_product', 'as' => 'get-url-slug', 'uses' => 'ProductController@getUrlSlug']);    
    Route::post('product/{id}/update',['middleware' => 'acl:edit_product', 'as' => 'admin.product.update', 'uses' => 'ProductController@putUpdate']);
    Route::get('product/{id}/delete',['middleware' => 'acl:delete_product', 'as' => 'admin.product.delete', 'uses' => 'ProductController@getDelete']);
    


    //product-model
    Route::get('product-model', ['middleware' => 'acl:view_model', 'as' => 'admin.product-model', 'uses' => 'ProductModelController@getIndex']);
    Route::get('product-model/new', ['middleware' => 'acl:new_model', 'as' => 'admin.product-model.new', 'uses' => 'ProductModelController@getCreate']);
    Route::post('product-model/store', ['middleware' => 'acl:new_model', 'as' => 'admin.product-model.store', 'uses' => 'ProductModelController@postStore']);
    Route::get('product-model/{PK_NO}/edit', ['middleware' => 'acl:edit_model', 'as' => 'admin.product-model.edit', 'uses' => 'ProductModelController@getEdit']);
    Route::post('product-model/{PK_NO}/update', ['middleware' => 'acl:edit_model', 'as' => 'admin.product-model.update', 'uses' => 'ProductModelController@putUpdate']);
    Route::get('product-model/{PK_NO}/delete', ['middleware' => 'acl:delete_model', 'as' => 'admin.product-model.delete', 'uses' => 'ProductModelController@getDelete']);


    //Brand
    Route::get('product-brand', ['middleware' => 'acl:view_brand', 'as' => 'admin.brand.list', 'uses' => 'BrandController@getIndex']);
    Route::get('product-brand/new', ['middleware' => 'acl:new_brand', 'as' => 'admin.brand.create', 'uses' => 'BrandController@getCreate']);
    Route::post('product-brand/store', ['middleware' => 'acl:new_brand', 'as' => 'admin.brand.store', 'uses' => 'BrandController@postStore']);
    Route::get('product-brand/{id}/edit', ['middleware' => 'acl:edit_brand', 'as' => 'admin.brand.edit', 'uses' => 'BrandController@postEdit']);
    Route::post('product-brand/{id}/update', ['middleware' => 'acl:edit_brand', 'as' => 'admin.brand.update', 'uses' => 'BrandController@postUpdate']);
    Route::get('product-brand/{id}/delete', ['middleware' => 'acl:delete_brand', 'as' => 'admin.brand.delete', 'uses' => 'BrandController@getDelete']);
    Route::get('get_brand/{sub_category_id}', ['middleware' => 'acl:new_brand', 'as' => 'admin.get_brand', 'uses' => 'BrandController@getBrandBySubCat']);


    //Package
    Route::get('package', ['middleware' => 'acl:view_package', 'as' => 'admin.package.list', 'uses' => 'PackageController@getIndex']);
    Route::get('package/new', ['middleware' => 'acl:new_package', 'as' => 'admin.package.create', 'uses' => 'PackageController@getCreate']);
    Route::post('package/store', ['middleware' => 'acl:new_package', 'as' => 'admin.package.store', 'uses' => 'PackageController@postStore']);
    Route::get('package/{id}/edit', ['middleware' => 'acl:edit_package', 'as' => 'admin.package.edit', 'uses' => 'PackageController@getEdit']);
    Route::post('package/{id}/update', ['middleware' => 'acl:edit_package', 'as' => 'admin.package.update', 'uses' => 'PackageController@postUpdate']);
    Route::get('package/{id}/delete', ['middleware' => 'acl:delete_package', 'as' => 'admin.package.delete', 'uses' => 'PackageController@getDelete']);



    //City
    Route::get('city', ['middleware' => 'acl:view_city', 'as' => 'admin.city.list', 'uses' => 'CityController@getIndex']);
    Route::get('city/new', ['middleware' => 'acl:new_city', 'as' => 'admin.city.create', 'uses' => 'CityController@getCreate']);
    Route::post('city/store', ['middleware' => 'acl:new_city', 'as' => 'admin.city.store', 'uses' => 'CityController@postStore']);
    Route::get('city/{id}/edit', ['middleware' => 'acl:edit_city', 'as' => 'admin.city.edit', 'uses' => 'CityController@getEdit']);
    Route::post('city/{id}/update', ['middleware' => 'acl:edit_city', 'as' => 'admin.city.update', 'uses' => 'CityController@postUpdate']);
    Route::get('city/{id}/delete', ['middleware' => 'acl:delete_city', 'as' => 'admin.city.delete', 'uses' => 'CityController@getDelete']);
    Route::get('get-area-by-location/{location}/{location_id}', ['middleware' => 'acl:view_city', 'as' => 'get-area-by-location', 'uses' => 'CityController@getAreaByLocation']);

    //Division
    Route::get('division', ['middleware' => 'acl:view_division', 'as' => 'admin.division.list', 'uses' => 'DivisionController@getIndex']);
    Route::get('division/new', ['middleware' => 'acl:new_division', 'as' => 'admin.division.create', 'uses' => 'DivisionController@getCreate']);
    Route::post('division/store', ['middleware' => 'acl:new_division', 'as' => 'admin.division.store', 'uses' => 'DivisionController@postStore']);
    Route::get('division/{id}/edit', ['middleware' => 'acl:edit_division', 'as' => 'admin.division.edit', 'uses' => 'DivisionController@getEdit']);
    Route::post('division/{id}/update', ['middleware' => 'acl:edit_division', 'as' => 'admin.division.update', 'uses' => 'DivisionController@postUpdate']);
    Route::get('division/{id}/delete', ['middleware' => 'acl:delete_division', 'as' => 'admin.division.delete', 'uses' => 'DivisionController@getDelete']);


    //Area
    Route::get('area', ['middleware' => 'acl:view_area', 'as' => 'admin.area.list', 'uses' => 'AreaController@getIndex']);
    Route::get('area/new', ['middleware' => 'acl:new_area', 'as' => 'admin.area.create', 'uses' => 'AreaController@getCreate']);
    Route::post('area/store', ['middleware' => 'acl:new_area', 'as' => 'admin.area.store', 'uses' => 'AreaController@postStore']);
    Route::get('area/{id}/edit', ['middleware' => 'acl:edit_area', 'as' => 'admin.area.edit', 'uses' => 'AreaController@getEdit']);
    Route::post('area/{id}/update', ['middleware' => 'acl:edit_area', 'as' => 'admin.area.update', 'uses' => 'AreaController@postUpdate']);
    Route::get('area/{id}/delete', ['middleware' => 'acl:delete_area', 'as' => 'admin.area.delete', 'uses' => 'AreaController@getDelete']);

    //Product Type
    Route::get('product-type', ['middleware' => 'acl:view_product_type', 'as' => 'admin.product_type.list', 'uses' => 'ProductTypeController@getIndex']);
    Route::get('product-type/new', ['middleware' => 'acl:new_product_type', 'as' => 'admin.product_type.create', 'uses' => 'ProductTypeController@getCreate']);
    Route::post('product-type/store', ['middleware' => 'acl:new_product_type', 'as' => 'admin.product_type.store', 'uses' => 'ProductTypeController@postStore']);
    Route::get('product-type/{id}/edit', ['middleware' => 'acl:edit_product_type', 'as' => 'admin.product_type.edit', 'uses' => 'ProductTypeController@getEdit']);
    Route::post('product-type/{id}/update', ['middleware' => 'acl:edit_product_type', 'as' => 'admin.product_type.update', 'uses' => 'ProductTypeController@postUpdate']);
    Route::get('product-type/{id}/delete', ['middleware' => 'acl:delete_product_type', 'as' => 'admin.product_type.delete', 'uses' => 'ProductTypeController@getDelete']);

    //Customer
    Route::get('customer', ['middleware' => 'acl:view_customer', 'as' => 'admin.customer.list', 'uses' => 'CustomerController@getIndex']);
    
    Route::get('customer/new', ['middleware' => 'acl:new_customer', 'as' => 'admin.customer.create', 'uses' => 'CustomerController@getCreate']);
    Route::post('customer/store', ['middleware' => 'acl:new_customer', 'as' => 'admin.customer.store', 'uses' => 'CustomerController@postStore']);
    Route::get('customer/{id}/edit', ['middleware' => 'acl:edit_customer', 'as' => 'admin.customer.edit', 'uses' => 'CustomerController@getEdit']);
    Route::get('customer/{id}/view', ['middleware' => 'acl:view_customer', 'as' => 'admin.customer.view', 'uses' => 'CustomerController@getView']);
    Route::post('customer/{id}/update', ['middleware' => 'acl:edit_customer', 'as' => 'admin.customer.update', 'uses' => 'CustomerController@postUpdate']);
    Route::get('customer/{id}/delete', ['middleware' => 'acl:delete_customer', 'as' => 'admin.customer.delete', 'uses' => 'CustomerController@getDelete']);
    Route::get('customer/{id}/active', ['middleware' => 'acl:edit_customer', 'as' => 'admin.customer.active', 'uses' => 'CustomerController@active']);





    //Category
    Route::get('category', ['middleware' => 'acl:view_category', 'as' => 'product.category.list', 'uses' => 'CategoryController@getIndex']);
    Route::get('category/new', ['middleware' => 'acl:new_category', 'as' => 'product.category.create', 'uses' => 'CategoryController@getCreate']);
    Route::post('category/store', ['middleware' => 'acl:new_category', 'as' => 'product.category.store', 'uses' => 'CategoryController@postStore']);
    Route::get('category/{id}/edit', ['middleware' => 'acl:edit_category', 'as' => 'product.category.edit', 'uses' => 'CategoryController@getEdit']);
    Route::post('category/{id}/update', ['middleware' => 'acl:edit_category', 'as' => 'product.category.update', 'uses' => 'CategoryController@postUpdate']);
    Route::get('category/{id}/delete', ['middleware' => 'acl:delete_category', 'as' => 'product.category.delete', 'uses' => 'CategoryController@getDelete']);

    //Sub Category
    Route::get('sub_category/{cat_id?}', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.sub_category.list', 'uses' => 'SubCategoryController@getIndex']);
    Route::get('sub_category/new', ['middleware' => 'acl:new_sub_category', 'as' => 'admin.sub_category.create', 'uses' => 'SubCategoryController@getCreate']);
    Route::post('sub_category/store', ['middleware' => 'acl:new_sub_category', 'as' => 'admin.sub_category.store', 'uses' => 'SubCategoryController@postStore']);
    Route::get('sub_category/{id}/edit', ['middleware' => 'acl:edit_sub_category', 'as' => 'admin.sub_category.edit', 'uses' => 'SubCategoryController@getEdit']);
    Route::post('sub_category/{id}/update', ['middleware' => 'acl:edit_sub_category', 'as' => 'admin.sub_category.update', 'uses' => 'SubCategoryController@postUpdate']);
    Route::get('sub_category/{id}/delete', ['middleware' => 'acl:delete_sub_category', 'as' => 'admin.sub_category.delete', 'uses' => 'SubCategoryController@getDelete']); 

    //packages
    Route::get('package', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.package.create', 'uses' => 'PackageController@getIndex']);
    Route::get('package/{id}/view', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.package.view', 'uses' => 'PackageController@getView']);
    Route::get('package/{id}/edit', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.package.edit', 'uses' => 'PackageController@getEdit']);


    //promotion
    Route::get('promotion', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.promotion.list', 'uses' => 'PromotionController@getIndex']);

    Route::get('promotion/{id}/view', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.promotion.view', 'uses' => 'PromotionController@getView']);
    
    Route::get('promotion/{id}/edit', ['middleware' => 'acl:edit_sub_category', 'as' => 'admin.promotion.edit', 'uses' => 'PromotionController@getEdit']);
    Route::post('promotion/{id}/update', ['middleware' => 'acl:edit_sub_category', 'as' => 'admin.promotion.update', 'uses' => 'PromotionController@postUpdate']);


    //site setting routes
    Route::get('about-us', ['middleware' => 'acl:view_about_us', 'as' => 'admin.about.us', 'uses' => 'SettingController@getAboutUs']);
    Route::get('contact-us', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.contact.us', 'uses' => 'SettingController@getContactUs']);
    Route::get('terms-&-conditions', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.terms.conditions', 'uses' => 'SettingController@getTermsConditions']);
    Route::get('privacy-policy', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.privacy.policy', 'uses' => 'SettingController@getPrivacyPolicy']);
    Route::get('quick-rules', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.quick.rules', 'uses' => 'SettingController@getQuickRules']);
    Route::get('howto-sell-fast', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.howtosell.fast', 'uses' => 'SettingController@gethowtoSellFast']);
    Route::get('why-membership', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.why.membership', 'uses' => 'SettingController@getWhyMembership']);
    Route::get('mail', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.mail.configuration', 'uses' => 'SettingController@getMailConfig']);
    Route::get('footer', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.footer', 'uses' => 'SettingController@getFooter']);
    Route::get('copy-right', ['middleware' => 'acl:view_sub_category', 'as' => 'admin.copy.right', 'uses' => 'SettingController@getCopyRight']);

    //client query routes
    Route::get('client-quries', ['middleware' => 'acl:get_client_query', 'as' => 'admin.client.query', 'uses' => 'ClientQueryController@getIndex']);
    Route::get('view-query', ['middleware' => 'acl:view_client_query', 'as' => 'admin.query.view', 'uses' => 'ClientQueryController@getView']);
    Route::get('reply-query', ['middleware' => 'acl:view_client_query', 'as' => 'admin.query.reply', 'uses' => 'ClientQueryController@getReply']);

    //faq routes
    Route::get('create-faq', ['middleware' => 'acl:view_faq', 'as' => 'admin.faq.list', 'uses' => 'FaqController@getIndex']);
    Route::get('faq/new', ['middleware' => 'acl:new_faq', 'as' => 'admin.faq.create', 'uses' => 'FaqController@getCreate']);

    Route::post('faq-store', ['middleware' => 'acl:create_faq', 'as' => 'admin.faq.store', 'uses' => 'FaqController@postStore']);


     Route::get('faq/{id}/edit', ['middleware' => 'acl:edit_faq', 'as' => 'admin.faq.edit', 'uses' => 'FaqController@getEdit']);
     Route::post('faq/{id}/update', ['middleware' => 'acl:faq_update', 'as' => 'admin.faq.update', 'uses' => 'FaqController@postUpdate']);
     Route::get('faq/{id}/view', ['middleware' => 'acl:view_faq', 'as' => 'admin.faq.view', 'uses' => 'FaqController@getView']);
     Route::get('faq/{id}/delete', ['middleware' => 'acl:delete_faq', 'as' => 'admin.faq.delete', 'uses' => 'FaqController@getDelete']);






});
