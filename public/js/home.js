$(document).ready(function() {

    var rating = 0;

    $('#btn_search').click(function() {
        if($('#keyword').val() === '')
        {
            toastr.error('Please type any Item Name or Category.');
        } else{
            $('#search_form').submit();
            // $.ajax({
            //     url : '/search',
            //     method : 'post',
            //     data : {
            //         keyword : $('#keyword').val()
            //     },
            //     success : function(data){
            //         var items = data.items;
            //         var card_html = '';
            //         $('#item_count').html(`${items.length} Item(s) Found`)
            //         items.forEach(item => {
            //             card_html += `<div class="col-md-6 col-xxl-4">
            //             <!--begin::Card-->
            //             <div class="card">
            //                 <!--begin::Card body-->
            //                 <div class="card-body d-flex flex-column pt-12 p-9">
            //                     <!--begin::Name-->
            //                     <a href="#" class="fs-3 text-gray-800 text-center text-hover-primary fw-bolder mb-3 border-gray-300 border-bottom-dashed item_a" item_id="${item.id}">${item.name}</a>

            //                     <!--end::Name-->
            //                     <div class="d-flex flex-wrap py-3 px-2">
            //                         <span class="fs-5 text-gray-500 text-hover-warning mb-3">Rate </span>`

            //                         for(var i = 1; i <= item.rate; i++){
            //                         card_html +=`<div class="rating-label checked">
            //                             <span class="svg-icon svg-icon-1">
            //                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            //                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            //                                         <polygon points="0 0 24 0 24 24 0 24"></polygon>
            //                                         <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"></path>
            //                                     </g>
            //                                 </svg>
            //                             </span>
            //                         </div>`
            //                         }

            //                         for(var i = 1; i <= 5 - item.rate; i++) {
            //                         card_html +=`<div class="rating-label">
            //                             <span class="svg-icon svg-icon-1">
            //                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            //                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            //                                         <polygon points="0 0 24 0 24 24 0 24"></polygon>
            //                                         <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"></path>
            //                                     </g>
            //                                 </svg>
            //                             </span>
            //                         </div>`
            //                         }


            //                     card_html +=`</div>
            //                     <!--begin::Info-->
            //                     <div class="d-flex flex-wrap">
            //                         <!--begin::Stats-->
            //                         <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
            //                             <div class="fs-6 fw-bolder text-gray-700">`
            //                                 JSON.parse(item.categories).forEach(category => {
            //                                     card_html += `<span class="badge badge-primary mb-1"><i class="fa fa-tags text-light"></i> ${category.value}</span>&nbsp;`;
            //                                 })



            //                             card_html += `</div>
            //                         </div>
            //                         <!--end::Stats-->
            //                     </div>
            //                     <!--end::Info-->

            //                     <!--begin::Info-->
            //                     <div class="d-flex flex-wrap">
            //                         <!--begin::Stats-->
            //                         <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
            //                             <div class="fs-6 fw-bolder text-gray-700">`
            //                                 JSON.parse(item.subcategories).forEach(subcategory => {
            //                                     card_html += `<span class="badge badge-info mb-1"><i class="fa fa-tags text-light"></i> ${subcategory.value}</span>&nbsp;`;
            //                                 })


            //                             card_html +=`</div>
            //                         </div>
            //                         <!--end::Stats-->
            //                     </div>
            //                     <!--end::Info-->

            //                     <a href="#" class="btn_review btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary me-2 mx-2 mb-2" item_name="${item.name}" item_id="${item.id}"><i class="fa fa-edit text-primary"></i> Edit Review</a>
            //                 </div>
            //                 <!--end::Card body-->
            //             </div>
            //             <!--end::Card-->
            //         </div>`;
            //         });

            //         $('#items').html(card_html);
            //     },
            //     error : function() {
            //         toastr.error('Happening any errors on searching.');
            //     }
            // })
        }
    });

    var category = document.querySelector("#categories");
    var subcategory = document.querySelector("#subcategories");

    var category_tagify;
    var subcategory_tagify;

    category_tagify = new Tagify(category, {
        maxTags: 10,
        dropdown: {
            maxItems: 20,           // <- mixumum allowed rendered suggestions
            classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
            enabled: 0,             // <- show suggestions on focus
            closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
        }
    });

    subcategory_tagify = new Tagify(subcategory, {
        maxTags: 10,
        dropdown: {
            maxItems: 20,           // <- mixumum allowed rendered suggestions
            classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
            enabled: 0,             // <- show suggestions on focus
            closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
        }
    });

    $('.item_a').click(function(){
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

    $('.btn_review').click(function() {
        $('#review_item_name').val($(this).attr('item_name'));
        $('#btn_save').attr('item_id', $(this).attr('item_id'));
        $('#editReviewModal').modal('show');
    });

    $('#btn_save').click(function() {
        var description = $('#review_description').val();
        var item_id = $(this).attr('item_id');

        if(description == '')
        {
            toastr.error('Please type description.');
        } else {
            $.ajax({
                url : '/item/review',
                method : 'post',
                data : {
                    item_id : item_id,
                    rating : rating,
                    description : description
                },
                success : function(data) {
                    toastr.success('Saved review successfully.');
                    window.location.reload();
                },
                error : function() {
                    toastr.error('Happening any errors on review saving.');
                }
            })
        }


    });

    $('input[name=rating]').click(function() {
        rating = $(this).val();
    });
});
