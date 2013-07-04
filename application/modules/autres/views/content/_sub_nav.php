<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/autres') ?>" id="list"><?php echo lang('autres_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Autres.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/autres/create') ?>" id="create_new"><?php echo lang('autres_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>