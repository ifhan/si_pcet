<h3>1. Introduction</h3>
    <?php foreach ($aides_1 as $aide) : ?>
        <h4><?php echo anchor(SITE_AREA .'/content/aide/show/'. $aide->aide_number, $aide->aide_number.'. '.$aide->title) ?></h4>
    <?php endforeach; ?>
<h3>2. Acteurs</h3>        
    <?php foreach ($aides_2 as $aide) : ?>
        <h4><?php echo anchor(SITE_AREA .'/content/aide/show/'. $aide->aide_number, $aide->aide_number.'. '.$aide->title) ?></h4>
    <?php endforeach; ?>
<h3>3. PCET</h3>        
    <?php foreach ($aides_3 as $aide) : ?>
        <h4><?php echo anchor(SITE_AREA .'/content/aide/show/'. $aide->aide_number, $aide->aide_number.'. '.$aide->title) ?></h4>
    <?php endforeach; ?>
<h3>4. Avancement de la démarche</h3>        
    <?php foreach ($aides_4 as $aide) : ?>
        <h4><?php echo anchor(SITE_AREA .'/content/aide/show/'. $aide->aide_number, $aide->aide_number.'. '.$aide->title) ?></h4>
    <?php endforeach; ?>
<h3>5. Études & Analyses</h3>        
    <?php foreach ($aides_5 as $aide) : ?>
        <h4><?php echo anchor(SITE_AREA .'/content/aide/show/'. $aide->aide_number, $aide->aide_number.'. '.$aide->title) ?></h4>
    <?php endforeach; ?>
