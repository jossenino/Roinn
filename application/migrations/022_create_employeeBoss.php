<?php
class Migration_Create_employeeBoss extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'employeeID' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'jobBossID' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'startDate' => array(
				'type' => 'DATE',
			),
			'endDate' => array(
				'type' => 'DATE',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('employeeBoss');
	}

	public function down()
	{
		$this->dbforge->drop_table('employeeBoss');
	}
}