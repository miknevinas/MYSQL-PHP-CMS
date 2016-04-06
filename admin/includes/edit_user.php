<?php
//gets from switch statment
if(isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];
    
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $update_user = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($update_user)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

if(isset($_POST['edit_user'])) {

    $user_firstname = mysqli_real_escape_string($connection, $_POST['user_firstname']);
    $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);
    $user_role = $_POST['user_role'];

    //    $post_image = $_FILES['image']['name'];
    //    $post_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    
    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role = '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$user_password}' ";
    $query .="WHERE user_id = {$the_user_id} ";

    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);
}
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" value="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="">Role</label>
        <select name="user_role" id="">
            <option value="Subscriber"><?php echo $user_role; ?></option>
           <?php 
            if($user_role === 'Admin') {
                echo "<option value='Subscriber'>Subscriber</option>";
            } else {
                echo "<option value='Admin'>Admin</option>";
            }
            ?>
            
        </select>
    </div>

    <!--
<div class="form-group">
<label for="post_image">Post Image</label>
<input type="file" name="image">
</div>
-->

    <div class="form-group">
        <label for="">Username</label>
        <input type="text" value="<?php echo $username; ?>"  class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" value="<?php echo $user_email; ?>"  class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" value="<?php echo $user_password; ?>"  class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
</form>