<template>
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <h5 class="modal-title" id="exampleModalLabel"> <span class="fa fa-group"></span> Buscar Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-sm-5">
        <div class="dataTables_length cmb-paginacion"></div>
      </div>
      <div class="col-sm-5">
      <div class="dataTables_filter buscar-table"></div>
      </div>
      </div>
      <table id="datatable-clientes" class="table table-striped jambo_table bulk_action"  height="100%" width="100%">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Clave</th>
                      <th class="column-title" >Cliente</th>
                    </tr>
                </thead>
        </table>

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
