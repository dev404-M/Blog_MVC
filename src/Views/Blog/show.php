<?php

ob_start();
?>

<section class="sectionView">

    <div id="modalDelete" class="modal">
        <div>
            <p>Voulez-vous vraiment suprimer votre liste ?</p>
            <p>Vous allez perdre toute vos tâches associées !</p>
            <div>
                <button type="button" id="btnUndoDel" name="button">Annuler</button>
                <form class="formDelete" action="/dashboard/<?php echo escape($blog->getTitle()); ?>/delete" method="post">
                    <input type="hidden" name="idBlog" value="<?php echo escape($blog->getId()); ?>">
                    <button type="submit" name="button">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

    <div class="viewList">
        <div class="top">
            <div class="enleveTodolist">
                <div class="showEdit">
                    <p class="nameList"><?php echo escape($blog->getTitle()); ?></p>
                    <p class="hoverInfo">
                        <Edit> </Edit> Tache
                    </p>
                </div>
            </div>

            <div class="afficheInput hiddenEdit">
                <form class="formEdit" action="/dashboard/<?php echo escape($blog->getTitle()); ?>" method="post">
                    <div class="labelInput">
                        <label for="nameTodo"><i class="fas fa-pen"></i></label>
                        <input type="text" name="nameTodo" value="<?php echo old("nameTodo") ? old("nameTodo") : escape($blog->getTitle()); ?>" placeholder="edit todo">
                    </div>
                    <button type="submit" name="button"><i class="fas fa-check"></i></button>
                </form>
                <p id="btnDeleteList"><i class="fas fa-trash"></i></p>
            </div>

            <span class="error"><?php echo error("nameTodo"); ?></span>
        </div>

        <div class="separateur"></div>
        <div class="bottom">
            <div> 
                <?php foreach ($blog as $blog) { ?>
                    <p><?= $blog->getTitle() ?></p>
                    <label for="nameTodo"><i class="fas fa-pen"></i></label>
                    <input type="text" name="nameTodo" value="<?php echo old("nameTodo") ? old("nameTodo") : escape($blog->getTitle()); ?>" placeholder="edit todo">
                <?php 
                }?>   
            </div>
        </div>
    </div>
</section>

<script>
    let showEdit = document.getElementsByClassName('showEdit');

    let enleveTodolist = document.getElementsByClassName('enleveTodolist');
    let afficheInput = document.getElementsByClassName('afficheInput');

    Array.from(showEdit).map(function(element, index) {
        element.addEventListener('click', function() {
            enleveTodolist[index].style.display = 'none';
            afficheInput[index].style.display = 'flex';
        })
    })

    let btnDelete = document.getElementById('btnDeleteList');
    let btnUndoDel = document.getElementById('btnUndoDel');
    let modalDelete = document.getElementById('modalDelete');

    btnDelete.addEventListener('click', function() {
        console.log(2);
        modalDelete.style.display = 'flex';
    });

    btnUndoDel.addEventListener('click', function() {
        console.log(2);
        modalDelete.style.display = 'none';
    });
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';

/*<?php
ob_start();
?>

<section class="sectionView">
    <div class="viewList">
        <div class="top">
            <p class="nameList"><?php echo escape($Blog->getTitle()); ?></p>
            <form class="formEdit" action="/dashboard/<?php echo escape($Blog->getTitle()); ?>/createUpdate" method="post">
                <button type="submit" name="button"><i class="fas fa-pen"></i></button>
                <input type="hidden" name="title" value="<?= $Blog->getTitle() ?>">
                <input type="hidden" name="content" value="<?= $Blog->getContent() ?>">
            </form>
        </div>
        <div class="separateur"></div>
        <div class="bottom">
            <div class="showEdit">
                <p><?php echo escape($Blog->getContent()); ?></p>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
*/