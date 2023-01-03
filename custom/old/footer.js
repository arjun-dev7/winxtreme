$(document).ready(function() {    
    var aboutJSON;
    $.when(getFooter()).done(function(){
        displayFooterDetails(aboutJSON);          
    });

    function getFooter()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getFooter',
            type:'POST',
            success:function(data) {
                aboutJSON = $.parseJSON(data);  
            },      
            error: function() {
                console.log("Error");  
            }
        });
    }

    function displayFooterDetails(aboutJSON)
    {
        if(aboutJSON.length > 0)
        {
            $('#content').val(aboutJSON[0].content);
        }
    }    
    
    $('#formSubmit').click(function(){
        $('.invalid-feedback').hide();   
        if($('#content').val()=="")
        {
            $('.content').html('Please fill declaration..!');
            $('.content').show();
        } 
        else
        {
            updateFooter();
        }       
    });
    
    function updateFooter()
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
            url: base_URL+'admin/Controlbase/updateFooter',
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
        $.when(getFooter()).done(function(){
            displayFooterDetails(aboutJSON);               
        });     
    }

});
