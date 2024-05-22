<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="http://localhost:8001/static/css/admin_style.css">
    <link href="https://fonts.cdnfonts.com/css/lora" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body class="backcolor">
    <header>
        <div class="header">
            <img class="header_logo" src='http://localhost:8001/static/images/Logo.png' alt='kmdf'>
            <div class="header_menu">
                <img class="header_img" src='#' alt=''>
                <img class="header_log-out" src='http://localhost:8001/static/images/log-out.png' alt='hbvs'>
            </div>
        </div>
    </header>
    <main class="container">
        <form action="" method="post" enctype="multipart/form-data" id="form" >
        <div class="container_main">
            <div class="container_main__publish">
                <div class="container_main__publish_text">
                    <h1 class="container_main__publish_text-title">New Post</h1>
                    <p class="container_main__publish_text-subtitle">Fill out the form bellow and publish your article</p>
                </div>
                <input type="submit" class="publish_button" name="submit" id="submit" value="Publish">
            </div>
            
            <div class="container_main__data">
                <div class="error_alarm" id="error_alarm">
                        <img class="alarm-image" src="http://localhost:8001/static/images/alert-circle.png" alt="">
                        <p>Whoops! Some fields need your attention :o</p>
                </div>
                <div class="success_alarm" id="success_alarm">
                        <img class="alarm-image" src="http://localhost:8001/static/images/check-circle.png" alt="">
                        <p>Publish Complete!</p>
                </div>
                <div class="container_main__data-form">
                    
                    <div class="first">
                    <h2 class="container_main__data-title">Main Information</h2>
                        <div class="data">
                            <label class="caption" for="title" id="caption">Title</label>
                            <input class="title_input" type="text" placeholder="New Post" name="title_input" id="title_input">

                            <label class="caption" for="subtitle">Short description</label>
                            <input class="subtitle_input" type="text" placeholder="Please, enter any description" name="subtitle_input" id="subtitle_input">

                            <label class="caption" for="author">Author name</label>
                            <input class="data__author" type="text" name="author" id="author_input">
                            <p class="caption">Author Photo</p>
                            <div class="container_author-image">
                                <label class="container_author-image_upload" for="author_image_input">
                                    
                                    <div class="data__author_url-icon" id="author-url">
                                        <div>
                                            <img src="http://localhost:8001/static/images/camera.png" alt="">
                                        </div>
                                    </div>
                                    <p class="upload_button" id="upload_button">Upload</p>
                                    <div class="image_button-upload" id="upload-image-author">
                                        <img class="image_button-icon" src="http://localhost:8001/static/images/camera.png" alt="">
                                        
                                        <p>Upload New</p>
                                    </div>
                                    
                                </label>
                                <div class="image__button_remove-author image_button-remove" id="remove-image-author">
                                    <img class="image_button-icon" src="http://localhost:8001/static/images/trash-2.png" alt="">
                                    <p>Remove</p>
                                </div>
                                <input class="author_image_input" type="file" value="" name="author_image_input" id="author_image_input">
                            </div>
                    

                            <label for="publish_date">
                            <p class="caption">Publish Date</p>
                            </label>
                            <input class="data__publish_date" type="date"   value="<?= date('Y-m-d')?>" name="publish_date" id="publish_date_input">
                            <label class="upload_image-preview" for="post_image_input">
                                
                                <p class="caption">Hero Image</p>
                                <div class="data__image_url-icon_big" id="image-container">
                                    <div class="upload_logo">
                                        <img  src="http://localhost:8001/static/images/camera.png" alt="">
                                        <p class="button">Upload</p>
                                    </div>
                                    <input class="data__image_url-big" type="file" value="" name="image_url-1" id="post_image_input" multiple>
                                </div>
                                
                                <p class="caption undercaption-big" id="undercaption-big">Size up to 10mb. Format: png, jpeg, gif.</p>
                                
                            </label>
                            <div class="image_button">
                            <label class="upload_image-preview" for="post_image_input">
                                <div class="image_button-upload" id="upload-image-preview">
                                    <img class="image_button-icon" src="http://localhost:8001/static/images/camera.png" alt="">
                                    <p>Upload New</p>
                                </div>
                                </label>
                                <div class="image__button_remove-preview image_button-remove" id="remove-image-preview">
                                    <img class="image_button-icon" src="http://localhost:8001/static/images/trash-2.png" alt="">
                                    <p>Remove</p>
                                </div>
                            </div>
                            <label class="upload_image-postcard" for="post_card_image_input">
                                <p class="caption">Hero Image</p>
                                <div class="data__image_url-icon_small size">
                                    <div class="upload_logo">
                                        <img src="http://localhost:8001/static/images/camera.png" alt="">
                                        <p class="button">Upload</p>
                                    </div>
                                    <input class="data__image_url-small" type="file" value="" name="image_url" id="post_card_image_input" multiple>
                                </div>
                                
                                <p class="caption undercaption-small" id="undercaption-small">Size up to 5mb. Format: png, jpeg, gif.</p>
                                
                            </label>
                            <div class="image_button">
                            <label class="upload_image-postcard" for="post_card_image_input">
                                <div class="image_button-upload" id="upload-image-postcard">
                                    <img class="image_button-icon" src="http://localhost:8001/static/images/camera.png" alt="">
                                    <p>Upload New</p>
                                </div>
                            </label>
                                <div class="image__button_remove-postcard image_button-remove" id="remove-image-postcard">
                                    <img class="image_button-icon" src="http://localhost:8001/static/images/trash-2.png" alt="">
                                    <p>Remove</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="second">
                        <div class="article">
                            <p class="caption caption-second">Article preview</p>
                            <div class="article_frame-first">
                                <div class="article_frame-second">
                                    <div class="article_frame-third">
                                        <p class="dots">···</p>
                                    </div>
                                    <div class="title__container">
                                        <div class="title__text">
                                            <h1 class="preview-section__title">New Post</h1>
                                            <p class="preview-section__subtitle">Please enter any description</p>
                                        </div>
                                    </div>
                                    <div class="preview-section__post-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post">
                            <p class="caption caption-second">Post card preview</p>
                            <div class="post_frame-first">
                                <div class="recent">
                                    <div class="preview-section__post_card-image">
                                    </div>
                                    <div class="recent__text">
                                        <p class="recent__text-title">New Post</p>
                                        <p class="recent__text-subtitle">Please enter any description</p> 
                                    </div>
                                    <div class="recent__author">
                                        <div class="preview-section__author-image"></div>
                                        <p class="recent__author-name preview-section__author">author</p>
                                        <p class="recent__author-data"><?= date("n/j/Y")?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="content">
                    <h2 class="container_content__data-title">Content</h2>
                    <div class="third" action="admin.php" method="post" enctype="multipart/form-data">
                        <div class="data">
                            <label class="caption" for="content">Post content (plain text)</label>
                                <textarea class="content_input" type="text" placeholder="Type anything you want..." name="content" id="content_input"></textarea>
                        </div>
                    </div>
                </div>  
            </div>
            
              
            
        </div>
        </form>
    </main>
</body>
<script src="form.js"></script>
</html>