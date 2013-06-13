<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/engagement') ?>" id="list"><?php echo lang('engagement_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Engagement.Sarthe.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/engagement/create') ?>" id="create_new"><?php echo lang('engagement_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>