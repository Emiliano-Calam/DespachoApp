
@extends('layouts.app')

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
                      <span class="section">Captura de Diligencias</span>

                      <div class="item form-group col-md-3">
                        <label  for="Folio">Folio <span class="required"></label>
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="name" placeholder=""  type="text" value="{{ (isset($result['folio']) && $result['folio'] != '') ? $result['folio'] : '0' }}" data-parsley-error-message="Folio requerido "  <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> required >
                          <input  class="hide" name="diligenciadata" id='diligenciadata' type="text" value="{{ (isset($result) && count($result) >0) ? json_encode($result) : '' }}">
                          <input  type="hidden" name="auxiliar" id='auxiliar' type="text" value="{{ (isset($result['usuario']) && $result['usuario'] !='' ) ? $result['usuario'] : '' }}" >
                          
                      </div>

                      <div class="item form-group col-md-3">
                        <label  for="Tipo">Tipo <span class="required"></label>
                          <select class="form-control"  id="number" name="number" required="required"  <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> >
                          <option value="CLIENTE" {{ (isset($result['tipo']) && $result['tipo'] == 'CLIENTE') ? 'selected' : '' }}>Cliente</option>
                          <option value="OTROS" {{ ( isset($result['tipo']) && $result['tipo'] == 'OTROS') ? 'selected' : '' }}>Otros</option>
                        </select>
                      </div>

                      <div class="item form-group col-md-3">
                      <label for="ex6">Fecha</label>
                        <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" placeholder="" data-parsley-error-message="El campo fecha es requerido" value="{{ (isset($result['fecha']) && $result['fecha'] != '') ? $result['fecha'] : '' }}"  <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> required>
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
                          <input type="hidden" class="form-control" value="" id="optcliente" name="optcliente">
                            <input type="text" class="form-control" value="{{ (isset($result['cliente']) && $result['cliente']!= '') ? $result['cliente'] : '' }}" id="Clave_cliente" name="Clave_cliente" disabled>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-primary cliente"  data-toggle="tooltip" title="Clientes"  data-toggle="modal" data-target="#exampleModal" data-tipo="C" {{ ( isset($result['tipo']) && $result['tipo'] != 'CLIENTE') ? 'disabled' : '' }} <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> ><span class="fa fa-group"></span></button>
                              <button type="button" class="btn btn-success cliente"  data-toggle="tooltip" title="Otros" data-tipo="O" {{ ( isset($result['tipo']) && $result['tipo'] != 'CLIENTE') ? 'disabled' : '' }} <?php echo (isset($result['id']) && $result['id'] >0) ? 'disabled': '' ?> ><span class="fa fa-search"></span></button>
                            </span>
                          </div>
                      </div>


                      <div class="item form-group  col-md-9">
                        <label  for="cliente">Cliente</label>
                          <input type="text" id="confirm_cliente" name="confirm_cliente" data-parsley-error-message="Ingrese un cliente o prospecto" required="required" class="form-control col-md-7 col-xs-12"  value="{{ (isset($result['nombre']) && $result['nombre'] != '' ) ? $result['nombre'] : '' }}" disabled>
                      </div>

                      <div class="item form-group col-md-12">
                      </div>

                      <div class="item form-group col-md-12">
                      <label>Dirrección</label>
         
                      <textarea class="content1" name="direccion" id="direccion">{{  (isset($result['direccion']) && $result['direccion'] != '') ? $result['direccion'] : '' }}</textarea>
                      </div>
                      
                      <div class="item form-group col-md-12">
                      <label>Concepto</label>

                      <textarea class="content2" name="concepto" id="concepto">{{ (isset($result['concepto']) && $result['concepto'] != '') ? $result['concepto'] : '' }}</textarea>
                      </div>

                      <div class="item form-group col-md-12">
                        <label>Nota</label>

                        <textarea class="content3" name="nota" id="nota">{{ (isset($result['observacion']) && $result['observacion'] != '') ? $result['observacion'] : '' }}</textarea>
                    </div>
                    @if (isset($result['id']) && $result['id'] >0)
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

                    <div class="item form-group col-md-3">
                        <label  for="entrega">Entregó <span class="required"></label>
                          <input id="entrega" name="entrega" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text" value="{{ (isset($result['entrega']) && $result['entrega'] !='' ) ? $result['entrega'] :''  }}">
                      </div>

                      <div class="item form-group col-md-3">
                        <label  for="Recibio">Recibió <span class="required"></label>
                          <input id="Recibio" name="Recibio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text" value="{{ (isset($result['recibe']) && $result['recibe']!='') ? $result['recibe'] : '' }}">
                      </div>
                     
                      <br/>
                    @endif
<!--

                      <div class="ln_solid"></div>-->
                      
                      <div class="form-group">
                      <div class="col-md-7 "> 

                      </div> 
                        <div class="col-md-5">
                          <button type="submit" class="btn btn-danger"> <span class="fa fa-ban" aria-hidden="true"></span> Cancel</button>
                          @if(isset($result['estatus']) && $result['estatus'] ==='CONCLUIDO')
                          <button id="dowload" type="submit" class="btn btn-primary"  > <span class="fa fa-cloud-download" aria-hidden="true"></span> <?php echo (isset($result['id']) && $result['id'] >0) ? 'Descargar': 'Descargar' ?></button>
                          <a id="print" href="/movimientos/diligencia/print/{{ $result['id'] }}" class="btn btn-success" > <span class="fa fa-print" aria-hidden="true"></span> <?php echo (isset($result['id']) && $result['id'] >0) ? 'Imprimir': 'Imprimir' ?></a>
                          @else
                          <span   class="btn btn-primary" disabled> <span class="fa fa-cloud-download" aria-hidden="true"></span> Descargar </span>
                          <span  class="btn btn-success" disabled> <span  class="fa fa-print" aria-hidden="true"></span> Imprimir</span>
                 
                          @endif
                          @if(isset($result['estatus']) && $result['estatus'] !='CONCLUIDO')
                          <button id="send" type="submit" class="btn btn-primary"  > <span class="fa fa-floppy-o" aria-hidden="true"></span> <?php echo (isset($result['id']) && $result['id'] >0) ? 'Guardar': 'Guardar' ?></button>
                          <button id="Concluir" type="submit" class="btn btn-success" disabled> <span class="fa fa-play" aria-hidden="true"></span> <?php echo (isset($result['id']) && $result['id'] >0) ? 'Concluir': 'Concluir' ?></button>
                        
                          @else
                          <span id="sednull"  class="btn btn-primary" disabled> <span class="fa fa-floppy-o" aria-hidden="true"></span> Guardar </span>
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
       <ClientesmodalComponent> </ClientesmodalComponent>
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
    <script src="{{ asset('static/build/js/diligecias.js') }}"></script>
    <script src="{{ asset('static/src/js/jquery.richtext.min.js') }} "></script>
    @endsection