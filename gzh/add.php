<?php
    require_once './Db.php';
    if(!empty($_POST)) {
        $arr = array_merge($_POST, ['add_time' => time()]);
        if(Db::insert('books', $arr)) {
            echo '<script>alert("提交成功");location.href="./index.php"</script>';
        }
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
    <form method="post" action="./add.php">
        <div>
            book_name <input type="text" name="book_name" required/>
        </div>
        <div>
            price <input type="text" name="price" required/>
        </div>
        <div>
            isbn <input type="text" name="isbn" required/>
        </div>
        <div>
            种类 <select name="cat_id">
                <?php  
                    
                    $cats = Db::lists('cat');
                    foreach($cats as $cat) {
                        echo '<option value='.$cat['id'].' >'.$cat['cat_name'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div>
        author <input type="text" name="author" required/>
        </div>
        <div>
        info  <input type="text" name="info" required/>          
        </div>
        <div>
        adder <input type="text" name="adder" required/>  
        </div>
        <div>
            <input type="submit" value="添加" />
        </div>

    </form>
</body>
</html>