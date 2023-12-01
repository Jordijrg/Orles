import jQuery from 'jquery';
function upload_div (){
    jQuery("#btn_uploaddiv").click(()=>{
        jQuery("#upload_image_div").show();
    })
}

export {upload_div}