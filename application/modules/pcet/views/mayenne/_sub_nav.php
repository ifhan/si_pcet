<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="list"><?php echo lang('bf_home'); ?></a>
	</li>       
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet') ?>" id="list"><?php echo lang('pcet_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('PCET.Mayenne.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet/create') ?>" id="create_new"><?php echo lang('pcet_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>