<div class="row facet-project">
	<div class="facet-data workshop-title facet-title col-md-3">TITLE</div>
	<div class="due-date facet-data facet-title col-md-2">DUE</div>
	<div class="alt-lab-lead facet-title facet-data col-md-2">LEAD</div>
	<div class="department facet-title facet-data col-md-2">DEPT</div>
	<div class="design facet-title facet-data col-md-2">TYPE</div>
</div>

<?php while ( have_posts() ): the_post(); ?>
<div class="row facet-workshop">
		<div class="facet-data workshop-title col-md-3 <?php alt_lab_project_status();?>"><a href="<?php the_permalink(); ?>"><?php the_title() . acf_count_updates();?></a></div> 
		<div class="due-date facet-data col-md-2"><?php echo acf_fetch_due_date();?></div>
		<div class="alt-lab-lead facet-data col-md-2"><?php alt_lab_lead();?></div>
		<div class="department facet-data col-md-2"><?php project_department();?></div>
		<div class="design facet-data col-md-2"><?php alt_lab_design_pattern();?></div>
	<!-- <div class="col-md-2">
		<a class="btn btn-workshop" data-toggle="collapse" href="#<?php //echo $post->post_name?>" role="button" aria-expanded="false" aria-label="more details about the <?php //the_title(); ?> workshop" aria-controls="collapseExample">+</a>		
	</div>
		<div class="collapse" id="<?php //echo $post->post_name?>">
		  <div class="card card-body">
		    <?php //the_content()?>
			<a class="workshop-learn-more" href="<?php //the_permalink(); ?>">Learn more about the <?php //the_title(); ?> workshop</a>
		  </div>
		</div> -->
	</div>
<?php endwhile; ?>