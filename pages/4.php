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
    <a href="/index.php" class="back">⬅ Назад</a>
    <p>
        Интернет-банкинг

        Введение

        Интернет-банкинг является наиболее динамичным и представительным направлением финансовых решений в Интернет. Этому способствует широкий спектр банковских услуг, представленных в подобных системах. Интернет-банкинг предоставляет возможность совершать все стандартные операции, кото-рые могут быть осуществлены клиентом в офисе банка, за исключением операций с наличными:
    </p>
    <form>
        <input type="submit" name="order" value="заказать">
    </form>

    <?php
    include_once '../vendor/functions.php';
    $randomNumber;

    $path = basename(__FILE__);
    $filename = str_replace('.php', '', $path);

    while (true) {
        $randomNumber = rand(1, 5);
        if ($randomNumber !== intval($filename)) {
            break;
        }
    }

    //visits
    Counter('../stats/visits.txt', $filename);

    //shows 
    Counter('../stats/shows.txt', $randomNumber);

    //clicks
    if (!empty($_GET['fromAds'])) {
        Counter('../stats/clicks.txt', $filename);
        ClearRequest("http://lab8/pages/$path");
    }

    //orders
    if (!empty($_GET['order'])) {
        Counter('../stats/orders.txt', $filename);
        ClearRequest("http://lab8/pages/$path");
    }

    ?>
    <a href="<?= './' . $randomNumber . '.php/?fromAds=true' ?>">
        <img src="<?= '/gifs/' . $randomNumber . '.gif' ?>" alt="ads">
    </a>
</body>

</html>