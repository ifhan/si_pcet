
<div class="container">

	<div class="hero-unit">
		<h1>Bienvenue sur SI-PCET</h1>

		<p>Syst&egrave;me d'Information des Plans Climat-&Eacute;nergie Territoriaux en Pays de la Loire.</p>
	</div>
<p>Le Plan Climat Energie Territorial (PCET) est un projet territorial de d&eacute;veloppement durable dont la finalit&eacute; premi&egrave;re est la lutte contre le changement climatique. 
Institu&eacute; par le Plan Climat national et repris par la loi Grenelle 1 et le projet de loi Grenelle 2, il constitue un cadre d&rsquo;engagement pour le territoire.</p>
<p><?php echo anchor('http://www.pcet-ademe.fr/', "Pour en savoir plus..."); ?></p>
<p>Ce site a &eacute;t&eacute; r&eacute;alis&eacute; par <a href="http://www.pays-de-la-loire.developpement-durable.gouv.fr/" target="_blank">la DREAL Pays de la Loire.</a></p>
<h3>Espace Visiteur :</h3>
	<div class="alert alert-info" style="text-align: center">
		<?php echo anchor('pcet', "Consulter les PCET de la r&eacute;gion Pays de la Loire."); ?>
	</div>
<h3>Espace Administrateur :</h3>
<?php if (isset($current_user->email)) : ?>

	<div class="alert alert-info" style="text-align: center">
		<?php echo anchor(SITE_AREA, "Entrer dans l'interface d'administration."); ?>
	</div>
	

<?php else :?>

	<p style="text-align: center">
		<?php echo anchor('/login', '<i class="icon-lock icon-white"></i> '. lang('bf_action_login'), ' class="btn btn-primary btn-large" '); ?>
	</p>

<?php endif;?>



</div>
