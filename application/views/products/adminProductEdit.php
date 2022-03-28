<!DOCTYPE html>  
<html>  
<head>  
    <title>Admin Products Edit</title>  
</head>  
<body>  
<h4><a href="<?php echo base_url('AdminController/index') ?>" >All Product</a></h4>
    <?php

        if ($this->session->flashdata('errors') != '')
        {
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }

    ?>
    <form method="post" action="<?php echo base_url('AdminController/update/'.$product->id);?>" enctype="multipart/form-data"> 
        <table> 
            <tr>  
                <td>Title:</td>  
                <td>:</td>  
                <td><input type="text" name="title" value="<?php echo $product->title; ?>"></td>  
            </tr>  
            <tr>  
                <td>Description:</td>  
                <td>:</td>  
                <td><input type="text" name="description" value="<?php echo $product->description; ?>"></td>  
            </tr>  
            <tr>  
                <td>Image:</td>  
                <td>:</td>  
                <td><input type="file" name="image" ></td> 
            </tr>  
            <tr>  
                <td>Status:</td>  
                <td>:</td>  
                <td><input type="radio" name="status" value="1" <?php echo $product->status == 1 ? 'checked': ''; ?>> Yes 
                <input type="radio" name="status" value="0" <?php echo $product->status == 0 ? 'checked': ''; ?>> No</td> 
            </tr>  
            <tr>
                <td><input type="submit" name="submit" value="Save"> </td>
            </tr>
        </table>  
    </form>  
</body>  
</html>  