<?php get_header(); ?>

// Insert Custom Login Logo
function custom_login_logo() {
echo '
<style>
        .login h1 a { background-image: url(shop.png) !important; background-size: 234px 67px; width:234px; height:67px; display:block; }
</style>
';
}
add_action( 'login_head', 'custom_login_logo' );

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php

            if(have_posts()):

                while(have_posts()):

                    the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;

            endif;
            ?>

        </div> <!-- /.blog-main -->

        <?php get_sidebar(); ?>

    </div> <!-- /.row -->

<?php get_footer(); ?>

