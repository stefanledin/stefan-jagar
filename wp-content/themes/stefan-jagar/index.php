<!doctype html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="site-wrapper">

            <header class="site-header">
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
                        <div class="col-12 col-sm-6">
                            <h2>8/10 – Live!</h2>
                            <ol class="list-unstyled">
                                <li>16:30 – Jakten avslutad</li>
                                <li>15:00 – Styckning</li>
                                <li>14:00 – Drar älgarna ur skogen</li>
                                <li>13:45 – Samling</li>
                                <li>13:25 – Drevet avslutat</li>
                            </ol>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="d-flex flex-wrap justify-content-around m-0 p-0 list-unstyled">
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <img src="<?php echo asset('img/icon-coffee.png');?>" width="87" height="100" alt="Fikat">
                                    <span class="text-center">Fikat:<br>0 ggr</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <img src="<?php echo asset('img/icon-map.png');?>" width="87" height="100" alt="Drev">
                                    <span class="text-center">Drev:<br>Nordlinjen</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <div>
                                        <img src="<?php echo asset('img/icon-adults.png');?>" width="87" height="100" alt="Vuxna älgar">
                                    </div>
                                    <span class="text-center">Vuxna:<br>0/3</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <div>
                                        <img src="<?php echo asset('img/icon-small.png');?>" width="87" height="100" alt="Kalvar">
                                    </div>
                                    <span class="text-center">Kalvar:<br>0/2</span>
                                </li>
                                <li class="p-1 d-flex flex-column align-items-center">
                                    <img src="<?php echo asset('img/icon-extra.png');?>" width="87" height="100" alt="Extratilldelning">
                                    <span class="text-center">Extratilldelning:<br>1/1+0/1</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <main id="content" role="main">
                <article class="post">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="post-title">Kronskogen, pass 7</h1>
                                <div class="">
                                    <div class="post-timestamp mr-3 d-flex flex-column justify-content-center align-items-center">
                                        <time class="post-timestamp__date">8/10</time>
                                        <time class="post-timestamp__time">08:55</time>
                                    </div>
                                    <p>
                                        Jakten kan vara över, men det vet vi inte än. Just nu är det ingen jakt i väntan på skottplatsundersökning. Om det påskjutna djuret konstateras vara oskadat så fortsätter vi. Om det är träffat så måste vi få tag på det. Grannlaget underrättas om att en eventuellt påskjuten kviga kan vara på väg dit från vårt håll.
                                    </p>
                                    <p>
                                        Hur som haver, att sitta och fika i vindstilla solsken under dels en klarblå himmel och dels under en knallgul björk skadar inte!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>

        </div>

        <?php wp_footer(); ?>
    </body>
</html>