<?php
ob_start();
?>

<section class="create">
    <h1><i class="fas fa-list-alt"></i> Création Article :</h1>

    <div>
        <div class="list">
            <div class="top">
                <form action="/dashboard/nouveau/" method="post">
                    <input type="text" name="title" value="<?php echo old("title");?>" placeholder="Article title">
                    <input type="text" name="content" placeholder="Article content">    
                    <button type="submit" name="button"><i class="fas fa-plus"></i></button>
                </form>
                <span class="error"><?php echo error("title");?></span>
            </div>

            <div class="separateur"></div>

            <div class="bottom">
            </div>
        </div>


    </div>

</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
