<?php
    header('Content-Type:text/html; charset=utf-8');
    require_once './Db.php';
    $where = [];  
    $cats = Db::lists('cat');
    $cat = [];
    foreach($cats as $v) {
        $cat[$v['id']] = $v['cat_name'];
    } 
    if(isset($_GET['action'])) {
        $action= $_GET['action'];
        switch($action) {
            case 'delete' :
            $id = $_GET['id'];
            if(Db::delete('books', ['id' => $id])) {
                echo '<script>alert("删除成功!");location.href="./index.php"</script>';
            };
            break;
            case 'search' :
            $field = $_GET['field'];
            if($field != 'cat_name') {
                $value = '%'.$_GET['value'].'%';
                $where[$field.' like '."'$value'"] = null;
            } else {
                $catid = 1;
                foreach($cat as $k => $v) {
                    if(strstr($v, $_GET['value']) !== false) {
                        $catid = $k;
                    }
                }
                $where['cat_id'] =  $catid;                
            }
            break;
        }
    }
    $books = Db::lists('books', $where);
    if(!$books) {
        echo '<script>alert("查询不到!");location.href="./index.php"</script>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lists</title>
</head>
<body>
    <center>图书信息</center>
    <center>
        <table border="1">
            <tr>
                <td>书名</td>
                <td>价格</td>
                <td>分类</td>
                <td>ISBN</td>
                <td>作者</td>
                <td>信息</td>
                <td>添加时间</td>
                <td>添加人</td>
                <td>操作</td>
            </tr>
            <?php
                foreach($books as $book) {
            ?>
                <tr>
                    <td><?=$book['book_name']?></td>
                    <td><?=$book['price']?></td>
                    <td><?=$cat[$book['cat_id']]?></td>
                    <td><?=$book['isbn']?></td>
                    <td><?=$book['author']?></td>
                    <td><?=$book['info']?></td>
                    <td><?=date('Y-m-d', $book['add_time'])?></td>
                    <td><?=$book['adder']?></td>
                    <td>
                        <a href="./update.php?id=<?=$book['id']?>">修改</a>
                        <a href="./index.php?action=delete&id=<?=$book['id']?>">删除</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
        <a href="./add.php">添加学生</a>
    </center>
    <center>
        <h2>搜索图书</h2>
        <form action="./index.php" method="get">
            <input type="hidden" value="search" name="action" />
            <select name="field">
                <option value="book_name" selected>书名</option>
                <option value="cat_name">分类名称</option>
                <option value="author">作者</option>
            </select>
            <input type="text" value="" name="value" />
            <input type="submit" value="提交" />
        </form>
    </center>
</body>
</html>
