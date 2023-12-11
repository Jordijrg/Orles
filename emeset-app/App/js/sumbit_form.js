import jQuery from 'jquery';

function sumbit_form() {
    dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};
let valores_=[]
dropContainer.ondrop = function(evt) {
  fileInput.files = evt.dataTransfer.files;

  let i=0;
  let control_=false
  while(control!=true){
    console.log( )
    var reader = new FileReader();
    // reader.readAsText(evt.dataTransfer.files[i]);
    console.log(evt.dataTransfer.files[i])  
    

    // Listen for the change event so we can capture the file

        // Get a reference to the file
        let file = evt.dataTransfer.files[i];

        // Encode the file using the FileReader API
        reader.onloadend = () => {
            // Use a regex to remove data url part
            console.log(reader.result)
            const base64String = reader.result
                .replace('data:', '')
                .replace(/^.+,/, '');

            console.log();
            valores_.push( base64String); 

            // Logs wL2dvYWwgbW9yZ...
        };
        reader.readAsDataURL(file)
  }
  
 
  
 console.log(valores_)
  


  evt.preventDefault();
};
    jQuery("#btn_sumbit").click(()=>{
        console.log(valores_)
        console.log(jQuery("#fileInput").file+" aquii")
        let imagenes=[]
        let i=0;
        for(i=0;i<valores_.length;i++){
            imagenes.push(valores_[i])
        }

        $.ajax({
            type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
            url: "/imagensajax", //url guarda la ruta hacia donde se hace la peticion
            
            data: {
                imagenes:imagenes
            },
            async:false
            , // data recive un objeto con la informacion que se enviara al servidor
            success: function(datos) {
        
                //success es una funcion que se utiliza si el servidor retorna informacion
                return console.log(datos)
                
             
                
            },

            dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        });
    })
}

export {sumbit_form}