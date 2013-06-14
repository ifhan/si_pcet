<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/avis') ?>" id="list"><?php echo lang('avis_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Avis.Mayenne.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/avis/create') ?>" id="create_new"><?php echo lang('avis_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>