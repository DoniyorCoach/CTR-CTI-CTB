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
    <div class="container">
        <a href="/" class="back">⬅ Назад</a>
        <p class="info">
            "С чего начать создание системы Электронной Коммерции или Интернет-магазина?", - спрашиваете вы. Но сначала давайте уточним, какое из звеньев торговой цепочки занимает ваша компания? Какую часть своих бизнес-процессов она хотела бы перевести в электронную форму? И, наконец, какие именно сферы вашей деятельности можно оптимизировать, используя Интернет-технологии?
        </p>
        <form>
            <input type="submit" name="like" class="likeBtn" value="🔥">
        </form>

        <?php
        include_once '../vendor/functions.php';

        $path = basename(__FILE__);
        $fileNumber = str_replace('.php', '', $path);

        $randomNumber = GetUniqueNumber(1, 5, $fileNumber);

        //visits
        Counter('../stats/visits.txt', $fileNumber);

        //shows 
        Counter('../stats/shows.txt', $randomNumber);

        //clicks
        if (!empty($_GET['fromAds'])) {
            Counter('../stats/clicks.txt', $fileNumber);
            ClearRequest("http://banner/pages/$path");
        }

        //likes
        if (!empty($_GET['like'])) {
            Counter('../stats/likes.txt', $fileNumber);
            ClearRequest("http://banner/pages/$path");
        }

        ?>
        <a href="<?= './' . $randomNumber . '.php/?fromAds=true' ?>" class="banner">
            <img src="<?= '/gifs/' . $randomNumber . '.gif' ?>" alt="ads">
        </a>
    </div>
</body>

</html>