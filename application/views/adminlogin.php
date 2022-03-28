<!DOCTYPE HTML>

<html>

<head>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<style>
  form#form {
    width: 40%;
    margin: auto;
    padding: 20px;
}
.error{
  color: red;
}
#divmessage{
  margin-top: 10px;
}

</style>

</head>
<body>

<div class="container">

<form id="form" >
  <div class="heading"><h3><u>Admin Login</u></h3></div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Email" >
  </div>

  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
  </div>

<div>
  <button type="button" id="submitbtn" class="btn btn-primary">Submit</button>
</div>

<div id="divmessage"><span id="message" style="color:red;margin-top:10px"></span></div>

</form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

// Ajax post
$(document).ready(function() 
{
$("#submitbtn").click(function() 
{

var email = $('#email').val();
var password = $('#password').val();

  if(email!="" && password!="")
  {
    jQuery.ajax({
    type: "POST",
    url: "<?php echo $base_url;?>/Admin/adminlogin",
    data: {email: email,password:password},
    success: function(res) 
    {
      var result = JSON.parse(res);
      console.log(result);
      if(result.status=="success" && result.message=="success")
      {

        window.location.href = "<?php echo $base_url;?>/AdminController/index";

      }else if(result.status=="failed"){
        //alert("Your email is not Verified.");
        $("#message").html("Your email is not Verified.");
      }
      else{
        //alert("Your email or Password is Incorrect.");
        $("#message").html("Your email or Password is Incorrect."); 
      }
      
    },
    error:function()
    {
    alert('data not saved');  
    }
    });
  }
  else
  {
  alert("pls fill all fields first");
  }

});
});
</script>

</body>
</html>