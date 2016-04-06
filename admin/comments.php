<?php include "includes/admin_header.php" ?>
<?php include "functions.php" ?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?> 

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">

                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <?php 
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch($source) {
                        case 'add_post';
                            include 'includes/add_post.php';
                            break;

                        case 'edit_post';
                            include 'includes/edit_post.php';
                            break;

                        default:
                            include 'includes/view_all_comments.php';
                            break;
                    }

                    ?>
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