<!-- News Feed Section-->
<section id="newsfeed" class="conatiner">

  <!-- Start Posts-->
  <section id="posts">

  
    <?php
      for($i = count($posts)-1; $i >= 0; $i--) {
        if($posts[$i]["USERID"] == $user["USERID"]) {
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
                    if( $posts[$i]["Deletedpost"] == 1 ) { 
                      $SPOSTID = $posts[$i]["POSTID"];
                      echo "<li onclick='$(this).parent().parent().submit();'>Show Post</li><input hidden name='SPOSTID' value='$SPOSTID'>";
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
          </div>

          <!-- Post Footer -->
          <footer class="posts-footer">
  
            <!-- Post Share Likes And Comments-->
            <div class="post-status">
              <form method="post" action="">
                <!-- Likes-->
                <a onclick="$(this).parent().submit();" ><i class="fal fa-heart"></i><span><?php echo $posts[$i]["Likes"]; ?> liked this</span></a>
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
