<?php
session_start();
if(isset($_SESSION['admin'])){
  header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>

<style>
/* ===== Custom Login UI Enhancements ===== */
body.login-page {
  background: linear-gradient(135deg, #4e73df, #1cc88a);
  min-height: 100vh;
}

.login-box {
  margin-top: 8%;
}

.login-logo b {
  color: #ffffff;
  font-size: 34px;
  letter-spacing: 1px;
}

.login-box-body {
  border-radius: 12px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.2);
  padding: 30px;
}

.login-box-msg {
  font-size: 16px;
  color: #555;
  margin-bottom: 25px;
}

.form-control {
  border-radius: 8px;
  height: 45px;
}

.btn-flat {
  border-radius: 8px;
  height: 45px;
  font-size: 16px;
  font-weight: 600;
}

.callout-danger {
  border-radius: 8px;
  margin-top: 15px;
}

.input-group-addon {
  border-radius: 8px 0 0 8px;
}

.footer-text {
  text-align: center;
  margin-top: 15px;
  color: #eee;
  font-size: 13px;
}
</style>

<body class="hold-transition login-page">

<div class="login-box">
  
  <div class="login-logo">
    <b>🗳 VoteSphere</b>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Login to manage elections securely</p>

    <form action="login.php" method="POST">
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">
            <i class="fa fa-sign-in"></i> Sign In
          </button>
        </div>
      </div>

    </form>

    <?php
    if(isset($_SESSION['error'])){
      echo "
        <div class='callout callout-danger text-center'>
          <p>".$_SESSION['error']."</p>
        </div>
      ";
      unset($_SESSION['error']);
    }
    ?>

  </div>

  <div class="footer-text">
    © <?php echo date('Y'); ?> Secure Voting System
  </div>

</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
