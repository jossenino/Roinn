
			<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php  echo anchor('admin/article/edit', '<i class="fa fa-plus"></i> Add an article'); ?></h3>
              </div>
              <div class="box-body">
              	<div class="table-responsive">
	                <table id="Buildings" class="table table-striped">
						<thead>
							<tr>
								<th>Título</th>
								<th>Fecha publicación</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($articles)): foreach($articles as $article): ?>	
						<tr>
							<td> <?php echo anchor('admin/article/edit/' . $article->id, $article->title); ?></td>
							<td> <?php echo $article->pubdate;?></td>
							<td> 
								<?php echo btn_edit('admin/article/edit/' . $article->id); ?>
								<?php echo btn_delete('admin/article/delete/' . $article->id);?>
							</td>
						</tr>
							<?php endforeach; ?>
							<?php else: ?>
									<tr>
										<td colspan="3"><h4><label class="label label-danger"> No se encontraron artículos registrados. </label></h2></td>
									</tr>
							<?php endif; ?>	
						</tbody>
					</table>
				</div>
				<div class="table-responsive">
              </div><!-- /.box-body -->
              <div class="box-footer primary">
                  <div class="row">
                  </div><!-- /.row -->
                </div>
            </div><!-- /.box -->