$(document).ready(function() {   
    // alert("Gopal");   
    var rock = 0;
    var paper = 0;
    var scissor = 0;
    var total = 0;
    var active = 'rock';

    $('.game-side').click(function(){
        active = $(this).data('active');
    });

    $('.coin').click(function(){ 
        let value =  $(this).data('value');
        total += value;
        if(active == 'rock'){
            rock += value; 
            $('.rock').html(rock);
        }
        else if(active == 'paper'){
            paper += value; 
            $('.paper').html(paper);
        }
        else{
            scissor += value; 
            $('.scissor').html(scissor);
        } 
        $('.game_amount').html(total);
    });

    
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
