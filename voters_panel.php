<<<<<<< HEAD
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
/* ===== PAGE BACKGROUND ===== */
body.layout-top-nav{
  min-height:100vh;
  background:
    radial-gradient(circle at top left, #dbeafe, transparent 40%),
    radial-gradient(circle at bottom right, #dcfce7, transparent 40%),
    linear-gradient(135deg, #eef2f7, #dbe4f0);
  font-family: 'Segoe UI', system-ui, -apple-system;
}

/* Remove AdminLTE white */
/* Smooth feel */
*{
  transition: all .25s ease;
}

.content-wrapper{
	/* radial-gradient(circle at top left, #639de9ff, transparent 40%),
    radial-gradient(circle at bottom right, #19552eff, transparent 40%),
    linear-gradient(135deg, #77b0f5ff, #0c1b30ff); */
  background: #cef4f5ff;
}
/* ===== TITLE ===== */
.title{
  margin-bottom:35px;
  letter-spacing:2px;
  font-weight:700;
}

/* ===== CENTER CARD ===== */
.center-card{
  background:rgba(255,255,255,.92);
  border-radius:18px;
  padding:40px 35px;
  box-shadow:0 25px 60px rgba(0,0,0,.45);
  text-align:center;
}

/* ===== TEXT ===== */
.center-card h3{
  font-weight:600;
  margin-bottom:10px;
  color:#111827;
}

.center-card p{
  color:#475569;
  font-size:15px;
  margin-bottom:25px;
}

/* ===== BUTTONS ===== */
.btn-flat{
  border-radius:10px;
  font-weight:600;
  padding:12px 28px;
}

.btn-primary{
  background: #2563eb;
  border:none;
}

.btn-success{
  background: #16a34a;
  border:none;
}

.btn-primary:hover,
.btn-success:hover{
  opacity:.9;
}

/* ===== ALERTS ===== */
.alert{
  border-radius:12px;
}
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>

<div class="content-wrapper">
<div class="container">

<section class="content">

<?php
$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
$title = $parse['election_title'];
?>

<h1 class="page-header text-center title">
  <?php echo strtoupper($title); ?>
</h1>

<div class="row">
<div class="col-sm-8 col-sm-offset-2">

<!-- ALERTS -->
<?php
if(isset($_SESSION['error'])){
?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<ul>
<?php foreach($_SESSION['error'] as $error){ echo "<li>$error</li>"; } ?>
</ul>
</div>
<?php unset($_SESSION['error']); } ?>

<?php
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<i class='fa fa-check'></i> ".$_SESSION['success']."
</div>";
unset($_SESSION['success']);
}
?>

<div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<span class="message"></span>
</div>

<?php
$sql = "SELECT * FROM votes WHERE voters_id='".$voter['id']."'";
$vquery = $conn->query($sql);
?>

<div class="center-card">

<?php if($vquery->num_rows > 0){ ?>

  <!-- ALREADY VOTED -->
  <h3><i class="fa fa-check-circle text-success"></i></h3>
  <h3>You have already voted</h3>
  <p>Thank you for participating in this election.</p>
  <a href="#view" data-toggle="modal" class="btn btn-primary btn-flat btn-lg">
    View Ballot
  </a>

<?php } else { ?>

  <!-- CAN VOTE -->
  <h3>Welcome, <?php echo $voter['firstname'].' '.$voter['lastname']; ?> 👋</h3>
  <p>You are eligible to vote in this election.</p>
  <a href="home.php" class="btn btn-success btn-flat btn-lg">
    Vote Now
  </a>

<?php } ?>

</div>

</div>
</div>

</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/ballot_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
=======
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
/* ===== PAGE BACKGROUND ===== */
body.layout-top-nav{
  min-height:100vh;
  background:
    radial-gradient(circle at top left, #dbeafe, transparent 40%),
    radial-gradient(circle at bottom right, #dcfce7, transparent 40%),
    linear-gradient(135deg, #eef2f7, #dbe4f0);
  font-family: 'Segoe UI', system-ui, -apple-system;
}

/* Remove AdminLTE white */
/* Smooth feel */
*{
  transition: all .25s ease;
}

.content-wrapper{
	/* radial-gradient(circle at top left, #639de9ff, transparent 40%),
    radial-gradient(circle at bottom right, #19552eff, transparent 40%),
    linear-gradient(135deg, #77b0f5ff, #0c1b30ff); */
  background: #cef4f5ff;
}
/* ===== TITLE ===== */
.title{
  margin-bottom:35px;
  letter-spacing:2px;
  font-weight:700;
}

/* ===== CENTER CARD ===== */
.center-card{
  background:rgba(255,255,255,.92);
  border-radius:18px;
  padding:40px 35px;
  box-shadow:0 25px 60px rgba(0,0,0,.45);
  text-align:center;
}

/* ===== TEXT ===== */
.center-card h3{
  font-weight:600;
  margin-bottom:10px;
  color:#111827;
}

.center-card p{
  color:#475569;
  font-size:15px;
  margin-bottom:25px;
}

/* ===== BUTTONS ===== */
.btn-flat{
  border-radius:10px;
  font-weight:600;
  padding:12px 28px;
}

.btn-primary{
  background: #2563eb;
  border:none;
}

.btn-success{
  background: #16a34a;
  border:none;
}

.btn-primary:hover,
.btn-success:hover{
  opacity:.9;
}

/* ===== ALERTS ===== */
.alert{
  border-radius:12px;
}
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>

<div class="content-wrapper">
<div class="container">

<section class="content">

<?php
$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
$title = $parse['election_title'];
?>

<h1 class="page-header text-center title">
  <?php echo strtoupper($title); ?>
</h1>

<div class="row">
<div class="col-sm-8 col-sm-offset-2">

<!-- ALERTS -->
<?php
if(isset($_SESSION['error'])){
?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<ul>
<?php foreach($_SESSION['error'] as $error){ echo "<li>$error</li>"; } ?>
</ul>
</div>
<?php unset($_SESSION['error']); } ?>

<?php
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<i class='fa fa-check'></i> ".$_SESSION['success']."
</div>";
unset($_SESSION['success']);
}
?>

<div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<span class="message"></span>
</div>

<?php
$sql = "SELECT * FROM votes WHERE voters_id='".$voter['id']."'";
$vquery = $conn->query($sql);
?>

<div class="center-card">

<?php if($vquery->num_rows > 0){ ?>

  <!-- ALREADY VOTED -->
  <h3><i class="fa fa-check-circle text-success"></i></h3>
  <h3>You have already voted</h3>
  <p>Thank you for participating in this election.</p>
  <a href="#view" data-toggle="modal" class="btn btn-primary btn-flat btn-lg">
    View Ballot
  </a>

<?php } else { ?>

  <!-- CAN VOTE -->
  <h3>Welcome, <?php echo $voter['firstname'].' '.$voter['lastname']; ?> 👋</h3>
  <p>You are eligible to vote in this election.</p>
  <a href="home.php" class="btn btn-success btn-flat btn-lg">
    Vote Now
  </a>

<?php } ?>

</div>

</div>
</div>

</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/ballot_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
>>>>>>> a501458a9de087d18a6c7d4b5e9084254723be6e
