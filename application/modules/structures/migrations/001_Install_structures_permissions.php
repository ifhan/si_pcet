<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_structures_permissions extends Migration {

	// permissions to migrate
	private $permission_values = array(
		array('name' => 'Structures.Loireatlantique.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Loireatlantique.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Loireatlantique.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Loireatlantique.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Maineetloire.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Maineetloire.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Maineetloire.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Maineetloire.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Mayenne.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Mayenne.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Mayenne.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Mayenne.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Sarthe.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Sarthe.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Sarthe.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Sarthe.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Vendee.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Vendee.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Vendee.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Structures.Vendee.Delete', 'description' => '', 'status' => 'active',),
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