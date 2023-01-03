$(document).ready(function() {     
    $('.loading').show();
    var masterJSON,mode,main_category_id;

    $.when(getPageContent()).done(function(){
            dispDetails(masterJSON);              
    });
    getMainCategory();

    function getMainCategory()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getMainCategory',
            type:'POST',
            success:function(data){
                var mainCategory = $.parseJSON(data);   
                for(j=0;j<mainCategory.length;j++){
                    $('#category_id').append('<option value="' + mainCategory[j]['category_id'] + '">' + mainCategory[j]["category_name"] + '</option>');
                }             
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
    }

    function getPageContent()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getCategory',
            type:'POST',
            success:function(data){
                masterJSON = $.parseJSON(data);               
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
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
                { "mDataProp": "name" },
                { "mDataProp": "category_name" },
                { 
                    "mDataProp": function ( data, type, full, meta) {
                        return '<img src="' + data['image'] + '" class="user-update-image" alt="user profile" width="25%" style="padding: 10px;">';
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
        $('#uploaded_image').html("");
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

        main_category_id = masterJSON[index]['main_category_id'];
        $('#name').val(masterJSON[index]['name']);
        $('#category_id').val(masterJSON[index]['category_id']);
        $('#uploaded_image').append("<img src='" + masterJSON[index]['image'] + "' alt='image' width='150px' >");
        if(masterJSON[index]['homeflag'] == 1)
        {
            $('#homeflag').attr('checked', true);
        }
        else{
            $('#homeflag').attr('checked', false);
        }

        $('#myModal').modal('show');
    });


    $(document).on('click','.BtnDelete',function(){
        mode="delete";
        var r_index = $(this).attr('id');
        main_category_id = masterJSON[r_index].main_category_id;
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
                url: base_URL+'admin/Controlbase/deleteCategory',
                data: {"main_category_id":main_category_id},      
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

        if($('#name').val() == '')
        {
            $('.name').html('Please enter the name..!').show();
        }
        else if($('#image').val() == '' && mode == 'new')
        {
            $('.image').html('Please select the image..!').show();
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
            var url = base_URL + 'admin/Controlbase/insertCategory';
        }
        else if(mode == 'update')
        {
            var url = base_URL + 'admin/Controlbase/updateCategory';
            data.append("main_category_id",main_category_id);
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