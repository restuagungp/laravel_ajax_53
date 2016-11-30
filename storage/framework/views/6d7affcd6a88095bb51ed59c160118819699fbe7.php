<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="icon.jpg">
        <link rel="stylesheet" href="<?php echo e(elixir('css/bttwelcome.css')); ?>">
        <script src="<?php echo e(elixir('js/modernbtt.js')); ?>"></script>
        <title>Laravel 5.3</title>

        <!-- Fonts -->
        <link href="<?php echo e(elixir('css/font-family.css')); ?>" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .links a{padding:5px 20px;transition:ease-in 0.7s}
            .links a:hover{padding:10px 20px;background:#DADBDC;transition:ease-in 0.2s;}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md" style="border-bottom:1px solid gray;padding-bottom:20px;margin-bottom:-20px">
                    Laravel 5.3
                </div>
                <br/><br/>
                <div class="links">
                    <a href="<?php echo e(route('kendaraan.index')); ?>">CRUD</a>
                    <a href="<?php echo e(route('kendaraan-ajax-modal.index')); ?>">CRUD-AJAX::MODAL</a>
                    <a href="<?php echo e(route('kendaraan-ajax-show.index')); ?>">CRUD-AJAX::SHOW-HIDE</a>
                </div>
                <br/><br/><br/><br/><br/><br/><br/>
            </div>
        </div>
        <a class="cd-top">Documentation by restu  </a>
    </body>
    <script src="<?php echo e(elixir('js/mainbtt.js')); ?>"></script>
</html>
