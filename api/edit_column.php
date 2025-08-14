<?php
include_once "db.php";

$table=$_POST['table'];
// dd($table);
$db=${ucfirst($table)};
// $row=$db->find(1);
/* $row=$db->find($_POST['id']);
$row['total']=$_POST['total'];
$db->save($row); */
// $row 與 $_POST只差在$_POST多了一個['table'=>"total"]而已
unset($_POST['table']);
$db->save($_POST);


to("../backend.php?do=$table");



?>