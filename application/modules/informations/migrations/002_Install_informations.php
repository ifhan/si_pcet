<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_informations extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'informations_title' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'informations_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'informations_text' => array(
				'type' => 'TEXT',
				
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('informations');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('informations');

	}

	//--------------------------------------------------------------------

}