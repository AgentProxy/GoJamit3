<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GOJAMMIT!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" />
        <script src="<?php echo e(asset('js/app.js')); ?>" ></script>
        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                /*font-family: 'Fjalla One', sans-serif;*/
                font-family: 'Roboto Condensed', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                position: relative;
                background: rgba(0,0,0,0);

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 20px;
                top: 18px;
                color: #4C5052;
            }

            .content {
                text-align: center;
            }

            .title img{
                width: 290px;
                height: 290px;
            }

            .insertLogo{                
                animation-name: start_page;
                animation-duration: 1s;
                animation-timing-function: linear;
            }

            .illuminateLogo{
                opacity: 0.8;
                /*filter: invert(100%);*/
                border-radius: 50%;
                box-shadow: 0 0 0 rgba(255,255,255,0);
                animation-name: shine_img;
                animation-duration: 0.25s;
                animation-delay: 1s;
                animation-iteration-count: infinite;
                animation-direction: alternate;
                animation-timing-function: ease;
            }

            .title > h1{
                font-size: 4.5em;
                font-family: 'Raleway', sans-serif;
                font-weight: bold;
                opacity: 0.8;
                color: rgb(255, 255, 255);
                text-shadow: 0 0 1em rgba(0,0,0,0.3);
                font-weight: bold;
            }

            .links > .btn {
                padding: 10px 15px;
                color: white;
                font-weight: 600;
                letter-spacing: 0.05em;
                border: 1px solid rgba(0,0,0,0);
                text-decoration: none;
            }

            .links .btn-trans:hover{
                color: white;
                border-color: white;
                background-color: rgba(231, 227, 255, 0.5);
            }

            .links .btn-trans{
                background-color: rgba(255, 255, 255, 0.3);
            }

            .links .btn-opaque{
                background-color: rgb(13,13,13);
                color: white;
            }
/*
            #carousel_background, #carousel_background .carousel-inner,
            #carousel_background .item{
                width: 100%;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .one{
                background-image: url("/img-uploads/picture1.jpg");
            }

            .two{
                background-image: url("/img-uploads/picture2.jpg");
            }

            .three{
                background-image: url("/img-uploads/picture3.jpg");
            }*/

            #carousel_text{
                height: 100px;
            }

            .backdrop{
                filter: brightness(75%);
                width: 100%;
                height: 100%;
                background-image: url("/img-uploads/picture1.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                position: absolute;
            }


            @keyframes  start_page{
                0%{
                    width: 100%;
                    height: 100%;
                    opacity: 0;
                }
                100%{
                    width: 300px;
                    height: 300px;
                    opacity: 0.7
                }
            }

            @keyframes  shine_img{
                0%{
                    box-shadow: 0 0 0 rgba(255,255,255,0);
                }
                100%{
                    transform: scale(1.025,1.025);
                    box-shadow: 0 0 10em rgba(255,255,255,1);
                }
            }

            @keyframes  drop_text{
                0%{
                    top: -100px;
                }
                100%{
                    top: 300px;
                }
            }
        </style>
    </head>
    <body>
<!--         <div id="carousel_background" class="carousel slide affix" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active one">
                    <div class="carousel-caption">
                        <h3>Discover</h3>
                        <p>Beautiful flowers in Kolymbari, Crete.</p>
                    </div>
                </div>
                <div class="item two">
                    <div class="carousel-caption">
                        <h3>Meet</h3>
                        <p>Beautiful flowers in Kolymbari, Crete.</p>
                    </div>
                </div>
                <div class="item three">
                    <div class="carousel-caption">
                        <h3>Enjoy</h3>
                        <p>Beautiful flowers in Kolymbari, Crete.</p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="backdrop"></div>
        <div class="flex-center position-ref full-height">
             <?php if(Route::has('login')): ?>`
                <?php if(!Auth::check()): ?>
                    <p class="top-right">Don't have an account? <a href="<?php echo e(url('/register')); ?>">Sign Up</a></p>
                <?php endif; ?>
            <?php endif; ?>
            <div class="content">
                <div class="title">
                    <span class="insertLogo"><img id="logo" class="illuminateLogo" src="/img-uploads/gojammitWhiteLogo.png" /></span>
                    <h1>GOJamIt!</h1>
                </div>
                <div class="links">
                    <?php if(Auth::check()): ?>
                        <a class="btn btn-default btn-trans" href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a class="btn btn-default btn-trans" href="<?php echo e(url('/login')); ?>">Login</a>
                        <a class="btn btn-default btn-trans" href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
                <div id="carousel_text" class="carousel slide affix" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active one">
                            <div class="carousel-caption">
                                <h3>Discover</h3>
                                <p>Beautiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item two">
                            <div class="carousel-caption">
                                <h3>Meet</h3>
                                <p>Beautiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                        <div class="item three">
                            <div class="carousel-caption">
                                <h3>Enjoy</h3>
                                <p>Beautiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(Route::has('login')): ?>`
            <?php endif; ?>
        </div>
    </body>
</html>
