<!DOCTYPE html>  
<html>  
<head>  
    <title>Admin Products List</title>  
</head>  
<body>  

    <h4><a href="<?php echo base_url('AdminController/create') ?>" >Add Product</a></h4>

<ul>

  <li><a href="<?php echo base_url('Admin/userlogout');?>">Logout</a></li>
</ul>

    <?php

        if ($this->session->flashdata('errors') != '')
        {
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }


    ?>
        <table style="width:100%">
            <tr>
                <th>Id</th>
                <th>title</th>
                <th>image</th>
                <th>status</th>
                <th>Action</th>
            </tr>

            <?php foreach ($data as $product) { ?>  
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->title; ?></td>
                    <td><?php echo ($product->image) ? '<img src="../../uploads/'.$product->image.'" height="100px" width="100px"/>' : 'no image found' ?></td>
                    <td><?php echo $product->status == 1 ? 'Active' : 'In Active'; ?></td>
                    <td><a href="<?php echo base_url('AdminController/edit/'.$product->id) ?>">Edit</a> | <a href="<?php echo base_url('AdminController/delete/'.$product->id) ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>  
</body>  
</html>  