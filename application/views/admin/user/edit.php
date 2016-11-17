<h3><?php echo empty($user->idUsers) ? 'Add a new user' : 'Edit user ' . $user->userName; ?></h3>
	<div class="row">
		<div class="col-md-8">
			<?php echo validation_errors(); ?>
			<?php echo form_open(); ?>
			<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo anchor('admin/user/edit', '<i class="fa fa-plus"></i> Add a user'); ?></h3>
              </div>
              <div class="box-body">
				<section>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-user form-control-feedback"></span>
							<?php 
								$inputUserName = array(
								'id' => 'userName',
								'name' => 'userName',
								'class' => 'form-control',
								'placeholder' => 'Nombre usuario');
								echo form_input($inputUserName, set_value('userName', $user->userName)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-envelope form-control-feedback"></span>
							<?php 
								$inputEmail = array(
								'id' => 'email',
								'name' => 'email',
								'class' => 'form-control',
								'placeholder' => 'Correo electrónico');
								echo form_input($inputEmail, set_value('email', $user->email)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-lock form-control-feedback"></span>
							<?php 
								$inputPassword = array(
								'id' => 'password',
								'name' => 'password',
								'class' => 'form-control',
								'placeholder' => 'Nueva contraseña');
								echo form_password($inputPassword); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
						<span class="fa fa-lock form-control-feedback"></span>
						<?php 
							$inputpassword_confirm = array(
							'id' => 'password_confirm',
							'name' => 'password_confirm',
							'class' => 'form-control',
							'placeholder' => 'Repita nueva contraseña');
							echo form_password($inputpassword_confirm); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array();
								if(count($profiles)) {
									foreach($profiles as $profile) {
										$options[$profile->idProfile] = $profile->profile;
									}
								}

								$inputProfile = array(
								'id' => 'profile',
								'class' => 'form-control');
								echo form_dropdown('profile', $options, set_value('profile',$user->idProfile), $inputProfile); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array(
									'Seleccionar' => 'Seleccione un estado',
							        '0'         => 'Inactivo',
							        '1'           => 'Activo',
							        '2'         => 'Suspendido',
								);
								$inputProfile = array(
								'id' => 'status',
								'name' => 'status',
								'class' => 'form-control');
								echo form_dropdown('status', $options, set_value('status',$user->status), $inputProfile); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array(
									'Seleccionar' => 'Seleccione un tipo de usuario',
							        '0'         => 'Propietario',
							        '1'           => 'Arrendatario',
							        '2'           => 'Administrador Edif.',
								);
								$inputTypeUser = array(
								'id' => 'typeUser',
								'name' => 'typeUser',
								'class' => 'form-control');
								echo form_dropdown('typeUser', $options, set_value('typeUser',$user->typeUser), $inputTypeUser); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-phone form-control-feedback"></span>
							<?php 
								$inputtelefono = array(
								'id' => 'telefono',
								'name' => 'telefono',
								'class' => 'form-control',
								'placeholder' => 'Teléfono');
								echo form_input($inputtelefono, set_value('telefono', $address->telefono)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
	                    <select id="country" name="country" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                      <option selected="selected">Seleccione un país</option>
	                    <?php 
	                      $options = array();
	                      if(count($countrys)) {
	                        foreach($countrys as $country) { ?>
	                           <option id="<?php echo $country->id ?>" value="<?php echo $country->id ?>"> <?php echo $country->country ?></option>
	                       <?php }
	                      }?>
	                      </select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ybnz-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
	                  </div>
					</div>			
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<select id="region" name="region" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                      		<option selected="selected">Seleccione una Región</option>
	                      	</select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ybnz-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<select id="comuna" name="comuna" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                      		<option selected="selected">Seleccione una Región</option>
	                      	</select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ybnz-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>			
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-exchange form-control-feedback"></span>
							<?php 
								$inputavCalle = array(
								'id' => 'avCalle',
								'name' => 'avCalle',
								'class' => 'form-control',
								'placeholder' => 'Av. / Calle');
								echo form_input($inputavCalle, set_value('avCalle', $address->avCalle)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-sort-numeric-asc form-control-feedback"></span>
							<?php 
								$inputnumber = array(
								'id' => 'number',
								'name' => 'number',
								'class' => 'form-control',
								'placeholder' => 'Nro. de calle');
								echo form_input($inputnumber, set_value('number', $address->number)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="form-control-feedback"></span>
							<?php 
								$inputblock = array(
								'id' => 'block',
								'name' => 'block',
								'class' => 'form-control',
								'placeholder' => 'Bloque');
								echo form_input($inputblock, set_value('block', $address->block)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="form-control-feedback"></span>
							<?php 
								$inputvillaPoblacion = array(
								'id' => 'villaPoblacion',
								'name' => 'villaPoblacion',
								'class' => 'form-control',
								'placeholder' => 'Villa / Población');
								echo form_input($inputvillaPoblacion, set_value('villaPoblacion', $address->villaPoblacion)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array();
								if(count($companys)) {
									foreach($companys as $company) {
										$options[$company->id] = $company->companyName;
									}
								}

								$inputCompany = array(
								'id' => 'company',
								'name' => 'company',
								'class' => 'form-control');
								echo form_dropdown('company', $options, set_value('company',$user->idCompany), $inputCompany); ?>
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

	<script type="text/javascript">
		$('#company').hide();
		$('#typeUser').change(function(){
		    var typeUser = $('#typeUser').val();
		    if (typeUser == 2){
		        $('#company').show();
		    } else {
		        $('#company').hide();
		    }//end if
		}); //end change
	</script>

	<script type="text/javascript">
		$('#country').change(function(){
		    var country_id = $('#country').val();
		    var url = "<?php echo base_url('index.php/admin/building/getRegion//') ?>";
		    if (country_id != ""){
		        var post_url = url + "/" + country_id;
		        $.ajax({
		            type: "POST",
		            url: post_url,
		            success: function(result) //we're calling the response json array 'cities'
		            {
		               var html = jQuery.parseJSON(result);
			           $("#region").html(html.access);
		            } //end success
		         }); //end AJAX
		    } else {
		        $('#region').empty();
		    }//end if
		}); //end change

		$('#region').change(function(){
		    var region_id = $('#region').val();
		    var url = "<?php echo base_url('index.php/admin/building/getComunas/') ?>";
		    if (region_id != ""){
		        var post_url = url + "/" + region_id;
		        $.ajax({
		            type: "POST",
		            url: post_url,
		            success: function(result) //we're calling the response json array 'cities'
		            {
		               var html = jQuery.parseJSON(result);
			           $("#comuna").html(html.access);
		            } //end success
		         }); //end AJAX
		    } else {
		        $('#comuna').empty();
		    }//end if
		}); //end change
	</script>