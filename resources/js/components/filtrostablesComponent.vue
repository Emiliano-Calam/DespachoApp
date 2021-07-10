  <template>
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
                  <label for="ex6"></label>
                    <select class="form-control filtercmb" id="cmbmovimiento" name ="movimiento">
                      <option value="(Todos)">(Todos)</option>
                      <option value="Tarea Contable">Tarea Contable</option>
                      <option value="Tarea">Tarea</option>
                      <option value="Otros">Otros</option>
                      <option value="Agenda">Agenda</option>
                      <option value="Otros">Otros</option>
                      <option value="CLIENTE">CLIENTE</option>
                      <option value="OTROS">OTROS</option>
                      <option value="Factura F">Factura F</option>
                      <option value="Factura JB">Factura JB</option>
                      <option value="Factura P">Factura P</option>
                      <option value="Recibo Honorarios H">Recibo Honorarios H</option>
                      <option value="Recibo Sin/IVA">Recibo Sin/IVA</option>
                      <option value="Sin Recibo">Sin Recibo</option>
                 
                    </select>

                  </div>
           
                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                    <label for="ex6">Auxiliar</label>
                    <select class="form-control filtercmb" id="cmbauxiliar" name="auxiliar">
          
                      <option value="(Todos)">(Todos)</option>
                      <option value="Master">Master</option>
                      <option value="patyr">Patyr</option>
                      <option value="Gabis">Gabis</option>
                      <option value="JesusC">JesusC</option>
                      <option value="">Seleccione</option>
                    </select>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                  <label for="ex6">Estatus</label>
                    <select class="form-control filtercmb" id="cmbEstado">
                      <option value="(Todos)">(Todos)</option>
                      <option value="PENDIENTE" selected>Pendientes</option>
                      <option value="CANCELADO">Cancelados</option>
                      <option value="CONCLUIDO">Concluidos</option>
                      <option value="PREFACTURA">PREFACTURA</option>
                      <option value="CONCLUIDO">CONCLUIDO</option>
                      <option value="CANCELADO">CANCELADO</option>
                      <option value="TIMBRADA">TIMBRADA</option>
                      <option value="PENDIENTE">Pendientes</option>
                      <option value="PAGADO">Pagado</option>
                      <option value="CANCELADO">Cancelados</option>
                   
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
</template>
<script >
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>