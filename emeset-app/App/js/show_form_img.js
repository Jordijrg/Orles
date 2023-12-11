import jQuery from 'jquery';

function form_img() {
    jQuery("#btn_uploaddiv").click(()=>{
         jQuery("#upload_image_div").show()
         
         jQuery("#btn_uploaddiv").hide()
         jQuery("#cerrar").show()
        
    })
    jQuery("#cerrar").click(()=>{
        jQuery("#upload_image_div").hide()
        jQuery("#cerrar").hide()
        jQuery("#btn_uploaddiv").show()

    })

    
    
}

export {form_img};