<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Odin
 * @since 2.2.0
 */

/* Template Name: Página de Erro 404 */

get_header(); ?>
    <main id="content" class="<?php echo odin_classes_page_full(); ?> travolta-404" role="main">
        <div class="jumbotron text-center">
            <header class="page-header">
                <h1 class="page-title section__title"><span>Erro 404</span></h1>
            </header>
            <div class="page-content">
                <p class="lead"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'odin' ); ?></p>
                <div class="sp sp--large"></div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div><!-- .page-content -->
        </div>
    </main><!-- #main -->
<?php get_footer();
