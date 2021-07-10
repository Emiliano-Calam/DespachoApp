<?php

namespace App\Http\Controllers;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class cobranzaController extends Controller
{
    protected $posts;
    public function __construct(Posts $posts)
    {
        $this->posts =$posts;
    }

    public  function index()
    {
        $param = ["valor"=>"", "Movimiento"=>"", "Estado"=>"", "Auxiliar" => "", "FechaInicio" => "", "FechaFin" => "", "Top" => 0 , "Rep" => 0 ];
        $postdata = $this->posts->allcobranza($param);   
        $modulo ='Cobranza'; 
        $btnNew ='/movimientos/tareas/nuevo';
       // dd($postdata->data); 
       $cargaInicial = [
        "Permiso" => "MASTER",
        "cmbMovimientos" => true,
        "Modulo" => "COB",
        "cmbAuxiliar" => true,
        "cmbEstatus" => true,
        "cmbTipo"  => false];
        $ResposeCarga =$this->posts->PostCargaInicialFiltro($cargaInicial);
        $rs = json_decode(json_encode($ResposeCarga),true);
        $r = $rs['data'];  

        return view('tareas', compact('modulo','btnNew','r'));    
        
    }

    public function buscarcobranza() //(Request $request)
    {   
     
           if($request->ajax())
            {
                $param = ["valor"=>"", "Movimiento"=>"", "Estado"=>"", "Auxiliar" => "", "FechaInicio" => "", "FechaFin" => "", "Top" => 0 , "Rep" => 0 ];
                // dd($request);
                if(!empty($request->buscar))
                {
    
                }
                if(!empty($request->movimiento))
                {
                    $param['Movimiento'] =$request->movimiento;
                }
                if(!empty($request->Estado))
                {
                    $param['Estado'] =$request->Estado;
                }
                if(!empty($request->Auxiliar))
                {
                    $param['Auxiliar'] =$request->Auxiliar;
                }
                if(!empty($request->FechaInicio))
                {
                    $param['FechaInicio'] =$request->FechaInicio;
                }
                if(!empty($request->FechaFin))
                {
                    $param['FechaFin'] =$request->FechaFin;
                }
               
            }
    
            $postdata = $this->posts->allDiligencias($param);
    
        
             
            
            
            
            //$postdata = $this->posts->allTareas();
            $param=$postdata->data;
            return Datatables::of($param)
            ->addColumn('actions','actionstareas')
            ->rawColumns(['actions'])
            ->toJson();
        
    }
}
