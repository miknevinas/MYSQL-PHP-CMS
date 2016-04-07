<?php include "includes/admin_header.php"?>
    <body>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?> 

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome,
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
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