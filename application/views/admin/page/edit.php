<h3><?php echo empty($page->id) ? 'Add a new page' : 'Edit page ' . $page->title; ?></h3>
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
                <h3 class="box-title"><?php echo anchor('admin/building/edit', '<i class="fa fa-plus"></i> Añadir edificio'); ?></h3>
              </div>
              <div class="box-body">
				<section>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<span class="fa fa-page form-control-feedback"></span>
								<?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<?php 
								$options = array(
									'Seleccionar' => 'Seleccione un estado',
							        'page'         => 'Page',
							        'news_archive'           => 'News archive',
							        'homepage'         => 'Homepage',
								);
								$inputtemplate = array(
								'id' => 'template',
								'name' => 'template',
								'class' => 'form-control');
								echo form_dropdown('template', $options, set_value('template',$page->template), $inputtemplate); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-pencil form-control-feedback"></span>
							<?php 
								$inputtitle = array(
								'id' => 'title',
								'name' => 'title',
								'class' => 'form-control',
								'placeholder' => 'title');
								echo form_input	($inputtitle, set_value('title', $page->title)); ?>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<span class="fa fa-pencil form-control-feedback"></span>
							<?php 
								$inputslug = array(
								'id' => 'slug',
								'name' => 'slug',
								'class' => 'form-control',
								'placeholder' => 'Slug');
								echo form_input($inputslug, set_value('slug', $page->slug)); ?>
						</div>
					</div>
					<div class="col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<span class="form-control-feedback"></span>
							<?php 
								$inputbody = array(
								'id' => 'body',
								'name' => 'body',
								'class' => 'form-control tinymce',
								'placeholder' => 'Body');
								echo form_textarea($inputbody, set_value('body', $page->body)); ?>
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
