
<?php

$currentDir = basename(__DIR__);
chdir('media');
$files = glob('*.{webp,webm}', GLOB_BRACE);
asort($files);
$zipFiles = glob('*.zip');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentDir ?></title>
    <link rel="stylesheet" href="diapo.css">
    <!-- <link rel="stylesheet" href="blog.css"> -->
</head>
<body>

<nav>
    <h1>
        <?= $currentDir ?>
    </h1>

    <p>
        <?= count($files) ?> files
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
    <?php foreach ($files as $file) {
        echo '<div>';
        switch (pathinfo($file, PATHINFO_EXTENSION)) {
            case 'webm':
                ?>
                <video controls preload="none" id="<?= $file ?>" poster="media/poster/<?= pathinfo($file, PATHINFO_FILENAME) ?>.webp">
                    <source src="media/<?= $file ?>" type="video/webm">
                </video>
                <?php
                break;
            
            default:
                ?>
                <img src="media/<?= $file ?>" alt="" loading="lazy"  id="<?= $file ?>">
                <?php
                break;
        }
        echo '</div>';
    } ?>
</main>
    
</body>
</html>
