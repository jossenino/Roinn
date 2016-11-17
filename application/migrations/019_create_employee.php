<?php
class Migration_Create_employee extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'rut' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'nameEmployee' => array(
				'type' => 'VARCHAR',
				'constraint' => '150',
			),
			'lastNameEmployee' => array(
				'type' => 'VARCHAR',
				'constraint' => '150',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'nationalIdNumber' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'jobCod' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'hireDate' => array(
				'type' => 'DATE',
			),
			'edLevel' => array(
				'type' => 'INT',
				'constraint' => 3
			),
			'sex' => array(
				'type' => 'VARCHAR',
				'constraint' => '1',
			),
			'materialStatus' => array(
				'type' => 'VARCHAR',
				'constraint' => '1',
			),
			'birthDate' => array(
				'type' => 'DATE',
			),
			'salariedFlag' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'salary' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'bonus' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'comm' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => 1,
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('employee');
		$this->db->query('ALTER TABLE `employee` ADD UNIQUE INDEX (`rut`)');
	}

	public function down()
	{
		$this->dbforge->drop_table('employee');
	}
}