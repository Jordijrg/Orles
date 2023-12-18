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
    public function ajaxselfoto($request, $response, $container)
    {       
        $idimg = $request->getParam("id");
        $iduser = $request->getParam("iduser");
        $model = $container->get("Fotografies");
        $getgrup = $container["Fotografies"]->getgrup($iduser);
        $error = $model->confselfoto($getgrup["IdGrup"],$idimg);
        if($error){
            $response->set("respuesta",0);
        }else{
        $response->set("respuesta",1 ); }
        $response->setJson();  
    return $response;

    }
    public function ajax_orlas_visibility($request, $response, $container)
    {       
        $estado=$_POST["estado"];
        $id=$_POST["id"];
        $updat_main = $container["Orles"]->updateestado($estado,$id);
        
        $response->set("respuesta",$_POST); 
        $response->setJson();  
    return $response;
    }
    
   

}

