<!DOCTYPE <html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->

   <!--Bootsrap 4 CDN-->
<!--     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 -->    
<!------ Include the above in your HEAD tag ---------->

<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 -->
   <!--Fontawesome CDN-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 -->
 <link href="../../assests/bootstrap/4.1.1/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="../../assests/bootstrap/4.1.1/bootstrap.min.js"></script>
    
    <script src="../../assests/Jquery/3.2.1/jquery.min.js"></script>
    
<!------ Include the above in your HEAD tag ---------->

   <link rel="stylesheet" href="../../assests/bootstrap/4.1.3/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="../../assests/bootstrap/4.1.3/bootstrap.min.js"></script>

   <!--Fontawesome CDN-->
   <link rel="stylesheet" href="../../assests/fontawesome/5.3.1/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   <!--Custom styles-->
   <!--<link rel="stylesheet" type="text/css" href="styles.css">-->
   <style type="text/css">
      /* Made with love by Mutiullah Samim*/

      @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


      body{
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }

    .navbar-laravel
    {
        box-shadow: 0 2px 4px rgba(0,0,0,.04);
    }

    .navbar-brand , .nav-link, .my-form, .login-form
    {
        font-family: Raleway, sans-serif;
    }

    .my-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .my-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }

    .login-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .login-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">SisSaras</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Iniciar Session</a>
                    </li>            
                </ul>
            </div>
        </div>
    </nav>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Ingreso</div>
                        <div class="card-body">
                           <div class="messages"></div>
                           <form action="../../Controlador/Usuario/c_LoginU.php" id="loginform" method="post">

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                <div class="col-md-6">
                                    <input type="text" id="txtusername" class="form-control" name="txtusername"  autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" id="txtpassword" class="form-control" name="txtpassword" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Recordar
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="addLogin" class="btn btn-primary">
                                    Iniciar
                                </button>
                               <!--  <a href="#" class="btn btn-link">
                                   Forgot Your Password?
                               </a> -->
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
</main>
</body>
<!--<script type="text/javascript" src="../../crudjs/datoslogin.js"></script>-->
</html>