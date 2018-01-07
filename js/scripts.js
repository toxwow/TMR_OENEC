
$(document).ready(function() { 
	
	
   $('#przycisk_js1').click(function() { 
    	if(document.forms['form_js'].id_product.value !== ""){
        $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 

        } }); 
 		 
        setTimeout($.unblockUI, 120000); 
	}else{
    	
    	}
    }); 
});    

$(document).ready(function() { 
  $('#przycisk_js').click(function() { 
        if(document.forms['form_js'].id_product.value !== ""){
        $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 

        } }); 
         
        setTimeout($.unblockUI, 120000); 
    }else{
        
        }
    }); 


}); 


    
    


        