$(document).ready(function() {
    var table = $('#category_table');
    var oTable = table.dataTable({
        "language": {
         "lengthMenu": "Show _MENU_",
        },
        "dom":
         "<'row'" +
         "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
         "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
         ">" +

         "<'table-responsive'tr>" +

         "<'row'" +
         "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
         "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
         ">"
    });

    $('#btn_new_category').click(function() {
        $('#category_name').val('');
        $('#btn_cat_save').attr('category_id', '');
        $('#categoryModal').modal('show');
    });

    $('#btn_cat_save').click(function() {
        console.log('click')
        var category_name = $('#category_name').val();
        if(category_name == '')
        {
            toastr.error('Please type Category name.');
        } else {
            var category_id = $(this).attr('category_id');
            if(category_id == '')
            {
                $.ajax({
                    url : '/category/save',
                    method : 'post',
                    data : {
                        category_name : category_name,
                        pid : 0
                    },
                    success : function(data) {
                        var category = data.category;
                        oTable.fnAddData([category.id, category.name, `<button class="btn btn-sm btn-primary btn_detail" type="button" category_id = "${category.id}"><i class="fa fa-eye"></i> Details</button>
                        <button class="btn btn-sm btn-success btn_edit" type="button" category_id = "${category.id}"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-sm btn-danger btn_delete" type="button" category_id = "${category.id}"><i class="fa fa-trash"></i> Delete</button>`]);
                        toastr.success('Saved successfully.');
                        $('#categoryModal').modal('hide');
                        $('#category').append(`<option value="${category.id}">${category.name}</option>`);
                    },
                    error : function() {
                        toastr.error('Happening any errors on saving category.');
                    }
                })
            } else {
                $.ajax({
                    url : '/category/update',
                    method : 'post',
                    data : {
                        category_name : category_name,
                        category_id : category_id,
                        pid : 0
                    },
                    success : function(data) {
                        window.location.reload();
                    },
                    error : function() {
                        toastr.error('Happening any errors on saving category.');
                    }
                })
            }

        }
    });

    var sub_table = $('#subcategory_table');
    var sTable = sub_table.dataTable({
        "language": {
         "lengthMenu": "Show _MENU_",
        },
        "dom":
         "<'row'" +
         "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
         "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
         ">" +

         "<'table-responsive'tr>" +

         "<'row'" +
         "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
         "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
         ">"
    });

    table.on('click', '.btn_detail', function() {
        sTable.fnClearTable();
        var category_id = $(this).attr('category_id');
        $('#btn_new_subcategory').attr('category_id', category_id);
        $.ajax({
            url : '/category/get_subcategories',
            method : 'post',
            data : {
                category_id : category_id
            },
            success : function(data) {
                var categories = data.categories;
                for(var i = 0 ; i < categories.length ; i ++)
                {
                    sTable.fnAddData([categories[i].id, categories[i].name, `<button class="btn btn-sm btn-success btn_sub_edit" type="button" category_id = "${categories[i].id}"><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-sm btn-danger btn_sub_delete" type="button" category_id = "${categories[i].id}"><i class="fa fa-trash"></i> Delete</button>`]);
                }
                $('#detailModal').modal('show');
            },
            error : function() {
                toastr.error('Happening any errors on getting subcategories.');
            }
        })
    });

    table.on('click', '.btn_edit', function() {
        var category_id = $(this).attr('category_id');
        $.ajax({
            url : '/category/get_category',
            method : 'post',
            data : {
                category_id : category_id
            },
            success : function(data) {
                var category = data.category;
                $('#category_name').val(category.name);
                $('#btn_cat_save').attr('category_id', category.id);
                $('#categoryModal').modal('show');
            },
            error : function() {
                toastr.error('Happening any errors on getting category')
            }
        })
    });

    $('#btn_new_subcategory').click(function() {
        $('#btn_subcat_save').attr('category_id','');
        $('#category').select2('val', 0);
        $('#subcategory_name').val('');
        $('#subCategoryModal').modal('show');
    });

    $('#btn_subcat_save').click(function() {
        var category_id = $('#category').val();
        var category_name = $('#subcategory_name').val();

        if(category_id == 0)
        {
            toastr.error('Please select a Category Name.');
        }
        if(category_name == '')
        {
            toastr.error('Please type a SubCategory Name.');
        }
        if(category_name != '' && category_id != 0)
        {
            var old_cat_id = $(this).attr('category_id');
            if(old_cat_id == '')
            {
                $.ajax({
                    url : '/category/save',
                    method : 'post',
                    data : {
                        pid : category_id,
                        category_name : category_name,
                    },
                    success : function(data) {
                        var category = data.category;
                        toastr.success('Saved Sub Category successfully.');
                        $('#subCategoryModal').modal('hide');
                        if(category_id === $('#btn_new_subcategory').attr('category_id'))
                        {
                            sTable.fnAddData([category.id, category.name, `<button class="btn btn-sm btn-success btn_sub_edit" type="button" category_id = "${category.id}"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-sm btn-danger btn_sub_delete" type="button" category_id = "${category.id}"><i class="fa fa-trash"></i> Delete</button>`])
                        }
                    },
                    error : function() {
                        toastr.error('Happening any error on saving Sub Category.');
                    }
                })
            } else {
                $.ajax({
                    url : '/category/update',
                    method : 'post',
                    data : {
                        pid : category_id,
                        category_name : category_name,
                        category_id : old_cat_id
                    },
                    success : function(data) {
                        var category = data.category;
                        toastr.success('Saved Sub Category successfully.');
                        $('#subCategoryModal').modal('hide');
                        if(category_id === $('#btn_new_subcategory').attr('category_id'))
                        {
                            sTable.fnAddData([category.id, category.name, `<button class="btn btn-sm btn-success btn_sub_edit" type="button" category_id = "${category.id}"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-sm btn-danger btn_sub_delete" type="button" category_id = "${category.id}"><i class="fa fa-trash"></i> Delete</button>`])
                        }
                    },
                    error : function() {
                        toastr.error('Happening any error on saving Sub Category.');
                    }
                })
            }

        }
    });

    sub_table.on('click', '.btn_sub_edit', function() {
        var category_id = $(this).attr('category_id');
        $.ajax({
            url : '/category/get_category',
            method : 'post',
            data : {
                category_id : category_id
            },
            success : function(data) {
                var category = data.category;
                $('#category').select2('val', `${category.pid}`);
                $('#subcategory_name').val(category.name);
                $('#btn_subcat_save').attr('category_id', category.id);
                $('#subCategoryModal').modal('show');
            },
            error : function() {
                toastr.error('Happening any errors on getting category')
            }
        })
    });

    sub_table.on('click', '.btn_sub_delete', function() {
        var category_id = $(this).attr('category_id');
        var nRow = $(this).parents('tr')[0];
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url : '/category/delete',
                    method : 'post',
                    data : {
                        category_id : category_id
                    },
                    success : function(data) {
                        oTable.fnDeleteRow(nRow);
                    },
                    error : function() {
                        toastr.error('Happening any errors on deleting category.');
                    }
                })
            }
        });
    });

    table.on('click', '.btn_delete', function() {
        var category_id = $(this).attr('category_id');
        var nRow = $(this).parents('tr')[0];
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url : '/category/delete',
                    method : 'post',
                    data : {
                        category_id : category_id
                    },
                    success : function(data) {
                        oTable.fnDeleteRow(nRow);
                    },
                    error : function() {
                        toastr.error('Happening any errors on deleting category.');
                    }
                })
            }
        });

    });

});
