<?php

namespace App\Repositories;


class Posts extends GuzzleHttpRequest
{
  

    public function allTareas($param = [])
    {
        //$data = ["valor"=>"", "Movimiento"=>"", "Estado"=>"", "Auxiliar" => "", "FechaInicio" => "", "FechaFin" => "", "Top" => 0 , "Rep" => 0 ];
   
        return $this->post('Tareas/loadTareas',$param); 
    }

    public function allAgenda($param = [])
    {
     
       return $this->post('Agenda/loadAgenda',$param);  
    }
    
    public function allDiligencias($param = [])
    {
        return $this->post('Diligencias/loadDiligencias',$param);
    }
    
    public function allFacturas($param = [])
    {
        return $this->post('Factura/loadFactura',$param);
    }

    public function allcobranza($param = [])
    {
        return $this->post('Cobranza/loadCobranza',$param);
    }

    public function Buscarclientes($param = [])
    {
        return $this->post('Clientes/BuscarCliente',$param);
    }

    public function Getdiligencia($folio)
    {
        return $this->get('Diligencias/diligencia?id='.$folio);
    }

    public function postafectardiligencia($param = [])
    {
        return $this->post('Diligencias/grabarDiligencia',$param);
    }
    
    public function PostCargaInicialFiltro($param = [])
    {
        return $this->post('Sp_Cmb/CargaInicial',$param);
    }

    public function GetNewTarea($id)
    {
        return $this->get('Tareas/tarea?id='.$id);
    }
    public function GetUsuarioName($clave)
    {
        return $this->get('Usuario/usuario?clave='.$clave); 
    }

    public function PostGrabaTareas($param = [])
    {
        return $this->post('Tareas/grabarTareas',$param);
    }
}

