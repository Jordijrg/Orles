import jQuery from 'jquery';


function form_img() {
    jQuery("#upload_image_div").hide()
    jQuery("#btn_uploaddiv").click(()=>{
         jQuery("#upload_image_div").show()
         jQuery("#btn_uploaddiv")
    })
}

export {form_img};