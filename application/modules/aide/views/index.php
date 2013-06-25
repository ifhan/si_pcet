<?php if (isset($posts) && is_array($posts) && count($posts)) :?>
 
    <?php foreach ($posts as $post) :?>
    <div class="post">
        <h2><?php e($post->title) ?></h2>
 
        <?php echo auto_typography($post->body) ?>
    </div>
    <?php endforeach; ?>
 
<?php else : ?>
    <div class="alert alert-info">
        No Posts were found.
    </div>
<?php endif; ?>