<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_contacts_permissions extends Migration {

	// permissions to migrate
	private $permission_values = array(
		array('name' => 'Contacts.Loireatlantique.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Loireatlantique.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Loireatlantique.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Loireatlantique.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Maineetloire.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Maineetloire.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Maineetloire.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Maineetloire.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Mayenne.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Mayenne.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Mayenne.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Mayenne.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Sarthe.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Sarthe.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Sarthe.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Sarthe.Delete', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Vendee.View', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Vendee.Create', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Vendee.Edit', 'description' => '', 'status' => 'active',),
		array('name' => 'Contacts.Vendee.Delete', 'description' => '', 'status' => 'active',),
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