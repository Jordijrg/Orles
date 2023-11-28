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

}

