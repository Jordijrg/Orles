import jQuery from 'jquery';
import {toggleUsuaris,toggleOrlas} from './menupanel.js'
import {ajax} from './adminpanel.js'
feather.replace()
console.log("dwad")
ajax();
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

   jQuery('#usuarisbtn').click(()=>{
    toggleUsuaris()
   })

    jQuery('#orlasbtn').click(()=>{
        toggleOrlas()
    })



  