<?php

function Counter ($path, $filename)
{
    $dataArray = file($path);
    $dataArray[$filename - 1] = (intval($dataArray[$filename - 1]) + 1) . "\n";
    file_put_contents($path, $dataArray);
}

function ClearRequest ($path) {
    header("Location: $path");
    exit();
}