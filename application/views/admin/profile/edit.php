	<div class="row">
		<div class="col-md-8">
			<?php if($this->session->flashdata('error')){ ?>
	          <div class="alert alert-danger">
	              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	              <strong>Ups!</strong> <?php echo $this->session->flashdata('error'); ?>
	            </div>
	          <?php }?>
	          <?php if (validation_errors()){?>
	          <div class="alert alert-danger">
	              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            <?php echo validation_errors(); ?>
	            </div>
	         <?php } ?>
			<?php echo form_open(); ?>
			<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo anchor('admin/profile/edit', '<i class="fa fa-plus"></i> Añadir perfi'); ?></h3>
              </div>
              <div class="box-body">
				<section>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-profile form-control-feedback"></span>
							<?php 
								$inputprofile = array(
								'id' => 'profile',
								'name' => 'profile',
								'class' => 'form-control',
								'placeholder' => 'Perfil');
								echo form_input($inputprofile, set_value('profile', $profile->profile)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-envelope form-control-feedback"></span>
							<?php 
								$inputdescription = array(
								'id' => 'description',
								'name' => 'description',
								'class' => 'form-control',
								'placeholder' => 'Descripción perfil');
								echo form_input($inputdescription, set_value('description', $profile->description)); ?>
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
              </div>
     		</div><!-- /.box -->
     		<?php echo form_close();?>
		</div>
	</div>
