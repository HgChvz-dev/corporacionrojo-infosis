<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminRegsegsSegursoftController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "t_regsegs";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"P.R.","name"=>"primero_regseg"];
			$this->col[] = ["label"=>"Caso","name"=>"id_caso","join"=>"t_asigcasos,codigo_asigcasos"];
			$this->col[] = ["label"=>"Cod Seguimiento","name"=>"codigosegi_regsegs"];
			$this->col[] = ["label"=>"Hora Inicio","name"=>"horainicio_regseg"];
			$this->col[] = ["label"=>"Fecha","name"=>"fecha_regseg"];
			$this->col[] = ["label"=>"Hora Final","name"=>"horafinal_regseg"];
			$this->col[] = ["label"=>"Detalle Seguimiento","name"=>"detalle_regseg","visible"=>false];
			$this->col[] = ["label"=>"Latitud","name"=>"geolon_regseg"];
			$this->col[] = ["label"=>"Longitud","name"=>"geolat_regseg"];
			$this->col[] = ["label"=>"Placa Movilidad","name"=>"placa_regseg"];
			$this->col[] = ["label"=>"Lugar","name"=>"lugar_regseg"];
			$this->col[] = ["label"=>"Prioridad","name"=>"prioridad_regseg"];
			$this->col[] = ["label"=>"Fecha Registro","name"=>"fecha_regseg"];
			$this->col[] = ["label"=>"Estado","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

  			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Primer Seguimiento','name'=>'primero_regseg','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'No;Si'];
			$this->form[] = ['label'=>'Realizado por','name'=>'quien_regseg','type'=>'text','validation'=>'required|min:5|max:50','width'=>'col-sm-10','placeholder'=>'Seudónimo(s) separado por *'];
			$this->form[] = ['label'=>'VL en uso','name'=>'vl_regseg','type'=>'text','validation'=>'required|min:8|max:150','width'=>'col-sm-10','placeholder'=>'vl ???*color ???*placa ???*conductor ???*kilometraje inicial ???*kilometraje final ???'];
			$this->form[] = ['label'=>'Codigo Caso','name'=>'id_caso','type'=>'datamodal','datamodal_table'=>'t_asigcasos','datamodal_where'=>'status = "Activo"','datamodal_columns'=>'codigo_asigcasos,ciudad_asigcasos,direccion_asigcasos,fecha_asigcasos','datamodal_columns_alias'=>'Codigo Caso,Ciudad,Direccion,Fecha Registro','datamodal_size'=>'large','required'=>true,'width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Codigo Caso','name'=>'id_caso','type'=>'datamodal','datamodal_table'=>'t_asigcasos','datamodal_columns'=>'codigo_asigcasos,nrocaso_asigcasos,detalle_asigcasos','datamodal_size'=>'large','datamodal_columns_alias'=>'Codigo,Nro. Caso,Detalle','datamodal_where'=>'id_ciudad='.CRUDBooster::myIdCiudad(),'validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Cod. Seguimiento','name'=>'codigosegi_regsegs','type'=>'text','validation'=>'required|max:35','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Empresa','name'=>'id_empresa','type'=>'hidden','readonly'=>true,'width'=>'col-sm-10','value'=>CRUDBooster::myIdEmpresa()];
			$this->form[] = ['label'=>'Empresa Cliente','name'=>'id_empcli','type'=>'hidden','value'=>CRUDBooster::myIdEmpresa(),'validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Usuario','name'=>'id_usuario','type'=>'hidden','value'=>CRUDBooster::myId(),'validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha','name'=>'fecha_regseg','type'=>'date','value'=>date('Y-m-d'),'readonly'=>false,'validation'=>'required|date|min:10|max:10','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Hora Inicio','name'=>'horainicio_regseg','type'=>'time','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Hora Final','name'=>'horafinal_regseg','type'=>'time','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalle','name'=>'detalle_regseg','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ciudad','name'=>'id_ciudad','type'=>'select2','validation'=>'min:0','width'=>'col-sm-10','datatable'=>'t_ciudades,ciudad_ciudad'];
			// $this->form[] = ['label'=>'Poblacion','name'=>'poblacion_regseg','type'=>'select2','validation'=>'min:0','width'=>'col-sm-10','datatable'=>'t_poblaciones,detalle_poblacion'];
			// $this->form[] = ['label'=>'Area','name'=>'area_regseg','type'=>'select2','validation'=>'min:0','width'=>'col-sm-10','datatable'=>'t_areas,detalle_area'];
			$this->form[] = ['label'=>'Zona','name'=>'zona_regseg','type'=>'text','validation'=>'max:50','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Direccion','name'=>'lugar_regseg','type'=>'text','validation'=>'max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalles inmueble','name'=>'detinmueble_regseg','type'=>'text','validation'=>'max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. Puerta','name'=>'nroinmueble_regseg','type'=>'text','validation'=>'max:5','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen del inmueble','name'=>'imginmueble_regseg','type'=>'upload','validation'=>'image|mimes:jpeg,png,jpg|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalle Colindancia Izquierda','name'=>'colindaizq_regseg','type'=>'text','validation'=>'max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. Puerta','name'=>'colindaizqnro_regseg','type'=>'text','validation'=>'max:5','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen Colindacia Izquierda','name'=>'imgcolizq_regseg','type'=>'upload','validation'=>'image|mimes:jpeg,png,jpg|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalle Colindancia Derecha','name'=>'colindader_regseg','type'=>'text','validation'=>'max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. Puerta','name'=>'colindadernro_regseg','type'=>'text','validation'=>'max:5','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen Colindacia Derecha','name'=>'imgcolder_regseg','type'=>'upload','validation'=>'image|mimes:jpeg,png,jpg|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Geo-Referencia','name'=>'latlong_regseg','type'=>'text','validation'=>'max:400','readonly'=>false,'width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Geo-Latitud','name'=>'geolat_regseg','type'=>'text','validation'=>'max:150','readonly'=>false,'width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Geo-Longitud','name'=>'geolon_regseg','type'=>'text','validation'=>'max:150','readonly'=>false,'width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Placa','name'=>'placa_regseg','type'=>'text','validation'=>'max:250','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Marca','name'=>'marca_regseg','type'=>'text','validation'=>'max:250','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Color','name'=>'color_regseg','type'=>'text','validation'=>'max:250','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tipo','name'=>'modelo_regseg','type'=>'text','validation'=>'max:250','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen Vehículo Uno','name'=>'imagenes_regseg','type'=>'upload','validation'=>'image|mimes:jpeg,png,jpg|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen Vehículo Dos','name'=>'imagenesone_regseg','type'=>'upload','validation'=>'image|mimes:jpeg,png,jpg|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Observaciones','name'=>'adicional_regseg','type'=>'text','validation'=>'max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Prioridad','name'=>'prioridad_regseg','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Ninguna;Alta;Media;Baja'];
			$this->form[] = ['label'=>'Voboemp','name'=>'voboemp_regseg','type'=>'hidden','value'=>0];
			// $this->form[] = ['label'=>'Date Close','name'=>'dateclose_regseg','type'=>'hidden','value'=>CRUDBooster::addOneDay()];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','value'=>'Activo','readonly'=>true,'width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Caso','name'=>'id_caso','type'=>'datamodal','validation'=>'required','width'=>'col-sm-9','datamodal_table'=>'t_asigcasos','datamodal_columns'=>'nrocaso_asigcasos,codigo_asigcasos,detalle_asigcasos','datamodal_size'=>'large','datamodal_columns_alias_name'=>'Nro. Caso,Codigo,Detalle'];
			//$this->form[] = ['label'=>'Empresa','name'=>'id_empresa','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Empresa Cliente','name'=>'id_empcli','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Usuario','name'=>'id_usuario','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fecha','name'=>'fecha_regseg','type'=>'date','validation'=>'required|date|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Hora Inicio','name'=>'horainicio_regseg','type'=>'time','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Hora Final','name'=>'horafinal_regseg','type'=>'time','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Detalle','name'=>'detalle_regseg','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Lugar','name'=>'lugar_regseg','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ciudad','name'=>'id_ciudad','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_poblaciones,detalle_poblacion'];
			//$this->form[] = ['label'=>'Poblacion','name'=>'poblacion_regseg','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_areas,detalle_area'];
			//$this->form[] = ['label'=>'Area','name'=>'area_regseg','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_zonaareas,detalle_zonaarea'];
			//$this->form[] = ['label'=>'Zona','name'=>'zona_regseg','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_zonaareas,detalle_zonaarea'];
			//$this->form[] = ['label'=>'Geo-Referencia','name'=>'address','type'=>'googlemaps','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Placa','name'=>'placa_regseg','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Marca','name'=>'marca_regseg','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Color','name'=>'color_regseg','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Modelo','name'=>'modelo_regseg','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Adicional','name'=>'adicional_regseg','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Imagenes','name'=>'imagenes_regseg','type'=>'upload','validation'=>'required|min:1|max:255|image','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Prioridad','name'=>'prioridad_regseg','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Voboemp','name'=>'voboemp_regseg','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vobocli','name'=>'vobocli_regseg','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
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
			$this->table_row_color[] = ['condition'=>"[prioridad_regseg] == 'Alta'","color"=>"danger"];
			$this->table_row_color[] = ['condition'=>"[prioridad_regseg] == 'Media'","color"=>"warning"];
			$this->table_row_color[] = ['condition'=>"[prioridad_regseg] == 'Baja'","color"=>"success"];

	        
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
				// document.getElementById("codigosegi_regsegs").readOnly = true;

				// $( "#id_caso" )
				// 	.change( function () {
				// 	var texto = document.getElementById("#id_caso");
				// 	alert( texto );
				// } );

				// $( "#id_caso" )
				// 	.change( function () {
				//   	var pc1 = "";
				//     str = $( "#id_caso option:selected").text();
				//     arra = str.split( " " );
				//     for (var i = 0 ; i < arra.length ; i++){
				// 		//console.log( cadena.substring(i, (cadena.length)) );
				//     	pc1 += arra[i].charAt(0);
				// 	}
				// 	$( "#codigosegi_regsegs" ).val( pc1 );
				// } );
	        // $this->script_js = '$(".btn-edit").remove();';

			// $this->script_js = '
			// 	const funcionInit = () => {
			// 		if (!"geolocation" in navigator) {
			// 			return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
			// 		}

			// 		const $latitud = document.getElementById("geolat_regseg"),
			// 			$longitud = document.getElementById("geolon_regseg"),
			// 			$enlace = document.getElementById("latlong_regseg");

			// 		const onUbicacionConcedida = ubicacion => {
			// 			console.log("Tengo la ubicación: ", ubicacion);
			// 			const coordenadas = ubicacion.coords;
			// 			$latitud.value = coordenadas.latitude;
			// 			$longitud.value = coordenadas.longitude;
			// 			$enlace.value = `https://www.google.com/maps/@${coordenadas.latitude},${coordenadas.longitude},20z`;
			// 		}

			// 		const onErrorDeUbicacion = err => {

			// 			$latitud.value = "Error obteniendo ubicación: " + err.message;
			// 			$longitud.value = "Error obteniendo ubicación: " + err.message;
			// 			console.log("Error obteniendo ubicación: ", err);
			// 		}

			// 		const opcionesDeSolicitud = {
			// 			enableHighAccuracy: true, // Alta precisión
			// 			maximumAge: 0, // No queremos caché
			// 			timeout: 5000 // Esperar solo 5 segundos
			// 		};

			// 	    // var coord = {lat:-34.5956145 ,lng: -58.4431949};

			// 	    // var marker = new google.maps.Marker({
			// 	    //   position: coord,
			// 	    //   map: map
			// 	    // });

			// 		$latitud.value = "Cargando...";
			// 		$longitud.value = "Cargando...";
			// 		navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);

			// 	};

			// 	document.addEventListener("DOMContentLoaded", funcionInit);
			// ';

	

            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
			// $this->pre_index_html = '<style>.btn-edit{display: none;}.btn-delete{display: none;}</style>';


	        
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
					max-height: 400px;
					min-height: 100px;
				}

				.note-editor.note-frame .note-editing-area .note-editable {
					max-height: 300px;
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
	    	CRUDBooster::activeDenied(['t_regsegs']);
	    	
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	        // $datos = DB::table('t_regsegs')
	        // 	// ->where([['voboemp_regseg',1]])
	        // 	->get();

			// $datos = json_decode(json_encode($datos, JSON_FORCE_OBJECT), true);

			// foreach ($datos as $value) {
		    //     if ($value['voboemp_regseg'] == 1) {
			// 		$this->button_edit = false;
			// 		$this->button_delete = false;
			// 		// echo "<script>$('a').attr('id', 'quita');</script>";
		    //     } else {
			// 		// echo '<script></script>';
		    //     }
			// }
	    	// if ($resul > 0) {
		    //     echo '<style>
		    //         .btn>.btn-xs>.btn-success>.btn-edit{
		    //             display: none;
		    //         }
		    //     </style>';	    	
	    	// }		
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
	        $affected = DB::table('t_regsegs')
	            ->where([
	                ['id', $id]
	            ])
	            ->update(['dateclose_regseg' => CRUDBooster::addOneDay()]);
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