<div class="post">
    <a title='<?= $preview['title'] ?>' href='/post?id=<?= $preview['id'] ?>'>
        <div class="post__image">
            <img src='http://localhost:8001/static/images/<?= $preview['image_postcard_url']?>' alt=<?= $preview['img_name']?>>  
        </div>
        <button class="post__button <?= mb_strtolower($preview['button'])?>" type="button"><?= $preview['button']?></button>
        <div class="post__text">
            <p class="post__text-title"><?= $preview['title']?></p>
            <p class="post__text-subtitle"><?= $preview['subtitle']?></p> 
        </div>
        <div class="post__author">
                <img class="post__author-photo" src='http://localhost:8001/static/images/<?= $preview['author_url']?>' alt=<?= $preview['author']?>>
                <p class="post__author-name"><?= $preview['author']?></p>
                <p class="post__author-data"><?= date("F d, Y", strtotime($preview['publish_date']))?></p>
        </div>
    </a>
</div>
