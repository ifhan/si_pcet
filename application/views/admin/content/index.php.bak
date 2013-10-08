<h2><?php echo lang('bf_user_settings') ?></h2>
<ul>
	<li>Nom : <?php echo $current_user->display_name ?></li>
	<li>Courriel : <?php echo $current_user->email ?></li>
	<li>Profil : <?php echo $current_user->role_name ?></li>
	<li>Derni&egrave;re connexion : <?php echo $current_user->last_login ?></li>
</ul>
<h2>Mes actions</h2>
<div class="btn-toolbar">
	<div class="btn-group">
		<button class="btn">S&eacute;lectionner une collectivit&eacute;</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
                        <?php if ($this->auth->has_permission('Structures.Loireatlantique.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/structures/create') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
                        <?php endif ?>
                        <?php if ($this->auth->has_permission('Structures.Maineetloire.Create')) : ?>    
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/structures/create') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
                        <?php endif ?>    
                        <?php if ($this->auth->has_permission('Structures.Mayenne.Create')) : ?>    
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/structures/create') ?>" id="create_new">en Mayenne</a>
			</li>
                        <?php endif ?>    
                        <?php if ($this->auth->has_permission('Structures.Sarthe.Create')) : ?>    
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/structures/create') ?>" id="create_new">en Sarthe</a>
			</li>
                        <?php endif ?>    
                        <?php if ($this->auth->has_permission('Structures.Vendee.Create')) : ?>    
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/structures/create') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
                        <?php endif ?>    
		</ul>
	</div>
	<div class="btn-group">
		<button class="btn">Cr&eacute;er un PCET</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<?php if ($this->auth->has_permission('PCET.Loireatlantique.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/pcet/create') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
			<?php endif; ?>
                        <?php if ($this->auth->has_permission('PCET.Maineetloire.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/pcet/create') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('PCET.Mayenne.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet/create') ?>" id="create_new">en Mayenne</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('PCET.Sarthe.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet/create') ?>" id="create_new">en Sarthe</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('PCET.Vendee.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/pcet/create') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
                        <?php endif; ?>
		</ul>
	</div>
	<div class="btn-group">
		<button class="btn">Suivre l'engagement des démarches</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
                        <?php if ($this->auth->has_permission('Engagement.Loireatlantique.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/engagement') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Engagement.Maineetloire.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/engagement') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Engagement.Mayenne.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/engagement') ?>" id="create_new">en Mayenne</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Engagement.Sarthe.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/engagement') ?>" id="create_new">en Sarthe</a>
			</li>
                        <?php endif; ?>
			<?php if ($this->auth->has_permission('Engagement.Vendee.Create')) : ?>
                        <li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/engagement') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
                        <?php endif; ?>
		</ul>
	</div>
	<div class="btn-group">
		<button class="btn">Suivre les avis</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
                        <?php if ($this->auth->has_permission('Avis.Loireatlantique.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/avis') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Avis.Maineetloire.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/avis') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Avis.Mayenne.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/avis') ?>" id="create_new">en Mayenne</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Avis.Sarthe.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/avis') ?>" id="create_new">en Sarthe</a>
			</li>
                        <?php endif; ?>
                        <?php if ($this->auth->has_permission('Avis.Vendee.Create')) : ?>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/avis') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
                        <?php endif; ?>
		</ul>
	</div>    
	<div class="btn-group">
		<button class="btn">Voir les PCET archiv&eacute;s</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/pcet') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/pcet') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet') ?>" id="create_new">en Mayenne</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet') ?>" id="create_new">en Sarthe</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'index' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/pcet') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
		</ul>
	</div>
        <a class="btn" type="button" href="<?php echo site_url(SITE_AREA .'/content/aide/summary') ?>">Voir l'aide</a>
</div>
<br />