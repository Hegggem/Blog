<?php 
include_once('resources/init.php');
$posts = get_posts((isset($_GET['id']) ? $_GET['id'] : null));

?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="css/style.css">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px;}
        </style>
        <title> My Blog </title>
    </head>
    <body>
    <div id="main">
        <div id ="nav">
        <nav>
            <ul>
                <li><a href="index.php"> Index </a></li>
                <li><a href="add_post.php"> Add a Post </a></li>
                <li><a href="add_category.php"> Add a Category </a></li>
                <li><a href="category_list.php"> Category List </a></li>
            </ul>
        </nav>
        </div>
        
        <div id="header">
        <h1> Heggem's riktigt freeena lök Blog </h1>
        </div>
        
        <?php
        foreach ($posts as $post){
            
            ?>
        <h2><a href='index.php?id=<?php echo $post['post_id'];?>'><?php echo $post['title'];?></a></h2>
        <p> Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted']));?>
            in <a href='category.php?id=<?php echo $post['category_id'];?>'><?php echo $post['name'];?></a>
        </p>
        <div> <?php echo nl2br($post['contents']);?> </div>
        
        <menu>
            <ul>
                <li><a href="delete_post.php?id=<?php echo $post['post_id']; ?>">Delete This Post</a></li>
                <li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>">Edit This Post</a></li>
            </ul>
        </menu>
            <?php 
        } 
        ?>
        
    </div>    
    </body>
</html>
