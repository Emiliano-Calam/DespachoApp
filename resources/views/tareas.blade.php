@extends('layouts.app')

    @section('title', 'Control de tareas')

    @section('head')
  	 <!-- iCheck -->
    <link href="{{ asset('static/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('static/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')
    <?php  // dd($r);?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="row">
              <div class="col-md-8 col-xs-8">
                <h3>{{ $modulo  }} </h3>
              </div>
              <div class="col-md-3 col-xs-3">
              </div>
              <div class="col-md-1 col-xs-1">
              <div class="card-body d-flex justify-content-between align-items-center">
                <a href="{{ $btnNew }}" class="btn btn-primary"><i class="fa fa-file-text-o"></i> Nuevo</a>
              </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
              
          <div class="col-md-12 col-xs-12">
          
          <div class="row">
            <div class="col-md-6 col-xs-6">
                <h5><i class="fa fa-filter" style="color:#337ab7;"></i> Opciones de Busqueda</h5>
              </div>
                <div class="col-md-6 col-xs-6">
                     <ul class="nav navbar-right panel_toolbox">
                      <li class="alingicon "><a class="collapse-link "><i class="fa fa-minus" style="color:#337ab7;"></i></a>
                      </li>
                      </ul>
                </div>
             
            <div class="x_content" >
                <form class="form-horizontal form-label-left input_mask">
                  
                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                  <label for="ex6">Buscar</label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Buscar">
                        <span class="fa fa-user form-control-feedback left form-con" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                  
                  <label for="ex6">  {{ ($modulo == 'Diligencias') ? 'Tipo' : 'Movimientos' }} </label>
                    
                    <select class="form-control filtercmb" id="cmbmovimiento" name ="movimiento">
                   
                    @if (isset($r['lsmov']) && count($r['lsmov']) > 0 && $modulo != 'Diligencias' )
                   
                       @foreach ($r['lsmov'] as $key => $team)
                       <option value="{{ $team['mov'] }}">{{ $team['mov'] }}</option>
                        @endforeach
                    @endif

                    @if($modulo == 'Diligencias')
                    <option value="CLIENTE">CLIENTE</option>
                      <option value="OTROS">OTROS</option>
                    @endif
                    </select>

                  </div>
                  
                  @if ($modulo != "Facturas" && $modulo != "Cobranza") 
                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                    <label for="ex6">Auxiliar</label>
                    <select class="form-control filtercmb" id="cmbauxiliar" name="auxiliar">
                    @if (isset($r['lsAux']) && count($r['lsAux']) > 0 )
                   
                   @foreach ($r['lsAux'] as $key => $team)
                   @if($team['cmd'] != "")
                   <option value="{{ $team['cmd'] }}">{{ $team['cmd'] }}</option>
                   @endif
                    @endforeach
                @endif
                    </select>
                  </div>
                  @endif
                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                  <label for="ex6">Estatus</label>
                    <select class="form-control filtercmb" id="cmbEstado">
                    @if (isset($r['lsEstatus']) && count($r['lsEstatus']) > 0 )
                   
                   @foreach ($r['lsEstatus'] as $key => $team)
                   @if($team['estatus'] != "")
                   <option value="{{ $team['estatus'] }}">{{ $team['estatus'] }}</option>
                   @endif
                    @endforeach
                  @endif
                    </select>
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                     <div class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_2 xdisplay"><div class="calendar left single" style="display: block;"><div class="daterangepicker_input"><input class="input-mini form-control active" type="text" name="daterangepicker_start" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">25</td><td class="off available" data-title="r0c1">26</td><td class="off available" data-title="r0c2">27</td><td class="off available" data-title="r0c3">28</td><td class="off available" data-title="r0c4">29</td><td class="off available" data-title="r0c5">30</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="today active start-date active end-date available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="off available" data-title="r5c2">1</td><td class="off available" data-title="r5c3">2</td><td class="off available" data-title="r5c4">3</td><td class="off available" data-title="r5c5">4</td><td class="weekend off available" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar right" style="display: none;"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Nov 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">30</td><td class="off available" data-title="r0c1">31</td><td class="available" data-title="r0c2">1</td><td class="available" data-title="r0c3">2</td><td class="available" data-title="r0c4">3</td><td class="available" data-title="r0c5">4</td><td class="weekend available" data-title="r0c6">5</td></tr><tr><td class="weekend available" data-title="r1c0">6</td><td class="available" data-title="r1c1">7</td><td class="available" data-title="r1c2">8</td><td class="available" data-title="r1c3">9</td><td class="available" data-title="r1c4">10</td><td class="available" data-title="r1c5">11</td><td class="weekend available" data-title="r1c6">12</td></tr><tr><td class="weekend available" data-title="r2c0">13</td><td class="available" data-title="r2c1">14</td><td class="available" data-title="r2c2">15</td><td class="available" data-title="r2c3">16</td><td class="available" data-title="r2c4">17</td><td class="available" data-title="r2c5">18</td><td class="weekend available" data-title="r2c6">19</td></tr><tr><td class="weekend available" data-title="r3c0">20</td><td class="available" data-title="r3c1">21</td><td class="available" data-title="r3c2">22</td><td class="available" data-title="r3c3">23</td><td class="available" data-title="r3c4">24</td><td class="available" data-title="r3c5">25</td><td class="weekend available" data-title="r3c6">26</td></tr><tr><td class="weekend available" data-title="r4c0">27</td><td class="available" data-title="r4c1">28</td><td class="available" data-title="r4c2">29</td><td class="available" data-title="r4c3">30</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div>
                    <label for="ex6">
                    <input type="checkbox"  id="ckboxfecha" name="ckboxfecha" style="margin:0 !important"/>
                    Fecha Inicio</label>
                    <input type="text" id="fechainicio" class="form-control has-feedback-left" placeholder=" " name="fechainicio" disabled>
                    <span class="glyphicon glyphicon-calendar form-control-feedback left form-con" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                    <label for="ex6">Fecha Fin</label>
                        <input type="text" class="form-control has-feedback-left" id="fechafin" name="fechafin" placeholder="" disabled>
                        <span class="glyphicon glyphicon-calendar form-control-feedback left form-con" aria-hidden="true"></span>
                   </div>
      
                </form>
            </div>
        </div>

            <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_content">
            @switch($modulo)
              @case('Tarea')
                <table id="datatable-buttons"  class="table table-striped jambo_table bulk_action"  height="100%" width="100%">
                  <thead>
                    <tr  class="headings">
                      <th class="column-title">Folio</th>
                      <th class="column-title">Movimientos</th>
                      <th class="column-title">Fec.Sol.</th>
                      <th class="column-title">Estatus</th>
                      <th class="column-title">Auxiliar</th>
                      <th style="width: 381px;" class="column-title">Clientes</th>
                      <th class="column-title">Tarea</th>
                      <th class="column-title">Fec.Ate.</th>
                      <th class="column-title" style="width:20%"></th>
              @break
              @case('Agenda')
                    <table id="datatable-tareas"  class="table table-striped jambo_table bulk_action" height="100%" width="100%">
                  <thead>
                    <tr  class="headings">
                      <th class="column-title">Fecha</th>
                      <th class="column-title">Hora</th>
                      <th class="column-title">Estatus</th>
                      <th class="column-title">Auxiliar</th>
                      <th class="column-title">Clientes</th>
                      <th class="column-title">Descripción</th>
                      <th style="width:20%" class="column-title"></th>
              @break
              @case('Diligencias')
                    <table id="datatable-Diligencia"  class="table table-striped jambo_table bulk_action" height="100%" width="100%">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Folio</th>
                      <th class="column-title">Fecha</th>
                      <th class="column-title">Estatus</th>
                      <th class="column-title">Cliente</th>
                      <th class="column-title">Concepto</th>
                      <th class="column-title" style="width:20%"></th>
              @break
              @case('Facturas')
                    <table id="datatable-Factura"  class="table table-striped jambo_table bulk_action"  height="100%" width="100%">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Folio</th>
                      <th class="column-title">Fecha</th>
                      <th class="column-title">Estatus</th>
                      <th class="column-title">Tipo CFDI</th>
                      <th class="column-title">Cliente</th>
                      <th class="column-title">Importe</th>
                      <th class="column-title">Concepto</th>
                      <th style="width:20%" class="column-title"></th>  
              @break
              @case('Cobranza')
                    <table id="datatable-Cobranza"  class="table table-striped jambo_table bulk_action"  height="100%" width="100%">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Folio</th>
                      <th class="column-title">Fecha</th>
                      <th style="width:14%" class="column-title">Tipo CFDI</th>
                      <th class="column-title">Cliente</th>
                      <th class="column-title">Concepto</th>
                      <th class="column-title">Estatus</th>
                      <th class="column-title">Importe</th>
                      <th class="column-title">Pago</th>
                      <th class="column-title">Saldo</th>
                      <th style="width:20%" class="column-title"></th> 
              @break
            @endswitch
                    </tr>
                  </thead>
             
                </table>
              </div>
              </div>
              </div>
           

            </div>
          </div>          
        </div>
        <!-- /page content -->

        <div class="modal fade bd-example-modal-lg datail" id="datail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          ...
        </div>
      </div>
    </div>
  
        @endsection


    @section('footer')
	<!-- iCheck -->
    <script src="{{ asset('static/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('static/vendors/datatables.net/js/jquery.dataTables.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('static/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('static/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('static/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    @endsection