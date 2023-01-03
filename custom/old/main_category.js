$(document).ready(function() {     
    $('.loading').show();
    var masterJSON,mode,category_id;

    $.when(getPageContent()).done(function(){
            dispDetails(masterJSON);              
    });

    function getPageContent()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getMainCategory',
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
                { "mDataProp": "category_name" },
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
        category_id = masterJSON[index]['category_id'];
        $('#category_name').val(masterJSON[index]['category_name']);
        $('#myModal').modal('show');
    });


    $(document).on('click','.BtnDelete',function(){
        mode="delete";
        var r_index = $(this).attr('id');
        category_id = masterJSON[r_index].category_id;
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
                data: {"category_id":category_id},      
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
            var url = base_URL + 'admin/Controlbase/insertMainCategory';
        }
        else if(mode == 'update')
        {
            var url = base_URL + 'admin/Controlbase/updateMainCategory';
            data.append("category_id",category_id);
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