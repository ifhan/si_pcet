    </div><!--/.container-->
    
    <footer class="footer">
    	<div class="container">
                <p class="pull-left">
                    ©DREAL Pays de la Loire, 2013 | 
                    <a href="<?php echo site_url('/informations/show/2') ?>">À propos</a> | 
                    <a href="<?php echo site_url('/informations/show/3') ?>">Mentions légales</a> | 
                    <a href="<?php echo site_url('/contact') ?>"><i class="icon-envelope">&nbsp;</i>Contact</a>
                </p>
		<p class="pull-right">
			Chargé en {elapsed_time} secondes, en utilisant {memory_usage}.
			<br/>
			Propulsé par <a href="http://cibonfire.com" target="_blank"><i class="icon-fire">&nbsp;</i>&nbsp;Bonfire</a> <?php echo BONFIRE_VERSION ?>
		</p>
		</div>
	</footer>
	
	<?php echo theme_view('parts/modal_login'); ?>

	<div id="debug"></div>
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>

  <!-- This would be a good place to use a CDN version of jQueryUI if needed -->
	<?php echo Assets::js(); ?>

</body>
</html>
