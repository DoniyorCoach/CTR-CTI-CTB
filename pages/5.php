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
            Со временем все большее число финансовых институтов используют возможности сети Интернет для предоставления своих услуг. Первыми были банки и другие инвестиционные посредники, теперь к ним присоединились страховые компании. Несмотря на то, что российскому рынку Интернет-страхования всего около года, на нем уже представлено около 10 страховщиков, которые, так или иначе, оказывают свои услуги через Интернет. Естественно, как и для любой другой формы электронного бизнеса, рынок Интернет-страхования наиболее развит в Америке.
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