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
                <div class="container">
                    <div class="row">
                        <div class="bg-medium-green col-12 col-sm-4">
                            <h2 class="live-header h5 mb-1">8/10 – Live!</h2>
                            <ol class="list-unstyled">
                                <li>16:30 – Jakten avslutad</li>
                                <li>15:00 – Styckning</li>
                                <li>14:00 – Drar älgarna ur skogen</li>
                                <li>13:45 – Samling</li>
                                <li>13:25 – Drevet avslutat</li>
                            </ol>
                        </div>
                        <div class="bg-light-green col-12 col-sm-4">
                            <h2 class="h5">Var är Stefan?</h2>
                        </div>
                        <div class="bg-dark-green col-12 col-sm-4">
                            <h2 class="h5">Statistik</h2>
                            <ul class="d-flex flex-wrap justify-content-around m-0 p-0 list-unstyled">
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <img class="mb-1" src="<?php echo asset('img/icon-coffee.png');?>" width="87" height="100" alt="Fikat">
                                    <span class="text-center">Fikat:<br>0 ggr</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <img class="mb-1" src="<?php echo asset('img/icon-map.png');?>" width="87" height="100" alt="Drev">
                                    <span class="text-center">Drev:<br>Nordlinjen</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <div>
                                        <img class="mb-1" src="<?php echo asset('img/icon-adults.png');?>" width="87" height="100" alt="Vuxna älgar">
                                    </div>
                                    <span class="text-center">Vuxna:<br>0/3</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <div>
                                        <img class="mb-1" src="<?php echo asset('img/icon-small.png');?>" width="87" height="100" alt="Kalvar">
                                    </div>
                                    <span class="text-center">Kalvar:<br>0/2</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <img class="mb-1" src="<?php echo asset('img/icon-extra.png');?>" width="87" height="100" alt="Extratilldelning">
                                    <span class="text-center">Extratilldelning:<br>1/1+0/1</span>
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
                                    get_thumbnail_url($post->ID, 'thumbnail')
                                );
                                the_post_thumbnail();
                                ?>
                            </figure>
                        <?php endif;?>
                        <div class="container">
                            <div class="row">
                                <div class="col pt-2 pb-2">
                                    <h1 class="post-title"><?php the_title();?></h1>
                                    <time class="post-timestamp mb-2 mr-3 d-flex flex-column justify-content-center align-items-center" datetime="<?php the_time('Y-m-d H:j')?>">
                                        <span class="post-timestamp__date">8/10</span>    
                                        <span class="post-timestamp__time">08:55</span>
                                    </time>
                                    <?php the_content();?>
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