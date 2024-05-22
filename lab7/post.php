<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    return $conn;
  }
  
  function closeDBConnection(mysqli $conn): void {
    $conn->close();
  }
  
  $conn = createDBConnection();
  $sql = "SELECT * FROM post";
  $result = $conn->query($sql);
  $featured_post = $result->fetch_all(MYSQLI_ASSOC);
  //var_dump($featured_post);
  closeDBConnection($conn);

$postId = $_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>the-road-ahead</title>
    <link rel="stylesheet" href="http://localhost:8001/static/css/style.css">
    <link href="https://fonts.cdnfonts.com/css/lora" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <p class="logo">Escape.</p>
            <nav class="navigation">
                <ul class="list">
                    <li>
                        <a class="menu_home" href="#">HOME</a>
                    </li>
                    <li>
                        <a class="menu_categoties" href="#">CATEGORIES</a>
                    </li>
                    <li>
                        <a class="menu_about" href="#">ABOUT</a>
                    </li>
                    <li>
                        <a class="menu_contact" href="#">CONTACT</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">

            <?php
            if (($postId >= 0) && ($postId <= 40)) { ?>
                <div class="title__container">
                    <div class="title__text">
                        <h1><?= $featured_post[$postId - 1]['title']  ?> </h1>
                        <p><?= $featured_post[$postId - 1]['subtitle'] ?></p>
                    </div>
                </div>
                <div class="frame_image">
                    <img class="image" src='http://localhost:8001/static/images/<?= $featured_post[$postId - 1]['image_post_url'] ?>' alt=<?= $featured_post[$postId - 1]['img_name'] ?>>
                </div>
                <div class="text">
                    <p><?= $featured_post[$postId - 1]['content'] ?></p>
                </div>     
                <?php
            }
            else { 
                var_dump($postId);
                header('Location: http://localhost:8001/home');
                exit;
            }
            ?>
    </main>
    <footer class="footer">
        <div class="footer-text">
            <p class="logo">Escape.</p>
            <nav class="navigation">
                <ul class="list list_color">
                    <li>
                        <a class="menu_home" href="#">HOME</a>
                    </li>
                    <li>
                        <a class="menu_categoties" href="#">CATEGORIES</a>
                    </li>
                    <li>
                        <a class="menu_about" href="#">ABOUT</a>
                    </li>
                    <li>
                        <a class="menu_contact" href="#">CONTACT</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>