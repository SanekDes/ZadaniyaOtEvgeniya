<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'formcomment';

//require_once 'connection.php'; // подключаем скрипт

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$query ='SELECT * FROM formcomment.comments';

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

if (isset($_POST["name"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $query = $link->query("INSERT INTO formcomment.comments (name , email, comment) VALUES ('$name','$email','$comment')");
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заданька от Жени</title>
</head>
<body>

<style>
    *{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    body{
        margin: 30px;
        font-family: Arial, sans-serif;
    }
    input,textarea{
        margin: 5px;
        width: 300px;
    }
    form{
        display: flex;
        flex-direction: column;
    }
    .comments{
        margin-bottom: 50px;
        width: 700px;
        height: 50px;
    }
    .image_profile{
        float: left;
        width: 60px;
        height: 60px;
        margin-right: 20px;
    }
    img{
        width: 60px;
        height: 60px;
        margin-right: 20px;
    }
    .comment_text{
        padding-left: 60px;
    }
    .comment_struct{

    }
</style>
<form action="" method="POST">
    <input type="text" name="name" placeholder="Ваше Имя"required>
    <input type="email" name="email" placeholder="Email"required>
    <textarea name="comment" id="comment" cols="30" rows="5"required></textarea>
    <input type="submit">
</form>

<hr>

<h2>комментарии</h2>

<?php

    $comment = 'SELECT * FROM formcomment.comments';
    $result = mysqli_query($link, $comment) or die("Ошибка" . mysqli_error($link));

while($items = mysqli_fetch_array($result)) {
    ?><div class="comments">
        <div class="image_profile">
           <img src="VOLKI-krasivye-i-ochen-umnye-zhivotnye.jpg">
        </div>
        <div class="comment_text">
            <?
    echo "<br>" . $items['name'] . "<br>" . $items['comment'];?>
        </div>
    </div>
    <?}?>
<!--<p>Здесь пока нет комментариев</p>-->

</body>
</html>