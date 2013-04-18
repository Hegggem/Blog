<?php
include_once ('resources/init.php');
?>

<!DOCTYPE html>

<html lang = ""en>

<head>


    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = ""Ie = "edge,chrome=1">


<title>Title of the document</title>
</head>

<body>

<?php


foreach (get_categories() as $category){
    ?>
    <p><a href="category_list.php?id=<?php echo $category ['id'];?>"> <?php echo $category ['name']; ?></a>
        - <a href="delete_category.php?id=<?php echo $category['id']; ?>"> DELETE</a></p> 
    
    <?php
}


?>
    
</body>

</html>


