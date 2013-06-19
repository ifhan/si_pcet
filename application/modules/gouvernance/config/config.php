<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'gouvernance/loireatlantique/menu',
            'maineetloire'	=> 'gouvernance/maineetloire/menu',
            'mayenne'	=> 'gouvernance/mayenne/menu',
            'sarthe'	=> 'gouvernance/sarthe/menu',
            'vendee'	=> 'gouvernance/vendee/menu'
	),    
	'description'	=> 'Suivi du Volet Gouvernance des PCET',
	'name'		=> '8. Volet Gouvernance',
	'version'		=> '0.0.1',
	'author'		=> 'Anthony Tolone',
        'menu_topic'	=> array(
            'loireatlantique'		=>'4. Études & Analyses',
            'maineetloire'		=>'4. Études & Analyses',
            'mayenne'		=>'4. Études & Analyses',
            'sarthe'		=>'4. Études & Analyses',
            'vendee'		=>'4. Études & Analyses'
	)    
);
