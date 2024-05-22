<div class="recent">
    <a title='<?= $preview['title'] ?>' href='/post?id=<?= $preview['id'] ?>'> </a>
        <div>
            <img class="recent__image" src='http://localhost:8001/static/images/<?= $preview['image_postcard_url']?>' alt=<?= $preview['img_name']?>>  
        </div>
        <div class="recent__text">
            <p class="recent__text-title"><?= $preview['title']?></p>
            <p class="recent__text-subtitle"><?= $preview['subtitle']?></p> 
        </div>
        <div class="recent__author">
            <img class="recent__author-photo" src='http://localhost:8001/static/images/<?= $preview['author_url']?>' alt=<?= $preview['author']?>>
            <p class="recent__author-name"><?= $preview['author']?></p>
            <p class="recent__author-data"><?= date("n/d/Y", strtotime($preview['publish_date']))?></p>
        </div>
</div>