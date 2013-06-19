<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(
    	'menus'	=> array(
            'loireatlantique'	=> 'diagnostic/loireatlantique/menu',
            'maineetloire'	=> 'diagnostic/maineetloire/menu',
            'mayenne'	=> 'diagnostic/mayenne/menu',
            'sarthe'	=> 'diagnostic/sarthe/menu',
            'vendee'	=> 'diagnostic/vendee/menu'
	),    
	'description'	=> 'Suivi du Volet Diagnostic des PCET',
	'name'		=> '5. Volet Diagnostic',
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
