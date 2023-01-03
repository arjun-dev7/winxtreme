$(document).ready(function() {     
    $('.loading').show();
    var projectJSON,mode,project_id,data_list,categorylistJSON;
    $.when(getProjects()).done(function(){
            dispDetails(projectJSON);              
    });

    getsolutionslist();
    getbrandlist();

    $('#solution_title').on('change', function() {
        solution_id = this.value;
        getcategorylist(solution_id);
    });

    //solutions list
    function getsolutionslist(){
        $.ajax({
            url: base_URL+'admin/Controlbase/getsolutionslist',
            type:'POST',
            success:function(data){
                solutionlistJSON = $.parseJSON(data);
                displaysolutionlist(solutionlistJSON);                
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
    }

    // brand list 
    function getbrandlist(){//JW
        $.ajax({
            url: base_URL+'admin/Controlbase/getbrands',
            type:'POST',
            success:function(data){
                brandlistJSON = $.parseJSON(data);
                displaybrandlist(brandlistJSON);         
            },      
            error: function() {
                console.log("Error");  
            }
        });
    }
    function displaybrandlist(list){
        for(i=0;i<list.length;i++){
            $('#brand_name').append('<option id="'+i+'" value="'+list[i].brand_id+'">'+list[i].brand_name+'</option>');
        }
    }

    //category list
    function getcategorylist(data){
        $.ajax({
            url: base_URL+'admin/Controlbase/getcategorylist',
            type:'POST',
            data: {
                "solution_id": data
            },
            success:function(data){
                categorylistJSON = $.parseJSON(data);
                displaycategorylist(categorylistJSON);                
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
    }

    function displaysolutionlist(list){
        for(i=0;i<list.length;i++){
            $('#    ').append('<option id="'+i+'" value="'+list[i].solution_id+'">'+list[i].solution_title+'</option>');
        }
    }
    function displaycategorylist(list){
        $( "option" ).remove(".list_set");
        for(i=0;i<list.length;i++){
            $('#category_title').append('<option class="list_set" id="'+i+'" value="'+list[i].category_id+'">'+list[i].category_title+'</option>');
        }
    }


    function getProjects()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getProjects',
            type:'POST',
            success:function(data){
                projectJSON = $.parseJSON(data);                
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
                { "mDataProp": "solution_title" },
                { "mDataProp": "category_title" },
                { "mDataProp": "project_title" },
                { "mDataProp": "brand_name" },
                { "mDataProp": "project_description" },
                { 
                    "mDataProp": function ( data, type, full, meta) {
                        return '<a id="'+ meta.row +'" r_index="'+meta.row+'" class="btn btnView"><i class="mdi mdi-eye" aria-hidden="true"> view</i></a>';
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
        product_info.setData("");
        mode="new";
        $('#myModal').modal('show');
    });

    $("#myModal").on("hidden.bs.modal", function(){
        $(this).find('form').trigger('reset');
        $('#project_uploaded_image').html("");
        $('.invalid-feedback').hide();
	    $('iframe').contents().find('body').empty();
    }); 

    $(document).on('click','.btnEdit',function(){
        var index = $(this).attr('id');
        mode='update';
        //To show the solution list in edit modal
        $('#solution_title').val(projectJSON[index].solution_id);
        $('#solution_title').trigger('change');
        setTimeout(() => {
            $('#category_title').val(projectJSON[index].category_id);
        },100);      
        $('#brand_name').val(projectJSON[index].brand_id);
        project_id = projectJSON[index].project_id;
        $('#project_title').val(projectJSON[index].project_title);
        product_info.setData(projectJSON[index].project_description);

        // show modal 
        $('#myModal').modal('show');
        if (projectJSON[index].image_url == "") {
            $('#project_uploaded_image').append("No image Uploaded yet");
        } else {
            var images = projectJSON[index].image_url;
            var image_id = projectJSON[index].image_id;
            var imageName = images.split(",");
            var imageId = image_id.split(",");
            for (var i = 0; i < imageName.length && imageId.length; i++) {
                $('#project_uploaded_image').append('<div class="image-display" id="image-display'+imageId[i]+'"><div><img src="' + imageName[i] + '" class="user-update-image" alt="user profile" width="100px" style="padding-top: 15px;"></div><div class="image-delete-icon image-delete c-pointer" id="' + imageId[i] + '">Delete <i class="mdi mdi-delete-empty-outline" ></i></div></div>');
            }
        }
    });

    $(document).on('click','.btnView',function(){
        var index = $(this).attr('id');
        mode='view';
        $('#projectImgModal').modal('show');
        $('#projectImgView').html('');
        if (projectJSON[index].image_url == "") 
        {
            $('#projectImgView').append("No image Uploaded yet");
        } 
        else 
        {
            var images = projectJSON[index].image_url;
            var image_id = projectJSON[index].image_id;
            var imageName = images.split(",");
            var imageId = image_id.split(",");
            for (var i = 0; i < imageName.length && imageId.length; i++) {
                $('#projectImgView').append('<img src="' + imageName[i] + '" class="user-update-image" alt="user profile" width="25%" style="padding: 10px;"></div></div>');
            }
        }
    });

    /*====== Start Delete image ======*/
    $(document).on('click', '.image-delete', function () {
        var image_id = $(this).attr('id');
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
                url: base_URL + 'admin/Controlbase/DeleteProjectsImage',
                data: {
                    "image_id": image_id
                },
                success: function (data) {
                    var insertResult;
                    insertResult = $.parseJSON(data);
                    if(insertResult.status=="success")
                    {
                        $('#image-display'+image_id).remove();          
                    }   
                    $('.loading').hide();
                },
                error: function () {
                    $('.loading').hide();
                    console.log("Error");
                }
            })
            :
            null
        })
    });
    /*====== End Delete image ======*/


    $(document).on('click','.BtnDelete',function(){
        mode="delete";
        var r_index = $(this).attr('id');
        project_id = projectJSON[r_index].project_id;
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
                url: base_URL+'admin/Controlbase/DeleteProjects',
                data: {"project_id":project_id},      
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
        // console.log(mode);
        $('.invalid-feedback').hide();
        if($('#project_title').val() == '')
        {
            $('.project_title').html('Please fill product title');
            $('.project_title').show();
        }
        else if (product_info.getData() == '')
        {
            $('.project_description').html('Please fill project description');
            $('.project_description').show();
        }
        else if ($('#image_file').val() == '' && mode == 'new')
        {
            $('.userfile').html('Please choose project image');
            $('.userfile').show();
        }
        else if ($('#solution_list').val() == '')
        {
            $('.solution_list').html('Please choose solution title');
            $('.solution_list').show();
        }
        else if ($('#category_list').val() == '')
        {
            $('.category_list').html('Please choose category title');
            $('.category_list').show();
        }
        else if ($('#brand_name').val() == '')
        {
            $('.brand_name').html('Please choose Brand name');
            $('.brand_name').show();
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
        console.log(mode);
        data.append("project_description",product_info.getData()); 
        if(mode == 'new')
        {
            var url = base_URL + 'admin/Controlbase/InsertProjects';
        }
        else if(mode == 'update')
        {
            var url = base_URL + 'admin/Controlbase/UpdateProjects';
            data.append("project_id",project_id);
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
                    $('.userfile').html(insertResult.warning);
                    $('.userfile').show();
                }
                else if(insertResult.status == "success") 
                {
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
        $.when(getProjects()).done(function(){
            var table = $('#datatable').DataTable();
            table.destroy(); 
            dispDetails(projectJSON);                  
    	});    
    }


});