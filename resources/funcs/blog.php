<?php


function add_post($title, $contents, $category){
    
}

function edit_post($id, $title, $contents, $category){
    
}

function add_category($name){
    $name = mysql_real_escape_string($name);
    
    mysql_query("INSERT INTO categories SET name = '{$name}'");
    
    echo mysql_error();
}

function delete($field, $id){
    
}

function get_posts($id = null, $cat_id = null){
    
}

function get_categories($id = null){
    
    $category = array();
    
    $query = mysql_query("SELECT id, name FROM categories");
    
    while($row = mysql_fetch_assoc($query)){
        $categories[] = $row;
    }
    
    return $categories;
}

function category_exists($name){
    $name = mysql_real_escape_string($name);
    
    $query = mysql_query("SELECT COUNT(1) FROM categories WHERE name = '$name'") /*or die(mysql_error())*/;
    
    return (mysql_result($query, 0) == '0') ? false : true;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
