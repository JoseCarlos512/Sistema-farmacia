
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
  <meta name="author" content="Incanatoit.com">
  <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">

  <title>Sistema Farmacéutico | Goliat</title>

  <!-- Icons -->
  <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="vendors/css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
  <div class="container">
      <form action="<?= base_url ?>Usuario/login" method="POST">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card-group mb-0">
                <div class="card p-4">
                  <div class="card-body">
                    <h1>Acceder</h1>
                    <p class="text-muted">Control de acceso al sistema</p>
                    <div class="input-group mb-3">
                      <span class="input-group-addon"><i class="icon-user"></i></span>
                      <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-addon"><i class="icon-lock"></i></span>
                      <input type="password" name="clave" id="clave" class="form-control" placeholder="Password">
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <button type="submit" class="btn btn-primary px-4">Acceder</button>
                      </div>
                      <div class="col-6 text-right">
                        <button type="button" class="btn btn-link px-0">Olvidaste tu password?</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                  <div class="card-body text-center">
                    <div>
                      <h2>Sistema de Gestión Farmacéutica Goliat</h2>
                      <p>Ofrecer una asistencia sanitaria de calidad, para alcanzar y mantener la salud, ofreciendo servicios farmacéuticos y productos, de forma profesional, servicial y cercana..</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="vendors/js/jquery.min.js"></script>
  <script src="vendors/js/popper.min.js"></script>
  <script src="vendors/js/bootstrap.min.js"></script>

</body>
</html>