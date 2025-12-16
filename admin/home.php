<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
/* ===== Dashboard UI Enhancements ===== */
.content-header h1 {
    font-weight: 700;
}

.small-box {
    border-radius: 14px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    transition: 0.3s ease;
}

.small-box:hover {
    transform: translateY(-5px);
}

.small-box .icon {
    font-size: 75px;
    opacity: 0.25;
}

.small-box-footer {
    font-weight: 600;
}

/* Chart boxes */
.vote-box {
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.vote-box .box-header {
    background: linear-gradient(135deg, #3c8dbc, #00c0ef);
    color: #fff;
    border-radius: 14px 14px 0 0;
}

.vote-box .box-title {
    font-weight: 700;
}

.chart {
    padding: 10px;
}

/* Section title */
.section-title {
    margin: 25px 0 15px;
    font-weight: 700;
}
</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<div class="content-wrapper">

<section class="content-header">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<section class="content">

<?php
if(isset($_SESSION['error'])){
  echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
  unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
  echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
  unset($_SESSION['success']);
}
?>

<!-- ===== STAT BOXES ===== -->
<div class="row">

<?php
$stats = [
  ['positions', 'No. of Positions', 'fa-tasks', 'bg-aqua', 'positions.php'],
  ['candidates', 'No. of Candidates', 'fa-black-tie', 'bg-green', 'candidates.php'],
  ['voters', 'Total Voters', 'fa-users', 'bg-yellow', 'voters.php']
];

foreach($stats as $s){
  $sql = "SELECT * FROM {$s[0]}";
  $query = $conn->query($sql);
?>
<div class="col-lg-3 col-xs-6">
  <div class="small-box <?php echo $s[3]; ?>">
    <div class="inner">
      <h3><?php echo $query->num_rows; ?></h3>
      <p><?php echo $s[1]; ?></p>
    </div>
    <div class="icon"><i class="fa <?php echo $s[2]; ?>"></i></div>
    <a href="<?php echo $s[4]; ?>" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<?php } ?>

<?php
$sql = "SELECT * FROM votes GROUP BY voters_id";
$query = $conn->query($sql);
?>
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo $query->num_rows; ?></h3>
      <p>Voters Voted</p>
    </div>
    <div class="icon"><i class="fa fa-edit"></i></div>
    <a href="votes.php" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

</div>

<!-- ===== VOTE TALLY ===== -->
<div class="row">
  <div class="col-xs-12">
    <h3 class="section-title">
      Votes Tally
      <span class="pull-right">
        <a href="print.php" class="btn btn-success btn-sm btn-flat">
          <i class="glyphicon glyphicon-print"></i> Print
        </a>
      </span>
    </h3>
  </div>
</div>

<?php
$sql = "SELECT * FROM positions ORDER BY priority ASC";
$query = $conn->query($sql);
$inc = 2;

while($row = $query->fetch_assoc()){
  $inc = ($inc == 4) ? 1 : $inc + 1;
  if($inc == 1) echo "<div class='row'>";

  echo "
  <div class='col-sm-3'>
    <div class='box vote-box'>
      <div class='box-header'>
        <h4 class='box-title'>{$row['description']}</h4>
      </div>
      <div class='box-body'>
        <canvas id='".slugify($row['description'])."' height='200'></canvas>
      </div>
    </div>
  </div>
  ";

  if($inc == 2) echo "</div>";
}

if($inc == 1) echo "<div class='col-sm-3'></div></div>";
?>

</section>
</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<?php
$sql = "SELECT * FROM positions ORDER BY priority ASC";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
  $sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
  $cquery = $conn->query($sql);
  $carray = [];
  $varray = [];

  while($crow = $cquery->fetch_assoc()){
    $fullname = $crow['firstname'] . ' ' . $crow['lastname'];
    $carray[] = $fullname;
    $vquery = $conn->query("SELECT * FROM votes WHERE candidate_id='".$crow['id']."'");
    $varray[] = $vquery->num_rows;
  }
?>

<script>
$(function(){
  var ctx = $('#<?php echo slugify($row['description']); ?>').get(0).getContext('2d');
  var chart = new Chart(ctx);

  chart.HorizontalBar({
    labels: <?php echo json_encode($carray); ?>,
    datasets: [{
      label: 'Votes',
      fillColor: '#3c8dbc',
      data: <?php echo json_encode($varray); ?>
    }]
  }, {
    responsive: true,
    maintainAspectRatio: true,
    scaleBeginAtZero: true
  });
});
</script>

<?php } ?>

</body>
</html>
