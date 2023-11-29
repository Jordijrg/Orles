import jQuery from 'jquery';
import {toggleUsuaris,toggleOrlas,toggleEditUsuaris} from './menupanel.js'
import {ajax} from './adminpanel.js'
import {grupoajax} from './ajax_grupos.js';
import {toggleDarkMode} from './darkmode.js';
import {scrollToTop,scrollFunction} from './onscroll.js';
import {addfotoorla} from './addfotoorla.js';
<<<<<<< HEAD
import {editar} from './profile.js';

=======
import {upload_div} from './upload_div.js';
>>>>>>> 236f0a0a76ac214a98baa837a005c7febbe3369d
console.log("funcionaaaaa")
toggleDarkMode();
scrollFunction();
scrollToTop();
addfotoorla();
jQuery("#menu_main").hide()
console.log(jQuery("#btnmenu"))

editar();


grupoajax()
ajax();
<<<<<<< HEAD
toggleEditUsuaris();
=======
upload_div();
>>>>>>> 236f0a0a76ac214a98baa837a005c7febbe3369d
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

    jQuery('#editbtn').click(()=>{
        console.log("entra");
    })


feather.replace()
