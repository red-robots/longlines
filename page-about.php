<?php
/**
 * Template Name: About Us
 */
$placeholder = THEMEURI . 'images/rectangle.png';
$banner = get_field("flexslider_banner");
$has_banner = ($banner) ? 'hasbanner':'nobanner';
$timeline_data = get_field("timeline_data");
?>
<style type="text/css">
<?php
$n=1; foreach ($timeline_data as $k=>$d) { 
$move = ( isset($d['moveup']) && $d['moveup'] ) ? $d['moveup'] : '';
if ($move) { ?>
  @media screen and (min-width:820px) { #history-info-<?php echo $n ?>{transform: translateY(<?php echo $move ?>%)!important; } }
<?php }
$n++; } ?>
</style>
<?php get_header(); ?>

<div id="primary" class="content-area-full about-page <?php echo $has_banner ?>">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( get_the_content() ) { ?>
			<section class="text-centered-section">
					<div class="wrapper text-center">
						<?php the_content(); ?>
					</div>
			</section>
			<?php } ?>


			<?php  
			$mission = get_field("mission_text");
			$video = get_field("video_embed");
			$section_class = ($mission && $video) ? 'half':'full';
			?>
			<?php if ($mission || $video) { ?>
			<section class="section-text-and-image <?php echo $section_class ?>">
				<div class="flexwrap">
					<?php if ($mission) { ?>
					<div class="leftcol">
						<div class="wrap">
							<div class="inner"><?php echo $mission; ?></div>
						</div>
					</div>	
					<?php } ?>

					<?php if ($video) { ?>
					<div class="rightcol videoCol">
						<div class="inside">
							<div class="iframe-wrap"><?php echo $video; ?></div>
						</div>
					</div>	
					<?php } ?>
				</div>
			</section>	
			<?php } ?>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
