	<div class="row">
		<div class="col-md-8">
		    <?php if (validation_errors()){?>
		    <div class="alert alert-danger">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo validation_errors(); ?>
			    </div>
			 <?php } ?>
			<?php echo form_open(); ?>
			<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo anchor('admin/department/index', '<i class="fa fa-arrow-left"></i> Atrás'); ?></h3>
              </div>
              <div class="box-body">
				<section>
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
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php $options = array(
									'Seleccionar' => 'Seleccione el tipo de numeración de los dptos.',
							        '0'         => 'Númerico',
							        '1'           => 'Alfabético',
								);
								$inputTipoDpto = array(
								'id' => 'tipoDpto',
								'class' => 'form-control');
								echo form_dropdown('tipoDpto', $options,'', $inputTipoDpto); ?>
						</div>
					</div>
				</section>
				<section>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-building-o form-control-feedback"></span>
							<?php 
								$inputAllNumber = array(
								'id' => 'allNumber',
								'name' => 'allNumber',
								'class' => 'form-control',
								'placeholder' => 'Cantidad de pisos por edificio');
								echo form_input($inputAllNumber); ?>
						</div>
					</div>					
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-building form-control-feedback"></span>
							<?php 
								$inputAllLetter = array(
								'id' => 'allLetter',
								'name' => 'allLetter',
								'class' => 'form-control',
								'placeholder' => 'Cantidad de departamentos por piso');
								echo form_input($inputAllLetter); ?>
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
