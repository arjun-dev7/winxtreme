$(document).ready(function() {     
    $('.loading').show();
    var masterJSON,categoryJson,mode;
    var product_id;


    $.when(getPageContent()).done(function(){
            dispDetails(masterJSON);              
    });

    $.when(getCategory()).done(function(){
        dispCategoryDetails(categoryJson);              
    });

    function getPageContent()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getProduct',
            type:'POST',
            success:function(data){
                masterJSON = $.parseJSON(data);               
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
    }

    function getCategory()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getCategory',
            type:'POST',
            success:function(data){
                categoryJson = $.parseJSON(data);               
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
    }

    function dispCategoryDetails(JSON){

        for(j=0;j<JSON.length;j++){
            $('#main_category_id').append('<option value="' + JSON[j]['main_category_id'] + '">' + JSON[j]["name"] + '</option>');
        } 
    }

    function dispDetails(JSON)
    {
        var i = 0;
        $('.loading').hide();
        $('#datatable').dataTable( {
            "aaSorting":[],
            "aaData": JSON,
            responsive: true,
            "aoColumns": [
                { 
                    "mDataProp": function ( data, type, full, meta) {
                        return ++i;
                        
                    },
                },
                { "mDataProp": "category_name" },
                { "mDataProp": "product_name" },
                { "mDataProp": "product_info" },  
                { "mDataProp": "key_features" },  
                { 
                    "mDataProp": function ( data, type, full, meta) {
                        return '<a href="'+base_URL+data.product_image+'" target="_blank"> <img src="'+base_URL+data.product_image+'" width="100px"> </a>';
                    },
                },
                { 
                    "mDataProp": function ( data, type, full, meta) {
                        return  '<a id="'+ meta.row +'" class="btn btnEdit"><i class="mdi mdi-book-edit-outline"></i></a>'+
                                '<a id="'+ meta.row +'" class="btn BtnDelete"><i class="mdi mdi-trash-can"></i></a>';
                    },
                },             
            ]               
        });
    }

    $('#addNew').click(function(){
        mode="new";
        $('#myModal').modal('show');
    });

    $("#myModal").on("hidden.bs.modal", function(){
        $(this).find('form').trigger('reset');
        $('#uploaded_image').html("");
        $('.invalid-feedback').hide();
        $('iframe').contents().find('body').empty();
    }); 

    $(document).on('click','.btnEdit',function(){ 
        var index = $(this).attr('id');
        mode='update'; 
        product_id = masterJSON[index]['product_id'];
        $('#main_category_id').val(masterJSON[index]['main_category_id']);
        $('#product_name').val(masterJSON[index]['product_name']);
        $('#product_info').val(masterJSON[index]['product_info']);
        $('#key_features').val(masterJSON[index]['key_features']); 

        $('#uploaded_image').append("<img src='"+base_URL+ masterJSON[index]['product_image'] + "' alt='image' width='150px' >");
        $('#myModal').modal('show');
    }); 


    $(document).on('click','.BtnDelete',function(){
        mode="delete";
        var r_index = $(this).attr('id');
        product_id = masterJSON[r_index].product_id;
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: !1
        }).then(function (e) {
            e.value ?
            $.ajax({
                type: "POST",
                url: base_URL+'admin/Controlbase/deleteProduct',
                data: {"product_id":product_id},      
                success:function(data){
                    var insertResult;
                    insertResult = $.parseJSON(data);
                    if(insertResult.status=="success")
                    {
                        refreshDetails();                
                    }    
                    $('.loading').hide();           
                },     
                error: function() {
                    console.log("Error");
                    $('.loading').hide();
                }
            })
            :
            null
        })
    });

    $('#formSubmit').click(function(){
        $('.invalid-feedback').hide();

        if($('#main_category_id').val() == '')
        {
            $('.main_category_id').html('Please select the main category..!').show();
        }
        else if($('#product_name').val() == '')
        {
            $('.product_name').html('Please enter the product name..!').show();
        }
        else if($('#product_info').val() == '')
        {
            $('.product_info').html('Please enter the product info..!').show();
        }
        else if($('#size').val() == '')
        {
            $('.size').html('Please enter the size..!').show();
        }
        else if($('#shape').val() == '')
        {
            $('.shape').html('Please enter the shape..!').show();
        }

        else if($('#product_image').val() == '' && mode == 'new')
        {
            $('.product_image').html('Please select the image..!').show();
        } 
        else
        {
            saveData();
        }
    });


    function saveData()
    {   
        $('.loading').show();
        var form = $('#formModal')[0];
        var data = new FormData(form);

        if(mode == 'new')
        {
            var url = base_URL + 'admin/Controlbase/insertProduct';
        }
        else if(mode == 'update')
        {
            var url = base_URL + 'admin/Controlbase/updateProduct';
            data.append("product_id",product_id);
        }
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var insertResult;
                insertResult = $.parseJSON(data);
                if(insertResult.status == "warning")
                {
                    $.confirm({
                        title: 'Encountered an error!',
                        content: insertResult.message,
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                }
                else if(insertResult.status == "success") 
                {
                    $.confirm({
                        title: 'Congratulations!',
                        content: insertResult.message,
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Thank you!',
                                btnClass: 'btn-green',
                                action: function(){
                                }
                            },
                            close: function () {
                            }
                        }
                    });
                    $('#myModal').modal('hide');
                    refreshDetails();
                }
                $('.loading').hide();
            },
            error: function () {
                console.log("Error");
                $('.loading').hide();
            }
        });


    }

    function refreshDetails()
    {
        $.when(getPageContent()).done(function(){
            var table = $('#datatable').DataTable();
            table.destroy(); 
            dispDetails(masterJSON);                  
        });    
    }


});