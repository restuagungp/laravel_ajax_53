<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="icon" type="image/jpg" href="icon.jpg">
    <link rel="stylesheet" href="<?php echo e(elixir('css/btt.css')); ?>">
    <script src="<?php echo e(elixir('js/modernbtt.js')); ?>"></script>

    <title>LOGIN</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(elixir('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(elixir('css/font-family.css')); ?>">
    <!-- Styles -->
    
    <!-- jquery -->
    <script src="<?php echo e(elixir('js/jquery.min.js')); ?>"></script>
    <!--bootstrap validator-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(elixir('bootstrapvalidator/dist/css/formValidation.css')); ?>">
    <script type="text/javascript" src="<?php echo e(elixir('bootstrapvalidator/dist/js/formValidation.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(elixir('bootstrapvalidator/dist/js/framework/bootstrap.js')); ?>"></script>
    <!-- validator -->
    <script type="text/javascript" src="<?php echo e(elixir('js/validator.min.js')); ?>"></script>
    
    
    <style>
    @import  url(http://fonts.googleapis.com/css?family=Tenor+Sans);
html {
  background-color: #39556A;
  font-family: "Tenor Sans", sans-serif;
}

.container {
  width:100%;
  height: 400px;
  margin: 0 auto;
}

.login {
  padding-top: 100px;
  width: 450px;
  margin:0 auto;
}

.login-heading {
  font: 1.8em/48px "Tenor Sans", sans-serif;
  color: white;
  margin-bottom: 40px;
}

.input-txt {
  width: 100%;
  padding: 20px 10px;
  background: #39556A;
  border: none;
  font-size: 1em;
  color: white;
  border-bottom: 1px dotted rgba(250, 250, 250, 0.4);
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -moz-transition: background-color 0.5s ease-in-out;
  -o-transition: background-color 0.5s ease-in-out;
  -webkit-transition: background-color 0.5s ease-in-out;
  transition: background-color 0.5s ease-in-out;
}
.input-txt:-moz-placeholder {
  color: #81aac9;
}
.input-txt:-ms-input-placeholder {
  color: #81aac9;
}
.input-txt::-webkit-input-placeholder {
  color: #81aac9;
}
.input-txt:focus {
  background-color: #4478a0;
}

.login-footer {
  margin: 10px 0;
  overlow: hidden;
  float: left;
  width: 100%;
}

.btn {
  padding: 15px 30px;
  border: none;
  background: white;
  color: #39556A;
}

.btn--right {
  float: right;
}

.icon {
  display: inline-block;
}

.icon--min {
  font-size: .9em;
}

.lnk {
  padding-left: 10px;
  font-size: 1em;
  line-height: 3em;
  color: #ddd;
  text-decoration: none;
}
.lnk:hover {
  color:#eee;
  text-decoration: underline;
}
</style>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="container" style="background:#39556A">
  <div class="login">
    <h1 class="login-heading">Please login</h1>
      <?php echo Form::open(array('url'=>'getlogin', 'method'=>'get','class'=>'form-horizontal')); ?>

        <input type="text" name="user" placeholder="Username" required="required" class="input-txt" />
          <input type="password" name="pass" placeholder="Password" required="required" class="input-txt" />
          <div class="login-footer">
             <a href="#" class="lnk">*forgotten acount</a>
            <button type="submit" class="btn btn--right">Sign in  </button>
    
          </div>
      <?php echo Form::close(); ?>

  </div>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
