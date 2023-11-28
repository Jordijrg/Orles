import jQuery from 'jquery';
feather.replace()
console.log("funcionaaaaa")
jQuery("#menu_main").hide()
console.log(jQuery("#btnmenu"))

jQuery("#btnmenu").click((e)=>{
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