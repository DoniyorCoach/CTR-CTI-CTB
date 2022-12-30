<?php

function Counter($path, $prop)
{
    $dataArray = file($path);
    $dataArray[$prop - 1] = (intval($dataArray[$prop - 1]) + 1) . "\n";
    file_put_contents($path, $dataArray);
}

function ClearRequest($path)
{
    header("Location: $path");
}

function GetUniqueNumber($min, $max, $currentNumber)
{
    while (true) {
        $unique = rand($min, $max);
        if ($unique !== intval($currentNumber)) {
            break;
        }
    }
    return $unique;
}