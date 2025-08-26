<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminCustodiasSegursoftController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "t_custodias";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Empresa de Seguridad","name"=>"id_empseg","join"=>"t_empresas,nombe_empresa","datatable_where"=>"id=".CRUDBooster::myIdEmpresa()];
			$this->col[] = ["label"=>"Codigo Custodia","name"=>"codigo_custodia"];
			$this->col[] = ["label"=>"Empresa Custodia","name"=>"empresa_custodia"];
			$this->col[] = ["label"=>"Razonsocial Custodia","name"=>"razonsocial_custodia"];
			$this->col[] = ["label"=>"Nit Custodia","name"=>"nit_custodia"];
			$this->col[] = ["label"=>"Direccion Custodia","name"=>"direccion_custodia"];
			$this->col[] = ["label"=>"Zona Custodia","name"=>"zona_custodia"];
			$this->col[] = ["label"=>"Telefono Custodia","name"=>"telefono_custodia"];
			$this->col[] = ["label"=>"Logo Custodia","name"=>"logo_custodia","image"=>true];
			$this->col[] = ["label"=>"Estado Custodia","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Token','name'=>'id_token','type'=>'hidden','width'=>'col-sm-10','value'=>''.CRUDBooster::myIdToken().''];
			$this->form[] = ['label'=>'Ciudad','name'=>'id_ciudad','type'=>'hidden','width'=>'col-sm-10','value'=>''.CRUDBooster::myIdCiudad().''];
			$this->form[] = ['label'=>'Empresa de Seguridad','name'=>'id_empseg','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_empresas','datamodal_where'=>'id='.CRUDBooster::myIdEmpresa().' OR '.CRUDBooster::myIdEmpresa().'=0','datamodal_columns'=>'nombe_empresa'];
			$this->form[] = ['label'=>'Codigo','name'=>'codigo_custodia','type'=>'text','validation'=>'required|min:1|max:20','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre Empresa','name'=>'empresa_custodia','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Razonsocial','name'=>'razonsocial_custodia','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nit','name'=>'nit_custodia','type'=>'text','validation'=>'required|min:1|max:15','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Direccion','name'=>'direccion_custodia','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Zona','name'=>'zona_custodia','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Telefono Cliente','name'=>'telefono_custodia','type'=>'text','validation'=>'required|min:1|max:26','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tipo','name'=>'prisuc_custodia','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Central;Regional;Sucursal'];
			$this->form[] = ['label'=>'Zona de Area','name'=>'zonaarea_custodia','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_zonaareas,detalle_zonaarea','datatable_where'=>'id_ciudad='.CRUDBooster::myIdCiudad().''];
			$this->form[] = ['label'=>'Imagen Cliente','name'=>'logo_custodia','type'=>'upload','validation'=>'required|min:1|max:100','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Estado Cliente','name'=>'status','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'Activo'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Empresa de Seguridad','name'=>'id_empseg','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_empresas','datamodal_columns'=>'nombe_empresa'];
			//$this->form[] = ['label'=>'Codigo Custodia','name'=>'codigo_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Empresa Custodia','name'=>'empresa_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Razonsocial Custodia','name'=>'razonsocial_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nit Custodia','name'=>'nit_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Direccion Custodia','name'=>'direccion_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Zona Custodia','name'=>'zona_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Telefono Custodia','name'=>'telefono_custodia','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tipo Custodia','name'=>'prisuc_custodia','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Central;Regional;Sucursal'];
			//$this->form[] = ['label'=>'Zonaarea Custodia','name'=>'zonaarea_custodia','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_zonaareas,detalle_zonaarea'];
			//$this->form[] = ['label'=>'Imagen Custodia','name'=>'logo_custodia','type'=>'upload','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Estado Custodia','name'=>'status','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Activo;Baja'];
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
	        $this->script_js = NULL;
	        /* $this->script_js = "
				$(document).ready(function() {
				    $('#table_dashboard').DataTable( {
				        order: [[ 3, 'desc' ], [ 0, 'asc' ]]
				    } );
				} );
			"; */

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
	        /* $this->style_css = "
	        	input {text-transform: uppercase;}
	        	table>tbody>tr>td {text-transform: uppercase;}
	        	.box-header {display: none;}
	        "; */
	        
	        
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
	        //$contar = count([Request::all()]);
		    if (CRUDBooster::myId() != 1) {
		        if(CRUDBooster::getCurrentModule()->path == "custodias-segursoft") {
		            $contar = DB::table('t_custodias')->where('t_custodias.id_empseg', CRUDBooster::myIdEmpresa())
		               ->select(DB::raw('count(*) as filas'))
		               ->first();           

		            if ($contar->filas >= CRUDBooster::totalLibros()) {
		                echo "<style> #btn_add_new_data {display: none;}</style>";
		                echo "<style> .panel-body {display: none;}</style>";
		                // btn_add_new_data
		            } else {
		                echo "<style> #btn_add_new_data {display: inline-block;}</style>";
		                echo "<style> .panel-body {display: inline-block;}</style>";
		            }
		        }
		    }

	        if(CRUDBooster::myIdEmpresa() != 0) {
	        	$query->where('t_custodias.id_empseg',CRUDBooster::myIdEmpresa());
	        	$query->where('t_custodias.id_ciudad',CRUDBooster::myIdCiudad());
	        }
	        

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