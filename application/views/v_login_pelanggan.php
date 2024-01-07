<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="register-box" style="margin-top: 200px;">
<div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Login Customer</p>

      <?php 
      echo validation_errors('<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>','</div>');

      if ($this->session->flashdata('pesan')) {
        echo'<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
        echo $this->session->flashdata('pesan');
        echo'</div>';
      }

      if ($this->session->flashdata('error')) {
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-times"></i> Error!</h5>';
        echo $this->session->flashdata('error');
        echo'</div>';
      }

      echo form_open('pelanggan/login'); ?>
        <div class="input-group mb-3">
          <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <button type="button" class="btn btn-default show-password-btn">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <div class="input-group-append">
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>

        <a href="<?= base_url('pelanggan/lupa_pass') ?>" class="text-center">Lupa Password</a><br>
      <a href="<?= base_url('pelanggan/register') ?>" class="text-center">I Don't Have an Account!!!</a>
    </div>
    <!-- /.form-box -->
</div>
</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var showPasswordBtn = document.querySelector('.show-password-btn');
    var passwordInput = document.querySelector('input[name="password"]');

    showPasswordBtn.addEventListener('click', function() {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
      } else {
        passwordInput.type = 'password';
        showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
      }
    });
  });
</script>
