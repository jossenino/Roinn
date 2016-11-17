	<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo 'Migración'; ?></h3>
      </div>
      <div class="box-body">
	      <div class="row">
	      	<?php echo $html; ?>
	      </div>      	
    </div><!-- /.box -->


     <script type="text/javascript">
    	function migrationworks(){
    		var seleccion = $("select#sel1 option").filter(":selected").val();
    		var urlController = "<?php echo base_url('index.php/admin/migration/allMigrations/') ?>";
    		$.ajax({
		       type: "GET",
		       url: urlController + "/" + seleccion,
		       success: function(result){
		       	var html = jQuery.parseJSON(result);
		       	alert(html.access);
		       		/*var html = jQuery.parseJSON(result);
		           $("#permisosUsuarios").html(html.access);
		           $('#permission-modal').modal('show') */
		           }
		     });
    	}
    </script>