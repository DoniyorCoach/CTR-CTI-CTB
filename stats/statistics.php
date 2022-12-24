<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <?php
    $clicks = file('./clicks.txt');
    $shows = file('./shows.txt');
    $orders = file('./orders.txt');
    $visits = file('./visits.txt');

    $totalVisits = array_sum($visits);

    ?>
    <h1>CTR - CTI - CTB</h1>
    <?php
    for ($i = 0; $i < 5; $i++) {
        $ctr = $shows[$i] > 0 ? round(intval($clicks[$i]) / intval($shows[$i]) * 100, 1) : 0;
        $cti = $visits[$i] > 0 ? round($clicks[$i] / $visits[$i] * 100, 2) : 0;
        $ctb = $clicks[$i] > 0 ? round($orders[$i] / $clicks[$i] * 100, 1) : 0;

    ?>
        <p class="result">Banner <?= $i + 1 ?> : <?= $ctr ?> % | <?= $cti ?> % | <?= $ctb ?> %</p>
    <?php
    }

    ?>
</body>

</html>