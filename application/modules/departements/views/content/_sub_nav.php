<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/departements') ?>" id="list"><?php echo lang('departements_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Departements.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/departements/create') ?>" id="create_new"><?php echo lang('departements_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>