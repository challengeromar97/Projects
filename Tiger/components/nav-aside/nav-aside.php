<!-- Navbar -->
<nav id="nav-page">

  <!-- Left Section -->
  <div id="left-section">

    <!-- Page Title -->
    <h6 id="page-title">Home Page</h6>

    <!-- Search input -->
    <form id="search">
      <input type="text" placeholder="Search here People or Tags">
      <i class="fal fa-search"></i>
    </form>

    <!-- Find Friends -->
    <a routerLink="/newsfeed" id="find-friends"> NewsFeed </a>

  </div>

  <!-- right Section -->
  <div id="right-section">

    <!-- Icons -->
    <div id="iconsContainer">

      <div class="icons">
        <!-- Badge Icon -->
        <span class="icons-badge">6</span>
        <!-- Notification Icon-->
        <i class="fal fa-user-friends"></i>
        <!-- List -->
        <div class="list">
          <div class="list-header">
            <a routerLink="/messenger">Find Requests</a>
            <a routerLink="/messenger">Find Friend</a>
          </div>
          <div class="list-body">
            <div class="list-item"> Lorem ipsum elit. Perferendium deserunt iste temporibus.</div>
            <div class="list-item"> Lorem ipsum dolorelit. ratione nobis sequi neque est.</div>
            <div class="list-item"> Lorem ipsum dolor sit amet condipisicing elit.serunt iste temporibus reprehenderit.</div>
            <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>
            <div class="list-item"> Lorem ipsum elit. Perferendium deserunt iste temporibus.</div>
            <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>
            <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>

          </div>
          <div class="list-footer">
            <a routerLink="/messenger">View All Friend Requests</a>
          </div>
        </div>
      </div>
      <div class="icons">
        <!-- Badge Icon -->
        <span class="icons-badge">2</span>
        <i class="fal fa-comment"></i>
        <!-- List -->
        <div class="list">
          <div class="list-header">
            <a routerLink="/messenger">Chat / Messages</a>
            <a routerLink="/messenger">Mark all as read</a>
          </div>
          <div class="list-body">
            <div class="list-item"> Lorem ipsum elit. Perferendium deserunt iste temporibus.</div>
            <div class="list-item"> Lorem ipsum dolorelit. ratione nobis sequi neque est.</div>
            <div class="list-item"> Lorem ipsum dolor sit amet condipisicing elit.serunt iste temporibus reprehenderit.</div>
            <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>
            <div class="list-item"> Lorem ipsum elit. Perferendium deserunt iste temporibus.</div>
            <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>
            <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>

          </div>
          <div class="list-footer">
            <a routerLink="/messenger">View All Messages</a>
          </div>
        </div>
      </div>
      <div class="icons">
        <!-- Badge Icon -->
        <span class="icons-badge">8</span>
        <i class="fal fa-bell"></i>
        <!-- List -->
        <div class="list">
            <div class="list-header">
              <a routerLink="/messenger">Notification</a>
              <a routerLink="/messenger">Mark all as read</a>
            </div>
            <div class="list-body">
              <div class="list-item"> Lorem ipsum elit. Perferendium deserunt iste temporibus.</div>
              <div class="list-item"> Lorem ipsum dolorelit. ratione nobis sequi neque est.</div>
              <div class="list-item"> Lorem ipsum dolor sit amet condipisicing elit.serunt iste temporibus reprehenderit.</div>
              <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>
              <div class="list-item"> Lorem ipsum elit. Perferendium deserunt iste temporibus.</div>
              <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>
              <div class="list-item"> Lorem ipsum dolor magnam quisquam at, ratione nobis sequi neque est.</div>

            </div>
            <div class="list-footer">
              <a routerLink="/messenger">View All Notification</a>
            </div>
        </div>
      </div>
    </div>


    <!-- Profile Icon -->
    <div id="prof-icon">
      <!-- Profile Image -->
      <img src="assets/images/<?php echo $user['ProfileImg'];?>" />


      <!-- Profile Info Section -->
      <div id="profile-info">

        <!-- Profile Name -->
        <span id="profile-name"><a href="/profile">
          <?php echo $user['Fname']." ".$user['Lname'];?>
         </a><i class="fal fa-angle-down"></i></span>

        <!-- Profile Setting -->
        <a id="profile-setting">
          <?php echo $user['UStatus'];?>
        </a>

        <!-- Profile List Container -->
        <div id="profile-account">
          
          <!-- Menu -->
          <ul>
            <li><a routerLink="/newsfeed"><i class="fal fa-newspaper"></i><span>Newsfeed</span></a></li>
            <li><a routerLink="/messenger"><i class="fal fa-comment-alt"></i><span>messenger</span></a></li>
            <li><a routerLink="/timeline"><i class="fal fa-star"></i><span>timeline</span></a></li>
            <li><a routerLink="/profile"><i class="fal fa-user-alt"></i><span>Profile</span></a></li>
            <li><a routerLink="/settings"><i class="fal fa-cog"></i><span>Settings</span></a></li>
            <li><a routerLink="/findfriends"><i class="fal fa-search"></i><span>Find Friends</span></a></li>
            <li><a routerLink="/photos"><i class="fal fa-camera-retro"></i><span>Photos</span></a></li>
            <li><a routerLink="/videos"><i class="fal fa-video "></i><span>Videos</span></a></li>
            <li><a routerLink="/music"><i class="fal fa-headphones"></i><span>Music</span></a></li>
            <li><a href="registeration.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</nav>

