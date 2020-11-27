<body class="login-page m-0 p-0" style="background-image: url(vistas/img/login.jpg); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">


 <div class="login-box" style="">
  <div class="login-logo bg-white shadow rounded-top">
    <a href="../" class="text-dark font-weight-bold mr-3"><img src="vistas/dist/img/Logo.png" alt="" style="width:45px;">
    G-PYMES</a>
  </div>
  <!-- /.login-logo -->
  <div class="card shadow rounded-bottom">
    <div class="card-body login-card-body">
      <p class="login-box-msg font-weight-bold h5">Ingreso al Sistema</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="ing_correo" class="form-control " placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-5">
          <input type="password" name="ing_password" id="password" class="form-control" placeholder="Contraseña" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span id="Eye" class="fas fa-eye"  class="btn" type="button"></span>
            </div>
           
          </div>
        </div>
         <div class="col-12 text-center my-3">
             <label>¿Olvídaste <a href="password" class="text-primary active"> Tu Contraseña</a>?</label>
        </div>

        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <div class="row">
              
              <div class="col-12 mb-3">
               <button type="submit" class="btn btn-warning btn-block text-uppercase font-weight-bold">Ingresar</button>
              </div>

              <div class="col-6">
                <a href="../" class="btn btn-danger btn-block">Volver</a>
              </div>
              <div class="col-6">
                <a href="../registro.php" class="btn btn-success btn-block">Registrarse</a>
              </div>              

            </div>
          </div>
          <!-- /.col -->
        </div>

        <?php
              $login = new ControladorUsuarios();
              $login->ctrIngreso();
        ?>

      </form>




    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>
  document.getElementById('Eye').addEventListener('click', function(){
  var icon = document.getElementById('Eye');
  icon.classList.toggle('fa-eye-slash');
  var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
          
      }else{
          tipo.type = "password";
          
      }
})


</script>


</body>
