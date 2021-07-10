
@extends('layouts.app')
@php
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$i=1;

$anio_menor = date('Y') - 10;
$anio_actual= date('Y');

@endphp
@section('title', 'Nueva Tarea')

@section('head')     
<link href="{{ asset('static/src/scss/richtext.min.css') }}" rel="stylesheet">
@endsection
@section('content')
     <div class="right_col" role="main">
          <div class="">
          
          <div class="row">
              <div class="col-md-8 col-xs-8">
              <a href="/movimientos/tareas" class="btn btn-default"><i class="fa fa-reply"></i> Atras</a>
              </div>
              <div class="col-md-3 col-xs-3">
              </div>
              <div class="col-md-1 col-xs-1">
              <div class="card-body d-flex justify-content-between align-items-center">
               
              </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                  <form id="validate_form">
                    @CSRF
                      <span class="section">Registrar nueva tarea</span>

                      <div class="item form-group col-md-3">
                        <label  for="Folio">Folio <span class="required"></label>
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="name" placeholder=""  type="text" value="{{ (isset($result['movId']) && $result['movId'] != '') ? $result['movId'] : '0' }}" data-parsley-error-message="Folio requerido "  <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> required >
                          <input  class="hide" name="tareadata" id='tareadata' type="text" value="{{ (isset($result) && count($result) >0) ? json_encode($result) : '' }}">
                          <input  type="hidden" name="auxiliar" id='auxiliar' type="text" value="{{ (isset($result['usuario']) && $result['usuario'] !='' ) ? $result['usuario'] : '' }}" >
                          <input  type="hidden" name="idtarea" id='idtarea' type="text" value="{{ (isset($result['id']) && $result['id'] >0 ) ? $result['id'] : 0 }}" >
                          <input  type="hidden" name="horas" id='horas' type="text" value="{{ (isset($result['horasReales']) && $result['horasReales'] >0 ) ? $result['horasReales'] : '00:00' }}" >
                      </div>

                      <div class="item form-group col-md-3">
                        <label  for="Tipo">Movimiento <span class="required"></label>
                          <select class="form-control"  id="cmbmovimiento" name="cmbmovimiento" required="required"  <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> >
                           @if (isset($r['lsmov']) && count($r['lsmov']) > 0)
                            @foreach ($r['lsmov'] as $key => $team)
                              @if($team['mov'] != "(Todos)")
                              @php
                              $selected="";
                               if( $result['id'] > 0 &&  $result['mov'] ===  $team['mov'])
                               {
                                $selected="selected";
                               }
                               if($result['id'] <= 0 && $team['mov'] === 'Tarea')
                               {
                                $selected="selected";
                               }
                              @endphp
                              <option value="{{ $team['mov'] }}"  {{ $selected }}>{{ $team['mov'] }}</option>
                              @endif
                            @endforeach
                          @endif
                        </select>
                      </div>

                      <div class="item form-group col-md-3">
                      <label for="ex6">Fecha Solicitud</label>
                        <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" placeholder="" data-parsley-error-message="El campo fecha es requerido" value="{{ (isset($result['fechaSolicitud']) && $result['fechaSolicitud'] != '') ? $result['fechaSolicitud'] : '' }}"  <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> required>
                          <span class="glyphicon glyphicon-calendar form-control-feedback left form-con" aria-hidden="true"></span>
                      </div>
                      
                      <div class="item form-group col-md-3">
                        <label  for="Tipo">Estatus <span class="required"></label>
                          <input type="text" id="estatus" name="estatus" data-parsley-error-message="El campo estatus es requerido" required="required" class="form-control col-md-7 col-xs-12" value="{{ (isset($result['estatus']) && $result['estatus'] != '') ? $result['estatus'] : '' }}" disabled>
                      </div>
                      <div class="item form-group col-md-12">
                      <br/>
                      </div>

                      <div class="item form-group col-md-3">
                      <label  for="cliente">No. Cliente</label>
                          <div class="input-group">
                            <input type="text" class="form-control" value="{{ (isset($result['cveCliente']) && $result['cveCliente']!= '') ? $result['cveCliente'] : '' }}" id="Clave_cliente" name="Clave_cliente" disabled>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-primary cliente"  data-toggle="tooltip" title="Clientes"  data-toggle="modal" data-target="#exampleModal" data-tipo="C" {{ ( isset($result['tipo']) && $result['tipo'] != 'CLIENTE') ? 'disabled' : '' }} <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> ><span class="fa fa-group"></span></button>
                              <button type="button" class="btn btn-success cliente"  data-toggle="tooltip" title="Otros" data-tipo="O" {{ ( isset($result['tipo']) && $result['tipo'] != 'CLIENTE') ? 'disabled' : '' }} <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> ><span class="fa fa-search"></span></button>
                            </span>
                          </div>
                      </div>


                      <div class="item form-group  col-md-9">
                        <label  for="cliente">Cliente</label>
                          <input type="text" id="confirm_cliente" name="confirm_cliente" data-parsley-error-message="Ingrese un cliente o prospecto" required="required" class="form-control col-md-7 col-xs-12"  value="{{ (isset($result['cliente']) && $result['cliente'] != '' ) ? $result['cliente'] : '' }}" disabled>
                      </div>

                      <div class="item form-group col-md-12">
                      </div>

                      <div class="item form-group col-md-12">
                      <label>Tarea</label>
         
                      <textarea class="content1" name="tarea" id="tarea">{{  (isset($result['tarea']) && $result['tarea'] != '') ? $result['tarea'] : '' }}</textarea>
                      </div>

                      <div class="item form-group col-md-3">
                      <label>Auxiliar</label>
                          <select class="form-control" id="cmbauxiliar" name="cmbauxiliar" required="required"  {{ ( $result['id'] > 0 ) ? 'disabled' : ''}}>
                          <option value="">Seleccione</option>
                          @if (isset($r['lsAux']) && count($r['lsAux']) > 0 )
                   
                          @foreach ($r['lsAux'] as $key => $team)
                            @if($team['cmd'] != "" &&  $team['cmd'] != "(Todos)")
                              <option value="{{ $team['cmd'] }}"  {{ ( $result['id'] > 0 &&  $result['cveAuxiliar'] !="" &&  $result['cveAuxiliar'] ===  $team['cmd']) ? 'selected' : ''}}>{{ $team['cmd'] }}</option>
                            @endif
                          @endforeach
                          @endif
                          </select>
                      </div>
                      <div class="item form-group col-md-5">
                      <label  for="cliente">Nombre</label>
                          <input type="text" id="nombreAux" name="nombreAux" data-parsley-error-message="Seleccione un auxiliar" required="required" class="form-control col-md-7 col-xs-12"  value="{{ (isset($result['auxiliar']) && $result['auxiliar'] != '' ) ? $result['auxiliar'] : '' }}" disabled>
                      </div>  
                      <div class="item form-group col-md-2">
                      @if( $result['id'] >= 0  &&  $result['mov'] != 'Tarea Contable')
                      <div id="tmpmes">
                      <br/><br/><br/><br/>
                      </div>
                      @endif
                      <div class="{{ ( $result['id'] >= 0  &&  $result['mov'] != 'Tarea Contable') ? 'hide' : ''}} " id="activamesfiscal">
                      <label  for="cliente">Periodo Fiscal Mes</label>
                      <select class="form-control" id="cmbmes" name="cmbmes" required="required" {{ ( $result['id'] > 0 ) ? 'disabled' : ''}}>
                      
                      @foreach ($meses as $key => $team)
                      @php
                   
                      @endphp
                      <option value="{{ $team }}" {{ (isset($result['mes']) && $result['mes'] === $team) ? 'selected' : '' }} >{{ $team }}</option>
                     
                      @endforeach
                      </select>
                      </div>
                      </div>

                      <div class="item form-group col-md-2">
                      @if( $result['id'] >= 0  &&  $result['mov'] != 'Tarea Contable')
                      <div id="tmpanio">
                      <br/><br/><br/><br/>
                      </div>
                      @endif
                      <div class="{{ ( $result['id'] >= 0  &&  $result['mov'] != 'Tarea Contable') ? 'hide' : ''}} " id="activaniofiscal">
                      <label  for="cliente">Periodo Fiscal Año</label>
                      <select class="form-control" id="cmbanio" name="cmbanio" required="required" {{ ( $result['id'] > 0 ) ? 'disabled' : ''}}>
                      
                      @for ($v = $anio_menor; $v < $anio_actual; ++$v)
                      @php
                      $valores = ++$anio_menor;
                      @endphp
                      <option value="{{ $valores }}" {{ (isset($result['año']) && (int)$result['año'] === (int)$valores) ? 'selected' : '' }} >{{ $valores }}</option>
                     
                      @endfor
                      </select>
                        </div>
                      </div>


                      

                      @if (isset($result['id']) && $result['id'] > 0 )
                    <div class="col-md-3">
                    <br>
                    <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1" {{  (isset($result['atencion']) && $result['atencion'] > 0) ? 'checked' :'' }}>
                    <label class="form-check-label" for="exampleCheck1">Atención</label>
                    </div>
                    </div>
                    <div class="item form-group col-md-3 ">
                    <div class="hide" id="activafecha">
                    <label for="ex6">Fecha Atención</label>
                        <input type="text" class="form-control has-feedback-left" id="fatencion" name="fatencion" placeholder=""  value="{{  (isset($result['fechaAtencion']) && $result['fechaAtencion'] !='' ) ? $result['fechaAtencion'] :''  }}">
                          <span class="glyphicon glyphicon-calendar form-control-feedback left form-con" aria-hidden="true"></span>
                    </div>
                    </div> 

                    <div class="item form-group col-md-6">
                       
                    </div>
                    <div class="item form-group col-md-12">
                    <label for="ex6">Observacion</label>
                    <textarea class="content2" name="concepto" id="concepto">{{ (isset($result['observacion']) && $result['observacion'] != '') ? $result['observacion'] : '' }}</textarea>
                    </div>
                    
                      <br/>
                    @endif
                    <div class="form-group">
                      <div class="col-md-8 "> 

                      </div> 
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-danger"> <span class="fa fa-ban" aria-hidden="true"></span> Cancel</button>
                          @if(isset($result['estatus']) && $result['estatus'] !='CONCLUIDO')
                          <a id="send" href="javascript:void(0);" class="btn btn-primary"  > <span class="fa fa-floppy-o" aria-hidden="true"></span> <?php echo (isset($result['id']) && $result['id'] >0) ? 'Guardar': 'Guardar' ?></a>
                          <a href="javascript:void(0);" id="Concluir" class="btn btn-success" disabled> <span class="fa fa-play" aria-hidden="true"></span> <?php echo (isset($result['id']) && $result['id'] >0) ? 'Concluir': 'Concluir' ?></a>
                        
                          @else
                          <span id="sednull"  class="btn btn-success" disabled> <span class="fa fa-floppy-o" aria-hidden="true"></span> Guardar </span>
                          <span id="Connull" class="btn btn-success" disabled> <span class="fa fa-play" aria-hidden="true"></span> Concluir</span>
                 
                          @endif
                        
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('modal.add_tareas_new_modal')
        <ClientesmodalComponent> </ClientesmodalComponent>
        <TimeworckComponent></TimeworckComponent>
    @endsection
    
    @section('appvue')
    <script src="{{ asset('js/app.js') }}"></script>
    @endsection
    @section('footer')
    <script src="{{ asset('static/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('static/vendors/parsleyjs/dist/parsley.js') }}"></script>
    <script src="{{ asset('static/build/js/tarea.js') }}"></script>
    <script src="{{ asset('static/src/js/jquery.richtext.min.js') }} "></script>
    <script src="{{ asset('static/vendors/validator/validator.js') }} "></script>
    
    @endsection
