<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'actions/loireatlantique/menu',
            'maineetloire'	=> 'actions/maineetloire/menu',
            'mayenne'	=> 'actions/mayenne/menu',
            'sarthe'	=> 'actions/sarthe/menu',
            'vendee'	=> 'actions/vendee/menu'
	),    
	'description'	=> 'Tableau de bord des actions',
	'name'		=> '6. Tableau de bord',
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
