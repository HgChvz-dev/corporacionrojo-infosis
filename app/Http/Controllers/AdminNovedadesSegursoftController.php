<?php namespace App\Http\Controllers;

	use CBController;
	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminNovedadesSegursoftController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "50";
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
			$this->table = "t_novedades";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Empresa","name"=>"t_novedades.id_empresa","join"=>"t_empresas,nombe_empresa","visible"=>false];
			$this->col[] = ["label"=>"Custodia","name"=>"id_custodia","join"=>"t_custodias,empresa_custodia","visible"=>false];
			$this->col[] = ["label"=>"Cargo","name"=>"id_cargo","join"=>"t_cargos,detalle_cargo","visible"=>false];
			$this->col[] = ["label"=>"Usuario","name"=>"id_usuario","join"=>"cms_users,name","visible"=>false];
			$this->col[] = ["label"=>"Detalle Novedad","name"=>"detalle_novedad"];
			$this->col[] = ["label"=>"Nombre(s) Apellido(s) Ingreso","name"=>"nombrev_novedad"];
			$this->col[] = ["label"=>"Motivo Ingreso","name"=>"motivov_novedad"];
			$this->col[] = ["label"=>"Ingreso donde","name"=>"aquienv_novedad"];
			$this->col[] = ["label"=>"Observacion Novedades","name"=>"observacion_novedades"];
			$this->col[] = ["label"=>"Fecha Novedad","name"=>"fecha_novedad"];
			$this->col[] = ["label"=>"Hora Novedad","name"=>"hora_novedad"];
            $this->col[] = ["label"=>"Prioridad","name"=>"priori_novedad","visible"=>false];			
			$this->col[] = ["label"=>"VoBo Seguridad","name"=>"voboemp_novedad","join"=>"t_empresas,nombe_empresa"];
			$this->col[] = ["label"=>"VoBo Cliente","name"=>"vobocus_novedad","join"=>"t_custodias,empresa_custodia"];
			$this->col[] = ["label"=>"Estado Novedad","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Empresa','name'=>'id_empresa','type'=>'hidden','validation'=>'required','width'=>'col-sm-10','value'=>CRUDBooster::myIdEmpresa()];
			$this->form[] = ['label'=>'Custodia','name'=>'id_custodia','type'=>'hidden','validation'=>'required','width'=>'col-sm-10','value'=>CRUDBooster::myIdCustodia()];
			$this->form[] = ['label'=>'Cargo','name'=>'id_cargo','type'=>'hidden','validation'=>'required','width'=>'col-sm-10','value'=>CRUDBooster::myIdCargo()];
			$this->form[] = ['label'=>'Usuario','name'=>'id_usuario','type'=>'hidden','validation'=>'required','width'=>'col-sm-10','value'=>CRUDBooster::myId()];
			$this->form[] = ['label'=>'Detalle Novedad','name'=>'detalle_novedad','type'=>'wysiwyg','validation'=>'min:7|max:5000','width'=>'col-sm-10','style'=>'resize: none;'];
			$this->form[] = ['label'=>'Observacion Novedades','name'=>'observacion_novedades','type'=>'text','validation'=>'max:200','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre(s) Apellido(s)','name'=>'nombrev_novedad','type'=>'text','validation'=>'max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. C.I Exp..','name'=>'civ_novedad','type'=>'text','validation'=>'max:15','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Motivo Ingreso','name'=>'motivov_novedad','type'=>'text','validation'=>'max:200','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Busca a','name'=>'aquienv_novedad','type'=>'text','validation'=>'max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Lugar Ingreso','name'=>'lugarv_novedad','type'=>'text','validation'=>'max:50','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha Novedad','name'=>'fecha_novedad','type'=>'date','validation'=>'required|date','width'=>'col-sm-10','value'=>date('Y-m-d')];
			$this->form[] = ['label'=>'Hora Novedad','name'=>'hora_novedad','type'=>'time','validation'=>'required|min:1|max:10','width'=>'col-sm-10','value'=>date('H:i:s')];
			$this->form[] = ['label'=>'Prioridad','name'=>'priori_novedad','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'VoBo Empresa de Seguridad','name'=>'voboemp_novedad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_empresas,nombe_empresa'];
			$this->form[] = ['label'=>'VoBo Empresa Custodiada','name'=>'vobocus_novedad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_custodias,empresa_custodia'];
			$this->form[] = ['label'=>'Estado Novedad','name'=>'status','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Activo;Baja'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Empresa','name'=>'t_novedades.id_empresa','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Custodia','name'=>'id_custodia','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Cargo','name'=>'id_cargo','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Usuario','name'=>'id_usuario','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Detalle Novedad','name'=>'detalle_novedad','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10','style'=>'resize: none;'];
			//$this->form[] = ['label'=>'Observacion Novedades','name'=>'observacion_novedades','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fecha Novedad','name'=>'fecha_novedad','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Hora Novedad','name'=>'hora_novedad','type'=>'time','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'VoBo Empresa de Seguridad','name'=>'voboemp_novedad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_empresas,nombe_empresa'];
			//$this->form[] = ['label'=>'VoBo Empresa Custodiada','name'=>'vobocus_novedad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_custodias,empresa_custodia'];
			//$this->form[] = ['label'=>'Estado Novedad','name'=>'estado_novedad','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Activo;Baja'];
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
			$this->table_row_color[] = ['condition'=>"[priori_novedad] == 'Rojo'","color"=>"danger"];
			$this->table_row_color[] = ['condition'=>"[priori_novedad] == 'Amarillo'","color"=>"warning"];
			$this->table_row_color[] = ['condition'=>"[priori_novedad] == 'Verde'","color"=>"success"];

	        
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
	        $this->style_css = "
				.note-editor.note-frame {
					max-height: 200px;
					min-height: 100px;
				}

				.note-editor.note-frame .note-editing-area .note-editable {
					max-height: 100px;
					min-height: 100px;
				}

	        ";
	        
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

	    // para el index
		/* public function getIndex() {
		  //First, Add an auth
		   if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		   
		   //Create your own query 
		   $data = [];
		   // <i class='fa fa-send-o'></i> Registro De Novedades &nbsp;&nbsp;
		   $data['page_title'] = 'Registro De Novedades';
		   $data['result'] = DB::table('t_novedades')->orderby('id','desc')->paginate(50);
		    
		   //Create a view. Please use `view` method instead of view method from laravel.
		   return $this->view('novedades.novedades_index',$data);
		} */

	    // para agrega registro
        public function getAdd() {
            //Create an Auth
            if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
                CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
            }
            
            $data = [];
            $data['page_title'] = 'Agregar - Registro de Novedades';
            // $data['ciudad'] = DB::table('ciudades')->get();
			// $data['tipoempr'] = DB::table('tiposemps')->get();
            
            //Please use view method instead view method from laravel
            return $this->view('novedades.novedades_add',$data);
        }

        // para editar registro
        public function getEdit($id) {
            //Create an Auth
            if(!CRUDBooster::isUpdate() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
                CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
            }
            
            $data = [];
            $data['page_title'] = 'Editar - Registro de Novedades';
            $data['rows'] = DB::table('t_novedades')->where('id',$id)->first();
            // $data['ciudad'] = DB::table('ciudades')->get();
            // $data['tipoempr'] = DB::table('tiposemps')->get();
            
            //Please use view method instead view method from laravel
            return $this->view('novedades.novedades_edit',$data);
        }

        // para detalle de registro
        public function getDetail($id) {
            //Create an Auth
            if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
                CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
            }
            
            $data = [];
            $data['page_title'] = 'Detalle - Registro de Novedades';
            $data['rows'] = DB::table('t_novedades')->where('id',$id)->first();
            // $data['tipoempr'] = DB::table('tiposemps')->get();            
            
            //Please use view method instead view method from laravel
            return $this->view('novedades.novedades_detail',$data);
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
	        if(CRUDBooster::myIdEmpresa() != 0 || CRUDBooster::myIdCustodia() != 0) {
	        	$query->where('t_novedades.id_empresa',CRUDBooster::myIdEmpresa());
	        	$query->where('t_novedades.id_custodia',CRUDBooster::myIdCustodia());
	        $this->button_detail = false;
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