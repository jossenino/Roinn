<?php
class Migration_Create_departmentsCompany extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'departmentName' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => 1,
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('departmentsCompany');
	}

	public function down()
	{
		$this->dbforge->drop_table('departmentsCompany');
	}
}