<!doctype html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                            <h2 class="live-header h3 mt-2 mb-2">Dag 1 | Måndag 8/10</h2>
                            <ol class="list-unstyled">
                                <li class="h5">16:30 – Jakten avslutad</li>
                                <li>15:00 – Styckning</li>
                                <li>14:00 – Drar älgarna ur skogen</li>
                                <li>13:45 – Samling</li>
                                <li>13:25 – Drevet avslutat</li>
                            </ol>
                        </div>
                        <div class="bg-vanilla text-dark-brown col-12 col-sm-6 col-lg-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h2 class="live-header h3 mt-2 mb-2">Live!</h2>
                                    <ul class="list-unstyled h5">
                                    <li><strong>Drev:</strong> Nordlinjen</li>
                                    <li><strong>Pass:</strong> 8</li>
                                    <li><strong>Tid:</strong> 2:25:30</li>
                                    </ul>
                                </div>
                                <a href="#" class="d-flex mt-2 flex-column align-items-center h6">
                                    <figure class="icon icon--map">
                                        <?php echo file_get_contents(__DIR__.'/assets/img/icon-map.svg');?>
                                    </figure>
                                    <span class="text-center">Hitta till Stefan</span>
                                </a>
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
                                    <span class="text-center">Fikat:<br>0 ggr</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--total-time">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-time.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Tid på pass:<br>0 h 0 min</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--observations">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-eye.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Observationer:<br>0</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--adults">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-moose.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Vuxna:<br>0/0</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--small">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-moose.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Kalvar:<br>0/0</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <figure class="icon icon--extra">
                                        <?php
                                        echo file_get_contents(__DIR__.'/assets/img/icon-extra.svg');
                                        ?>
                                    </figure>
                                    <span class="text-center">Extratilldelning:<br>0/0+0/0</span>
                                </li>
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
                                    '<img class="lazyload" src="%s" data-srcset="%s" sizes="100vw" width="%s" height="%s">',
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