<h3><?php e($categories->number.'. '.$categories->NOM_CATEGORIE) ?></h3>
<?php if (isset($aides) && is_array($aides) && count($aides)) : ?>
    <?php foreach ($aides as $aide) : ?>
        <h4><?php e($aide->aide_number.'. '.$aide->title) ?></h4>
        <p><?php echo(auto_typography($aide->body)) ?></p>
    <?php endforeach; ?>
<?php endif; ?>
