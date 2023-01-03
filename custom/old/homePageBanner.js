$(document).ready(function() {     
    $('.loading').show();

    var masterJSON;
    $.when(getPageContent()).done(function(){
            dispDetails(masterJSON);              
    });

    function dispDetails(JSON){
        $('#content_id').val(JSON[0]['content_id']);
        $('#title').val(JSON[0]['title']);
        $('#content').val(JSON[0]['content']);
        $('#uploaded_image').append("<img src='" + JSON[0]['image'] + "' alt='image' width='200px' >");
    }

    function getPageContent()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getHomePageBanner',
            type:'POST',
            success:function(data){
                masterJSON = $.parseJSON(data);                
            },      
            error: function() {
                console.log("Error");  
            }
        }) ;
    }

    $('#formSubmit').click(function(){
        $('.invalid-feedback').hide();

        if($('#title').val() == '')
        {
            $('.title').html('Please enter the title..!').show();
        }
        else if($('#content').val() == '')
        {
            $('.content').html('Please enter the content..!').show();
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

        $.ajax({
            url: base_URL + 'admin/Controlbase/updateHomePageBanner',
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
                }
                $('.loading').hide();
            },
            error: function () {
                console.log("Error");
                $('.loading').hide();
            }
        });

    }

});