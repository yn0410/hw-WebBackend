<?php
include_once "db.php";

$table=$_POST['table'];
$db=${ucfirst($table)};
dd($_POST['id']);
dd($_POST['sh']);

foreach($_POST['id'] as $key => $id){
    echo "id";
    echo $id;
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $db->del($id);
    }else{
        $row=$db->find($id);
        // dd($row);
        switch($table){
            case 'admin':
                $row['acc']=$_POST['acc'][$key];
                $row['pw']=$_POST['pw'][$key];
                break;
            case 'banner':
                $row['alt']=$_POST['alt'][$key];
                $row['sh']=(isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
                break;
            case 'menu':
                $row['name']=$_POST['name'][$key];
                $row['description']=$_POST['description'][$key];
                $row['price']=$_POST['price'][$key];
                $row['sh']=(isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
                break;
            default: //about 
                if(isset($row['text'])){
                    $row['text']=$_POST['text'][$key]; //改資料庫內容
                }
                $row['sh']=(isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0; //有被選到=1;沒被選到=0;                    
            break;

        }
        $db->save($row); //$row 有id ，所以是更新內容(不是新增內容)
        dd($row);
    }
}

to("../backend.php?do=$table");



?>