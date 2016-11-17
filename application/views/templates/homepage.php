		<style type="text/css">
			hr.style-three {
    border: 0;
    border-bottom: 1px dashed #ccc;
    background: #999;
}
		</style>
		<!-- Main content -->
    	<article>
			<h2><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></h2>
			<hr class="style-three">
			<div class="span5"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
			<hr class="style-three">
			<div class="span4"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
		</article>