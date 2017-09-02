<?php
require_once(".." . DIRECTORY_SEPARATOR . "engine" . DIRECTORY_SEPARATOR . "functions.php");
require_once(".." . DIRECTORY_SEPARATOR . "engine" . DIRECTORY_SEPARATOR . "db.lib.php");
require_once(".." . DIRECTORY_SEPARATOR . "engine" . DIRECTORY_SEPARATOR . "readFile.php");
require_once(".." . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php");

?>


<div class="answer">


    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <?php
    $arr3 = ['a','b', 'c', 'd', 'e','f','g','h','i', 'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    $arr4 = str_split(strtoupper(implode($arr3)));
    function find_missing_letter(array $array)/*: string*/
    {

        $abc = "abcdefghijklmnopqrstuvwxyz";
        $abcUp = strtoupper($abc);
        $arr1 = str_split($abc);
        $arr2 = str_split($abcUp);
//        $arr2 = str_split(strtolower(implode($arr3)));
        $registr = 0;
        for ($i = 0; $i< count($array); $i++) {
            if ($i === 0 && $arr1[$i] !== $array[$i]){
                if($arr1[$i+1] === $array[$i]){
                    return $arr1[$i];
                }elseif ($arr2[$i+1] === $array[$i]) {
//                    echo $registr;
                    return $arr2[$i];
                }
            }

//            echo $arr1[$i].'+++'.$array[$i]."<br>";

            if($arr1[$i] === $array[$i]){
                $registr++;
            }
//echo $flag;
            if ($registr !== 0 && $arr1[$i] !== $array[$i]) {

                    return $arr1[$i];

            } elseif ($registr == 0 && $arr2[$i] !== $array[$i]) {
//                echo $registr;
                    return $arr2[$i];
                }
            }

    }

    echo find_missing_letter($arr4);
    ?>

    <div class="task">
        1. PHP task1.csv
        Создать класс с&nbsp;публичным методом import($filename)
        &mdash;&nbsp;Все созданные функции должны быть членами класса !
        &mdash;&nbsp;Прочитать csv файл ( в&nbsp;первой строке название колонок в&nbsp;произвольном порядке)
        &mdash;&nbsp;Заполнить массив ( каждый элемент массива&nbsp;&mdash; ассоциативный массив , название колонки
        используется как ключ)
        &mdash;&nbsp;Отсортировать по&nbsp;Price (usort)
        &mdash;&nbsp;Вернуть массив (первые 5&nbsp;элементов отсортированного на&nbsp;предыдущем шаге)
        <br>

        <?php

        $fromFile = new readFile();
        $fromFile->showElements($fromFile->sortByPrice($fromFile->import('task1.csv')), 5);

        ?>
    </div>
    <div class="task">
        <p>2. Jquery task2.html</p>
        <p> После загрузки страницы:</p>
        <ul>
            <li> &mdash;&nbsp;скрыть таблицу и&nbsp;показать с&nbsp;задержкой 1&nbsp;сек</li>
            <li>&mdash;&nbsp;изменить фон второй строки на&nbsp;красный</li>
            <li> &mdash;&nbsp;при клике на&nbsp;ячейку таблицы добавить &laquo;+&raquo; в&nbsp;ячейку</li>
            <li> &mdash;&nbsp;при двойном клике создать дубликат строки</li>
        </ul>
    </div>
    <table class="task-2">
        <tr>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
        </tr>
        <tr>
            <td>4</td>
            <td>0</td>
            <td>4</td>
            <td>0</td>
            <td>4</td>
            <td>0</td>
        </tr>
        <tr>
            <td>5</td>
            <td>6</td>
            <td>6</td>
            <td>6</td>
            <td>6</td>
            <td>6</td>
        </tr>
        <tr>
            <td>A</td>
            <td>A</td>
            <td>A</td>
            <td>A</td>
            <td>A</td>
            <td>A</td>
        </tr>
        <tr>
            <td>Z</td>
            <td>Z</td>
            <td>Z</td>
            <td>Z</td>
            <td>Z</td>
            <td>Z</td>
        </tr>
    </table>
    <div class="task">
        3. Mysql task3.sql
        написать 3 sql запроса, выбрать
        1) название модели и количество машин
        2) машины ссылающиеся на несуществующие модели
        3) название модели и сумму цен машин (игнорировать машины с ценой 10 ,
        так же не выбирать если сумма цен 60)

        <?php
        $sql = "CREATE TABLE IF NOT EXISTS `cars` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `model_id` int(11) NOT NULL,
                `price` int(11) NOT NULL,
                 PRIMARY KEY(`id`),
                 KEY `model_id` (`model_id`))
                 ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 11";

        executeQuery($sql);

        $sql = "INSERT INTO `cars` (`id`, `model_id`, `price`)
                VALUES (1, 1, 10),
                       (2, 1, 20),
                       (3, 1, 15),
                       (4, 1, 20),
                       (5, 2, 15),
                       (6, 2, 25),
                       (7, 2, 35),
                       (8, 2, 35),
                       (9, 3, 11),
                       (10, 4, 15)";

        executeQuery($sql);

        $sql = "CREATE TABLE IF NOT EXISTS `models` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                 PRIMARY KEY (`id`),
                 UNIQUE KEY `name` (`name`))
                 ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3";

        executeQuery($sql);

        $sql = "INSERT INTO `models` (`id`, `name`)
                VALUES (2, 'Focus'),
                       (1, 'Mondeo')";

        executeQuery($sql);

        $sql1 = "SELECT  models.name, SUM(model_id) AS count_cars FROM cars
                 INNER JOIN models ON cars.model_id = models.id
                 GROUP BY models.name";
        $result = getAssocResult($sql1);
        echo "<table class='task-3'>
                <tr>
                    <td>Модель</td><td>Количество</td>
                </tr>";
        for ($i = 0; $i < count($result); $i++) {
            echo "<tr>
                    <td>" . $result[$i]['name'] . "</td><td>" . $result[$i]['count_cars'] . "</td>
                  </tr>";
        };
        echo "</table>";

        $sql2 = "SELECT * FROM cars 
                 LEFT JOIN models ON cars.model_id = models.id
                 WHERE models.id IS NULL";
        $result = getAssocResult($sql2);
        echo "<table class='task-3'>
                <tr>
                    <td>ID Модели</td><td>Цена</td><td>Примечание</td>
                </tr>";
        for ($i = 0; $i < count($result); $i++) {
            echo "<tr>
                    <td>" . $result[$i]['model_id'] . "</td><td>" . $result[$i]['price'] . "</td><td>Нет информации о модели</td>
                  </tr>";
        };
        echo "</table>";
        $sql3 = "SELECT models.name, SUM(price) AS total_price
                  FROM cars
                  INNER JOIN models ON cars.model_id = models.id
                  WHERE price <> 10 
                  GROUP BY models.name
                  HAVING total_price <> 60";

        $result = getAssocResult($sql3);
        echo "<table class='task-3'>
                <tr>
                    <td>ID Модели</td><td>Сумма цен</td>
                </tr>";
        for ($i = 0; $i < count($result); $i++) {
            echo "<tr>
                    <td>" . $result[$i]['name'] . "</td><td>" . $result[$i]['total_price'] . "</td>
                  </tr>";
        };
        echo "</table>";

        ?>
    </div>
</div>
<div class="task">
    4. Алгоритмы
    написать функцию get_missed_number($sequence)
    массив $sequence&nbsp;&mdash; арифметическая прогрессия, в&nbsp;которой пропущено одно число (в&nbsp;середине,
    не&nbsp;первое и&nbsp;не
    последнее)
    функция возвращает это число или false , если в&nbsp;массиве меньше двух элементов
    примеры
    <ul>
        <li>[] вернуть false</li>
        <li>[12] =&gt; false</li>
        <li>[1,11] =&gt; 6</li>
        <li>[1,11,31] =&gt; 21</li>
        <li>[1,21,31,41] =&gt; 11</li>
    </ul>
    <?php
    $arr = [1, 21, 31, 41];
    print_r($arr);
    echo "<br>Пропущенный элеммент: " . get_missed_number($arr);
    ?>
    <br>


</div>
<script src="libs/jquery-3.2.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
