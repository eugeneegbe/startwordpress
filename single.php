<?php get_header(); ?>

    <div class="row">
        <div class="col-sm-12">

            <?php
            if ( have_posts() ) :

                while ( have_posts() ) : the_post();

                    get_template_part( 'content-single', get_post_format() );

                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                  endwhile;
            endif;
            ?>

<!-- if a post has a featured image then we display it-->
            <?php

            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }

            ?>
        </div> <!-- /.col -->
    </div> <!-- /.row -->

<?php get_footer(); ?>