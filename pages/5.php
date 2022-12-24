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
        Интернет-страхование

        Введение

        Со временем все большее число финансовых институтов используют возможности сети Интернет для предоставления своих услуг. Первыми были банки и другие инвестиционные посредники, теперь к ним присоединились страховые компании. Несмотря на то, что российскому рынку Интернет-страхования всего около года, на нем уже представлено около 10 страховщиков, которые, так или иначе, оказывают свои услуги через Интернет. Естественно, как и для любой другой формы электронного бизнеса, рынок Интернет-страхования наиболее развит в Америке. В США, наряду с обычными страховыми компаниями, в Сети представлено большое число страховых брокеров (страховые порталы), которые дают возможность клиенту подобрать необходимую компанию и купить у нее полис через Интернет. В последнее время и в России стали появляться подобные Web-сайты. Одни из них просто предназначены для описания ситуации на рынке, консалтинга и пр.1, а другие дают возможность получить полис от выбранной Вами компании, не выходя из дома 2.
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