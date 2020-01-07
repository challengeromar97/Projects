<!-- News Feed Section-->
<section id="newsfeed" class="conatiner">

  <!-- Post Form -->
  <form method="POST" action="" id="post-form" class="card-block">

    <!-- Post Header-->
    <header>
      <!-- Profile Pic -->
      <img src="assets/images/<?php echo $user['ProfileImg']; ?>" />
      <!-- Post text Area -->
      <textarea name="content" placeholder="Share What Are You thinking here..."></textarea>
    </header>

    <!-- Post Footer -->
    <footer>
      <!-- Post Icons -->
      <div id="post-icons">
        <i class="fal fa-camera-retro"></i>
        <i class="fal fa-file-archive"></i>
        <i class="fal fa-map-marker-alt"></i>
      </div>

      <!-- Post Buttons -->
      <div id="post-btns">
        <div>Preview</div>
        <input type="submit" name="post" value="Post">
      </div>

    </footer>
  </form>


  <!-- Start Posts-->
  <section id="posts">

  
    <?php //Output Posts
    /*
    echo "<pre>";
    print_r ($posts);
    echo "</pre>";
    */

      for($i = count($posts)-1; $i >= 0; $i--) {
        if( $posts[$i]["Deletedpost"] != 1 ) {

    ?>
    <!-- Post -->
    <article class="posts">

        <section class="post-card">

          <!-- Post Header -->
          <header>

            <div class="d-flex align-items-center">
              <img src="assets/images/<?php echo $posts[$i]["ProfileImg"]; ?>">
              <div class="posts-info">
                <p><?php echo $posts[$i]["Fname"]." ".$posts[$i]['Lname']; ?></p>
                <span><?php echo $posts[$i]["Pdate"] ?></span>
              </div>
            </div>

            <!-- Post Details -->
            <div class="post-det">
              <a class="post-det-icon"><i class="fal fa-ellipsis-h"></i></a>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="post-det-cont">
                <ul>
                  <li>Save Post</li>
                  <li>Report Post</li>
                  <li class="hide-post">Hide Post</li>
                  <?php 
                    if($user["USERID"] == $posts[$i]["USERID"] ) { 
                      $DPOSTID = $posts[$i]["POSTID"];
                      echo "<li onclick='$(this).parent().parent().submit();'>Delete Post</li><input hidden name='DPOSTID' value='$DPOSTID'>";
                    } 
                  ?>
                  <li><?php echo "Post ID: ".$posts[$i]["POSTID"]; ?></li>
                </ul>
              </form>
            </div>
          </header>

          <!-- Post Content-->
          <div class="posts-content">
            <!-- Simple Text -->
            <pre class="post-text"><?php echo $posts[$i]["PContent"] ?></pre>
              
              <!-- Share Video -->
              <div class="d-none posts-video">
                <!-- Video Container -->
                <div class="video-container">
                  <!-- Poster Of the video -->
                  <img src="assets/images/Movies/Tomb-Raider-Movie-Poster.jpg" />
                  <i class="fal fa-play-circle"></i>
                </div>
                <!-- Video Info-->
                <div class="video-info">
                  <!-- Title Of The video -->
                  <p class="mainHoverColor">Tomb Raider</p>
                  <!-- Description -->
                  <span>Lara Croft is the fiercely independent daughter of an eccentric adventurer who vanished years
                    earlier.
                    Hoping to solve the mystery of her father's disappearance, Croft embarks on a perilous journey to his
                    last-known destination -- a fabled tomb on a mythical island that might be somewhere off the
                    co…<strong>More</strong></span>
                  <!-- Referrence -->
                  <a href="https://www.youtube.com/watch?v=8ndhidEmUbI" target="_blank">Youtube.com</a>
                </div>
              </div>
              
          </div>

          <!-- Post Footer -->
          <footer class="posts-footer">
  
            <!-- Post Share Likes And Comments-->
            <div class="post-status">
              <form class='likes-container' method="post" action="">
                <!-- Likes-->
                  <?php 
                    $NLikes = 0;
                    $mainColor = "";

                    for ($k = 0; $k < count($likes); $k++ ) {
                      if($likes[$k]["USERID"] == $user["USERID"] &&  $likes[$k]["POSTID"] == $posts[$i]["POSTID"] ) {
                        $mainColor= "mainColor";
                      }
                    }
                    ?>

                    <a onclick='$(this).parent().submit();' class='<?php echo $mainColor ?>'>
                      <i class='fal fa-heart'></i>
                    </a>
                    <div class='img-likes-cont'>

                    <?php
                    for ($k = 0; $k < count($likes); $k++ ) {

                      if( $likes[$k]["POSTID"] == $posts[$i]["POSTID"] ) {
                        $NLikes++;
                        $LUSERID = $likes[$k]["USERID"];
                        for($l =0; $l < count($allUsers); $l++ ) {
                          if($LUSERID == $allUsers[$l]["USERID"]) {
                            echo "<img class='img-likes' src='assets/images/".$allUsers[$l]["ProfileImg"]."'>";
                          
                          }
                        }
                      }
                      
                    }
                    echo "</div>";
                    echo "<span>".$NLikes." liked this</span>";
                    
                  ?>
                
                <input hidden name="Like_POSTID" value="<?php echo $posts[$i]["POSTID"]; ?>" >
              </form>
              <!-- Comments And Shares -->
              <div class="com-share">
                <a class="posts-com"><i class="fal fa-comments-alt"></i><span><?php echo $posts[$i]["Comments"]; ?> </span></a>
                <a><i class="fal fa-share"></i><span><?php echo $posts[$i]["Share"]; ?> </span></a>
              </div>
            </div>
  
          </footer>
  
        </section>
  
        <!-- Comment Container  -->
        <form class="post-comments" method="POST" action="">
          <section class="justForSomeAnimation">
            <section class="all-comments">
              <?php

                // Output All Commments
                for($j = 0; $j < count($comments); $j++) {
                  

                  if( $comments[$j]["POSTID"] == $posts[$i]["POSTID"] ) {
                    
              ?>
              <!-- Comment -->
              <article>
                <!-- Comment Header -->
                <header>
                  
                <div class="d-flex align-items-center">
                  <!-- Account Info -->
                  <img src="assets/images/<?php echo $comments[$j]["ProfileImg"]; ?>">
                  <div class="posts-info">
                    <p><?php echo $comments[$j]['Fname']." ".$comments[$j]['Lname']; ?></p>
                    <span><?php echo $comments[$j]['Cdate']; ?></span>
                  </div>
                </div>
                  
                <!-- Post Details -->
                <div class="post-det">
                  <a class="post-det-icon"><i class="fal fa-ellipsis-h"></i></a>
                  <div class="post-det-cont">
                    <ul>
                      <li class="hide-comment">Hide Comment</li>
                      <li>Report Comment</li>
                    </ul>
                  </div>
                </div>

                  
                </header>
                <!-- Comment Content -->
                <div class="com-content">
                  <pre><?php echo $comments[$j]['CContent']; ?></pre>
                </div>
                <!-- Comment Footer-->
                <footer>
                  <a><i class="fal fa-heart"></i><span><?php echo $comments[$j]['Likes']; ?></span></a>
                  <a>Reply</a>
                </footer>
              </article>

              <?php
              }
                }
              ?>
            </section>
          </section>
  
          <!-- Post Comment Input -->
          <section class="comment-input">
            <!-- Comment Input Here -->
            <input type="text" name="CContent" autocomplete="off" placeholder="Write a comment here..">
            <input hidden name="postID" value="<?php echo $posts[$i]["POSTID"]; ?>">
            <input hidden type="submit" name="comment" value="Send">
            <!-- Add Image Button-->
            <i class="fal fa-camera-retro"></i>
            <!-- Send Button-->
            <i class="submit_comment fal fa-location-arrow"></i>
  
        </form>
      </article>


    <?php
      }
    }
    ?>

  </section>

</section>
