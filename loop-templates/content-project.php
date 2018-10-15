<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="entry-content project-archive data-holder">
		
		<?php the_title( sprintf( '<h2 class="entry-title data-title data"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<div class="alt-lab-lead data"><?php alt_lab_lead();?></div>
		<div class="department data"><?php project_department();?></div>
		<div class="design data"><?php alt_lab_design_pattern();?></div>
		<div class="data">
			<a class="btn btn-primary btn-data" data-toggle="collapse" href="#projectDetails-<?php echo $post->ID?>" role="button" aria-expanded="false" aria-controls="collapseExample">+</a>
   		</div>
		<div class="collapse" id="projectDetails-<?php echo $post->ID?>">
		  <div class="card card-body">
		        <div class="faculty-accordion">Faculty: <?php project_faculty();?></div>
		   		<div class="description-accordion"><?php echo project_description();?></div>
		  </div>
		</div>
		<div class="project-updates">
			<div class="start-date">Start Date: <?php echo acf_fetch_work_start_date();?></div>
			<div class="start-date">Launch Date: <?php echo acf_fetch_launch_date();?></div>

		</div>


		
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
