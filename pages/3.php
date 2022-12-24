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
        E-MARKETPLACES или виртуальные торговые площадки

        Введение

        Существует распространенное мнение, что развитие Интернет покончит со множеством посредников. На деле происходит обратное, и, вместо сокращения количества прежних, Глобальная Сеть способствует появлению нового класса посредников. Возрастающие объемы В2В-коммерции приводят к возникновению e-marketplaces или виртуальных торговых площадок. Онлайновая торговая площадка - это место, где заключаются сделки между продавцом и покупателем, и осуществляется проведение финансово-торговых транзакций. Возможности Интернет позволяют совершать покупки/продажи в режиме реального времени, и, благодаря доступности Интернет, в торговой деятельности площадки могут участвовать компании из разных точек земного шара. Развитие торговых Интернет-площадок в перспективе (и, судя по всему, очень недалекой) позволит обеспечить более эффективный и свободный поток информации, товаров, платежей и других В2В услуг.
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