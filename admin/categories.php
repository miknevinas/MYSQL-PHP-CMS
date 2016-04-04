<?php include "includes/admin_header.php"?>
<?php include "functions.php" ?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?> 

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php 
                            //Add categories
                            addCategories();
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            <?php
                            //Update and include categories
                            if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                
                                include "includes/update_categories.php";
                            }
                            ?>
                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //Find all categories
                                    getCategories();
                                    ?>
                                    
                                    <?php
                                    //Delete categories
                                   deleteCategory();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

<?php include "includes/admin_footer.php" ?>