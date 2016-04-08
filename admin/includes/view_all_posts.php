<?php 
if(isset($_POST['checkBoxArray'])) {
    //assigns $check_box_value to each value in array 
    foreach($_POST['checkBoxArray'] as $post_value_id) {
        
        $bulk_options = $_POST['bulk_options']; 
        
        switch($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_value_id}";
                $update_to_published = mysqli_query($connection, $query);
                
                confirmQuery($update_to_published);
            break;
                
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_value_id}";
                $update_to_draft = mysqli_query($connection, $query);

                confirmQuery($update_to_draft);
            break;
                
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$post_value_id} ";
                $update_to_delete = mysqli_query($connection, $query);

                confirmQuery($update_to_delete);
            break;
        }
    }
}
?>


<form method="post">
<table class="table table-bordered table-hover">
   
   <div id="bulkOptionContainer" class="col-xs-4">
       <select class='form-control' name="bulk_options">
           <option value="">Select Options</option>
           <option value="published">Publish</option>
           <option value="draft">Draft</option>
           <option value="delete">Delete</option>
       </select>
   </div>
   <div class="col-xs-4">
       <input type="submit" name="submit" class="btn btn-success" value="Apply">
       <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
   </div>
    <thead>
        <tr>
           <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_category_id = $row["post_category_id"];
            $post_status = $row["post_status"];
            $post_image = $row["post_image"];
            $post_tags = $row["post_tags"];
            $post_comment_count = $row["post_comment_count"];
            $post_date = $row["post_date"];


            echo "<tr>";
            ?>
            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
            <?php
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            
            
            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
            $select_category_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_category_id)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];
                
                echo "<td>{$cat_title}</td>";
            }
            echo "<td>{$post_status}</td>";
            echo "<td><img width='100' src='../images/{$post_image}'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            //& divides parameters
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            //pass in "delete", delete get caught by super global below
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</form>

<?php
////////Delete posts//////////
    if(isset($_GET['delete'])) {
        $delete_post_id = $_GET['delete'];
        
        $query = "DELETE FROM posts WHERE post_id = '{$delete_post_id}' ";
        $delete_item = mysqli_query($connection, $query);
        header("Location: posts.php");
        
        if(!$delete_item) {
            die("ERROR " . mysqli_error($connection));
        }
    }
?>