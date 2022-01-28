<?php

function conn()
{
    try {
        $db = new mysqli(HOST, USER, PASS, DATABASE);
        return $db;
    } catch (\Exception $th) {
        die($th);
    }
}

function close_conn($db)
{
    mysqli_close($db);
}


