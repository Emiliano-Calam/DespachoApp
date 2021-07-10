<?php

namespace App\Http\Controllers;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class tareasController extends Controller
{
    protected $posts;
    public function __construct(Posts $posts)
    {
        $this->posts =$posts;
    }

    public  function index()
    {
        $param = ["valor"=>"", "Movimiento"=>"Tarea", "Estado"=>"PENDIENTE", "Auxiliar" => "", "FechaInicio" => "", "FechaFin" => "", "Top" => 0 , "Rep" => 0 ];
        $postdata = $this->posts->allTareas($param);   
        $modulo ='Tarea'; 
        $btnNew ='/movimientos/tareas/nuevo';
       // dd($postdata->data); 
       $cargaInicial = [
        "Permiso" => "MASTER",
        "cmbMovimientos" => true,
        "Modulo" => "TAR",
        "cmbAuxiliar" => true,
        "cmbEstatus" => true,
        "cmbTipo"  => false];
        $ResposeCarga =$this->posts->PostCargaInicialFiltro($cargaInicial);
        $rs = json_decode(json_encode($ResposeCarga),true);
        $r = $rs['data'];  
        
        return view('tareas', compact('modulo','btnNew','r'));   
    }

    public function buscar(Request $request)
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

        if(!empty($request->modul))
        {
        switch($request->modul)
        {
            case 'agenda':
                $postdata = $this->posts->allAgenda($param);
                break;
            case 'tareas':
                $postdata = $this->posts->allTareas($param);
                break;
            case 'diligencieros':    
                $postdata = $this->posts->allDiligencias($param);
                break;      
            case 'facturas':
                $postdata = $this->posts->allFacturas($param);
                break;        
            case 'cobranza':
                $postdata = $this->posts->allcobranza($param);    
                break;        
        }
         
        }
        
        
        //$postdata = $this->posts->allTareas();
        $param=$postdata->data;
        return Datatables::of($param)
        ->addColumn('actions', function ($page)
        {
            return view('actionstareas', ['folio' =>$page->id, 'ulr'=>'/movimientos/tareas/edit/']);
        })
        ->rawColumns(['actions'])
        ->toJson();
    }

    public function modificartarea($folio)
    {
        $result=[];
        if(isset($folio) && $folio !="") 
        {
            
            $getDiligencia = $this->posts->GetNewTarea($folio);
            $result =  json_decode( json_encode($getDiligencia->data[0]),true);
        //    dd($result);
        }
        $modulo ='Actualizar Tarea'; 
        $cargaInicial = [
            "Permiso" => "MASTER",
            "cmbMovimientos" => true,
            "Modulo" => "TAR",
            "cmbAuxiliar" => true,
            "cmbEstatus" => false,
            "cmbTipo"  => false];
        
            $ResposeCarga =$this->posts->PostCargaInicialFiltro($cargaInicial);
            $rs = json_decode(json_encode($ResposeCarga),true);
            $r = $rs['data']; 
            //dd($result);
        return view('nueva_tarea', compact('modulo','result','r')); 
     

    }
    public function nuevatarea()
    {
        $modulo ='Crear nueva Tarea'; 
        $getDiligencia = $this->posts->GetNewTarea('0');
        $result =  json_decode( json_encode($getDiligencia->data[0]),true);

        $cargaInicial = [
            "Permiso" => "MASTER",
            "cmbMovimientos" => true,
            "Modulo" => "TAR",
            "cmbAuxiliar" => true,
            "cmbEstatus" => false,
            "cmbTipo"  => false];
            $ResposeCarga =$this->posts->PostCargaInicialFiltro($cargaInicial);
            $rs = json_decode(json_encode($ResposeCarga),true);
            $r = $rs['data']; 

        //dd($result);
        return view('nueva_tarea', compact('modulo','result','r'));  
    }
    public function Getuser($user)
    {
            if($user !="")
            {
                $ResposeUser =$this->posts->GetUsuarioName($user);
                $param=$ResposeUser->data;
                
                return json_encode($param);
            }
        
        
    }
    public function UpateInsert(Request $request)
    {
        $param= [ 
        "Id" => 0,"Mov" => "Tarea","Usuario" => "MASTER","Maquina" => 'DESKTOP-N4TLBDG',"Modulo" => 'TAR',"estatus" => "PENDIENTE","DTPFechaSolicitud" => "","TxtCveCliente" => "","Nombre" => "","TxtTarea" => "","CmbCveAuxiliar" => "","TxtObservacion" => "","DTPFechaAtencion" => "","Mes" => "","Anio" => "","Atencion" => 0,"Horas" => "00:00"];
            /*dd($param);
            die();*/
        if(request()->ajax())
        {
            $datadiligencia = $request->get('tareadata');
            $dd=json_decode($datadiligencia,true);
            $date = $request->fecha;
            $arrayfecha = explode("/", $date);
            $fecha ="";
           
             if(count($arrayfecha) > 1)
             {
               $fecha=$arrayfecha[2].$arrayfecha[1].$arrayfecha[0];
              
             }

             $param['Mov']=$request->get('cmbmovimiento'); 
             $param['DTPFechaSolicitud']=$fecha;
             $param['TxtCveCliente'] = $request->get('Clave_cliente');
             $param['Nombre']=$request->get('confirm_cliente');
             $param['TxtTarea']=$request->get('tarea');
             $param['CmbCveAuxiliar']=$request->get('cmbauxiliar');
           
             if($request->get('cmbmovimiento') === 'Tarea Contable')
           {
            if(!empty($request->get('cmbmes')))
            {
                $param['Mes'] =$request->get('cmbmes');
            }
            if(!empty($request->get('cmbanio')))
            {
                $param['Anio'] =$request->get('cmbanio');
            }
           }
           
           if(isset($dd['id']) && $dd['id'] > 0) 
           {
           
               $dateAtencion = $request->get('fatencion');
               $arrayAtencion = explode("/", $dateAtencion);
               $fechaAtencion="";
               if(count($arrayAtencion) > 1)
               {
                 $fechaAtencion=$arrayAtencion[2].$arrayAtencion[1].$arrayAtencion[0];
                
               } 
               $param['DTPFechaAtencion']=$fechaAtencion;

               $param['Id']=$dd['id'];
            
               $param['Tipo']=$dd['tipo'];
               $param['Cliente']=$dd['cliente'];
               $param['Nombre']=$dd['nombre'];
               $param['TxtObservacion']=  $request->get('concepto');
               
               $param['Horas']=$request->get('horas');
               
               if($request->get('exampleCheck1') == 'on')
               {
                   $param['Atencion']=1;
                   $param['estatus']=  'CONCLUIDO';   
               }
           }
          
           $postdata = $this->posts->PostGrabaTareas($param);
           //;
           $param=json_decode(json_encode($postdata->data[0]),true);
           //dd();
         //  return $postdata;//->json($param);
         return response()->json(['exito' => 1, 'id'=>$param]);
        }
  
    }
}
