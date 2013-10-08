<ul class="nav nav-pills">
	<li>
            <a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="home"><?php echo lang('bf_home'); ?></a>
	</li>     
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/contact') ?>" id="list">Tous les messages</a>
	</li>
</ul>
