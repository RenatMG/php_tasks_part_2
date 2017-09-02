<?php
function executeQuery($sql, $db = null){
    if($db == null){
        $db = mysqli_connect(HOST, USER, PASS, DB, PORT);
        mysqli_query($db, "SET NAMES utf8");
    }

    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function getAssocResult($sql, $db = null){
    if($db == null){
        $db = mysqli_connect(HOST, USER, PASS, DB);
        mysqli_query($db, "SET NAMES utf8");
    }

    $result = mysqli_query($db, $sql);
    $array_result = array();
    while($row = mysqli_fetch_assoc($result))
        $array_result[] = $row;

    mysqli_close($db);
    return $array_result;
}