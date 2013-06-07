<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/epci') ?>" id="list"><?php echo lang('epci_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('EPCI.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/epci/create') ?>" id="create_new"><?php echo lang('epci_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>