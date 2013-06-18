<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/diagnostic') ?>" id="list"><?php echo lang('diagnostic_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Diagnostic.Sarthe.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/diagnostic/create') ?>" id="create_new"><?php echo lang('diagnostic_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>