<?php
	get_header();
	pageBanner();
?>

    <div class="container container--narrow page-section">
		<?php while ( have_posts() ) :
			the_post();
			?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'event' ) ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
                    <span class="metabox__main">
                        <?php the_title(); ?>
                    </span>
                </p>
            </div>
            <div class="generic-content">
				<?php the_content(); ?>
            </div>
			<?php
			$relatedPrograms = get_field( 'related_programs' );
			if ( $relatedPrograms ) :
//			print_r( $relatedPrograms );
				echo "<hr class='section-break'>";
				echo "<h3 class='headline headline--small'>Related Program(s): </h3>";
				echo "<ul class='link-list min-list'>";
				foreach ( $relatedPrograms as $program ) :
					?>
                    <li>
                        <a href='<?php echo get_the_permalink( $program ) ?>'><?php echo get_the_title( $program ); ?></a>
                    </li>
					<?php
				endforeach;
				echo "</ul>";
			endif;
			?>
		<?php endwhile;
		?>
    </div>

<?php
	get_footer();
?>