<?php
include_once ('resources/init.php');

$errors = array();

if (isset($_POST['title'], $_POST['contents'], $_POST['category'])) {
    
    $title = trim($_POST['title']);
    $contents = trim($_POST['contents']);
    
    if (empty($title)) {
        $errors[] = "you have to enter some text into title";
    } else if (strlen($title) > 225) {
        $errors[] = "this title has to mane characters in it.";
    }
    
    if (empty ($contents)) {
        $errors[] = "you have to enter some text into the content";
    }
    
    if (! category_exists('id', $_POST['category'])){
        $errors[] = "that category does not exist";
    }
    
    if (empty($errors)) {
        add_post($title, $contents, $_POST['category']);
        
        $id = mysql_insert_id();
        
        header("Location: index.php?id={$id}");
        die();
    }
}
?>
<!DOCTYPE html>

<html lang = ""en>

<head>


    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = ""Ie = "edge,chrome=1">


<title>Add a post</title>
</head>

<body>
    <h1>Add a post</h1>
    
    <?php 
if (isset($errors) && ! empty($errors)){
    echo "<ul><li>", implode('</li><li>',$errors), "</li></ul>";
}
echo mysql_error();    
?>
    
    <form action="" method="post">
        
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="<?php if (isset($_POST['title']) )  echo $_POST['title'];?>">
        </div>
        <div>
                <label for = "contents"> Contents</label>
                <textarea name = "contents" rows = "15" cols = "50"><?php if ( isset($_POST['contents']) ) echo $_POST['contents'];?></textarea>
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category">
                <?php
                foreach (get_categories() as $category){
                    ?>
                <option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Add post">
        </div>
</body>

</html>



