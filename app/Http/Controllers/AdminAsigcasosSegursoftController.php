<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminAsigcasosSegursoftController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "t_asigcasos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			// $this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Codigo","name"=>"codigo_asigcasos"];
			// $this->col[] = ["label"=>"Cliente","name"=>"id_cliente","join"=>"t_empclis,razonsocial_empcli"];
			$this->col[] = ["label"=>"Tipo Denuncia","name"=>"id_tipodenu","join"=>"t_tipodenuns,detalle_tipodenun"];
			$this->col[] = ["label"=>"Nro Caso","name"=>"nrocaso_asigcasos"];
			// $this->col[] = ["label"=>"Detalle","name"=>"detalle_asigcasos"];
			$this->col[] = ["label"=>"Denunciado","name"=>"nomdenunciado_asigcasos"];			
			$this->col[] = ["label"=>"Direccion Denunciado","name"=>"direccion_asigcasos"];			
			$this->col[] = ["label"=>"Departamento","name"=>"id_departamento","join"=>"t_ciudades,ciudad_ciudad"];
			$this->col[] = ["label"=>"Ciudad","name"=>"ciudad_asigcasos"];
			$this->col[] = ["label"=>"Zona","name"=>"zona_asigcasos"];
			$this->col[] = ["label"=>"Fecha Registro","name"=>"fecha_asigcasos"];
			$this->col[] = ["label"=>"Estado","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Cliente','name'=>'id_cliente','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_empclis,razonsocial_empcli'];
			$this->form[] = ['label'=>'Tipo de Denuncia','name'=>'id_tipodenu','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_tipodenuns,detalle_tipodenun'];
			$this->form[] = ['label'=>'Nro. de Caso','name'=>'nrocaso_asigcasos','type'=>'number','value'=>str_pad(CRUDBooster::ultimoIdRegCaso()+1, 4, "0", STR_PAD_LEFT),'readonly'=>true,'validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. de Caso','name'=>'nrocaso_asigcasos','type'=>'hidden','value'=>CRUDBooster::ultimoIdRegCaso()+1,'validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Codigo','name'=>'codigo_asigcasos','type'=>'text','validation'=>'required|min:8|max:35','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pertenece a','name'=>'pertenecea_asigcasos','type'=>'select2','validation'=>'required|min:3|max:60','width'=>'col-sm-10','dataenum'=>'LOCAL COMERCIAL;PUNTO DE VENTA;DOMICILIO PARTICULAR;FÁBRICA;OTROS'];
			$this->form[] = ['label'=>'Otro (describir)','name'=>'otro_asigcasos','type'=>'text','validation'=>'min:3|max:50','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Departamento','name'=>'id_departamento','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_ciudades,ciudad_ciudad'];
			$this->form[] = ['label'=>'Provincia','name'=>'provincia_asigcasos','type'=>'text','validation'=>'required|min:3|max:50','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ciudad','name'=>'ciudad_asigcasos','type'=>'text','validation'=>'required|min:3|max:30','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Localidad','name'=>'localidad_asigcasos','type'=>'text','validation'=>'required|min:3|max:60','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Direccion de la denuncia','name'=>'diredenu_asigcasos','type'=>'text','validation'=>'required|min:3|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre Denunciado','name'=>'nomdenunciado_asigcasos','type'=>'text','validation'=>'required|min:3|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalle','name'=>'detalle_asigcasos','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Zona','name'=>'zona_asigcasos','type'=>'text','validation'=>'required|min:3|max:30','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Direccion del denunciado','name'=>'direccion_asigcasos','type'=>'text','validation'=>'required|min:1|max:80','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Calle/Callejon/Avenida','name'=>'calle_asigcasos','type'=>'select2','validation'=>'required|min:3|max:30','width'=>'col-sm-10','dataenum'=>'CALLE;CALLEJON;AVENIDA;OTROS'];
			$this->form[] = ['label'=>'Geo-Referencia','name'=>'sector_asigcasos','type'=>'text','validation'=>'required|min:7|max:400','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Latitud y Longitud','name'=>'area_asigcasos','type'=>'text','validation'=>'required|min:3|max:30','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha','name'=>'fecha_asigcasos','type'=>'date','validation'=>'required|date_format:Y-m-d','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','readonly'=>true,'validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'Activo'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Cliente','name'=>'id_cliente','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_empclis,razonsocial_empcli'];
			//$this->form[] = ['label'=>'Tipo de Denuncia','name'=>'id_tipodenu','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_tipodenuns,detalle_tipodenun'];
			//$this->form[] = ['label'=>'Codigo','name'=>'codigo_asigcasos','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nro. de Caso','name'=>'nrocaso_asigcasos','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Departamento','name'=>'id_departamento','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_ciudades,ciudad_ciudad'];
			//$this->form[] = ['label'=>'Ciudad','name'=>'id_ciudad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_poblaciones,detalle_poblacion'];
			//$this->form[] = ['label'=>'Region','name'=>'id_region','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_regiones,region_region'];
			//$this->form[] = ['label'=>'Poblacion','name'=>'id_poblacion','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_poblaciones,detalle_poblacion'];
			//$this->form[] = ['label'=>'Area','name'=>'id_area','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_areas,detalle_area'];
			//$this->form[] = ['label'=>'Zona','name'=>'id_zona','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_zonaareas,detalle_zonaarea'];
			//$this->form[] = ['label'=>'Direccion','name'=>'direccion_asigcasos','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Detalle','name'=>'detalle_asigcasos','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fecha Asigcasos','name'=>'fecha_asigcasos','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'Activo'];
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
	        $this->script_js = "
				$( '#codigo_asigcasos' ).prop('readonly', false );

				var str = '';
				var arra = '';
				var pc = '';
				var pc1 = '';
				var pc2 = '';
				var codNro = $('#nrocaso_asigcasos').val();

				$( '#id_cliente' )
				  .change( function () {
				  	pc1 = '';
				    str = $('#id_cliente option:selected').text();
				    arra = str.split(' ');
				    for (var i = 0 ; i < arra.length ; i++){
						//console.log( cadena.substring(i, (cadena.length)) );
				    	pc1 += arra[i].charAt(0);
					}
					$( '#codigo_asigcasos' ).val( pc1 + '-' + pc2 + '-' + codNro );
				} );
					
				$( '#id_tipodenu' )
				  .change( function () {
				  	pc2 = '';
				    str = $('#id_tipodenu option:selected').text();
				    arra = str.split(' ');
				    for (var i = 0 ; i < arra.length ; i++){
						//console.log( cadena.substring(i, (cadena.length)) );
				    	pc2 += arra[i].charAt(0);
					}
					$( '#codigo_asigcasos' ).val( pc1 + '-' + pc2 + '-' + codNro );
				} );
	        ";

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
					/* max-height: 200px;
					min-height: 100px; */
				}

				.note-editor.note-frame .note-editing-area .note-editable {
					/* max-height: 100px;
					min-height: 100px; */
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