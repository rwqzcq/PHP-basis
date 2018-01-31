<?php
header('Content-Type:text/html; charset=utf-8');
require_once './Db.php';
if(isset($_GET['id'])) {   
    $item = Db::item('books', ['id' => $_GET['id']]);
}else if($_GET['action'] == 'update') {
    if(Db::update('books', $_POST, ['id' => $_GET['bid']])) {
        echo '<script>alert("提交成功");location.href="./index.php"</script>';
    }
} else {
    exit('非法传值');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>books add</title>
</head>
<body>
    <form method="post" action="./update.php?action=update&bid=<?=$item['id']?>">
        <div>
            book_name <input type="text" name="book_name" value="<?=$item['book_name']?>" required/>
        </div>
        <div>
            price <input type="text" name="price" value="<?=$item['price']?>" required/>
        </div>
        <div>
            isbn <input type="text" name="isbn" value="<?=$item['isbn']?>" required/>
        </div>
        <div>
            种类 <select name="cat_id">
                <?php  
                    
                    $cats = Db::lists('cat');
                    foreach($cats as $cat) {
                        $str = '';
                        if($cat['id'] == $item['cat_id']) $str = 'selected';
                        echo '<option value='.$cat['id'].'  $str >'.$cat['cat_name'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div>
        author <input type="text" name="author" value="<?=$item['author']?>"  required/>
        </div>
        <div>
        info  <input type="text" name="info" value="<?=$item['info']?>" required/>          
        </div>
        <div>
        adder <input type="text" name="adder" value="<?=$item['adder']?>" required/>  
        </div>
        <div>
            <input type="submit" value="修改" />
        </div>

    </form>
</body>
</html>