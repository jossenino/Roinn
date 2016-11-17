<h3><?php echo empty($department->id) ? 'Add a new department' : 'Edit department ' . $department->number . $department->letter; ?></h3>
	<div class="row">
		<div class="col-md-8">
			<?php echo validation_errors(); ?>
			<?php echo form_open(); ?>
			<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo anchor('admin/department/edit', '<i class="fa fa-plus"></i> Add a department'); ?></h3>
              </div>
              <div class="box-body">
				<section>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array();
								if(count($users)) {
									$options['niguno'] = 'Seleccione un propietario / arrendatario';
									foreach($users as $user) {
										$options[$user->idUsers] = $user->userName;
									}
								}
								$inputidUsers = array(
								'id' => 'idUsers',
								'name' => 'idUsers',
								'class' => 'form-control');
								echo form_dropdown('idUsers', $options, set_value('idUsers',$department->idUsers), $inputidUsers); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array();
								if(count($buildings)) {
									$options['ninguna'] = 'Seleccione un edificio';
									foreach($buildings as $building) {
										$options[$building->id] = $building->name;
									}
								}
								$inputidBuilding = array(
								'id' => 'idBuilding',
								'name' => 'idBuilding',
								'class' => 'form-control');
								echo form_dropdown('idBuilding', $options, set_value('idBuilding',$department->idBuilding), $inputidBuilding); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-building-o form-control-feedback"></span>
							<?php 
								$inputnumber = array(
								'id' => 'number',
								'name' => 'number',
								'class' => 'form-control',
								'placeholder' => 'Número de piso del edificio');
								echo form_input($inputnumber, set_value('number', $department->number)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-building-o form-control-feedback"></span>
							<?php 
								$inputletter = array(
								'id' => 'letter',
								'name' => 'letter',
								'class' => 'form-control',
								'placeholder' => 'Número del departamento');
								echo form_input($inputletter, set_value('letter', $department->letter)); ?>
						</div>
					</div>
				</section>
              </div><!-- /.box-body -->
              <div class="box-footer primary">
              	<div class="row">
                    <section class="col-md-4 pull-right">
                    	<div class="form-group has-feedback" style="margin-left:50px;">
                    		<?php echo form_submit('submit', 'Guardar', 'class="btn btn-primary"'); ?>
                    		<?php echo form_submit('submit', 'Cancelar', 'class="btn btn-default"'); ?>
                    	</div>
                    </section>
                </div>
                 <div class="row">
                  	
                 </div><!-- /.row -->
              </div>
     		</div><!-- /.box -->
     		<?php echo form_close();?>
     		
		</div>
	</div>
