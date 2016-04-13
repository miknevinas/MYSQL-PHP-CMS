<!--Include connection-->
<?php include "includes/db.php"?>
<!--Header-->
<?php include "includes/header.php"?>

<body>
    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <!--Pull posts from database-->
                <?php 
                    $query = "SELECT * FROM posts";
                    $select_all_posts_query = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_id = $row["post_id"];
                        $post_title = $row['post_title'];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_image = $row["post_image"];
                        $post_content = substr($row["post_content"], 0, 230);
                        $post_status = $row["post_status"];
                        
                        if($post_status === 'published') {      
                ?>

                <!-- Blog Posts -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                   <?php } } ?>
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Wordsmith/Codesmith 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    
    <!-- scripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<!--Footer-->
<?php include "includes/footer.php" ?>