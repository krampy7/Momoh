<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registrarse</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">

  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Righteous&display=swap" rel="stylesheet">  

  <style type="text/css">
    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: 0.75rem;
    }

    h3{
      font-family: 'Pacifico', cursive;
      font-size: 700%;
    }

    .login,
    .image {
      min-height: 100vh;
    }

    .bg-image {
      background-image: url("img/sign.jpg");
      background-size: cover;
      background-position: center;
    }

    .login-heading {
      font-weight: 300;
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
      border-radius: 2rem;
    }

    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x);
      height: auto;
      border-radius: 2rem;
    }

    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      cursor: text;
      /* Match the input under the label */
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-moz-placeholder {
      color: transparent;
    }

    .form-label-group input::placeholder {
      color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }

    /* Fallback for Edge
    -------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }

    /* Fallback for IE
    -------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input:-ms-input-placeholder {
        color: #777;
      }
    }
  </style>

</head>

<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">Registrarse</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="index.html">Momoh</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="store.php">Tienda Online</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Bienvenido</h3>

                <!-- Etiqueta form para crear el formulario del registro a partir del metodo POST -->
                <form action="sign_back.php" method="POST">
                  <div class="form-label-group">
                    <input type="text" name="inputNickname" id="inputNickname" class="form-control" placeholder="" required autofocus>
                    <label for="inputNickname">Nombre de usuario</label>
                  </div>
                  <div class="form-label-group">
                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="" required>
                    <label for="inputPassword">Contraseña</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" name="inputName" id="inputName" class="form-control" placeholder="" required>
                    <label for="inputName">Nombre completo</label>
                  </div>
                  <div class="form-label-group">
                    <input type="date" name="inputDate" id="inputDate" class="form-control" placeholder="" required>
                    <label for="inputDate">Fecha de nacimiento</label>
                  </div>                  
                  <div class="form-label-group">
                    <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="" required>
                    <label for="inputEmail">Email</label>
                  </div>

                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Registrarse</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/StudioMomoh">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/studiomomoh/">
            <i class="icon-social-instagram"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="whatsapp.html">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; Studio Momoh</p>
    </div>
  </footer>

  <!-- Scroll to Top Button--> 
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>

</body>
</html>