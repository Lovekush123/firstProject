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
.submitbutton{
  margin-top: 10px;
}
#divmessage{
  margin-top: 10px;
}
</style>

</head>
<body>


<div class="container">

<form id="form">

  <div class="heading"><u><h3>Registration Page</h3></u></div>

  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" >
  </div>

    <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" >
  </div>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
  </div>

 <!-- <div class="form-group">
    <label for="confirmPassword">Confirm Password</label>
    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
  </div>-->
<div class="submitbutton">
  <button type="button" id="submitbtn" class="btn btn-primary">Submit</button>
</div>
<div id="divmessage"><span id="message" style="color:red;margin-top:10px"></span></div>

<div class=""><p><a href="<?php echo base_url('/users/login') ?>">Login</a> (If You have Account)</p></div>


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

var firstName = $('#firstName').val();
var lastName = $('#lastName').val();
var email = $('#email').val();
var password = $('#password').val();

  if(firstName!="" && lastName!="" && email!="" && password!="")
  {
    jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url('/users/savedata'); ?>",
    data: {firstName: firstName,lastName:lastName ,email: email,password:password},
    success: function(res) 
    {
      var result = JSON.parse(res);
      console.log(result);
      if(result.email=="" && result.success=="success")
      {
      //alert('Data saved successfully'); 
        $("#message").html("Data saved successfully");
      }else{
        alert("email exits");
        $("#message").html("Email address exits.");
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