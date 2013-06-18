<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/contacts') ?>" id="list"><?php echo lang('contacts_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Contacts.Sarthe.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/sarthe/contacts/create') ?>" id="create_new"><?php echo lang('contacts_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>