<?php

namespace App\Http\Controllers;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class diligenciasController extends Controller
{
    protected $posts;
    public function __construct(Posts $posts)
    {
        $this->posts =$posts;
    }

    public  function index()
    {
        $param = ["valor"=>"", "Movimiento"=>"", "Estado"=>"", "Auxiliar" => "", "FechaInicio" => "", "FechaFin" => "", "Top" => 0 , "Rep" => 0 ];
        $postdata = $this->posts->allDiligencias($param);  
       // dd($postdata); 
        $modulo ='Diligencias'; 
        $btnNew='/movimientos/diligencia/nuevo';
        $cargaInicial = [
            "Permiso" => "MASTER",
            "cmbMovimientos" => true,
            "Modulo" => "DIL",
            "cmbAuxiliar" => true,
            "cmbEstatus" => true,
            "cmbTipo"  => false];
            $ResposeCarga =$this->posts->PostCargaInicialFiltro($cargaInicial);
            $rs = json_decode(json_encode($ResposeCarga),true);
            $r = $rs['data'];  

        return view('tareas', compact('modulo','btnNew', 'r'));    
        
    }

    public function buscardiligencia(Request $request) //(Request $request)
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
                ->addColumn('actions', function ($page)
                {
                    return view('actionstareas', ['folio' =>$page->id, 'ulr'=>'/movimientos/diligencia/edit/']);
                })
                ->rawColumns(['actions'])
                ->toJson();
    }
    public  function nuevo()
    {
        $modulo ='Crear nueva diligencia'; 
        $getDiligencia = $this->posts->Getdiligencia('0');
        $result =  json_decode( json_encode($getDiligencia->data[0]),true);

        return view('diligencia_new', compact('modulo','result'));  
    }

    public  function modificar($folio)
    {
        $result=[];
        if(isset($folio) && $folio !="") 
        {
            
            $getDiligencia = $this->posts->Getdiligencia($folio);
            $result =  json_decode( json_encode($getDiligencia->data[0]),true);
           // dd($result);
        }
        $modulo ='Actualizar Diligencia'; 
       
        return view('diligencia_new', compact('modulo','result'));  
    }
    public function buscaCliente(Request $request)
    {
        $param = ["Cliente"=>"", "Tipo"=>"C", "Usuario"=>"MASTER"];
        if($request->ajax())
        {
           
            if(!empty($request->Tipo))
            {
                $param['Tipo']=$request->Tipo;
            }
        }
        $postdata = $this->posts->Buscarclientes($param);
        
        $param=$postdata->data;
        
        return Datatables::of($param)->toJson();
    }

    public function UpdateandInsert(Request $request)
    {
        $param = ["Id"=>0, "Mov"=>"Diligencia", "Usuario"=>"MASTER", "Maquina"=>"WEB", "Tipo"=>"", "FechaSolicitud"=>"", "Estatus"=>"PENDIENTE", "Cliente"=>"", "Nombre"=>"", "Direccion"=> "", "Concepto"=>"", "Referencia"=>"", "Observacion"=>"", "FechaAtencion"=>"", "Entrega"=>"", "Recibe"=>"", "Atencion"=>0, "Recepcion"=>0, "Contabilidad"=>"0"];
        if(request()->ajax())
     {
         $datadiligencia = $request->get('diligenciadata');
         $dd=json_decode($datadiligencia,true);
         $date = $request->fecha;
         $arrayfecha = explode("/", $date);
         $fecha ="";
        
          if(count($arrayfecha) > 1)
          {
            $fecha=$arrayfecha[2].$arrayfecha[1].$arrayfecha[0];
           
          } 
          $param['FechaSolicitud']=$fecha;
          $param['Tipo']=$request->get('number');
         
          $param['Cliente']=$request->get('Clave_cliente');
          $param['Nombre']=$request->get('confirm_cliente');
          $param['Direccion']=$request->get('direccion');
          $param['Concepto']=$request->get('concepto');
          $param['Observacion']=$request->get('nota');
          
        if(isset($dd['id']) && $dd['id'] > 0) 
        {
        
            $dateAtencion = $request->get('fatencion');
            $arrayAtencion = explode("/", $dateAtencion);
            $fechaAtencion="";
            if(count($arrayAtencion) > 1)
            {
              $fechaAtencion=$arrayAtencion[2].$arrayAtencion[1].$arrayAtencion[0];
             
            } 
            $param['Id']=$dd['id'];
            $param['FechaSolicitud']=$dd['fecha'];
            $param['Tipo']=$dd['tipo'];
            $param['Cliente']=$dd['cliente'];
            $param['Nombre']=$dd['nombre'];
            $param['FechaAtencion']=$fechaAtencion;
            $param['Entrega']=  $request->get('entrega');
            $param['Recibe']=  $request->get('Recibio');
            
            if($request->get('exampleCheck1') == 'on')
            {
                $param['Atencion']=1;
                $param['Estatus']=  'CONCLUIDO';   
            }
        }else
        {
            $param['Estatus']='PENDIENTE';
        }

        $postdata = $this->posts->postafectardiligencia($param);
        //;
        $param=json_decode(json_encode($postdata->data[0]),true);
        //dd();
      //  return $postdata;//->json($param);
      return response()->json(['exito' => 1, 'id'=>$param]);
     }

    }
    public function printpdf()
     {
        $modulo ='Diligencias'; 
       
        return view('formatos/formatdiligencias', compact('modulo'));    
     }

}