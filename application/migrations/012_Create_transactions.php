
<?php
class Migration_Create_transactions extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'idAccount' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'idUsers' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'datePayment' => array(
        'type' => 'VARCHAR',
        'constraint' => '40'
      ),
      'type' => array(
        'type' => 'VARCHAR',
        'constraint' => '110',
      ),
      'numberTransaction' => array(
        'type' => 'VARCHAR',
        'constraint' => '110',
      ),
    ));
    $this->dbforge->add_key('id');
    $this->dbforge->create_table('transactions');
  }

  public function down()
  {
    $this->dbforge->drop_table('transactions');
  }
}
/**
select nb.url, nb.nombreNavBar, nb.idMenuSubMenu, nb.iconClass, nb.status from navbars nb
INNER join navbars_profiles nbp on nb.id = nbp.idMenu
INNER join profiles p on p.idProfile = nbp.idProfile
where p.idProfile = 1 and nb.status = 1
/