<template>
   <!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <h5 class="modal-title" id="exampleModalLabel"> <span class="fa fa-group"></span>Horas reales de trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="x_content" >
               
            <input type="text" class="form-control has-feedback-left" id="horastrabajadas" name="horastrabajadas" placeholder="00:00"  value="" required="required">
           </div>
      </div>
      <div class="modal-footer">
   <!--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</template>

    <script  type="application/javascript">
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>