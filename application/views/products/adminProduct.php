<!DOCTYPE html>  
<html>  
<head>  
    <title>Admin Products</title>  
</head>  
<body>  
<h4><a href="<?php echo base_url('AdminController/index') ?>" >All Product</a></h4>
    <form method="post" action="<?php echo base_url('AdminController/store');?>" enctype="multipart/form-data"> 
    <?php

        if ($this->session->flashdata('errors'))
        {
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }
    ?>
        <table> 
            <tr>  
                <td>Title:</td>  
                <td>:</td>  
                <td><input type="text" name="title"></td>  
            </tr>  
            <tr>  
                <td>Description:</td>  
                <td>:</td>  
                <td><input type="text" name="description"></td>  
            </tr>  
            <tr>  
                <td>Image:</td>  
                <td>:</td>  
                <td><input type="file" name="image"></td>  
            </tr>  
            <tr>  
                <td>Status:</td>  
                <td>:</td>  
                <td><input type="radio" name="status" value="1"> Yes 
                <input type="radio" name="status" value="0"> No</td> 
            </tr>  
            <tr>
                <td><input type="submit" name="submit" value="Save"> </td>
            </tr>
        </table>  
    </form>  
</body>  
</html>  