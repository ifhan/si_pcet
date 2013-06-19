<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module_config'] = array(	
    	'menus'	=> array(
            'loireatlantique'	=> 'avis/loireatlantique/menu',
            'maineetloire'	=> 'avis/maineetloire/menu',
            'mayenne'	=> 'avis/mayenne/menu',
            'sarthe'	=> 'avis/sarthe/menu',
            'vendee'	=> 'avis/vendee/menu'
	),
        'description'	=> 'Avis sur les PCET',
	'name'		=> '4. Avis',
	'version'		=> '0.0.1',
	'author'		=> 'Ronan Vignard',
        'menu_topic'	=> array(
            'loireatlantique'		=>'3. Avancement de la procédure',
            'maineetloire'		=>'3. Avancement de la procédure',
            'mayenne'		=>'3. Avancement de la procédure',
            'sarthe'		=>'3. Avancement de la procédure',
            'vendee'		=>'3. Avancement de la procédure'
	)
);
