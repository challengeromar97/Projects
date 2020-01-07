<form id="about" method="POST" action="" >

    <section>
        <header>
            Personal Info
        </header>
        <div class="container px-5 py-3">

            <div class="row py-4">
                <p class="col-md-3">Status:</p>
                <input class="col-md-9" type="text" name="EUStatus" value="<?php echo $user["UStatus"]; ?>">                
            </div>
            
            <div class="row py-4">
                <p class="col-md-3">First Name:</p>
                <input class="col-md-9" type="text" name="EFname" value="<?php echo $user["Fname"]; ?>">
            </div>

            <div class="row py-4">
                <p class="col-md-3">Last Name:</p>
                <input class="col-md-9" type="text" name="ELname" value="<?php echo $user["Lname"]; ?>">
            </div>
            
            <div class="row py-4">
                <p class="col-md-3">About Me:</p>
                <input class="col-md-9" type="text" name="EAboutMe" value="<?php echo $user["Aboutme"]; ?>">
            </div>

            <div class="row py-4">
                <p class="col-md-3">Birthday:</p>
                <span class="col-md-9"><?php echo $user["Birthday"]; ?></span>
            </div>
            
            <div class="row py-4">
                <p class="col-md-3">Lives in:</p>
                <input class="col-md-9" type="text" name="EAddress" value="<?php echo $user["Address"]; ?>">
            </div>

            <div class="row py-4">
                <p class="col-md-3">Your Status:</p>
                <input class="col-md-9" type="text" name="ERShip" value="<?php echo $user["RShip"]; ?>">
            </div>

            <div class="row py-4">
                <p class="col-md-3">Joined:</p>
                <span class="col-md-9"><?php echo $user["Startfrom"]; ?></span>
            </div>
            
            <div class="row py-4">
                <p class="col-md-3">Gender:</p>
                <span class="col-md-9"><?php echo $user["Gender"]; ?></span>
            </div>

            <div class="row py-4">
                <p class="col-md-3">Email:</p>
                <input class="col-md-9" type="text" name="EEmail" value="<?php echo $user["Email"]; ?>">
            </div>

            <div class="row py-4">
                <p class="col-md-3">Phone Number:</p>
                <input class="col-md-9" type="text" name="ENumber" value="<?php echo $user["Number"]; ?>">
            </div>

            <div class="row py-4">
                <p class="col-md-3">Hobbies:</p>
                <input class="col-md-9" type="text" name="EHobbies" value="<?php echo $user["Hobbies"]; ?>">
            </div>
            
            <div class="row py-4">
                <p class="col-md-3">New Password:</p>
                <input class="col-md-9" type="password" name="ENPass" placeholder="Enter New Password">
            </div>
            
        </div>
                           
    </section>

    <div class="text-right pb-3">
        <input type="password" name="EPass" placeholder="Enter Your Password To Save:">
        <input type="submit" class="btn btn-outline-success px-5 py-2" value="Save" name="personalInfo">
    </div>    

</form>