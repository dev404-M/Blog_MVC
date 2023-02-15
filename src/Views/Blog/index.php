<?php
ob_start();

?>

<section class="dashboard">
    <div class="topDashBoard">
        <h1><i class="fas fa-list-alt"></i> Blog :</h1>
        <a href="/dashboard/nouveau">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div>
        <?php
            foreach($blog as $blog){ ?>
            <article class="blogArticle">
                <h2><?= $blog->getTitle() ?></h2>
                <p>Publié le: <?= $blog->getDate() ?></p>
                <p><?= $blog->getContent() ?> </p>
                <a href="/dashboard/"<?= $blog->getId() ?>>VOIR</a>
            </article>
            <?php }
        ?>
</section>

<script>

let container = document.getElementById('masonry');

let nb_col = window.innerWidth > 1024 ? 3 : window.innerWidth > 768 ? 3 : 1;

let col_height = [];

for (var i = 0; i <= nb_col; i++) {
    col_height.push(0);
}

for (var i = 0; i < container.children.length; i++) {
    let order = (i + 1) % nb_col || nb_col;
    container.children[i].style.order = order;
    col_height[order] += container.children[i].clientHeight;
}
container.style.height = Math.max.apply(Math, col_height) + 50 + 'px';

</script>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
