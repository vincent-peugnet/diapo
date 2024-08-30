
<?php

$currentDir = basename(__DIR__);
chdir('media');
$files = glob('*.{webp,webm}', GLOB_BRACE);
sort($files);
$total = count($files);
$indexMax = $total - 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentDir ?></title>
    <link rel="stylesheet" href="diapo.css">
</head>
<body>

<nav>
    <h1>
        <?= $currentDir ?>
    </h1>

    <p>
        <?= $total ?> files
    </p>

    <ul>
    <?php foreach ($files as $file) {
        ?>
            <li>
                <a href="#<?= $file ?>">
                    <img src="media/thumbnail/<?= pathinfo($file, PATHINFO_FILENAME) ?>.webp" alt="" loading="lazy">
                </a>
            </li>
        <?php
    } ?>
    </ul>
</nav>

<main dir="ltr">
    <?php foreach ($files as $key => $file) {
        if ($key == 0) {
            $prev = $files[$indexMax];
        } else {
            $prev = $files[$key - 1];
        }
        if ($key == $indexMax) {
            $next = $files[0];
        } else {
            $next = $files[$key + 1];
        }
        echo "<div id=\"$file\">";
        echo "<a class=\"dir prev\" href=\"#$prev\"></a>";
        switch (pathinfo($file, PATHINFO_EXTENSION)) {
            case 'webm':
                ?>
                <video controls preload="none" poster="media/poster/<?= pathinfo($file, PATHINFO_FILENAME) ?>.webp" class="media">
                    <source src="media/<?= $file ?>" type="video/webm">
                </video>
                <?php
                break;
            
            default:
                ?>
                <img src="media/<?= $file ?>" alt="" loading="lazy" class="media">
                <?php
                break;
        }
        echo "<a class=\"dir next\" href=\"#$next\"></a>";
        echo '</div>';
    } ?>
</main>
    
</body>
</html>
