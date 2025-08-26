<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminOperativosSegursoftController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "t_operativos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"ID","name"=>"id"];
			$this->col[] = ["label"=>"Cod. de Caso","name"=>"id_caso","join"=>"t_asigcasos,codigo_asigcasos"];
			$this->col[] = ["label"=>"Fecha Inicio","name"=>"fechaini_operativo"];
			$this->col[] = ["label"=>"Fecha Final","name"=>"fechafin_operativo"];
			$this->col[] = ["label"=>"Numero operativo","name"=>"numero_operativo"];
			$this->col[] = ["label"=>"Encargado","name"=>"encargado_operativo","join"=>"t_rrhhs,alias_rrhh"];
			$this->col[] = ["label"=>"Participaron","name"=>"participo_operativo"];
			// $this->col[] = ["label"=>"Detalle","name"=>"detalle_operativo"];
			$this->col[] = ["label"=>"Observaciones","name"=>"obs_operativo"];
			$this->col[] = ["label"=>"Geolocalizacion","name"=>"geolatlong_operativo"];
			$this->col[] = ["label"=>"Estado","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Cliente','name'=>'id_cliente','type'=>'hidden','value'=>CRUDBooster::myEmpresaCliente()];
			$this->form[] = ['label'=>'Codigo Caso','name'=>'id_caso','type'=>'datamodal','datamodal_table'=>'t_asigcasos','datamodal_where'=>'status = "Activo"','datamodal_columns'=>'codigo_asigcasos,ciudad_asigcasos,direccion_asigcasos,fecha_asigcasos','datamodal_columns_alias'=>'Codigo Caso,Ciudad,Direccion,Fecha Registro','datamodal_size'=>'large','required'=>true,'width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Codigo Caso','name'=>'id_caso','type'=>'datamodal','width'=>'col-sm-10','datamodal_table'=>'t_asigcasos','datamodal_columns'=>'codigo_asigcasos,ciudad_asigcasos,direccion_asigcasos,fecha_asigcasos','datamodal_size'=>'large','datamodal_where'=>'status = \'Activo\''];
			$this->form[] = ['label'=>'Fecha Inicio','name'=>'fechaini_operativo','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha Final','name'=>'fechafin_operativo','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Numero Operativo','name'=>'numero_operativo','type'=>'text','validation'=>'required|min:1|max:15','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Encargado','name'=>'encargado_operativo','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_rrhhs,codigo_rrhh,alias_rrhh','datatable_where'=>'status = \'Activo\'','datatable_format'=>"codigo_rrhh,' - ',alias_rrhh"];
			// $this->form[] = ['label'=>'Participaron','name'=>'participo_operativo','type'=>'select2multi','datatable'=>'t_rrhhs,codigo_rrhh','datatable_format'=>"codigo_rrhh,' - ',alias_rrhh"];
			$this->form[] = ['label'=>'Participaron','name'=>'participo_operativo','type'=>'text','validation'=>'required|min:4|max:150','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Geolocalizacion','name'=>'geolatlong_operativo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalle','name'=>'detalle_operativo','type'=>'wysiwyg','validation'=>'required|string|min:500','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Observaciones','name'=>'obs_operativo','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Voboemp','name'=>'voboemp_regseg','type'=>'hidden','value'=>0];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','value'=>'Activo'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Codigo Caso','name'=>'id_caso','type'=>'datamodal','width'=>'col-sm-10','datamodal_table'=>'t_asigcasos','datamodal_columns'=>'codigo_asigcasos,ciudad_asigcasos,direccion_asigcasos,fecha_asigcasos','datamodal_size'=>'large','datamodal_where'=>'status = \'Activo\''];
			//$this->form[] = ['label'=>'Fechaini Operativo','name'=>'fechaini_operativo','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fechafin Operativo','name'=>'fechafin_operativo','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Numero Operativo','name'=>'numero_operativo','type'=>'text','validation'=>'required|min:1|max:15','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Encargado Operativo','name'=>'encargado_operativo','type'=>'datamodal','width'=>'col-sm-10','datamodal_table'=>'t_rrhhs','datamodal_columns'=>'codigo_rrhh,alias_rrhh','datamodal_size'=>'large','datamodal_where'=>'status = \'Activo\''];
			//$this->form[] = ['label'=>'Participo Operativo','name'=>'participo_operativo','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Geolocalizacion Operativo','name'=>'geolatlong_operativo','type'=>'text','validation'=>'required|min:1|max:60','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Detalle Operativo','name'=>'detalle_operativo','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Observaciones','name'=>'obs_operativo','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','width'=>'col-sm-10'];
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
	    	CRUDBooster::activeDenied(['t_operativos']);

	    	
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
			$postdata['select_mulit'];
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
	        $affected = DB::table('t_operativos')
	            ->where([
	                ['id', $id]
	            ])
	            ->update(['dateclose_regseg' => CRUDBooster::addOneDay()]);

	        $idCaso = DB::table('t_operativos')
	            ->where([
	                ['id', $id]
	            ])
	            ->get();

	        $idCaso = json_decode(json_encode($idCaso, JSON_FORCE_OBJECT),true);

	        $updateIdOper = DB::table('t_asigcasos')
	            ->where([
	                ['t_asigcasos.id', $idCaso[0]['id_caso']]
	            ])
	            ->update(['t_asigcasos.id_operativo' => $id]);
	            
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