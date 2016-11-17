		<!-- Main content -->
 		<div class="col-md-8">
 			<div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body" style="text-align:justify;">
                 <article>
					<h2><?php echo e($article->title); ?></h2>
					<p class="pubdate"><?php echo e($article->pubdate); ?></p>
					<?php echo $article->body; ?> 
				</article>
            </div>
         </div>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="col-md-4 sidebar">
 			<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Noticias recientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php $this->load->view('sidebar'); ?>
              <!-- /.row -->
            </div>
            <!-- /.footer -->
         </div>
 		</div>