<?php
$id = $_GET["id"];



include("functions.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
  errorMsg($stmt);
}else{
    $view = $stmt->fetch();
}
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/sanitize.css">
<link rel="stylesheet" href="css/reset.css">

<style>

    table {
        margin:0 auto;
        width: 80%;
        border-collapse: collapse;
        font-size: 16px;
        margin-top: 24px;
        margin-bottom: 24px;
    }

    th {
        border: #e3e3e3 1px solid;
        text-align: left;
        vertical-align: middle;
        background: #f7f7f7;
        padding: 10px;
        font-weight: bold;
        line-height: 30px;
        width: 20%;
    }

    td {
        border: #e3e3e3 1px solid;
        text-align: left;
        vertical-align: middle;
        padding: 10px;
        line-height: 30px;
        width: 80%;
    }

    ul {
        display: flex;
        justify-content: center;
        list-style: none;
    }

    ul li {
        color: #fff;
        background: #00aaff;
        margin: 2px;
        padding: 7px;
        border-radius: 5px;
        box-shadow: 0 4px 0 #00aaff;
        cursor: pointer;
    }

    ul li:hover{
        opacity: 0.8;
    }

    a {
        color: #fff;
    }

</style>

<title>アンケート削除確認</title>

</head>
<body>
    <form action="delete.php" method="POST">
        <table>
            <tr>
                <th>名前</th>
                <td><?=$view["name"]?></td>
            </tr>
            <tr>
                <th>カナ</th>
                <td><?=$view["kana"]?></td>
            </tr>
            <tr>
                <th>郵便番号</th>
                <td><?=$view["postalcode"]?></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><?=$view["address"]?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?=$view["mail"]?></td>
            </tr>
            <tr>
                <th>志望動機</th>
                <td><?=$view["motive"]?></td>
            </tr>
            <tr>
                <th>メッセージ</th>
                <td><?=$view["message"]?></td>
            </tr>
        </table>
        <ul>
            <li><a href="select.php"><input type="button" value="戻る"></a></li>
            <li><input type="submit" value="削除"></li>
        </ul>
        </ul>
        <input type="hidden" name="name" value="<?=$view["name"]?>">
        <input type="hidden" name="kana" value="<?=$view["kana"]?>">
        <input type="hidden" name="postalcode" value="<?=$view["postalcode"]?>">
        <input type="hidden" name="address" value="<?=$view["address"]?>">
        <input type="hidden" name="mail" value="<?=$view["mail"]?>">
        <input type="hidden" name="motive" value="<?=$view["motive"]?>">
        <input type="hidden" name="message" value="<?=$view["message"]?>">
        <input type="hidden" name="id" value="<?=$view["id"]?>">
    </form>
</body>
</html>
