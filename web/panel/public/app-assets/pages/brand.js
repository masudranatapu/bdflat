/*Add edit product model*/
$(document).on('click','.editModelModal, .addModelModal', function(){
    var url         = $(this).data('url');
    var brand_id    = $(this).data('brand_id');
    var brand_name  = $(this).data('brand_name');
    var model_id    = $(this).data('model_id');
    var model_name  = $(this).data('model_name');
    var model_code  = $(this).data('model_code');
    var type        = $(this).data('type');

    $('#model_update_frm').attr('action',url); 
    $('#model_update_frm .brand_id').val(brand_id); 
    $('#model_update_frm .model_name').val(model_name); 
    $('#model_update_frm .model_code').val(model_code); 
    if (type == 'add'){
        $('#brand_name').text('Add new model for '+brand_name); 
        $('#model_update_frm .submit-btn').val('Save');
    }
    if (type == 'edit'){
        $('#brand_name').text('Edit model for '+brand_name); 
        $('#model_update_frm .submit-btn').val('Save change'); 
    }
});

/*Add edit product color*/
$(document).on('click','.editColorModal, .addColorModal', function(){
    var url         = $(this).data('url');
    var brand_id    = $(this).data('brand_id');
    var brand_name  = $(this).data('brand_name');
    var color_id    = $(this).data('color_id');
    var color_name  = $(this).data('color_name');

    var type        = $(this).data('type');

    $('#color_add_edit_frm').attr('action',url); 
    $('#color_add_edit_frm .brand_id').val(brand_id); 
    $('#color_add_edit_frm .color_name').val(color_name); 
 
    if (type == 'add'){
        $('#brand_name_c').text('Add new color for '+brand_name); 
        $('#color_add_edit_frm .submit-btn').val('Save');
    }
    if (type == 'edit'){
        $('#brand_name_c').text('Edit color for '+brand_name); 
        $('#color_add_edit_frm .submit-btn').val('Save change'); 
    }
});

/*Add edit product size*/
$(document).on('click','.editSizeModal, .addSizeModal', function(){
    var url         = $(this).data('url');
    var brand_id    = $(this).data('brand_id');
    var brand_name  = $(this).data('brand_name');
    var size_id    = $(this).data('size_id');
    var size_name  = $(this).data('size_name');

    var type        = $(this).data('type');

    $('#size_add_edit_frm').attr('action',url); 
    $('#size_add_edit_frm .brand_id').val(brand_id); 
    $('#size_add_edit_frm .size_name').val(size_name); 
 
    if (type == 'add'){
        $('#brand_name_s').text('Add new size for '+brand_name); 
        $('#size_add_edit_frm .submit-btn').val('Save');
    }
    if (type == 'edit'){
        $('#brand_name_s').text('Edit size for '+brand_name); 
        $('#size_add_edit_frm .submit-btn').val('Save change'); 
    }
});






