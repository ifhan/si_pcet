<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/contacts') ?>" id="list"><?php echo lang('contacts_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Contacts.Mayenne.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/mayenne/contacts/create') ?>" id="create_new"><?php echo lang('contacts_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>