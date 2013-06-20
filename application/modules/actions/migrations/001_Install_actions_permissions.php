<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_actions_permissions extends Migration {

	// permissions to migrate
	private $permission_values = array(
		array('name' => 'Actions.Loireatlantique.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Loireatlantique.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Loireatlantique.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Loireatlantique.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Maineetloire.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Maineetloire.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Maineetloire.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Maineetloire.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Mayenne.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Mayenne.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Mayenne.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Mayenne.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Sarthe.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Sarthe.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Sarthe.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Sarthe.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Vendee.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Vendee.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Vendee.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Actions.Vendee.Delete', 'description' => '', 'status' => 'active',),
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