<!-- Left Fixed Side Bar -->
<aside id="left-sidebar" class="sidebar">

  <!-- Logo -->
  <a class="logo">
    <!-- Logo -->
    <span>T</span>
    <!-- Logo Name -->
    <span> Tiger </span>
  </a>

  <!-- Menu -->
  <ul class="menu">
    <li class="menuBtn"><a><i class="fal fa-bars"></i><span>Collapse Menu</span></a></li>
    <li><a routerLink="/newsfeed"><i class="fal fa-newspaper"></i><span>Newsfeed</span></a></li>
    <li><a routerLink="/messenger"><i class="fal fa-comment-alt"></i><span>messenger</span></a></li>
    <li><a routerLink="/timeline"><i class="fal fa-star"></i><span>timeline</span></a></li>
    <li><a routerLink="/profile"><i class="fal fa-user-alt"></i><span>Profile</span></a></li>
    <li><a routerLink="/settings"><i class="fal fa-cog"></i><span>Settings</span></a></li>
    <li><a routerLink="/findfriends"><i class="fal fa-search"></i><span>Find Friends</span></a></li>
    <li><a routerLink="/photos"><i class="fal fa-camera-retro"></i><span>Photos</span></a></li>
    <li><a routerLink="/videos"><i class="fal fa-video "></i><span>Videos</span></a></li>
    <li><a routerLink="/music"><i class="fal fa-headphones"></i><span>Music</span></a></li>
  </ul>


</aside>



<!-- right Fixed Side Bar -->
<aside id="right-sidebar" class="sidebar">

  <!-- Logo -->
  <a class="logo">
    <!-- Logo -->
    <span><i class="fal fa-comment-alt"></i></span>
    <!-- Logo Name -->
    <span> Messenger </span>
  </a>

  <!-- Menu -->
  <ul class="menu">
    <?php
      
      for( $i = 0; $i < count($allUsers); $i++ ) {
        echo '<li><a routerLink="/messenger"><img src="assets/images/'
              .$allUsers[$i]["ProfileImg"].'"><span>'.$allUsers[$i]["Fname"]." "
              .$allUsers[$i]["Lname"].'</span></a></li>';
      }
    
    ?>

    <li class="menuBtn"><a><i class="fal fa-bars"></i><span>Collapse Menu</span></a></li>
  </ul>

</aside>

<!-- Left Setting -->
<aside class="settingsContainer" id="leftSettingsContainer">
    <i class="fal fa-cog"></i>
    <div class="settings"></div>
</aside>

<!-- Right Setting -->
<aside class="settingsContainer" id="rightSettingsContainer">
  <i class="fal fa-cog"></i>
  <div class="settings"></div>
</aside>