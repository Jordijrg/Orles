import jQuery from 'jquery';
import {toggleUsuaris,toggleOrlas, toggleGrups, toggleUsuariGrups,toggleorlasgeneradas} from './menupanel.js'
import {ajax} from './adminpanel.js'
import {random} from './random.js'
import {randomuser} from './randomuser.js'
import {grupoajax} from './ajax_grupos.js';
import {darkmode} from './darkmode.js';
import {scrollToTop,scrollFunction} from './onscroll.js';
import {addfotoorla} from './addfotoorla.js';
import {editar} from './profile.js';
import {viwer} from './ajax_btn_viwer.js';

import {upload_div} from './upload_div.js';
import {form_img} from './show_form_img.js'
import {delmissatge} from './delmissatge.js';
import {camera_js} from './camera.js';

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


    jQuery('#orlas_generadasbtn').click(()=>{
        toggleorlasgeneradas()
    })
console.log("funcionaaaaa")
viwer()
darkmode();
scrollFunction();
scrollToTop();
addfotoorla();
randomuser();
delmissatge();
camera_js();

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

 
feather.replace()