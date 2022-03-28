<style>
  
#addingProductForm{
  width: 40%;
}

element.style {
}

</style>

<div class="center">

<div class="left">
<h3><center>My Products</center></h3>
  <table class="table">

    <tr align="center">
      <th>#</th>
      <th>Title</th>
      <th>Description</th>
      <th>Image</th>
      <th>Quantity</th>
      <th>Price</th>
      <th colspan="2" >Action</th>
    </tr>
<?php
// echo "<pre>";
// print_r($products);
//  echo "</pre>";
  $i=1;
 foreach($products as $value){
//echo $value->image;
?>

    <tr align="center">
      <td><?php echo $i++;?></td>
      <td><?php echo $value->title;?></td>
      <td><?php echo $value->description;?></td>
      <td><?php if(empty($value->image)){echo "No image found";}else{?>
        <img src="<?php echo '../../uploads/'.$value->image;?>" height="70px" width="70px"><?php }?>
      </td>
      <td><?php echo $value->quantity;?></td>
      <td><?php echo $value->price;?></td>
      <td><?php if($value->status==1){?><button onclick="addProductFunction('<?php echo $value->id; ?>')" style="width:auto;" productId="<?php echo $value->id;?>" style="width:auto;" id="addProduct">Edit</button><?php }else{?><button style="width:auto;" productId="<?php echo $value->id;?>" style="width:auto;" id="addProduct">Inactive</button><?php }?></td></td>
      <td><button onclick="abc(<?php echo $value->id; ?>)" id="delete" >Delete</a></td>
    </tr>
<?php } ?>
  </table>

</div>

<div class="right">

<h3><center>All Products</center></h3>

  <table class="table">

    <tr align="center">
      <th>#</th>
      <th>Title</th>
      <th>Description</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
<?php

  $i=1;

 foreach($result as $value){

?>
    <tr align="center">
      <td><?php echo $i++;?></td>
      <td><?php echo $value->title;?></td>
      <td><?php echo $value->description;?></td>
      <td><?php if(empty($value->image)){echo "No image found";}else{?>
        <img src="<?php echo '../../uploads/'.$value->image;?>" height="70px" width="70px"><?php }?>
      </td>
      <td><?php if($value->status==1){?><button onclick="addProductFunction('<?php echo $value->id; ?>')" style="width:auto;" productId="<?php echo $value->id;?>" style="width:auto;" id="addProduct">Add</button><?php }else{?><button style="width:auto;" productId="<?php echo $value->id;?>" style="width:auto;" id="addProduct">Inactive</button><?php }?></td>
    </tr>
<?php } ?>
  </table>

<!--<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>-->

<div id="id01" class="modal">
  
  <form class="modal-content animate" id="addingProductForm" action="<?php echo base_url('/users/addProduct'); ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="quantity"><b>Quantity</b></label>
      <input type="number" placeholder="Enter Quantity" name="quantity" required><br><br>

      <label for="price"><b>Price</b></label>
      <input type="number" placeholder="Enter price" name="price" required>
      
      <input type="hidden" name="_productId" id="pId">

      <button type="submit" id="addingProduct">Add</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
</div>

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

function addProductFunction(a){
document.getElementById('id01').style.display='block'

  console.log(a);
  $("#pId").val(a);
}


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Ajax post
$(document).ready(function() 
{

$('#addProduct').on("click", function(){
          var ids = $(this).attr('productId'); 
          console.log(ids);
      });

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
<?php //echo "session is:".$this->session->name;?>  
</body>
</html>