<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'indicateur/loireatlantique/menu',
            'maineetloire'	=> 'indicateur/maineetloire/menu',
            'mayenne'	=> 'indicateur/mayenne/menu',
            'sarthe'	=> 'indicateur/sarthe/menu',
            'vendee'	=> 'indicateur/vendee/menu'
	),
        'description'	=> 'Suivi des plans d\'actions des PCET',
	'name'		=> '5. Plans d\'actions',
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
