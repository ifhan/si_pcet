<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'engagement/loireatlantique/menu',
            'maineetloire'	=> 'engagement/maineetloire/menu',
            'mayenne'	=> 'engagement/mayenne/menu',
            'sarthe'	=> 'engagement/sarthe/menu',
            'vendee'	=> 'engagement/vendee/menu'
	),    
	'description'	=> 'Engagement de la démarche',
	'name'		=> '3. Engagement',
	'version'		=> '0.0.1',
	'author'		=> 'Ronan Vignard',
        'menu_topic'	=> array(
            'loireatlantique'		=>'3. Avancement',
            'maineetloire'		=>'3. Avancement',
            'mayenne'		=>'3. Avancement',
            'sarthe'		=>'3. Avancement',
            'vendee'		=>'3. Avancement'
	)
);
