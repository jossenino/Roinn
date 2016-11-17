
<?php
class Migration_Create_address extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'country' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'region' => array(
        'type' => 'VARCHAR',
        'constraint' => '150'
      ),
      'comuna' => array(
        'type' => 'VARCHAR',
        'constraint' => '150'
      ),
      'avCalle' => array(
        'type' => 'VARCHAR',
        'constraint' => '150'
      ),
      'number' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'block' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
      ),
      'villaPoblacion' => array(
        'type' => 'VARCHAR',
        'constraint' => '150',
      ),
      'telefono' => array(
        'type' => 'VARCHAR',
        'constraint' => '110',
      ),
    ));
    $this->dbforge->add_key('id');
    $this->dbforge->create_table('address');
  }

  public function down()
  {
    $this->dbforge->drop_table('address');
  }
}