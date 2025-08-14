<?php include_once "db.php";

$table=$_POST['table'];
$db=${ucfirst($table)};
// dd($_POST['id']);
// dd($_FILES);

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
    $row=$db->find($_POST['id']);
    $row['img']=$_FILES['img']['name'];
    // dd($row['img']);
    $db->save($row);
}

to("../backend.php?do=$table");

?>