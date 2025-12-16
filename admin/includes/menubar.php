<?php
// Get current page name for active menu
$page = basename($_SERVER['PHP_SELF']);
?>

<aside class="main-sidebar">
  <section class="sidebar">

    <!-- User Panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) 
            ? '../images/'.$user['photo'] 
            : '../images/profile.jpg'; ?>" 
            class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">REPORTS</li>

      <li class="<?php echo ($page == 'home.php') ? 'active' : ''; ?>">
        <a href="home.php">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="<?php echo ($page == 'votes.php') ? 'active' : ''; ?>">
        <a href="votes.php">
          <i class="fa fa-lock"></i>
          <span>Votes</span>
        </a>
      </li>

      <li class="header">MANAGE</li>

      <li class="<?php echo ($page == 'voters.php') ? 'active' : ''; ?>">
        <a href="voters.php">
          <i class="fa fa-users"></i>
          <span>Voters</span>
        </a>
      </li>

      <li class="<?php echo ($page == 'positions.php') ? 'active' : ''; ?>">
        <a href="positions.php">
          <i class="fa fa-tasks"></i>
          <span>Positions</span>
        </a>
      </li>

      <li class="<?php echo ($page == 'candidates.php') ? 'active' : ''; ?>">
        <a href="candidates.php">
          <i class="fa fa-id-badge"></i>
          <span>Candidates</span>
        </a>
      </li>

      <li class="header">SETTINGS</li>

      <li class="<?php echo ($page == 'ballot.php') ? 'active' : ''; ?>">
        <a href="ballot.php">
          <i class="fa fa-file-text"></i>
          <span>Ballot Position</span>
        </a>
      </li>

      <li>
        <a href="#config" data-toggle="modal">
          <i class="fa fa-cog"></i>
          <span>Election Title</span>
        </a>
      </li>

    </ul>
  </section>
</aside>

<?php include 'config_modal.php'; ?>
