<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdmincarlabsSegursoftController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "t_carlabs";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Fecha","name"=>"fecha_carlab"];
			$this->col[] = ["label"=>"Cite","name"=>"cite_carlab"];
			$this->col[] = ["label"=>"Empresa","name"=>"id_empresa","join"=>"t_empclis,razonsocial_empcli"];
			$this->col[] = ["label"=>"Referencia","name"=>"ref_carlab"];
			$this->col[] = ["label"=>"C.C.","name"=>"cc_carlab"];
			$this->col[] = ["label"=>"Adjuntos","name"=>"adj_carlab"];
			$this->col[] = ["label"=>"Fecha Respuesta","name"=>"fecres_carlab"];
			$this->col[] = ["label"=>"Archivo PDF","name"=>"pdfres_carlab","download"=>true];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Fecha','name'=>'fecha_carlab','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cite','name'=>'cite_carlab','type'=>'text','validation'=>'required|min:1|max:20','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Empresa','name'=>'id_empresa','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_empclis,razonsocial_empcli','datatable_where'=>'status="Activo"'];
			$this->form[] = ['label'=>'Referencia','name'=>'ref_carlab','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Detalle','name'=>'detalle_carlab','type'=>'wysiwyg','validation'=>'required|string|min:5|max:50000','width'=>'col-sm-10'];

			$columns = [];
			$columns[] = ['label'=>'Descripción','name'=>'desc_carlab','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'t_productos,detalleproducto_producto','datatable_where'=>'status="Activo"'];
			$columns[] = ['label'=>'Marca','name'=>'marca_carlab','type'=>'text','width'=>'col-sm-10','max'=>"15",'placeholder'=>'Maximo de caracteres 15'];
			$columns[] = ['label'=>'Cantidad','name'=>'cant_carlab','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10','placeholder'=>'Maximo de caracteres 15'];
			$columns[] = ['label'=>'Envase de','name'=>'envase_carlab','type'=>'text','width'=>'col-sm-10','max'=>"15",'placeholder'=>'Maximo de caracteres 15'];
			$columns[] = ['label'=>'Lote','name'=>'lote_carlab','type'=>'text','width'=>'col-sm-10','max'=>"15",'placeholder'=>'Maximo de caracteres 15'];
			$columns[] = ['label'=>'Fecha Vencimiento','name'=>'vence_carlab','type'=>'text','width'=>'col-sm-10','max'=>"15",'placeholder'=>'Maximo de caracteres 15'];
			$columns[] = ['label'=>'Caracteristica','name'=>'carc_carlab','type'=>'text','width'=>'col-sm-10','max'=>"30",'placeholder'=>'Maximo de caracteres 30'];
			$this->form[] = ['label'=>'Detalle de Productos para Analisis','name'=>'t_carlabdatas','type'=>'child','columns'=>$columns,'table'=>'t_carlabdatas','foreign_key'=>'id_carlab'];
			
			$this->form[] = ['label'=>'Imagen 01','name'=>'img1_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 02','name'=>'img2_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 03','name'=>'img3_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 04','name'=>'img4_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 05','name'=>'img5_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 06','name'=>'img6_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 07','name'=>'img7_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 08','name'=>'img8_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 09','name'=>'img9_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 10','name'=>'img10_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 11','name'=>'img11_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Imagen 12','name'=>'img12_carlab','type'=>'upload','validation'=>'min:1|max:2048','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Firma Digital','name'=>'firma_carlab','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'C.C.','name'=>'cc_carlab','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10','placeholder'=>''];
			$this->form[] = ['label'=>'Adjuntos','name'=>'adj_carlab','type'=>'text','validation'=>'required|min:1|max:200','width'=>'col-sm-10','placeholder'=>'EJ.: Adjunto 1*Adjunto 2*Adjunto...'];
			// $this->form[] = ['label'=>'Membrete','name'=>'membrete_carlab','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','validation'=>'required|min:1|max:10','width'=>'col-sm-10','value'=>'Activo'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Fecha Carlab","name"=>"fecha_carlab","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			//$this->form[] = ["label"=>"Cite Carlab","name"=>"cite_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Empresa","name"=>"id_empresa","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"empresa,id"];
			//$this->form[] = ["label"=>"Ref Carlab","name"=>"ref_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Detalle Carlab","name"=>"detalle_carlab","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Desc Carlab","name"=>"desc_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Marca Carlab","name"=>"marca_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cant Carlab","name"=>"cant_carlab","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Envase Carlab","name"=>"envase_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Lote Carlab","name"=>"lote_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Vence Carlab","name"=>"vence_carlab","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			//$this->form[] = ["label"=>"Carc Carlab","name"=>"carc_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img1 Carlab","name"=>"img1_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img2 Carlab","name"=>"img2_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img3 Carlab","name"=>"img3_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img4 Carlab","name"=>"img4_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img5 Carlab","name"=>"img5_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img6 Carlab","name"=>"img6_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img7 Carlab","name"=>"img7_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img8 Carlab","name"=>"img8_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img9 Carlab","name"=>"img9_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img10 Carlab","name"=>"img10_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img11 Carlab","name"=>"img11_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Img12 Carlab","name"=>"img12_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Firma Carlab","name"=>"firma_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cc Carlab","name"=>"cc_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Adj Carlab","name"=>"adj_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Membrete Carlab","name"=>"membrete_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Fecres Carlab","name"=>"fecres_carlab","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			//$this->form[] = ["label"=>"Detres Carlab","name"=>"detres_carlab","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Pdfres Carlab","name"=>"pdfres_carlab","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Fecha Baja","name"=>"fecha_baja","type"=>"datetime","required"=>TRUE,"validation"=>"required|date_format:Y-m-d H:i:s"];
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
	    	$postdata['firma_carlab'] = "uploads/miu/membrete_redcorp_1.png";
	    	$postdata['membrete_carlab'] = "uploads/miu/pie_de_firma_hcc.svg";

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
	        
	    	$datosera = DB::table('t_carlabdatas')
	    		->where([
	    			['t_carlabdatas.id_carlab',$id],
	    		])
	    		->delete();

	    	$datosera = json_decode(json_encode($datosera, JSON_FORCE_OBJECT),true);

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