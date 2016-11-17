<body class="hold-transition login-page">
    <header class="navbar navbar-fixed-top navbar-empty">
      <div class="container">
      <div class="center-logo">
         Roinn
      <svg width="36" height="36" id="tanuki-logo">

      </svg>
      </div>
      </div>
      </header>
      <div class="col-lg-12">
        <div class="col-lg-7 login-afdeling">
        <h1 class="h1-login">
          Roinn
        </h1>

        <p class="parrafo-login"><strong>Roinn es un sistema de Administración de gastos comunes que revolucionará la forma de cómo se realiza la administración. En Afdeling usted puede encontrar:</strong></p>

        <ul>
        <li>
        <a href="https://gitlab.com/explore/projects/trending">Administración de gastos comunes</a></li>
        <li><a href="https://about.gitlab.com/gitlab-com/" rel="nofollow noreferrer" target="_blank">Plataforma oriendata al propietario del departamento</a></li>
        <li><a href="https://gitlab.com/gitlab-com/support-forum/issues">Fácil forma de pago a través de WebPay</a></li>
        </ul>
      </div>

      <div class="col-lg-5">
        <div class="login-box ">
          <div class="login-logo">
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Eres usuario? Entra!</p>
            <?php if($this->session->flashdata('error')){ ?>
              <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Ups!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
              <?php }?>
              <?php if (validation_errors()){?>
              <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo validation_errors(); ?>
                </div>
             <?php } ?>
            <?php echo form_open(); ?>
              <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Remember Me
                    </label>
                  </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <?php echo form_submit('submit', 'Log in', 'class="btn btn-primary btn-block btn-flat"'); ?>
                </div><!-- /.col -->
              </div>
            <?php echo form_close(); ?>

            <a href="#">I forgot my password</a><br>

          </div><!-- /.login-box-body -->
         </div>

          <div class="login-box" style="margin-top:0px;">
          <!-- register-box -->
          <div class="register-box-body">
          <p class="login-box-msg">Nuevo usuario? Crea una cuenta</p>
          <?php if($this->session->flashdata('error')){ ?>
              <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Ups!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
              <?php }?>
              <?php if (validation_errors()){?>
              <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo validation_errors(); ?>
                </div>
             <?php } ?>
            <?php echo form_open(); ?>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Full name">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Retype password">
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <?php echo form_submit('submit', 'Register', 'class="btn btn-primary btn-block btn-flat"'); ?>
              </div>
              <!-- /.col -->
            </div>
           <?php echo form_close(); ?>
        </div>
        <!-- /.register-box -->

        </div><!-- /.login-box -->
      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>