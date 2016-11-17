
	<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo anchor('admin/user/edit', '<i class="fa fa-plus"></i> Añadir Usuario'); ?></h3>
              </div>
              <div class="box-body">
              	<div class="table-responsive">
	                <table id="Users" class="table table-striped">
						<thead>
							<tr>
								<th>Nombre usuario</th>
								<th>Correo electrónico</th>
								<th>Dirección</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($users)): foreach($users as $user): ?>	
						<tr>
							<td> <?php echo anchor('admin/user/edit/' . $user->idUsers, $user->userName); ?></td>
							<td><?php echo anchor('admin/user/edit/' . $user->idUsers, $user->email); ?></td>
							<td> <?php echo btn_js("btn btn-warning fa fa-map-marker","","showAddress(".$user->idAddress.")");?></td>
							<td><?php echo btn_edit('admin/user/edit/' . $user->idUsers); ?>
								<?php echo btn_delete('admin/user/delete/' . $user->idUsers);?>
							</td>
						</tr>
							<?php endforeach; ?>
							<?php else: ?>
									<tr>
										<td colspan="3"><h5><label class="label label-danger"> No se encontraron usuarios registrados. </label></h5></td>
									</tr>
							<?php endif; ?>	
						</tbody>
					</table>
				</div>
              </div><!-- /.box-body -->
              <div class="box-footer primary">
                  <div class="row">
                  </div><!-- /.row -->
                </div>
            </div><!-- /.box -->

            <!--ventana modal para las direcciones-->
			<div class="modal fade" id="addressBuilding-modal">
			    <div class="modal-dialog">
				    <div class="modal-content">
				        <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Información</h4>
				        </div>
					    <div class="modal-body" style="height: 400px">
					       <div class="box box-info">
					            <div class="box-header with-border">
					              <h3 class="box-title">Dirección</h3>
					            </div>
					            <!-- /.box-header -->
					              <div class="box-body">
					              <div id="addressBuilding"></div>
					              </div>
					              <!-- /.box-body -->
					          </div>					        
					    </div>
				        <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
				        </div>
				    </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

             <script type="text/javascript">
            	function showAddress(idAddress){
            		//confirm('Esta a punto de elminar este registro. No se podrá deshacer. Esta seguro?');
            		//if(confirm(confirmText)) {
	            		var urlController = "<?php echo base_url('index.php/admin/user/address_popup/') ?>";
	            		$.ajax({
					       type: "GET",
					       url: urlController + "/" + idAddress,
					       success: function(result){
					       		var html = jQuery.parseJSON(result);
					           $("#addressBuilding").html(html.access);
					           $('#addressBuilding-modal').modal('show') 
					           }
					     });
	            	//}
            	}
            </script>
            <script>				
			      $(function () {
			        $("#Users").dataTable({
			          "bPaginate": true,
			          "bLengthChange": false,
			          "bFilter": false,
			          "bSort": true,
			          "bInfo": true,
			          "bAutoWidth": false
			        });
			      });    
			</script>