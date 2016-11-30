<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="icon" type="image/jpg" href="icon.jpg">
    <link rel="stylesheet" href="<?php echo e(elixir('css/btt.css')); ?>">
    <script src="<?php echo e(elixir('js/modernbtt.js')); ?>"></script>

    <title>CRUD</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(elixir('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(elixir('css/font-family.css')); ?>">
    <!-- Styles -->
    
    <!-- jquery -->
    <script src="<?php echo e(elixir('js/jquery.min.js')); ?>"></script>
    <!--autocomplete-->
    <link rel="stylesheet" href="<?php echo e(elixir('css/jquery.ui.autocomplete.css')); ?>">
    <script src="<?php echo e(elixir('js/jquery-ui.min.js')); ?>"></script>    
    <!--bootstrap validator-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(elixir('bootstrapvalidator/dist/css/formValidation.css')); ?>">
    <script type="text/javascript" src="<?php echo e(elixir('bootstrapvalidator/dist/js/formValidation.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(elixir('bootstrapvalidator/dist/js/framework/bootstrap.js')); ?>"></script>
    <!--images show slide on click-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(elixir('css/image-show-slider.css')); ?>">
    <script type="text/javascript" src="<?php echo e(elixir('css/image-show-slider.js')); ?>"></script>
    <style>
        body { font-family: 'Lato'; }
        .fa-btn { margin-right: 6px; }
        #image_preview{ margin-left: 0;}
        .btn-warning, .btn-danger, .btn-primary{
            transition:ease-out 0.3s;
        }.btn-warning:hover{
            transition:ease-out 0.3s;border:1px solid #C98200;background: #C98200;
        }.btn-danger:hover{
            transition:ease-out 0.3s;border:1px solid #980000;background: #980000;
        }.btn-primary:hover{
            transition:ease-out 0.3s;border:1px solid #020276;background: #020276;
        }
        .total{ margin-top:20px;color:#636363;padding-top:7px;padding-bottom:7px;text-align:center;border-top:1px solid #C0C0C0;border-bottom:2px solid #C0C0C0
        }
        .btn-img{ transition: ease-out 1s;
        }.btn-img:hover{
            transition: ease-out 0.2s;box-shadow: 0px 0px 5px 1px #9191AA;
        }
        nav ul{
            padding:10px 0;
        }
        nav li{
            transition:ease-out .7s;padding:0px 0;border-right:1px solid #DCDCDC;
        }nav li:hover{
            transition:ease-out .2s;padding:0px 0px 0px 0;background: #DCDCDC;border-right:1px solid #DCDCDC;
        }
        .pdf{
            border:none;background: transparent;color:#41416A;
            border-bottom:2px solid #5E68B0;
            border-top:1px solid #5E68B0;
            border-radius:6px;
            transition:ease-out 0.1s;padding-right:60px;padding-left:15px;
        }.pdf:hover{
            transition:ease-out 0.2s;padding-right:70px;padding-left:20px;
            border-bottom:2px solid #3F3FD3;
            border-top:1px solid #6060F8;
        }
    </style>

    
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom:30px">
        <div class="container" style="margin-left:0;padding-left:0">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="menu"><a href="<?php echo e(url('/')); ?>" style="font-weight:bold">LARAVEL 5.3</a></li>
                     <li><a href="<?php echo e(url('/kendaraan')); ?>">CRUD</a></li>
                     <li><a href="<?php echo e(url('/kendaraan-ajax-modal')); ?>">CRUD-AJAX::MODAL</a></li>
                     <li><a href="<?php echo e(url('/kendaraan-ajax-show')); ?>">CRUD-AJAX::SHOW-HIDE</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <a class="cd-top">restu  </a> <!-- untuk menampilkan btt -->
    <!-- image preview -->
    <script type="text/javascript" src="<?php echo e(elixir('js/preview_images.js')); ?>"></script>
    <!-- pagination -->
    <script type="text/javascript" src="<?php echo e(elixir('js/pagination.js')); ?>"></script>
    <!-- validator -->
    <script type="text/javascript" src="<?php echo e(elixir('js/validator.min.js')); ?>"></script>
    <!-- JavaScripts -->
    <script type="text/javascript" src="<?php echo e(elixir('js/bootstrap.min.js')); ?>"></script>
    <!-- notification -->
    <script type="text/javascript" src="<?php echo e(elixir('js/toastr.min.js')); ?>"></script>
    <link  rel="stylesheet" href="<?php echo e(elixir('css/toastr.css')); ?>">

    
    <script type="text/javascript" src="<?php echo e(elixir('js/mainbtt.js')); ?>"></script>
</body>
</html>