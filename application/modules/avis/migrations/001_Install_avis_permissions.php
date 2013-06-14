<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_avis_permissions extends Migration {

	// permissions to migrate
	private $permission_values = array(
		array('name' => 'Avis.Loireatlantique.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Loireatlantique.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Loireatlantique.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Loireatlantique.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Maineetloire.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Maineetloire.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Maineetloire.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Maineetloire.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Mayenne.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Mayenne.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Mayenne.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Mayenne.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Sarthe.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Sarthe.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Sarthe.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Sarthe.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Vendee.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Vendee.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Vendee.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Avis.Vendee.Delete', 'description' => '', 'status' => 'active',),
	);

	//--------------------------------------------------------------------

	public function up()
	{
		$prefix = $this->db->dbprefix;

		// permissions
		foreach ($this->permission_values as $permission_value)
		{
			$permissions_data = $permission_value;
			$this->db->insert("permissions", $permissions_data);
			$role_permissions_data = array('role_id' => '1', 'permission_id' => $this->db->insert_id(),);
			$this->db->insert("role_permissions", $role_permissions_data);
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

        // permissions
		foreach ($this->permission_values as $permission_value)
		{
			$query = $this->db->select('permission_id')->get_where("permissions", array('name' => $permission_value['name'],));
			foreach ($query->result_array() as $row)
			{
				$permission_id = $row['permission_id'];
				$this->db->delete("role_permissions", array('permission_id' => $permission_id));
			}
			$this->db->delete("permissions", array('name' => $permission_value['name']));

		}
	}

	//--------------------------------------------------------------------

}