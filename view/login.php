<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Gestão de Encargos Didáticos</title>

  <link rel="shortcut icon" href="../img/favicon.ico" >
  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

  <div class="container">

    
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sistema de Encargos Didáticos<br><small>Seja Bem-Vindo </small></h1>
                  </div>
                  <form class="user" method="POST" action="../model/login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user"  name="masp" id="inputLogin" aria-describedby="emailHelp" placeholder="Entre com Masp">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="senha" id="inputSenha" placeholder="Senha">
                    </div>
                    <?php 
					           if (isset($_GET['l'])) {
                  ?>
                  <p style="color: #DC143C;" class="text-center">
                    <u><?php echo  $_GET['l']; ?></u>
                  </p>                            
                  <?php 
                      }
                  ?>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Lembrar Senha</label>
                      </div>
                    </div>   
                    <input value="Entrar" type="submit" class="btn btn-primary btn-user btn-block" style="color: white;">            
                  </form>
                  
                 

                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Esqueceu sua senha?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
    	  
  </div>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
