<?php while ( have_posts() ): the_post(); ?>
<div class="row facet-workshop">
	<div class="col-md-10 facet-workshop-info">
		<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a> 
		<div class="due-date data">Due Date: <?php echo acf_fetch_due_date();?></div>
		<div class="alt-lab-lead data"><?php alt_lab_lead();?></div>
		<div class="department data"><?php project_department();?></div>
		<div class="design data"><?php alt_lab_design_pattern();?></div>
	</div>
	<!-- <div class="col-md-2">
		<a class="btn btn-workshop" data-toggle="collapse" href="#<?php echo $post->post_name?>" role="button" aria-expanded="false" aria-label="more details about the <?php the_title(); ?> workshop" aria-controls="collapseExample">+</a>		
	</div>
		<div class="collapse" id="<?php echo $post->post_name?>">
		  <div class="card card-body">
		    <?php the_content()?>
			<a class="workshop-learn-more" href="<?php the_permalink(); ?>">Learn more about the <?php the_title(); ?> workshop</a>
		  </div>
		</div> -->
	</div>
<?php endwhile; ?>