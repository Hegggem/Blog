<?php
include_once 'resources/init.php';

if ( isset($_POST['name'])){
    $name = trim($_POST['name']);
    print_r($name);


if( empty($name)){
    $error = "You must usubmit a category name.";
}else if(category_exists('name', $name)){
    $error = "that category already exists";
}else if(strlen($name) > 24){
    $error = "category names can only be up to 24 letters";
}

if (!isset($error)){
    add_category($name);
}
    
}//end isset
?>

<!DOCTYPE html>

<html lang = ""en>

<head>


    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = ""Ie = "edge,chrome=1">


<title>Add a category</title>
</head>

<body>

    <h1>Add category</h1>
    
    <?php
    if(isset($error)){
        echo "<p> {$error} </p>";
    }
    ?>
    
    <form action="" method="post">
        <div>
            <label for="name"> Name </label>
            <input type="text" name="name" value="">
        </div>
        <div>
            <input type='submit' value='Add category'>
        </div>
            
    </form>
</body>

</html>



