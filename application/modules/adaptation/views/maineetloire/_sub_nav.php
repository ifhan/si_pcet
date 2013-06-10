<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/maineetloire/adaptation') ?>" id="list"><?php echo lang('adaptation_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Adaptation.Maineetloire.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/maineetloire/adaptation/create') ?>" id="create_new"><?php echo lang('adaptation_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>