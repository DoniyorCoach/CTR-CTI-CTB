<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTR - CTI - CTB</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="container">
        <a href="/" class="back">⬅ Назад</a>
        <h1>CTR - CTI - CTB</h1>
        <?php
        $clicks = file('./clicks.txt');
        $shows = file('./shows.txt');
        $orders = file('./likes.txt');
        $visits = file('./visits.txt');

        $totalVisits = array_sum($visits);
        for ($i = 0; $i < 5; $i++) {
            $ctr = $shows[$i] > 0 ? round(intval($clicks[$i]) / intval($shows[$i]) * 100, 1) : 0;
            $cti = $visits[$i] > 0 ? round($clicks[$i] / $visits[$i] * 100, 2) : 0;
            $ctb = $clicks[$i] > 0 ? round($orders[$i] / $clicks[$i] * 100, 1) : 0;

        ?>
            <p class="result">
                <span class="caption">Баннер <?= $i + 1 ?></span>
                <span class="separator">:</span>
                <?= $ctr ?> %
                <span class="separator">|</span>
                <?= $cti ?> %
                <span class="separator">|</span>
                <?= $ctb ?> %
            </p>
        <?php
        }
        ?>
    </div>
</body>

</html>