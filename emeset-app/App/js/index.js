<<<<<<< HEAD
=======
import jQuery from 'jquery';
import {toggleUsuaris,toggleOrlas, toggleGrups, toggleUsuariGrups} from './menupanel.js'
import {ajax} from './adminpanel.js'
import {random} from './random.js'
import {randomuser} from './randomuser.js'
import {grupoajax} from './ajax_grupos.js';
import {darkmode} from './darkmode.js';
import {scrollToTop,scrollFunction} from './onscroll.js';
import {addfotoorla} from './addfotoorla.js';
import {editar} from './profile.js';

import {upload_div} from './upload_div.js';
import {form_img} from './show_form_img.js'
import {delmissatge} from './delmissatge.js';

console.log("funcionaaaaa")
darkmode();
scrollFunction();
scrollToTop();
addfotoorla();
randomuser();
delmissatge();
jQuery("#menu_main").hide()
console.log(jQuery("#btnmenu"))


editar();


form_img();
grupoajax()
ajax();
random();
upload_div();
$("#menu_main").hide()
console.log($("#btnmenu"))

$("#btnmenu").click((e)=>{
    console.log("entra")
    let value_data=$("#btnmenu").data("status")
    if(value_data=="closed"){
        $("#btnmenu").data("status","open")
        $("#menu_main").show()
        console.log("entra1")

        
    }
    
    $("#btn_close").click(()=>{
        
            $("#btnmenu").data("status","closed")
            $("#menu_main").hide()
        
    })
})

  jQuery('#usuarisbtn').click(()=>{
    toggleUsuaris()
   })

    jQuery('#orlasbtn').click(()=>{
        toggleOrlas()
    })
    jQuery('#grupsbtn').click(()=>{
        toggleGrups()
    })
    jQuery('#usuarigrupsbtn').click(()=>{
        toggleUsuariGrups()
    })

feather.replace()  



>>>>>>> 145ead396362901d796730fa79fc7b1621ced93b
