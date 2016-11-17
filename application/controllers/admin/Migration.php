<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration extends Admin_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->library('migration');
        $this->data['subview'] = 'admin/migrations/migrations';
        $this->data['NameView'] = 'Migracion';

        $html='<div class="col-xs-4"><label for="sel1">Selecciona Migración:</label>';
        $html .= '<select class="form-control" id="sel1"><option value="s">Seleccione una migración</option><option value="All">Todas</option>';
        //$migrations = $this->migration->current();
        for ($i=001; $i<30 ; $i++) {
            $html .= '<option value"'.$i.'"> 00'.$i.'</option>';
        }
        $html .= '</select></div><div class="col-xs-4"><br><button class="btn btn-primary" onclick="migrationworks()">Aceptar</button></div>';
        $this->data['html'] = $html;
        $this->load->view('admin/layout_main', $this->data);

        /*echo "<pre>"; echo $this->db->last_query(); echo "</pre>";                                                        <pre>"; echo $this->migration->current(); echo "</pre>";

        if ( ! $this->migration->current())
        {
        	show_error($this->migration->error_string());
        }
        else{
            echo "<pre>"; echo $this->db->last_query(); echo "</pre>";
            echo 'migration works';
        }*/
            
    }

    public function allMigrations($opcion){
        $this->load->library('migration');
        $msj = '';
        if ($opcion == 'All') {
            $migrations = $this->migration->current();
            for ($i=001; $i<$migrations +1 ; $i++) { 
                if(!$this->migration->version($i)){
                    show_error($this->migration->error_string());
                }   
                else
                {
                    $msj = 'Migracion(es) exitosa'.PHP_EOL;
                }
            }
        }
        else{
            if(!$this->migration->version($opcion)){
              show_error($this->migration->error_string());
            }   
            else
            {
                $msj = 'Migracion(es) exitosa'.PHP_EOL;
            }
        }
        echo json_encode(array("access" => $msj));
    }
}