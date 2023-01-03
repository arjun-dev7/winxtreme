$(document).ready(function() {

    var settingJson;
    var imageStatus = false;
    var settings_dashboard = 0;
    var settings_about = 0;
    var settings_contact = 0;
    // product 
    var settings_project = 0;
    var settings_solution = 0;
    var settings_category = 0;
    var settings_brands = 0;

    var settings_services = 0;
    var settings_product = 0;
    var settings_gallery = 0;
    var settings_subGallery = 0;
    var settings_banner = 0;
    var settings_client = 0;
    var settings_testimonial = 0;

    // *** initially set all side navigation bar hide ***
    $('#menu_dashboard').hide();
    $('#menu_about').hide();
    $('#menu_contact').hide();
    $('#menu_services').hide();
    //product
    $('#menu_project').hide();
    $('#menu_solution').hide();
    $('#menu_category').hide();
    $('#menu_brands').hide();

    $('#menu_gallery').hide();
    $('#menu_subGallery').hide();
    $('#menu_banner').hide();
    $('#menu_client').hide();
    $('#menu_testimonial').hide();

    // *** call initial function ****
    initiateConstructor();

    // ******* done function after result  ********
    function initiateConstructor() {
        $.when(getSettings()).done(function() {
            // ******* after getting result check empty and append details ********
            if(settingJson.details.length !== 0) {
                let values = settingJson.details;
                // *** customize side navigation bar rendering ****
                customizeSideNavbar(values);
                // *** append details in settings screen ****
                $('#projectName').val(values[0].projectName);
                $('#colorCode').val(values[0].colorCode);
                $('#user_uploaded_image').attr('src', values[0].projectLogo);
                $('#user_uploaded_image').css("display", "block");
                if(values[0].dashboard == 1) { $('#settings_dashboard').prop('checked', true); settings_dashboard = 1; }
                if(values[0].about == 1) { $('#settings_about').prop('checked', true); settings_about = 1; }
                if(values[0].contact == 1) { $('#settings_contact').prop('checked', true); settings_contact = 1; }
                //products
                if(values[0].project == 1) { $('#settings_project').prop('checked', true); settings_project = 1; }
                if(values[0].solution == 1) { $('#settings_solution').prop('checked', true); settings_solution = 1; }
                if(values[0].category == 1) { $('#settings_category').prop('checked', true); settings_category = 1; }
                if(values[0].brands == 1) { $('#settings_brands').prop('checked', true); settings_brands = 1; }

                if(values[0].services == 1) { $('#settings_services').prop('checked', true); settings_services = 1; }
                if(values[0].product == 1) { $('#settings_product').prop('checked', true); settings_product = 1; }
                if(values[0].gallery == 1) { $('#settings_gallery').prop('checked', true); settings_gallery = 1; }
                if(values[0].subGallery == 1) { $('#settings_subGallery').prop('checked', true); settings_subGallery = 1; }
                if(values[0].banner == 1) { $('#settings_banner').prop('checked', true); settings_banner = 1; }
                if(values[0].client == 1) { $('#settings_client').prop('checked', true); settings_client = 1; }
                if(values[0].testimonial == 1) { $('#settings_testimonial').prop('checked', true); settings_testimonial = 1; }
                imageStatus = true;
            }  
        });
    }

    function customizeSideNavbar(values) {
        if(values[0].dashboard == 1) { $('#menu_dashboard').show(); }
        if(values[0].about == 1) { $('#menu_about').show(); }
        if(values[0].contact == 1) { $('#menu_contact').show(); }
        //product
        if(values[0].project == 1) { $('#menu_project').show(); }
        if(values[0].solution == 1) { $('#menu_solution').show(); }
        if(values[0].category == 1) { $('#menu_category').show(); }
        if(values[0].brands == 1) { $('#menu_brands').show(); }

        if(values[0].services == 1) { $('#menu_services').show(); }
        if(values[0].product == 1) { $('#menu_product').show(); }
        if(values[0].gallery == 1) { $('#menu_gallery').show(); }
        if(values[0].subGallery == 1) { $('#menu_subGallery').show(); }
        if(values[0].banner == 1) { $('#menu_banner').show(); }
        if(values[0].client == 1) { $('#menu_client').show(); }
        if(values[0].testimonial == 1) { $('#menu_testimonial').show(); }

        if(values[0].projectLogo == '')
        {
            $('.mainProjectName').html(values[0].projectName);
        }
        else
        {
            $('.mainLogoLarge').attr('src', values[0].projectLogo);
            // $('.mainLogoSmall').attr('src', values[0].projectLogo);
        }
        
        $("body").get(0).style.setProperty("--primary-theme-color", values[0].colorCode);
    }

    function getSettings()
    {
        return $.ajax({
            url: base_URL+'admin/Controlbase/getSettings',
            type:'POST',
            success:function(data){
                settingJson = $.parseJSON(data);                
            },      
            error: function() {
                console.log("Error");  
            }
        });
    }

    // ******** submit settings details *************
    $('#submitSettingsForm').click(function() {
        $('.invalid-feedback').hide();

        if($("#settings_dashboard").is(':checked')) { settings_dashboard = 1; } else { settings_dashboard = 0; }
        if($("#settings_about").is(':checked')) { settings_about = 1; } else { settings_about = 0; }
        if($("#settings_contact").is(':checked')) { settings_contact = 1; } else { settings_contact = 0; }
        //product
        if($("#settings_project").is(':checked')) { settings_project = 1; } else { settings_project = 0; }
        if($("#settings_solution").is(':checked')) { settings_solution = 1; } else { settings_solution = 0; }
        if($("#settings_category").is(':checked')) { settings_category = 1;} else { settings_category = 0; }
        if($("#settings_brands").is(':checked')) { settings_brands = 1; } else { settings_brands = 0; }

        if($("#settings_services").is(':checked')) { settings_services = 1; } else { settings_services = 0; }
        if($("#settings_product").is(':checked')) { settings_product = 1; } else { settings_product = 0; }
        if($("#settings_gallery").is(':checked')) { settings_gallery = 1; } else { settings_gallery = 0; }
        if($("#settings_subGallery").is(':checked')) { settings_subGallery = 1; } else { settings_subGallery = 0; }
        if($("#settings_banner").is(':checked')) { settings_banner = 1; } else { settings_banner = 0; }
        if($("#settings_client").is(':checked')) { settings_client = 1; } else { settings_client = 0; }
        if($("#settings_testimonial").is(':checked')) { settings_testimonial = 1; } else { settings_testimonial = 0; }

        if($('#projectName').val() == "") {
            $('.projectName').html('Please fill project name');
            $('.projectName').show();
        } 
        else if(imageStatus == false) {
            if($('#projectLogo').val() == "") {
                $('.projectLogo').html('Please choose Logo');
                $('.projectLogo').show();
            } 
        }
        else if($('#colorCode').val() == "") {
            $('.colorCode').html('Please fill color code');
            $('.colorCode').show();
        } 
        else {
            saveSettings();
        }
        
    });

    // ******** on change image handling *************
    $(document).on('change', '#projectLogo', function() {
        readURL(this);
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_uploaded_image').attr('src', e.target.result);
                $('#user_uploaded_image').css("display", "block");
                var tmppath = URL.createObjectURL(input.files[0]);           
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // ********** save settings form **************
    function saveSettings() {
        var form = $('#settingsForm')[0];
        var data = new FormData(form);
        data.append("dashboard", settings_dashboard);
        data.append("about", settings_about);
        data.append("contact", settings_contact);
        // product 
        data.append("project", settings_project);
        data.append("solution", settings_solution);
        data.append("category", settings_category);
        data.append("brands", settings_brands);
        

        data.append("services", settings_services);
        data.append("product", settings_product);
        data.append("gallery", settings_gallery);
        data.append("subGallery", settings_subGallery);
        data.append("banner", settings_banner);
        data.append("client", settings_client);
        data.append("testimonial", settings_testimonial);

        request = $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_URL+'admin/Controlbase/saveSettings',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
        }); 
        request.done(function (response) { 
            $.alert({
                title: 'Alert!',
                content: 'Updation Successfull..!',
            });     
            initiateConstructor();       
        });  
    }
 

});