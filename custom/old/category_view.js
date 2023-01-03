$(document).ready(function() { 
	var ProductJSON;  // for master data
	var product_id;  // for data mudification. 
	// $('.showpopup').on('click',function(){
	$(document).on("click", '.showpopup', function(event) {

		$('#first-page').show();
		$('#second-page').hide();

		var id = $(this).attr('id'); 
		console.log(id);
		return $.ajax({
			url: base_URL+'LivinInteriors/getProduct',
			type:'POST',
			data: {id : id},
			success:function(data){ 
				ProductJSON = $.parseJSON(data); 
				var product = ProductJSON.product;
				var related = ProductJSON.related; 
                if(product.length > 0){
                    $('.single-product-title').text(product[0].product_name); 
                    $('.single-product-info').text(product[0].product_info);
                    $('.key_features').text(product[0].key_features);
                    $('.product-image').attr('src', base_URL+product[0].product_image);  
                 }

                 //related product
                 $('#append-related').html(''); 
                 let product_list = '';
                 if(related.length > 0){
                 	for(i=0; i < related.length; i++){
                 		product_list += '<div  class="col-md-4">'+
                                        '<a>  <img id="'+related[i].product_id+'" class="showpopup mb-2" src="'+base_URL+related[i].product_image+'"> </a>'+
                                    '</div>';
                 	}
                 	$('#append-related').append(product_list); 
                 }

                 //prev next product
                 $('.next_product').attr("id", ProductJSON.next_product);
                 $('.prev_product').attr("id", ProductJSON.prev_product);


			},		
			error: function() {
				console.log("Error");  
			}
		});
	});

	$('#gotopage2').click(function(){ 
		$('#second-page').show();
		$('#first-page').hide();
	});
	$('#gotopage1').click(function(){ 
		$('#first-page').show();
		$('#second-page').hide();
	});

	$(document).on("change", '#SortBy', function(event) {
		var classname = $(this).val();
		$('.all').hide();
		$('.'+classname).show();
	});
	
	$('#submit_btn').click(function(){
		$('.error').hide();  
		if($('#phone').val()=="")
		{
			$('.phone').html("* Please Fill Phone");
			$('.phone').show();
		}
		else  if($('#email').val()=="")
		{
			$('.email').html("* Please Fill Email");
			$('.email').show(); 
		}
		else if($('#address').val()=="")
		{
			$('.address').html("* Please Fill Address");
			$('.address').show();
		} 
		else if($('#footer_content').val()=="")
		{
			$('.footer_content').html("* Please Fill Footer Content");
			$('.footer_content').show();
		}  
		else
		{ 
			saveData(); 			
		}		
	}); 
	
	function saveData()
	{
		var form = $('#form_data')[0];
		var data = new FormData(form); 
		request = $.ajax({
				type: "POST",
				enctype: 'multipart/form-data',
				url: base_URL+'Addis/updateContact',
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				timeout: 600000,
		});	
		request.done(function (response){
			var js = $.parseJSON(response);			
			var status = js.result;
			if (status == "success") {
				$.confirm({
                    icon: 'icon-close',
                    title: 'Info',
                    content: 'Updated Sucessfully',
                    type: 'green',
                        buttons: {
                            Ok: function() {
                                getBannerDetails();
                            },
                        }
                }); 
			}
			else
			{
				$.confirm({
					icon: 'icon-close',
					title: 'Info',
					content: 'Sorry Something went worng',
					type: 'red',
						buttons: {
							Ok: function() {},
						}
				});
			} 		
		});			
	}

    $(document)
    .ajaxStart(function () {
        $(".loading").show();
    })
    .ajaxStop(function () {
        $(".loading").hide();
    });

});
