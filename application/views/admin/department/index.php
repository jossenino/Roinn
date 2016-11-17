
	<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo anchor('admin/department/edit', '<i class="fa fa-plus"></i> Añadir departamento'); ?></h3>
                <h3 class="box-title pull-right"><?php echo anchor('admin/department/createAllDepartment', '<i class="fa fa-plus"></i> Añadir todos los departamentos'); ?></h3>
              </div>
              <div class="box-body">
              	<div class="col-md-12">
              		<div class="col-sm-6 col-md-6">
						<div class="form-group">
	                    <select id="building" name="building" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                      <option selected="selected">Seleccione un edificio</option>
	                    <?php 
	                      $options = array();
	                      if(count($buildings)) {
	                        foreach($buildings as $building) { ?>
	                           <option id="<?php echo $building->id ?>" value="<?php echo $building->id ?>"> <?php echo $building->name ?></option>
	                       <?php }
	                      }?>
	                      </select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ybnz-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
	                  </div>
					</div>	
              	</div>
              	<div class="col-md-12">
              	  <div class="box box-info" id="divTable">
		            <div class="box-header with-border">
		              <h3 class="box-title">Departamentos</h3>
		            </div>
		            <!-- /.box-header -->
		              <div class="box-body">
		              	<div class="table-responsive">
	              			<div id="tableDepartment">
	              			</div>        		
						</div>
		              </div>
		              <!-- /.box-body -->
		          </div>	
              	</div>
              </div><!-- /.box-body -->
              <div class="box-footer primary">
                  <div class="row">
                  </div><!-- /.row -->
                </div>
            </div><!-- /.box -->

            <!--ventana modal para los propietarios-->
			<div class="modal fade bs-example-modal-sm" id="owner-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			    <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				        <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Propietario</h4>
				        </div>
					    <div class="modal-body">
					        <p id="owner"></p>					        
					    </div>
				    </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!--ventana modal para los arrendatarios-->
			<div class="modal fade bs-example-modal-sm" id="lessee-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			    <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				        <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Arrendatario</h4>
				        </div>
					    <div class="modal-body">
					        <p id="lessee"></p>					        
					    </div>
				    </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!--ventana modal para asignar arrendatario-->
			<div class="modal fade bs-example-modal-sm" id="AsignLessee-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			    <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				        <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Seleccione el arrendatario</h4>
				        </div>
					    <div class="modal-body">
					        <p id="AsignLessee"></p>
					        <input type="hidden" id="idDeparment" name="idDeparment" value="">					        
					    </div>
					    <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <?php echo btn_js("btn btn-primary","Guardar","assignLesseeSave()"); ?>
				        </div>
				    </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

             <script type="text/javascript">
             $("#divTable").hide();
            	function showOwner(idDepartment){
            		//confirm('Esta a punto de elminar este registro. No se podrá deshacer. Esta seguro?');
            		//if(confirm(confirmText)) {
	            		var urlController = "<?php echo base_url('index.php/admin/department/owner_popup/') ?>";
	            		$.ajax({
					       type: "GET",
					       url: urlController + "/" + idDepartment,
					       success: function(result){
					       		var html = jQuery.parseJSON(result);
					           $("#owner").html(html.access);
					           $('#owner-modal').modal('show') 
					           }
					     });
	            	//}
            	}

            	function showLessee(idDepartment){
            		//confirm('Esta a punto de elminar este registro. No se podrá deshacer. Esta seguro?');
            		//if(confirm(confirmText)) {
	            		var urlController = "<?php echo base_url('index.php/admin/department/lessee_popup/') ?>";
	            		$.ajax({
					       type: "GET",
					       url: urlController + "/" + idDepartment,
					       success: function(result){
					       		var html = jQuery.parseJSON(result);
					           $("#lessee").html(html.access);
					           $('#lessee-modal').modal('show') 
					           }
					     });
	            	//}
            	}

            	function showAsignLessee(idDepartment){
            		//confirm('Esta a punto de elminar este registro. No se podrá deshacer. Esta seguro?');
            		//if(confirm(confirmText)) {
	            		var urlController = "<?php echo base_url('index.php/admin/department/showAsignLessee/') ?>";
	            		$.ajax({
					       type: "GET",
					       url: urlController,
					       success: function(result){
					       		var html = jQuery.parseJSON(result);
					           $("#AsignLessee").html(html.access);
					           $('#AsignLessee-modal').modal('show');
					           $("#idDeparment").val(idDepartment);
					           }
					     });
	            	//}
            	}

            	function assignLesseeSave(){
            		//confirm('Esta a punto de elminar este registro. No se podrá deshacer. Esta seguro?');
            		//if(confirm(confirmText)) {
            			var idDepartment = $("#idDeparment").val();
            			var idUser = $('#userId').val();
	            		var urlController = "<?php echo base_url('index.php/admin/department/assignLesseeSave/') ?>";
	            		$.ajax({
					       type: "POST",
					       url: urlController + "/" + idDepartment,
					       data: {userId: idUser},
					       success: function(result){
					       		var html = jQuery.parseJSON(result);
					           	if (html.access == true) {
					           	 	alert("Arrendatario asignado");
					           	 	$('#AsignLessee-modal').modal('hide')
					           	}
					        }
					     });
	            	//}
            	}

            	$('#building').change(function(){
				    var building_id = $('#building').val();
				    var url = "<?php echo base_url('index.php/admin/department/deparmentByBuilding//') ?>";
				    if (building_id != ""){
				        var post_url = url + "/" + building_id;
				        $.ajax({
				            type: "POST",
				            url: post_url,
				            success: function(result) //we're calling the response json array 'cities'
				            {
				               var html = jQuery.parseJSON(result);
				               if (html.access != "") {
				               		$("#tableDepartment").html(html.access);
					           		dataTtableDeparment();
					           		$("#divTable").show();
				               }
				               else{
				               		$("#tableDepartment").html("<h4><label class='label label-danger'> No se encontraron departamentos registrados. </label></h2>");
				               }
					           
				            } //end success
				         }); //end AJAX
				    } else {
				         $("#tableDepartment").html("<h4><label class='label label-danger'> No se encontraron departamentos registrados para el edificio seleccionado. </label></h2>");
				    }//end if
				}); //end change
            </script>
            <script>				
			    function dataTtableDeparment () {
			       	 $("#allDeparment").dataTable({
			          "bPaginate": true,
			          "bLengthChange": false,
			          "bFilter": false,
			          "bSort": true,
			          "bInfo": true,
			          "bAutoWidth": false
		        	});
		        }  
			</script>