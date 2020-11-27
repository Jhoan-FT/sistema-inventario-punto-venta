<body class="login-page m-0 p-0" style="background-image: url(vistas/img/login.jpg); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">


 <div class="login-box" style="">
  <div class="login-logo bg-white shadow rounded-top">
    <a href="../" class="text-dark font-weight-bold mr-3"><img src="vistas/dist/img/Logo.png" alt="" style="width:45px;">
    G-PYMES</a>
  </div>
  <!-- /.login-logo -->
  <div class="card shadow rounded-bottom">
    <div class="card-body login-card-body">
      <p class="login-box-msg font-weight-bold h5">Recuperar Contraseña</p>

      <form method="post">
              <div class="input-group mb-5">
          <input type="email" name="ing_correo" class="form-control " placeholder="Ingrese su Email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <div class="row">
              
              <div class="col-12 mb-3">
               <button type="submit" class="btn btn-success btn-block text-uppercase font-weight-bold">Recuperar</button>
              </div>

              <div class="col-12">
                <a href="login" class="btn btn-block"><u>Iniciar Sesión</u></a>
              </div>             

            </div>
          </div>
          <!-- /.col -->
        </div>

         <?php
            $login = new ControladorUsuarios();
            $login -> ctrRecuperaContrasena();

        ?>

      </form>




    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
