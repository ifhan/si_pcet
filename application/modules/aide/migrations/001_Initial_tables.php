<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Initial_tables extends Migration {
 
    public function up() 
    {
        $this->load->dbforge();
 
        $this->dbforge->add_field('post_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT');
        $this->dbforge->add_field('title VARCHAR(255) NOT NULL');
        $this->dbforge->add_field('slug VARCHAR(255) NOT NULL');
        $this->dbforge->add_field('body TEXT NULL');
        $this->dbforge->add_field('created_on DATETIME NOT NULL');
        $this->dbforge->add_field('modified_on DATETIME NULL');
        $this->dbforge->add_field('deleted TINYINT(1) NOT NULL DEFAULT 0');
        $this->dbforge->add_key('post_id', TRUE);
 
        $this->dbforge->create_table('pcet_aide');
    }
 
    //--------------------------------------------------------------------
 
    public function down() 
    {
        $this->load->dbforge();
 
        $this->dbforge->drop_table('pcet_aide');
    }
 
    //--------------------------------------------------------------------
 
}
 