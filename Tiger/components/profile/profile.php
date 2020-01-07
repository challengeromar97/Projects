<!-- Profile Page-->
<section id="profilePage" class="container">
  <!-- Profile Page Header -->
  <header id="pHeader">
    <!-- BackGround Image -->
    <div id="pBG" style="background-image: url('assets/images/<?php echo $user['ProfileBG']; ?>"')">
        <!-- Profile Picture -->
        <div id="profilePic">
            <!-- Profile Image -->
            <img onclick="$('#ppimg').trigger('click');" src="assets/images/<?php echo $user['ProfileImg']; ?>"/>

            <form method="POST" enctype="multipart/form-data" action="" id="changePP">
              <input id="ppimg" type="file" name="ppimg" onchange="$('#changePP').submit();" style="display:none"/>
              <input hidden name="USERID" value="<?php echo $user['USERID']; ?>" >
            </form>
            <h3><?php echo $user['Fname']." ".$user['Lname']; ?></h3>
            <p>
              <?php echo $user['UStatus'];?>
            </p>

            <!-- Change Background Image -->
            <form method="POST" enctype="multipart/form-data" action="" id="changeBG">
              <input id="bgimg" type="file" name="bgimg" onchange="$('#changeBG').submit();" style="display:none"/>
              <i class="fal fa-edit" onclick="$('#bgimg').trigger('click');"></i>
              <input hidden name="USERID" value="<?php echo $user['USERID']; ?>" >
            </form>
            
            <div id="locate-img">
              <i class="fal fa-angle-double-up" id="bgU"></i>
              <i class="fal fa-angle-double-down" id="bgD"></i>
            </div>

        </div>


    </div>
    <!-- Navigation Bar -->
    <nav id="pNav" class="row">
      <ul class="col-md-4">
        <li><a routerLink="/timeline">Timeline</a></li>
        <li><a routerLink="/about">About</a></li>
        <li><a routerLink="/friends">Friends</a></li>
      </ul>
      <div class="col-md-4"></div>
      <ul class="col-md-4">
        <li><a routerLink="/photos">Photos</a></li>
        <li><a routerLink="/videos">Videos</a></li>
        <li><a><i class="fas fa-ellipsis-h"></i></a></li>
      </ul>
    </nav>
  </header>

  <!-- timeLine section -->
  <section id="tiger-timeline">
  <?php  require 'components/timeline/timeline.php';?>
  </section>

  <!-- about section -->
  <section id="tiger-about">
  <?php  require 'components/about/about.php';?>
  </section>

  <!-- friends section -->
  <section id="tiger-friends">
  <?php  require 'components/friends/friends.php';?>
  </section>

  <!-- videos section -->
  <section id="tiger-videos">
  <?php  require 'components/videos/videos.php';?>
  </section>

  <!-- photos section -->
  <section id="tiger-photos">
  <?php  require 'components/photos/photos.php';?>
  </section>
  

</section>