<div class="login-box">
  <div class="login-logo">
    <style>
      .first-title {
        color: white;
      }
      .first-title b {
        color: #fffc00;
      }
    </style>
    <p class="first-title">Sagrado <b>Agave</b></p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Bienvenido</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control userInput" placeholder="Usuario" name="user" required autocomplete="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control passInput" placeholder="Password" name="password" autocomplete="current-password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span onclick="see()" class="fas fa-eye-slash" id="loc"></span>
            </div>
            <script>
              var eye = document.querySelector(".passInput")
              var lo = document.querySelector("#loc")
              var band = false;
              function see() {
                if(!band){
                  eye.setAttribute('type','text')
                  lo.classList.remove("fa-eye-slash")
                  lo.classList.add("fa-eye")
                  band = true;
                }else {
                  eye.setAttribute('type','password')
                  band = false;
                  lo.classList.add("fa-eye-slash")
                  lo.classList.remove("fa-eye")
                }

              }
            </script>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Inicia sesión</button>
          </div>
          <!-- /.col -->
        </div>
        
        <?php 

          $login = new ControladorUsuarios();
          $login -> ctrLogin();

         ?>

      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->