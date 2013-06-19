<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'adaptation/loireatlantique/menu',
            'maineetloire'	=> 'adaptation/maineetloire/menu',
            'mayenne'	=> 'adaptation/mayenne/menu',
            'sarthe'	=> 'adaptation/sarthe/menu',
            'vendee'	=> 'adaptation/vendee/menu'
	),
        'description'	=> 'Suivi du Volet Adaptation des PCET',
	'name'		=> '7. Volet Adaptation',
	'version'		=> '0.0.2',
	'author'		=> 'Anthony Tolone',
        'menu_topic'	=> array(
            'loireatlantique'		=>'4. Études & Analyses',
            'maineetloire'		=>'4. Études & Analyses',
            'mayenne'		=>'4. Études & Analyses',
            'sarthe'		=>'4. Études & Analyses',
            'vendee'		=>'4. Études & Analyses'
	)
);
