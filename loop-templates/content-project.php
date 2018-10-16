<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="entry-content project-archive data-holder">
		
		<?php the_title( sprintf( '<h1 class="entry-title data-title data"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h1>' ); ?>

		<div class="alt-lab-lead data"><?php alt_lab_lead();?></div>
		<div class="department data"><?php project_department();?></div>
		<div class="design data"><?php alt_lab_design_pattern();?></div>
		
		<div class="project-dates">
			<h2>Dates</h2>
			<ul>
				<li class="start-date">Start Date: <?php echo acf_fetch_work_start_date();?></li>
				<li class="start-date">Due Date: <?php echo acf_fetch_due_date();?></li>			
				<li class="start-date">Launch Date: <?php echo acf_fetch_launch_date();?></li>
			</ul>
		</div>

		<div class="faculty-accordion">Faculty: <?php project_faculty();?></div>
		<div class="description-accordion">Description: <?php echo project_description();?></div>

		<div class="updates">
			<h2>Updates</h2>
			<?php echo acf_fetch_updates();?>

		</div>
		

		
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
