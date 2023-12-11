<?php

namespace App\Controllers;

class ajaxcontroller 
{
    public function grupoajax($request, $response, $container)
    {
        
        // $response->set("result", ); 

        $id_user=$request->get("SESSION", "user")["IdUsuari"]; 
        $modelgrupo_usuarios=$container["grupo_usarios"]->getprofegrupo($id_user,$request->get(INPUT_POST, "texto"));
        $response->set("result",$modelgrupo_usuarios); 
        $response->setJson();  
        return $response;
    }
    public function getgrupoallprofe($request, $response, $container)
    {
        
        // $response->set("result", ); 

        $id_user=$request->get("SESSION", "user")["IdUsuari"]; 
        $modelgrupo_usuarios=$container["grupo_usarios"]->getgrupoallprofe($id_user);
        $response->set("result",$modelgrupo_usuarios); 
        $response->setJson();  
        return $response;
    }

    public function alumngrupajax($request, $response, $container)
    {
        
        // $response->set("result", ); 

        $id_user=$request->get("SESSION", "user")["IdUsuari"]; 
        $modelgrupo_usuarios=$container["grupo_usarios"]->getalumnosgrupoprofe($request->get(INPUT_POST, "idgrupo"));
        $response->set("result",$modelgrupo_usuarios); 
        $response->setJson();  
        return $response;
    }
    public function imagensajax($request, $response, $container){
        
        // for($i=0;$i<count($_POST["imagenes"]);$i++){
        //     $myfile = fopen("imagen222.png.png", "w") or die("Unable to open file!");
        //     $txt = base64_decode($_POST["imagenes"][$i]);
        //     file_put_contents(time().".png",$txt);
        //     fwrite($myfile, $txt);
        //     fclose($myfile);
        // }
       

        $response->set("result",$_POST); 
        $response->setJson();  

        return $response;

    }

}

