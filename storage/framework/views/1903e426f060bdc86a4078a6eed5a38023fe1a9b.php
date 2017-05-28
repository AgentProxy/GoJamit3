<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <?php echo $__env->yieldContent('head'); ?>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <style type="text/css">

        .navbar-brand{
            font-size: 20px;
            font-weight: bold;
        }

        .navbar-brand:hover{
            background-color: rgb(0,0,0);
        }

        .navbar{
            margin-bottom: 0;
            background-color: rgb(15, 15, 15);

        }

        .nav-user *{
            float: left;
        }

        .navbar-brand img,
        .nav-user img{
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-right: 0.5em;
            position: absolute;
        }

        .navbar-brand span,
        .nav-user{
            display: inline-flex;
            /*justify-content: center;*/
            align-items: center;
        }

        .navbar-brand p,
        .nav-user > p{
            margin: 0 0 0 35px;
        }

        .nav{
            font-weight: bold;
        }


    </style>

    <!-- Scripts -->
    <script type="text/javascript" src="/js/js.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/">
                        <span>                        
                            <img class="logo" src="/img-uploads/gojammitLogo.png" /> 
                            <p>GOJamIt!</p>
                        </span>
                    </a>
                </div>
                <?php if(Auth::guest()): ?>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                    </ul>
                </div>
                <?php else: ?>
                <div class="navbar-left">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li>
                            <a href="/discover_intro/<?php echo e(Auth::user()->username); ?>">Discover</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">Messages <span class="badge">0</span></a>
                        </li>
                        <li>
                            <a href="#">Notifications <span class="badge">0</span></a> 
                        </li>
                         <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="nav-user">
                                    <?php if(Auth::user()->prof_pic == null): ?>
                                    <img src="/img-uploads/maleDefault.png"/>
                                    <?php else: ?>
                                    <img src="<?php echo e(Auth::user()->prof_pic); ?>"/>
                                    <?php endif; ?>
                                    <p><?php echo e(Auth::user()->fname); ?></p>
                                    <span class="caret"></span>
                                </span>
                            </a>
                             <ul class="dropdown-menu" role="menu">
                                <li><a href="/profile/<?php echo e(Auth::user()->username); ?>/about">My profile</a></li>
                                <li><a href="/profile/<?php echo e(Auth::user()->username); ?>/settings">Settings</a></li>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
