<!-- Modal -->
<div class="modal fade" id="NewTareasModal" tabindex="-1" role="dialog" aria-labelledby="NewTareasModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header modal-header-primary">
        <h5 class="modal-title" id="NewTareasModalLabel"> <span class="fa fa-group"></span> Agregar tareas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <div class="modal-body">
       <div class="row">
            <div class="item form-group  col-sm-12">

                 <div class="form-check">
                <input class="form-check-input" type="radio" name="Optareas_radio" id="Tarea" value="TAREA" >
                <label class="form-check-label" for="Tarea">Tarea</label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="Optareas_radio" id="Doc_llamada" value="DOCUMENTOS Y LLAMADAS">
                <label class="form-check-label" for="Documentos y llamadas">Documentos y llamadas</label>
                </div>
                
                <div class="form-check">
                <input class="form-check-input" type="radio" name="Optareas_radio" id="observaciones" value="OBSERVACION">
                <label class="form-check-label" for="Observaciones">Observacion</label>
                </div>

            </div>

            <div class="item form-group  col-sm-12">
                <label for="ex6">Description</label>
                <textarea class="content2" name="Description" id="Description"> </textarea>
            </div>
            </div>
       </div>

      <div class="modal-footer">
   <!--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
      
    </div>
  </div>
</div>