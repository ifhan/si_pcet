<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/maineetloire/indicateur') ?>" id="list"><?php echo lang('indicateur_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Indicateur.Maineetloire.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/maineetloire/indicateur/create') ?>" id="create_new"><?php echo lang('indicateur_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>