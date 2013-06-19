<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_adaptation_permissions extends Migration {

	// permissions to migrate
	private $permission_values = array(
		array('name' => 'Adaptation.Loireatlantique.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Loireatlantique.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Loireatlantique.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Loireatlantique.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Maineetloire.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Maineetloire.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Maineetloire.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Maineetloire.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Mayenne.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Mayenne.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Mayenne.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Mayenne.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Sarthe.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Sarthe.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Sarthe.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Sarthe.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Vendee.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Vendee.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Vendee.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Adaptation.Vendee.Delete', 'description' => '', 'status' => 'active',),
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