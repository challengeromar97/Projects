<?php

// Create Connection
$conn = new mysqli("localhost","root","");

// Check The Connection
if($conn->connect_error) {die("Connection Failed To DataBase". $conn->connect_error);} 

// Check If Data Base was Created Or No
$q = "CREATE DATABASE tiger";

if($conn->query($q)) {
    echo " Database Of Name Tiger Created";
} else {
    echo $conn->error. "<br >";
}

// Connect To DataBase
$conn = new mysqli("localhost","root","","tiger");

// Check The Connection 
if($conn->connect_error) {
    echo "Connection Failed To Tiger DataBase ". $conn->connect_error. "<br >";
} else {
    echo "Tiger Date Base Connected <br >";
}

// Create ti_users Table
$q = "CREATE TABLE ti_users (USERID int NOT NULL AUTO_INCREMENT PRIMARY KEY , hash varchar(50), Fname varchar(50),Lname varchar(50), Email varchar(100), Password  varchar(100), Birthday DATE, Number varchar(30), Gender varchar(50), Activated BOOLEAN DEFAULT '0', Deleteduser BOOLEAN DEFAULT '0', Startfrom DATETIME DEFAULT NOW(), ProfileImg varchar(100) DEFAULT 'male-placeholder.jpg', ProfileBG varchar(100) DEFAULT 'BGplaceholder.jpg', Aboutme varchar(1000), Address varchar(100), UStatus varchar(100), RShip varchar(100), Hobbies varchar(100) )";
if($conn->query($q)) {
    echo "The User Table Created Successfully". "<br >";
} else {
    echo "Error Creating Users Table". $conn->error. "<br >";
}

// Create ti_posts Table
$q = "CREATE TABLE ti_posts (POSTID int NOT NULL AUTO_INCREMENT, USERID int NOT NULL, Pstatus varchar(50) DEFAULT '', Pdate DATETIME DEFAULT NOW(), PContent varchar(1000), Likes int DEFAULT '0', Comments int DEFAULT '0', Share int DEFAULT '0', Deletedpost BOOLEAN DEFAULT '0',PRIMARY KEY (POSTID), FOREIGN KEY (USERID) REFERENCES ti_users(USERID) )";
if($conn->query($q)) {
    echo "The Posts Table Created Successfully". "<br >";
} else {
    echo "Error Creating Table". $conn->error. "<br >";
}


// Create ti_comments Table
$q = "CREATE TABLE ti_comments (COMMENTID int NOT NULL AUTO_INCREMENT, USERID int NOT NULL, POSTID int NOT NULL, Cdate DATETIME DEFAULT NOW(), CContent varchar(1000), Likes int DEFAULT '0', Replays int DEFAULT '0', Deletedcomment BOOLEAN DEFAULT '0',PRIMARY KEY (COMMENTID), FOREIGN KEY (USERID) REFERENCES ti_users(USERID) , FOREIGN KEY (POSTID) REFERENCES ti_posts(POSTID) )";
if($conn->query($q)) {
    echo "The comment Table Created Successfully". "<br >";
} else {
    echo "Error Creating Table". $conn->error. "<br >";
}

// Create ti_messages Table
$q = "CREATE TABLE ti_messages (MSGID int NOT NULL AUTO_INCREMENT, FUSERID int NOT NULL, TUSERID int NOT NULL, Mdate DATETIME DEFAULT NOW(), MContent varchar(1000), PRIMARY KEY (MSGID), FOREIGN KEY (FUSERID) REFERENCES ti_users(USERID) , FOREIGN KEY (TUSERID) REFERENCES ti_users(USERID) )";
if($conn->query($q)) {
    echo "The messages Table Created Successfully". "<br >";
} else {
    echo "Error Creating Table". $conn->error. "<br >";
}

// Create ti_likes Table
$q = "CREATE TABLE ti_likes (USERID int NOT NULL, POSTID int NOT NULL, Ldate DATETIME DEFAULT NOW(),FOREIGN KEY (USERID) REFERENCES ti_users(USERID) , FOREIGN KEY (POSTID) REFERENCES ti_posts(POSTID) )";
if($conn->query($q)) {
    echo "The Likes Table Created Successfully". "<br >";
} else {
    echo "Error Creating Table". $conn->error. "<br >";
}




?>