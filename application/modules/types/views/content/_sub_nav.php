<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/types') ?>" id="list"><?php echo lang('types_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Types.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/types/create') ?>" id="create_new"><?php echo lang('types_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>