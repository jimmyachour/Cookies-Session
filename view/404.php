<?php $title = 'Accueil Cookies Factory' ?>

<?php ob_start()?>
<section class="cookies container-fluid">
    <div class="row">
        <div class="alert alert-success" role="alert">
            <p>Désolé, mais cette page n'existe pas...</p>
            <a href="index.php?action=home">Retour à l'accueil</a>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('inc/template.php');?>
