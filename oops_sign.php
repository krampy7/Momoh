<!DOCTYPE html>

<!-- Pagina basica con etiquetas div y uso de CSS con la función de informar al usuario  que sus datos son incorrectos y se le facilitara regresar a la pagina de registro -->

<html>
<head>
  <title>Oops!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style type="text/css">
    header {
    position: relative;
    background-color: black;
    height: 75vh;
    min-height: 25rem;
    width: 100%;
    overflow: hidden;
  }

  header video {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: 0;
    -ms-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
  }

  header .container {
    position: relative;
    z-index: 2;
  }

  header .overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: black;
    opacity: 0.5;
    z-index: 1;
  }

  @media (pointer: coarse) and (hover: none) {
    header {
      background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
    }
    header video {
      display: none;
    }
  }
  </style>
</head>

  <body>
    <header>
      <div class="overlay"></div>
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="video/color.mp4" type="video/mp4">
      </video>
      <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
          <div class="w-100 text-white">
            <h1 class="display-3">Esa cuenta ya existe</h1>
            <a href="sign.php"><p class="lead mb-0">Regresar</p></a>
          </div>
        </div>
      </div>
    </header>

    <section class="my-5">
      <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto">
              <p>Oops, parece que el nombre de usuario que colocaste ya esta siendo usado, por favor ingresa otro.</p>
            </div>
          </div>
        </div>
    </section>
  </body>
</html>
