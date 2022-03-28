<style>
  
#addingProductForm{
  width: 40%;
}
button#delete {
    width: 80px;
    height: 50px;
}

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

<div class="center">

  <form id="form">

  <div class="heading"><u><h3>Update Record</h3></u></div>

  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $result[0]->firstName;?>">
  </div>

    <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $result[0]->lastName;?>" >
  </div>

  <!--<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php //echo $result[0]->email;?>">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php //echo $result[0]->password;?>" >
  </div>-->

  <input type="hidden" value="<?php echo $result[0]->Id;?>" id="userId">

 <!-- <div class="form-group">
    <label for="confirmPassword">Confirm Password</label>
    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
  </div>-->
<div class="submitbutton">
  <button type="button" id="submitbtn" class="btn btn-primary">Submit</button>
</div>
<div id="divmessage"><span id="message" style="color:red;margin-top:10px"></span></div>

</form>

</div>


<footer>
  
</footer>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

function abc(a){
if(confirm("Do you want to delete it")){
window.location = "<?php echo base_url('/users/deleteProduct/');?>"+a;
}else{
  
}
}



$("#submitbtn").click(function() 
{
var userId=$("#userId").val();
//alert(userId);
var firstName = $('#firstName').val();
var lastName = $('#lastName').val();
var email = $('#email').val();
//var password = $('#password').val();
var url = "<?php echo base_url('/users/updateData/'); ?>"+userId;

//alert(url);

//console.log(url);

  if(firstName!="" && lastName!="" && email!="")
  {
    jQuery.ajax({
    type: "POST",
    url: url,
    data: {firstName: firstName,lastName:lastName ,email: email},
    success: function(res) 
    {
      var result = JSON.parse(res);
      console.log(result);
      if(result.success=="success")
      {
      //alert('Data saved successfully'); 
        $("#message").html("Data Updated successfully");
      }else{
          $("#message").html("Failed Updation...");
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
  $("#message").html("");
  }

});

</script>
 
</body>
</html>