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
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/structures/create') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/structures/create') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/structures/create') ?>" id="create_new">en Mayenne</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/structures/create') ?>" id="create_new">en Sarthe</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/structures/create') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
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
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/pcet/create') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet/create') ?>" id="create_new">en Mayenne</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet/create') ?>" id="create_new">en Sarthe</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/pcet/create') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
		</ul>
	</div>
	<div class="btn-group">
		<button class="btn">Modifier un PCET</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?>
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/pcet') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/pcet') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet') ?>" id="create_new">en Mayenne</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet') ?>" id="create_new">en Sarthe</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/pcet') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
		</ul>
	</div>
	<div class="btn-group">
		<button class="btn">Voir les PCET archiv&eacute;s</button>
		<button class="btn dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?>
				<a href="<?php echo site_url(SITE_AREA .'/loireatlantique/pcet') ?>" id="create_new">en Loire-Atlantique</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/maineetloire/pcet') ?>" id="create_new">en Maine-et-Loire</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/mayenne/pcet') ?>" id="create_new">en Mayenne</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet') ?>" id="create_new">en Sarthe</a>
			</li>
			<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
				<a href="<?php echo site_url(SITE_AREA .'/vendee/pcet') ?>" id="create_new">en Vend&eacute;e</a>
			</li>
		</ul>
	</div>
</div>
<br />