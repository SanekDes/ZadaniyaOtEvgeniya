<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'testbd';

//require_once 'connection.php'; // подключаем скрипт

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$query ='SELECT * FROM testbd.test';

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

// К базе подключен, база данных выбрана

    echo "<table><tr><th>id</th><th>Имя</th><th>Фамилия</th><th>Возрост</th></tr>";

    while($items = mysqli_fetch_array($result)) {
        echo "<tr><th>" . $items['id'] . "</th>";
        echo "<th>" . $items['name'] . "</th>";
        echo "<th>" . $items['surname'] . "</th>";
        echo "<th>" . $items['age'] . "</th></tr>";
    }
    echo "</table>";
    echo '<hr>';

    $otbmin = 'SELECT * FROM testbd.test ORDER BY age';
    $result = mysqli_query($link, $otbmin) or die("Ошибка " . mysqli_error($link));


echo "<table><tr><th>id</th><th>Имя</th><th>Фамилия</th><th>Возрост</th></tr>";

    $items = mysqli_fetch_array($result);
        echo "<tr><th>" . $items['id'] . "</th>";
        echo "<th>" . $items['name'] . "</th>";
        echo "<th>" . $items['surname'] . "</th>";
        echo "<th>" . $items['age'] . "</th></tr>";

    echo "</table>";
    echo '<hr>';

$otbmax = 'SELECT * FROM testbd.test ORDER BY age DESC';
$result = mysqli_query($link, $otbmax) or die("Ошибка " . mysqli_error($link));

    echo "<table><tr><th>id</th><th>Имя</th><th>Фамилия</th><th>Возрост</th></tr>";

    $items = mysqli_fetch_array($result);
        echo "<tr><th>" . $items['id'] . "</th>";
        echo "<th>" . $items['name'] . "</th>";
        echo "<th>" . $items['surname'] . "</th>";
        echo "<th>" . $items['age'] . "</th></tr>";

    echo "</table>";
echo '<hr>';

// очищаем результат
    mysqli_free_result($result);

    mysqli_close($link);