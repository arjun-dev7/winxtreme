$(document).ready(function() {   
    // alert("Gopal");   
    var aboutJSON;
    $.when(getAbout()).done(function(){
        displayAboutDetails(aboutJSON);          
    });

    function getAbout()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getAbout',
            type:'POST',
            success:function(data) {
                aboutJSON = $.parseJSON(data);  
                aboutJSON = aboutJSON.details;
            },      
            error: function() {
                console.log("Error");  
            }
        });
    }

    function displayAboutDetails(aboutJSON)
    {
        if(aboutJSON.length > 0)
        {
            $('#mission').val(aboutJSON[0].mission);
            $('#vision').val(aboutJSON[0].vision);
            $('#value').val(aboutJSON[0].value);
        }
    }    
    
    $('#formSubmit').click(function(){
        $('.invalid-feedback').hide();   
        if($('#mission').val()=="")
        {
            $('.mission').html('Please fill mission');
            $('.mission').show();
        } 
        else if($('#vision').val()=="")
        {
            $('.vision').html('Please fill vision');
            $('.vision').show();
        }
        else if($('#value').val()=="")
        {
            $('.value').html('Please fill value');
            $('.value').show();
        }
        else
        {
            updateAbout();
        }       
    });
    
    function updateAbout()
    {       
        var form = $('#formModal')[0];
        var data = new FormData(form);
        if(aboutJSON.length == 0)
        {
            data.append('about_id', '');
            data.append('mode', 'new');
        }
        else
        {
            data.append('about_id', aboutJSON[0].about_id);
            data.append('mode', 'update');
        }
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL+'admin/Controlbase/updateAbout',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                var Result;
                Result = $.parseJSON(data);
                console.log(Result.statusCode);
                $.alert({
                    title: Result.status+'!',
                    content: Result.message,
                });
                request.done(function (){    
                    refreshDetails();       
                }); 
            },
            error: function () {
            }
        }); 
    }
    
    function refreshDetails()
    {
        $.when(getAbout()).done(function(){
            displayAboutDetails(aboutJSON);               
        });     
    }

});
