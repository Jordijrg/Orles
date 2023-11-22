import jQuery from 'jquery';
feather.replace()
console.log("funcionaaaaa")
jQuery("#menu_main").hide()
console.log(jQuery("#btnmenu"))

jQuery("#btnmenu").click((e)=>{
    console.log("entra")
    let value_data=jQuery("#btnmenu").data("status")
    if(value_data=="closed"){
        jQuery("#btnmenu").data("status","open")
        jQuery("#menu_main").show()
        console.log("entra1")

        
    }
    
    jQuery("#btn_close").click(()=>{
        
            jQuery("#btnmenu").data("status","closed")
            jQuery("#menu_main").hide()
        
    })
})