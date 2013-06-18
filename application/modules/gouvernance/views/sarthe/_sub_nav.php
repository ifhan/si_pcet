<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/gouvernance') ?>" id="list"><?php echo lang('gouvernance_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Gouvernance.Sarthe.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/gouvernance/create') ?>" id="create_new"><?php echo lang('gouvernance_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>