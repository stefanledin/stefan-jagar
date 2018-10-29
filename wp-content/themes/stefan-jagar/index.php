<!doctype html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php echo asset('img/favicon.png');?>">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="site-wrapper">

            <header class="site-header pt-2 pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="site-title">Stefan jagar <span>Älgjakt 2018</span></h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="live">
                <div class="container-fluid">
                    <div class="row">
                        <div class="bg-medium-green col-12 col-sm-6 col-lg-4">
                            <?php
                            $hunting_day = get_posts( array(
                                'post_type' => 'hunting_day',
                                'posts_per_page' => 1
                            ) );
                            if ( $hunting_day ) : $hunting_day = $hunting_day[0];
                            ?>
                                <h2 class="live-header h3 mt-2 mb-2"><?php echo $hunting_day->post_title;?></h2>
                                <?php if ( $events = get_field('hunting_day_events', $hunting_day->ID) ) : ?>
                                    <ol class="list-unstyled">
                                        <?php
                                        $events = array_reverse( $events );
                                        foreach ( $events as $index => $event ) {
                                            echo sprintf(
                                                '<li class="%s">%s – %s</li>',
                                                ( $index == 0 ) ? 'h5' : '',
                                                $event['time'],
                                                $event['event']
                                            );
                                        }
                                        ?>
                                    </ol>
                                <?php endif;?>
                            <?php endif;?>
                        </div>
                        <div class="bg-vanilla text-dark-brown col-12 col-sm-6 col-lg-4">
                            <div class="d-flex justify-content-between">
                                <?php
                                $current_hunt = get_field('hunting_day_hunts', $hunting_day->ID);
                                if ( $current_hunt ) {
                                    $current_hunt = array_filter( $current_hunt, function( $hunt ) {
                                        if ( empty( $hunt['end_time'] ) ) {
                                            return $hunt;
                                        }
                                    } );
                                    $current_hunt = array_shift($current_hunt);
                                    if ( $current_hunt ) {
                                        $live_status = 'active';
                                    } else {
                                        $live_status = 'inactive';
                                    }
                                } else {
                                    $live_status = 'inactive';
                                }
                                include 'partials/live-' . $live_status . '.php';
                                ?>
                            </div>
                        </div>
                        <div class="bg-dark-green col-12 col-lg-4">
                            <h2 class="live-header h3 mt-2 mb-2">Statistik</h2>
                            <ul class="d-flex flex-wrap justify-content-around justify-content-lg-start m-0 mb-2 p-0 list-unstyled">
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--coffee">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-coffee.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Fikat:<br><?php the_field('stats_coffee', 'option');?> ggr</span>
                                </li>
                                <!--
                                JAG HANN INTE
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--total-time">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-time.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Tid på pass:<br>0 h 0 min</span>
                                </li>
                                -->
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--observations">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-eye.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Observationer:<br><?php the_field('stats_observations', 'option');?></span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--adults">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-moose.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Vuxna:<br><?php the_field('stats_adults', 'option');?></span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--small">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-moose.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Kalvar:<br><?php the_field('stats_small', 'option')?></span>
                                </li>
                                <?php if ( $extra = get_field('stats_extra', 'option') ) : ?>
                                    <li class="p-1 d-flex flex-column align-items-center">
                                        <figure class="icon icon--extra">
                                            <?php
                                            echo file_get_contents(__DIR__.'/assets/img/icon-extra.svg');
                                            ?>
                                        </figure>
                                        <span class="text-center">Extratilldelning:<br><?php echo $extra;?></span>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <main id="content" role="main">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="post">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <figure class="post-thumbnail">
                                <?php
                                echo sprintf(
                                    '<div class="post-thumbnail__background" style="background-image: url(%s)"></div>',
                                    get_thumbnail_url( $post->ID, 'placeholder' )
                                );
                                $thumbnail_meta = wp_get_attachment_metadata( get_post_thumbnail_id() );
                                echo sprintf(
                                    '<img class="lazyload blur-up" src="%s" data-srcset="%s" sizes="(min-width: 1110px) 1110px, 100vw" width="%s" height="%s">',
                                    get_thumbnail_url( $post->ID, 'placeholder' ),
                                    wp_calculate_image_srcset(
                                        array( $thumbnail_meta['width'], $thumbnail_meta['height'] ),
                                        get_thumbnail_url( $post->ID, 'thumbnail' ),
                                        $thumbnail_meta,
                                        get_post_thumbnail_id()
                                    ),
                                    $thumbnail_meta['width'],
                                    $thumbnail_meta['height']
                                );
                                ?>
                            </figure>
                        <?php endif;?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 pt-2 pb-2">
                                    <h1 class="post-title"><?php the_title();?></h1>
                                    <time class="post-timestamp mb-2 mr-3 d-flex flex-column justify-content-center align-items-center" datetime="<?php the_time('Y-m-d H:j')?>">
                                        <span class="post-timestamp__date"><?php the_time('j/n');?></span>    
                                        <span class="post-timestamp__time"><?php the_time('H:i');?></span>
                                    </time>
                                    <div class="post-content">
                                        <?php the_content();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; endif;?>
            </main>

        </div>

        <?php wp_footer(); ?>
    </body>
</html>