<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="home"><?php echo lang('bf_home'); ?></a>
	</li>    
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/vendee/avis') ?>" id="list"><?php echo lang('avis_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Avis.Vendee.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/vendee/avis/create') ?>" id="create_new"><?php echo lang('avis_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>