import $ from 'jquery';

function grupoajax(){
   
    let control_witedmax=false
    $("#grupo_search").on("keydown",(evt)=>{
        let value_input=$("#grupo_search").val()

        
       
        if(value_input.length>=2){
            control_witedmax=true
           

            $.ajax({
                type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url: "/grupoajax", //url guarda la ruta hacia donde se hace la peticion
                data: {
                    texto:value_input
                },
                async:false
                ,
                 // data recive un objeto con la informacion que se enviara al servidor
                success: function(datos) {
                    //success es una funcion que se utiliza si el servidor retorna informacion
                    $(".valores_grupos").html(``)
                 
                    let grupos=datos.result
                    grupos.forEach(element => {

                        $(".valores_grupos").append(`
                        <div class="border-b-2 border-b-indigo-400 mt-10 flex flex-row	justify-between	">
                        <p>${element.Nom}</p>
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 px-7 p-1">
                            Visualizar
                        </span>
                        </button>
                    </div>
                        
                        `)
                    });
                 
                },
    
                dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
            });
    
        }else{
            if(control_witedmax==true){
                control_witedmax=false
                    $.ajax({
                        type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                        url: "/allgrupoajaxprofe", //url guarda la ruta hacia donde se hace la peticion
                        data: {
                            texto:value_input
                        },
                        async:false
                        , // data recive un objeto con la informacion que se enviara al servidor
                        success: function(datos) {
                            //success es una funcion que se utiliza si el servidor retorna informacion
                            $(".valores_grupos").html(``)

                            let grupos=datos.result
                            $("#valores_grupos").append(`
                            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                            <link rel="stylesheet" href="/resources/demos/style.css">
                            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                            <script>
                            $( function() {
                              $( "#accordion" ).accordion({
                                collapsible: true
                              });
                            } );
                            </script>
                            `)
                          
                            grupos.forEach((element,i) => {
                   
                      
                                
                                    $(".valores_grupos").append(`

 
                                    <h3>${element.Nom}</h3>
                                                                  `)

                                            $.ajax({
                                            type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                                            url: "/alumngrupajax", //url guarda la ruta hacia donde se hace la peticion
                                            data: {
                                                idgrupo:element.IdGrup
                                            },
                                            async:false
                                            , // data recive un objeto con la informacion que se enviara al servidor
                                            success: function(datos) {
                                                //success es una funcion que se utiliza si el servidor retorna informacion
                                                let usuarios=datos.result
                                                console.log(datos)
                                                if(datos==null){
                                                 console.log()
                                                }   else{
                                                    usuarios.forEach(element=>{
                                                        $(".valores_grupos").append(`

                                                        <div>
                                                          <p>${element.Nom}</p>
                                                        </div></div>
        `)
                                                    })
                                                 
                                                   
                                                }
                                               
                                             
                                                
                                            },
                                
                                            dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
                                        });
                                
                                /*
                                 <div>
                                      <p id=>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
                                    </div>
                                */
                            });
                         
                        },
            
                        dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
                 });
                }
    
        }
    })
}
export {grupoajax}; 