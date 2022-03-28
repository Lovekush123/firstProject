<!DOCTYPE HTML>
<html>
<head>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!--Load style.css file, which store in css folder.-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<style>

body{
  margin: 0px;
  padding: 0px;
}
.error{
  color: red;
}
.submitbutton{
  margin-top: 10px;
}
#divmessage{
  margin-top: 10px;
}
header{
width: 100%;
height: 60px;
float: left;
background-color: #a0d2db;
}
.center{
width: 100%;
min-height: 560px;
float: left;

}
footer{
width: 100%;
height: 100px;
float: left;
background-color: #333;
}
.left{
  background-color: #dfd6d6;
  width: 50%;
  float: left;
   border: 2px solid black;
   min-height: 600px;
}
.right{
  background-color: #b9cbb9;
  width: 50%;
  float: left;
  border: 2px solid black;
  min-height: 600px;
}


/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;

  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
body {
  font-size: 14px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

a:hover {
    color: #f1f2f3;
}

.active {
  background-color: #4CAF50;
}

</style>

</head>

<body>

<div class="main-container">

<header>
  
<ul>
  <li><a class="active" href="<?php echo base_url('users/profile');?>">Home</a></li>
  <li><a href="<?php echo base_url('users/myProfile/68');?>">My Profile</a></li>
  <li><a href="<?php echo base_url('users/userlogout');?>">Logout</a></li>
</ul>

</header>