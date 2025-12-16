<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
/* ================= GLOBAL BACKGROUND ================= */
body.layout-top-nav{
  min-height:100vh;
  background:
    radial-gradient(circle at top left, #dbeafe, transparent 40%),
    radial-gradient(circle at bottom right, #dcfce7, transparent 40%),
    linear-gradient(135deg, #eef2f7, #dbe4f0);
  font-family: 'Segoe UI', system-ui, -apple-system;
}

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

/* ================= TITLE ================= */
.title{
  margin-bottom:35px;
  letter-spacing:2px;
  font-weight:700;
}

/* ================= GLASS CONTAINER ================= */
.main-card{
  background:rgba(255,255,255,.75);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius:22px;
  padding:35px;
  box-shadow:0 25px 60px rgba(0,0,0,.12);
  border:1px solid rgba(235, 158, 158, 0.35);
}

/* ================= WELCOME ================= */
.welcome-card{
  background:linear-gradient(135deg,#4e73df,#1cc88a);
  color:#fff;
  border-radius:20px;
  padding:30px;
  margin-bottom:35px;
  box-shadow:0 20px 40px rgba(0,0,0,.2);
}

.welcome-card h3{
  font-weight:700;
}

.welcome-card p{
  opacity:.95;
  font-size:15px;
}

/* ================= POSITION CARD ================= */
.card{
  border-radius:20px;
  border:none;
  margin-bottom:30px;
  background:rgba(255,255,255,.9);
}

.card-header{
  border-radius:20px 20px 0 0;
  background:linear-gradient(135deg,#36b9cc,#4e73df);
  color:#fff;
}

.card-header h4{
  font-weight:700;
}

/* ================= CANDIDATES ================= */
#candidate_list ul{
  list-style:none;
  padding:0;
}

#candidate_list li{
  background:#fff;
  border-radius:16px;
  padding:18px;
  margin-bottom:15px;
  display:flex;
  align-items:center;
  gap:18px;
  box-shadow:0 10px 25px rgba(0,0,0,.08);
}

#candidate_list li:hover{
  transform:translateY(-3px);
  box-shadow:0 18px 40px rgba(0,0,0,.15);
}

#candidate_list img{
  border-radius:50%;
  border:3px solid #e5e7eb;
}

.cname{
  font-size:17px;
  font-weight:600;
}

.platform{
  margin-left:auto;
  border-radius:10px;
}

/* ================= BUTTONS ================= */
.btn-flat{
  border-radius:12px;
  font-weight:600;
  padding:10px 22px;
}

.vote-actions{
  margin-top:45px;
}

.vote-actions .btn{
  margin:0 8px;
}

/* ================= ALREADY VOTED ================= */
.already-voted{
  background:rgba(255,255,255,.9);
  padding:50px;
  border-radius:22px;
  box-shadow:0 25px 60px rgba(0,0,0,.15);
}

/* ================= ALERTS ================= */
.alert{
  border-radius:14px;
}

/* ================= RESET BUTTON ================= */
.reset{
  border-radius:10px;
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
<div class="col-sm-10 col-sm-offset-1">

<div class="main-card">

<!-- WELCOME -->
<div class="welcome-card text-center">
  <h3><i class="fa fa-user-circle"></i>
    Welcome, <?php echo $voter['firstname'].' '.$voter['lastname']; ?>
  </h3>
  <p>Please review all candidates carefully before submitting your vote.</p>
</div>

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

if($vquery->num_rows > 0){
?>

<!-- ALREADY VOTED -->
<div class="already-voted text-center">
  <h2><i class="fa fa-check-circle text-success"></i></h2>
  <h3>You have already voted</h3>
  <p class="text-muted">Thank you for participating in the election.</p>
  <a href="#view" data-toggle="modal" class="btn btn-primary btn-lg btn-flat">
    <i class="fa fa-eye"></i> View Ballot
  </a>
</div>

<?php } else { ?>

<!-- BALLOT -->
<form method="POST" id="ballotForm" action="submit_ballot.php">

<?php
include 'includes/slugify.php';

$sql = "SELECT * FROM positions ORDER BY priority ASC";
$query = $conn->query($sql);

while($row = $query->fetch_assoc()){

  $slug = slugify($row['description']);
  $candidate = '';

  $cquery = $conn->query("SELECT * FROM candidates WHERE position_id='".$row['id']."'");

  while($crow = $cquery->fetch_assoc()){

    $checked = '';
    if(isset($_SESSION['post'][$slug])){
      $val = $_SESSION['post'][$slug];
      if(is_array($val) && in_array($crow['id'],$val)) $checked='checked';
      if($val == $crow['id']) $checked='checked';
    }

    $input = ($row['max_vote'] > 1)
      ? "<input type='checkbox' class='flat-red $slug' name='{$slug}[]' value='{$crow['id']}' $checked>"
      : "<input type='radio' class='flat-red $slug' name='{$slug}' value='{$crow['id']}' $checked>";

    $img = (!empty($crow['photo'])) ? "images/{$crow['photo']}" : "images/profile.jpg";

    $candidate .= "
    <li>
      $input
      <img src='$img' width='85' height='85'>
      <span class='cname'>{$crow['firstname']} {$crow['lastname']}</span>
      <button type='button' class='btn btn-primary btn-sm btn-flat platform'
        data-platform='{$crow['platform']}'
        data-fullname='{$crow['firstname']} {$crow['lastname']}'>
        <i class='fa fa-search'></i> Platform
      </button>
    </li>";
  }

  $note = ($row['max_vote'] > 1)
    ? "You may select up to {$row['max_vote']} candidates"
    : "Select only one candidate";

  echo "
  <div class='card'>
    <div class='card-header'>
      <h4><i class='fa fa-users'></i> {$row['description']}</h4>
    </div>
    <div class='card-body'>
      <div class='alert alert-info'>
        <i class='fa fa-info-circle'></i> $note
        <button type='button' class='btn btn-danger btn-xs pull-right reset' data-desc='$slug'>
          <i class='fa fa-refresh'></i> Reset
        </button>
      </div>
      <div id='candidate_list'><ul>$candidate</ul></div>
    </div>
  </div>";
}
?>

<div class="text-center vote-actions">
  <button type="button" class="btn btn-success btn-lg btn-flat" id="preview">
    <i class="fa fa-file-text"></i> Preview
  </button>
  <button type="submit" class="btn btn-primary btn-lg btn-flat" name="vote">
    <i class="fa fa-check-square-o"></i> Submit Vote
  </button>
</div>

</form>
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

<script>
$(function(){
  $('.content').iCheck({
    checkboxClass:'icheckbox_flat-green',
    radioClass:'iradio_flat-green'
  });

  $('.reset').click(function(){
    $('.'+$(this).data('desc')).iCheck('uncheck');
  });

  $('.platform').click(function(){
    $('#platform').modal('show');
    $('.candidate').html($(this).data('fullname'));
    $('#plat_view').html($(this).data('platform'));
  });

  $('#preview').click(function(e){
    e.preventDefault();
    var form = $('#ballotForm').serialize();
    if(form == ''){
      $('.message').html('You must vote at least one candidate');
      $('#alert').show();
    }else{
      $.post('preview.php',form,function(res){
        if(res.error){
          $('.message').html(res.message.join(''));
          $('#alert').show();
        }else{
          $('#preview_modal').modal('show');
          $('#preview_body').html(res.list);
        }
      },'json');
    }
  });
});
</script>

</body>
</html>
