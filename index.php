<?php

ob_start();

define("BASE", "https://localhost/organizze");
define("THEME", "Organizze");
define("THEME_PATH", __DIR__ . "/theme");
define("THEME_LINK", BASE . "/theme");

$configBase = BASE;
$configUrl = explode("/", strip_tags(filter_input(INPUT_GET, "url", FILTER_DEFAULT)));
$configUrl[0] = (!empty($configUrl[0]) ? $configUrl[0] : "index");
$configThemePath = THEME_PATH;
$configThemeLink = THEME_LINK;
$configSiteName = "Organizze";
//var_dump($configUrl);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="<?= $configBase ?>/assets/fontastic/styles.css">
    <link rel="stylesheet" href="<?= $configBase ?>/assets/styles/boot.css">
    <link rel="stylesheet" href="<?= $configThemeLink ?>/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">

</head>

<body>
    <?php

    //search
    // $searchForm = strip_tags(trim(filter_input(INPUT_POST, "s", FILTER_DEFAULT)));
    // if (!empty($searchForm)) {

    //     header("Location: {$configBase}pesquisa/{$searchForm}");
    //     exit;
    // }

    //header
    require "{$configThemePath}/header.php";

    //query string
    if (file_exists("{$configThemePath}/{$configUrl[0]}.php") && !is_dir("{$configThemePath}/{$configUrl[0]}.php")) {

        //theme root
        require "{$configThemePath}/{$configUrl[0]}.php";

        if($configUrl[0] == "index"){

            require "{$configThemePath}/offer.php";
            require "{$configThemePath}/callToAction.php";
            require "{$configThemePath}/functionalities.php";
            require "{$configThemePath}/socialProof.php";
            require "{$configThemePath}/plans.php";
            require "{$configThemePath}/blog.php";

        }

    } elseif (!empty($configUrl[1]) && file_exists("{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php") && !is_dir("{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php")) {

        //theme folder
        require "{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php";
    } else {

        //error
        if (file_exists("{$configThemePath}/404.php") && !is_dir("{$configThemePath}/404.php")) {

            require "{$configThemePath}/404.php";
        } else {

            echo "<div class='container'><div class='trigger trigger-error icon-times radius'>Oooops! página não encontrada.</div></div>";
        }
    }


    //require "./theme/wdpshoes/index.php";

    //footer
    require "{$configThemePath}/footer.php";

    ?>
</body>

</html>
<?php ob_end_flush(); ?>