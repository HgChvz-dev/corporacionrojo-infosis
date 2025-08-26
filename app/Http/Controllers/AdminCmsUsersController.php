<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;
use crocodicstudio\crudbooster\controllers\CBController;

class AdminCmsUsersController extends CBController {


	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';	
		$this->button_import 	   = FALSE;	
		$this->button_export 	   = FALSE;	
		# END CONFIGURATION DO NOT REMOVE THIS LINE
	
		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = array();
		$this->col[] = array("label"=>"Id","name"=>"id");
		$this->col[] = array("label"=>"Name","name"=>"name");
		$this->col[] = array("label"=>"Email","name"=>"email");
		$this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
		$this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);
		$this->col[] = array("label"=>"Token","name"=>"id_token","join"=>"t_tokens,empresa_token");
		$this->col[] = array("label"=>"Ciudad del Usuario","name"=>"id_ciudad","join"=>"t_ciudades,ciudad_ciudad");
		$this->col[] = array("label"=>"Empresa","name"=>"id_empseg","join"=>"t_empresas,razonsocial_empresa");
		$this->col[] = array("label"=>"Empresa Cliente","name"=>"id_custodia","join"=>"t_empclis,razonsocial_empcli");
		$this->col[] = array("label"=>"Codigo de Cargo","name"=>"id_cargo","join"=>"t_cargos,detalle_cargo");
		$this->col[] = array("label"=>"RR.HH.","name"=>"id_rrhh","join"=>"t_rrhhs,nomape_rrhh");
		$this->col[] = array("label"=>"Caso Asignado","name"=>"id_caso","join"=>"t_asigcasos,codigo_asigcasos");
		$this->col[] = array("label"=>"Fecha de Baja","name"=>"fecha_baja");
		$this->col[] = array("label"=>"Status","name"=>"status");		
		# END COLUMNS DO NOT REMOVE THIS LINE

		# START FORM DO NOT REMOVE THIS LINE
		$this->form = array(); 		
		$this->form[] = array("label"=>"Name","name"=>"name",'required'=>true,'validation'=>'required|alpha_spaces|min:3');
		$this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());		
		$this->form[] = array("label"=>"Photo","name"=>"photo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'required'=>true,'validation'=>'required|image|max:1000','resize_width'=>90,'resize_height'=>90);											
		$this->form[] = array("label"=>"Privilege","name"=>"id_cms_privileges","type"=>"select","datatable"=>"cms_privileges,name",'required'=>true);						
		// $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
		$this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>".....Please leave empty if not change");
		$this->form[] = array("label"=>"Password Confirmation","name"=>"password_confirmation","type"=>"password","help"=>"Please leave empty if not change");

		// $this->form[] = array('label'=>'Token','name'=>'id_token','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_tokens,empresa_token','datatable_where'=>'status="Activo"');
		// $this->form[] = array('label'=>'Ciudad','name'=>'id_ciudad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_ciudades,ciudad_ciudad','datatable_where'=>'status="Activo"');
		// $this->form[] = array('label'=>'Empresa de Seguridad','name'=>'id_empseg','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_empresas','datamodal_columns'=>'nombe_empresa','datatable_where'=>'status="Activo"');
		// $this->form[] = array('label'=>'Empresa Cliente','name'=>'id_custodia','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_empclis','datamodal_columns'=>'razonsocial_empcli','datatable_where'=>'status="Activo"');
		// $this->form[] = array('label'=>'RR.HH.','name'=>'id_rrhh','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_rrhhs','datamodal_columns'=>'codigo_rrhh,alias_rrhh','datamodal_size'=>'large');
		// $this->form[] = array('label'=>'Cargo','name'=>'id_cargo','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_cargos','datamodal_columns'=>'detalle_cargo','datatable_where'=>'status="Activo"');
		// $this->form[] = array('label'=>'Estado','name'=>'status','type'=>'hidden','value'=>'Activo');
		# END FORM DO NOT REMOVE THIS LINE
				
	}

	public function getProfile() {			

		$this->button_addmore = FALSE;
		$this->button_cancel  = FALSE;
		$this->button_show    = FALSE;			
		$this->button_add     = FALSE;
		$this->button_delete  = FALSE;	
		$this->hide_form 	  = ['id_cms_privileges'];

		$data['page_title'] = cbLang("label_button_profile");
		$data['row']        = CRUDBooster::first('cms_users',CRUDBooster::myId());

        return $this->view('crudbooster::default.form',$data);
	}
	public function hook_before_edit(&$postdata,$id) { 
		unset($postdata['password_confirmation']);
	}
	public function hook_before_add(&$postdata) {      
	    unset($postdata['password_confirmation']);
	}
}
