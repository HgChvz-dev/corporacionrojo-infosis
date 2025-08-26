<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminTRrhhsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "t_rrhhs";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Codigo","name"=>"codigo_rrhh"];
			$this->col[] = ["label"=>"Nomape","name"=>"nomape_rrhh"];
			$this->col[] = ["label"=>"Ci","name"=>"ci_rrhh"];
			$this->col[] = ["label"=>"Telefono","name"=>"telefono_rrhh"];
			$this->col[] = ["label"=>"Email","name"=>"email_rrhh"];
			$this->col[] = ["label"=>"Foto","name"=>"foto_rrhh","image"=>true];
			$this->col[] = ["label"=>"Seudónimo","name"=>"alias_rrhh"];
			$this->col[] = ["label"=>"Cargo","name"=>"cargo_rrhh","join"=>"t_cargos,detalle_cargo"];
			$this->col[] = ["label"=>"Ciudad","name"=>"ciudad_rrhh","join"=>"t_ciudades,ciudad_ciudad"];
			$this->col[] = ['label'=>"Privilegio","name"=>"id_privilegio","join"=>"cms_privileges,name"];
			$this->col[] = ["label"=>"Fecha Ingreso","name"=>"fechaingreso_rrhh"];
			$this->col[] = ["label"=>"Fecha Baja","name"=>"fecha_baja"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Privilegio','name'=>'id_privilegio','type'=>'datamodal','datamodal_table'=>'cms_privileges','datamodal_where'=>'is_superadmin != 1','datamodal_columns'=>'name','datamodal_columns_alias'=>'Tipo de Privilegio','datamodal_size'=>'large','required'=>true,'width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Codigo','name'=>'codigo_rrhh','type'=>'text','validation'=>'required|min:1|max:35','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre(s) Apellido(s)','name'=>'nomape_rrhh','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'C.I.','name'=>'ci_rrhh','type'=>'text','validation'=>'required|min:1|max:15','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Telefono','name'=>'telefono_rrhh','type'=>'text','validation'=>'required|min:1|max:17','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email_rrhh','type'=>'email','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Foto','name'=>'foto_rrhh','type'=>'upload','validation'=>'image|mimes:jpeg,png,jpg|max:500','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Seudónimo','name'=>'alias_rrhh','type'=>'text','validation'=>'required|min:1|max:20','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cargo','name'=>'cargo_rrhh','type'=>'select2','validation'=>'required|min:1|max:60','width'=>'col-sm-10','datatable'=>'t_cargos,detalle_cargo'];
			$this->form[] = ['label'=>'Ciudad','name'=>'ciudad_rrhh','type'=>'select2','validation'=>'required|min:1|max:17','width'=>'col-sm-10','datatable'=>'t_ciudades,ciudad_ciudad'];
			$this->form[] = ['label'=>'Nro. Urgencia','name'=>'urgencia_rrhh','type'=>'text','validation'=>'required|min:1|max:17','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. CTA y BCO.','name'=>'bcocta_rrhh','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Token Empresa','name'=>'id_token','type'=>'datamodal','datamodal_table'=>'t_tokens','datamodal_where'=>'status = \'Activo\'','datamodal_columns'=>'empresa_token','datamodal_columns_alias'=>'Detalle Token','datamodal_size'=>'large','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Empresa','name'=>'id_empseg','type'=>'datamodal','datamodal_table'=>'t_empresas','datamodal_where'=>'status = \'Activo\'','datamodal_columns'=>'razonsocial_empresa,nit_empresa','datamodal_columns_alias'=>'Razon Social,Nro. NIT','datamodal_size'=>'large','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fechaingreso','name'=>'fechaingreso_rrhh','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Fechabaja','name'=>'fechabaja_rrhh','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','value'=>'Activo'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Codigo','name'=>'codigo_rrhh','type'=>'text','validation'=>'required|min:1|max:35','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nombre(s) Apellido(s)','name'=>'nomape_rrhh','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'C.I.','name'=>'ci_rrhh','type'=>'text','validation'=>'required|min:1|max:15','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Telefono','name'=>'telefono_rrhh','type'=>'text','validation'=>'required|min:1|max:17','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Email','name'=>'email_rrhh','type'=>'email','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Foto','name'=>'foto_rrhh','type'=>'upload','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Alias','name'=>'alias_rrhh','type'=>'text','validation'=>'required|min:1|max:20','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Cargo','name'=>'cargo_rrhh','type'=>'select2','validation'=>'required|min:1|max:60','width'=>'col-sm-10','datatable'=>'t_cargos,detalle_cargo'];
			//$this->form[] = ['label'=>'Ciudad','name'=>'ciudad_rrhh','type'=>'select2','validation'=>'required|min:1|max:17','width'=>'col-sm-10','datatable'=>'t_ciudades,ciudad_ciudad'];
			//$this->form[] = ['label'=>'Nro. Urgencia','name'=>'urgencia_rrhh','type'=>'text','validation'=>'required|min:1|max:17','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nro. CTA y BCO.','name'=>'bcocta_rrhh','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fechaingreso','name'=>'fechaingreso_rrhh','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fechabaja','name'=>'fechabaja_rrhh','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','validation'=>'required|min:1|max:10','width'=>'col-sm-10','value'=>'Activo'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          
	        	$this->table_row_color[] = ['condition'=>"[status] == 'Baja'","color"=>"danger"];
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        // $this->script_js = NULL;
            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
			$idnomape_rrhh = $postdata['nomape_rrhh'];
			$idfoto_rrhh = $postdata['foto_rrhh'];
			$idemail_rrhh = $postdata['email_rrhh'];
			$passw = '$2y$10$SXKbmPuVkOwi5U/vF5hM2Ow9Dwl4xdwxz50icG.YLuP59/c8A3zem';
			$idid_token = $postdata['id_token'];
			$idciudad_rrhh = $postdata['ciudad_rrhh'];
			$idid_empseg = $postdata['id_empseg'];
			$idcargo_rrhh = $postdata['cargo_rrhh'];
			$idid_privilegio = $postdata['id_privilegio'];
			$created_at = date('Y-m-d H:i:s');
			$estado = 'Activo';

			$inserta = DB::table('cms_users')->insert([
			    'name' => $idnomape_rrhh,
			    'photo' => $idfoto_rrhh,
			    'email' => $idemail_rrhh,
			    'password' => $passw,
			    'id_token' => $idid_token,
			    'id_ciudad' => $idciudad_rrhh,
			    'id_empseg' => $idid_empseg,
			    'id_cargo' => $idcargo_rrhh,
			    'id_cms_privileges' => $idid_privilegio,
			    'created_at' => $created_at,
			    'status' => $estado
			]);
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here
	    	$idLost = json_decode(json_encode(DB::select('SELECT MAX(id) AS ides FROM cms_users')), true);
			
			$affected = DB::table('cms_users')
            	->where('id', $idLost[0]['ides'])
             	->update( [ 'id_rrhh'=>$id] );

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}