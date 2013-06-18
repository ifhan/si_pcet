<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/scope') ?>" id="list"><?php echo lang('scope_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Scope.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/scope/create') ?>" id="create_new"><?php echo lang('scope_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>