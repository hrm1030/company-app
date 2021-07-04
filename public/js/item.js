$(document).ready(function() {
    var table = $('#item_table');
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

    var category = document.querySelector("#categories");
    var subcategory = document.querySelector("#subcategories");

    var category_tagify;
    var subcategory_tagify;

    $.ajax({
        url : '/item/get_categories_subcategories',
        method : 'post',
        success : function(data) {
            var categories = data.categories;
            var subcategories = data.subcategories;
            var category_arr = Array();
            var subcategory_arr = Array();

            for(var i = 0 ; i < categories.length ; i ++)
            {
                category_arr.push(categories[i].name);
            }

            for(var i = 0 ; i < subcategories.length ; i ++)
            {
                subcategory_arr.push(subcategories[i].name);
            }

            category_tagify = new Tagify(category, {
                whitelist: category_arr,
                maxTags: 10,
                dropdown: {
                    maxItems: 20,           // <- mixumum allowed rendered suggestions
                    classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0,             // <- show suggestions on focus
                    closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
                }
            });

            subcategory_tagify = new Tagify(subcategory, {
                whitelist: subcategory_arr,
                maxTags: 10,
                dropdown: {
                    maxItems: 20,           // <- mixumum allowed rendered suggestions
                    classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0,             // <- show suggestions on focus
                    closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
                }
            });

        },
        error : function() {
            toastr.error('Happening any errors on getting categories.');
        }
    });

    $('#btn_new_item').click(function() {
        $('#item_name').val('');
        category_tagify.removeAllTags()
        subcategory_tagify.removeAllTags();
        $('#description').val('');
        $('#itemModal').modal('show');
    });

    $('#btn_item_save').click(function() {
        var item_name = $('#item_name').val();
        var categories = $('#categories').val();
        var subcategories = $('#subcategories').val();
        var description = $('#description').val();

        if(item_name == '')
        {
            toastr.error('Please type Item Name.');
        }
        if(categories == '')
        {
            toastr.error('Select categories.');
        }
        if(subcategories == '')
        {
            toastr.error('Select sub categories.');
        }
        if(description == '')
        {
            toastr.error('Please type description');
        }
        if(item_name != '' && categories != '' && subcategories != '' && description != '')
        {
            var item_id = $(this).attr('item_id');

            if(item_id != ''){
                $.ajax({
                    url : '/item/update',
                    method : 'post',
                    data : {
                        item_name : item_name,
                        categories : categories,
                        subcategories : subcategories,
                        description : description,
                        item_id: item_id
                    },
                    success : function(data) {
                        toastr.success('Updated item successfully.');

                        var item = data.item;
                        var nRow = $(`[item_id=${item_id}]`).parents('tr')[0];
                        categories = JSON.parse(categories);
                        subcategories = JSON.parse(subcategories);
                        var td_category = '';
                        var td_subcategory = '';

                        for(var i = 0 ; i < categories.length; i ++)
                        {
                            td_category += `<span class="badge badge-primary mb-10"><i class="fa fa-tags text-light"></i> ${categories[i].value}</span>&nbsp;`;
                        }

                        for(var i = 0 ; i < subcategories.length; i ++)
                        {
                            td_subcategory += `<span class="badge badge-info mb-10"><i class="fa fa-tags text-light"></i> ${subcategories[i].value}</span>&nbsp;`;
                        }

                        var td_btn = `<button class="btn btn-sm btn-success btn-icon btn_edit" type="button" item_id = "${item_id}"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger btn_delete btn-icon" type="button" item_id = "${item_id}"><i class="fa fa-trash"></i></button>`;

                        oTable.fnUpdate(item.id, nRow, 0, false);
                        oTable.fnUpdate(item.name, nRow, 1, false);
                        oTable.fnUpdate(td_category, nRow, 2, false);
                        oTable.fnUpdate(td_subcategory, nRow, 3, false);
                        oTable.fnUpdate(td_btn, nRow, 4, false);
                        $('#itemModal').modal('hide');
                    },
                    error : function() {
                        toastr.error('Happening any errors on saving item.');
                    }
                });
            } else {
                $.ajax({
                    url : '/item/save',
                    method : 'post',
                    data : {
                        item_name : item_name,
                        categories : categories,
                        subcategories : subcategories,
                        description : description
                    },
                    success : function(data) {
                        toastr.success('Saved item successfully.');
                        var item = data.item;
                        var categories = JSON.parse(item.categories);
                        var subcategories = JSON.parse(item.subcategories);
                        var td_category = '';
                        var td_subcategory = '';

                        for(var i = 0 ; i < categories.length; i ++)
                        {
                            td_category += `<span class="badge badge-primary mb-10"><i class="fa fa-tags text-light"></i> ${categories[i].value}</span>&nbsp;`;
                        }

                        for(var i = 0 ; i < subcategories.length; i ++)
                        {
                            td_subcategory += `<span class="badge badge-info mb-10"><i class="fa fa-tags text-light"></i> ${subcategories[i].value}</span>&nbsp;`;
                        }

                        oTable.fnAddData([item.id, item.name, td_category, td_subcategory, `<button class="btn btn-sm btn-icon btn-success btn_edit" type="button" item_id = "${item.id}"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger btn_delete btn-icon" type="button" item_id = "${item.id}"><i class="fa fa-trash"></i></button>`]);

                        $('#itemModal').modal('hide');
                    },
                    error : function() {
                        toastr.error('Happening any errors on saving item.');
                    }
                });
            }
        }
    });

    table.on('click', '.btn_delete', function() {
        var item_id = $(this).attr('item_id');
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
                    url : '/item/delete',
                    method : 'post',
                    data : {
                        item_id : item_id
                    },
                    success : function (data) {
                        toastr.success('Deleted successfully.');
                        oTable.fnDeleteRow(nRow);
                    },
                    error : function() {
                        toastr.error('Happening any errors on item deleting.');
                    }
                });
            }
        });


    });

    table.on('click', '.btn_edit', function() {
        var item_id = $(this).attr('item_id');
        category_tagify.removeAllTags()
        subcategory_tagify.removeAllTags();

        $.ajax({
            url : '/item/get_item',
            method : 'post',
            data : {
                item_id : item_id
            },
            success : function(data) {
                var item = data.item;
                var categories = JSON.parse(item.categories);
                var subcategories = JSON.parse(item.subcategories);
                $('#item_name').val(item.name);
                category_tagify.addTags(categories)
                subcategory_tagify.addTags(subcategories);
                $('#description').val(item.description);
                $('#itemModal').modal('show');
                $('#btn_item_save').attr('item_id', item.id);
            },
            error : function() {
                toastr.error('Happening any errors on getting item.');
            }
        });
    });
});
