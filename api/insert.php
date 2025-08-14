<?php 

include_once "db.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

$table=$_POST['table'];
$db=${ucfirst($table)};

switch($table){
    case 'title':
    case 'about':
        $_POST['sh']=0; //預設為都不顯示
        break;
    case 'admin':
        break;
    default:
        $_POST['sh']=1; //預設為都顯示
        break;
}

// if($_POST['table']=='title'){
//     $_POST['sh']=0; //預設為都不顯示
// }else{
//     $_POST['sh']=1; //預設為都顯示
// }

unset($_POST['table']);

$db->save($_POST); //db裡沒有'table'，所以會失敗，所以要加unset()

to("../backend.php?do=$table");
?>