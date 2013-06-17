<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="list"><?php echo lang('bf_home'); ?></a>
	</li> 
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/vendee/engagement') ?>" id="list"><?php echo lang('engagement_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Engagement.Vendee.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/vendee/engagement/create') ?>" id="create_new"><?php echo lang('engagement_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>