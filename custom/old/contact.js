$(document).ready(function() {      
    var contactJSON;
    $.when(getContact()).done(function(){
        displayContactDetails(contactJSON);          
    });

    function getContact()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getContact',
            type:'POST',
            success:function(data) {
                contactJSON = $.parseJSON(data);  
                contactJSON = contactJSON.details;
            },      
            error: function() {
                console.log("Error");  
            }
        });
    }

    function displayContactDetails(contactJSON)
    {
        // console.log(contactJSON);
        if(contactJSON.length > 0)
        {
            $('#address1').val(contactJSON[0].address1);
            $('#address2').val(contactJSON[0].address2);
            $('#phonenumber').val(contactJSON[0].phonenumber);
            $('#telephone').val(contactJSON[0].telephone);
            $('#email').val(contactJSON[0].email);
            $('#map1').val(contactJSON[0].map1);
            $('#map2').val(contactJSON[0].map2);
        }
    }    
    
    $('#formSubmit').click(function(){
        $('.invalid-feedback').hide();   
        if($('#address1').val()=="")
        {
            $('.address1').html('Please fill address 1');
            $('.address1').show();
        } 
        else if($('#address2').val()=="")
        {
            $('.address2').html('Please fill address 2');
            $('.address2').show();
        }
        else if($('#phonenumber').val()=="")
        {
            $('.phonenumber').html('Please fill phone number');
            $('.phonenumber').show();
        }
        else if($('#telephone').val()=="")
        {
            $('.telephone').html('Please fill telephone number');
            $('.telephone').show();
        }
        else if($('#email').val()=="")
        {
            $('.email').html('Please fill email');
            $('.email').show();
        }
        else if($('#map1').val()=="" && $('#map2').val()=="")
        {
            $('.map').html('Please add atleast one map');
            $('.map').show();
        }
        else
        {
            // console.log(contactJSON[0].contact_id);
            updateContact();
        }       
    });
    
    function updateContact()
    {       

        var form = $('#formModal')[0];
        var data = new FormData(form);
        if(contactJSON.length == 0)
        {
            data.append('contact_id', '');
            data.append('mode', 'new');
        }
        else
        {
            data.append('contact_id', contactJSON[0].contact_id);
            data.append('mode', 'update');
        }
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL+'admin/Controlbase/updateContact',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
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
        $.when(getContact()).done(function(){
            displayContactDetails(contactJSON);               
        });     
    }

});
