<!-- DETALLES DATOS AL REGISTRO DE PACIENTES -->
<?php 
    $canids = 1;
    $nameUser = DB::table('cms_users')->where('id',$rows->id_usuario)->value('name');

    $laFecha = explode('-',$rows->fecha_novedad);
    $laFecha = $laFecha[2]."/".$laFecha[1]."/".$laFecha[0];

    $valorDato = '';
    $datoValor = '';

?>

@extends('crudbooster::admin_template')
@section('content')

    <div id="icon-menu"></div>

    <div>

        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @endif
        @endif

        <style>
            <!--table
                {mso-displayed-decimal-separator:"\,";
                mso-displayed-thousand-separator:"\.";}
            .font510146
                {color:black;
                font-size:10.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;}
            .font610146
                {color:black;
                font-size:10.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;}
            .xl6510146
                {padding-top:5px;
                padding-right:5px;
                padding-left:5px;
                padding-bottom: 5px;
                mso-ignore:padding;
                color:black;
                font-size:10.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:center;
                vertical-align:middle;
                border:.5pt solid windowtext;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .xl6610146
                {padding-top:5px;
                padding-right:5px;
                padding-left:5px;
                padding-bottom: 5px;
                mso-ignore:padding;
                color:black;
                font-size:10.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:"hh\:mm\:ss";
                text-align:center;
                vertical-align:middle;
                border:.5pt solid windowtext;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .xl6710146
                {padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                padding-bottom:1px;
                mso-ignore:padding;
                color:black;
                font-size:10.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:left;
                vertical-align:middle;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .xl6810146
                {padding-top:1px;
                padding-right:5px;
                padding-left:1px;
                padding-bottom: 1px;
                mso-ignore:padding;
                color:black;
                font-size:10.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:right;
                vertical-align:middle;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .xl6910146
                {padding-top:5px;
                padding-right:5px;
                padding-left:5px;
                padding-bottom: 5px;
                mso-ignore:padding;
                color:black;
                font-size:16.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:center;
                vertical-align:bottom;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .xl7010146
                {padding-top:5px;
                padding-right:5px;
                padding-left:5px;
                padding-bottom: 5px;
                mso-ignore:padding;
                color:black;
                font-size:10.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:left;
                vertical-align:top;
                border:.5pt solid windowtext;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:normal;}
            -->
        </style>      

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title !!}</strong>
            </div>

            <div class="panel-body" style="padding:20px 5px 15px 5px">
                    <!-- desde aqui los datos que estan dentro del BODY -->
                {{-- <div class="box-body" id="parent-form-area"> --}}
                    {{-- <div class="container" style="width: 99%;"> --}}
                        {{-- <div class="panel panel-default"> --}}
                            {{-- <div class="panel-body"> --}}
                                {{-- <div class="tab-content"> --}}
                                    <div class="table-responsive " align=center>
                                        <table border=0 cellpadding=0 cellspacing=0 width=680 style='border-collapse: collapse;table-layout:fixed;width:510pt'>
                                         <col width=80 style='width:60pt'>
                                         <col width=455 style='mso-width-source:userset;mso-width-alt:16640;width:341pt'>
                                         <col width=145 style='mso-width-source:userset;mso-width-alt:5302;width:109pt'>
                                         <tr height=28 style='height:21.0pt'>
                                          <td colspan=3 height=28 class=xl6910146 width=680 style='height:21.0pt; width:510pt'>DETALLE DE NOVEDAD</td>
                                         </tr>
                                         <tr >
                                          <td colspan=2 class=xl6710146>
                                            <font class="font610146">IDU: </font>
                                            <font class="font510146">: {{ $rows->id }}</font>
                                          </td>
                                          <td class=xl6810146>
                                            {{-- $emp, $ecu, $usr, $canids, $ids, $d1, $d2, $h1, $siZe --}}
                                            <img src="data:image/svg+xml;base64, {{ 
                                                base64_encode( 
                                                CRUDBooster::QrCode(CRUDBooster::myIdEmpresa(), 
                                                CRUDBooster::myIdCustodia(), 
                                                CRUDBooster::myId(), 
                                                $rows->id, 
                                                $canids, 
                                                $rows->fecha_novedad, 
                                                $rows->fecha_novedad, 
                                                $rows->hora_novedad, 
                                                75 
                                            ) ) }}">                                            
                                          </td>
                                         </tr>
                                         <tr >
                                          <td colspan=2 class=xl6710146>
                                            <font class="font610146">SEGURIDAD</font>
                                            <font class="font510146">: {{ $nameUser }}</font>
                                          </td>
                                          <td class=xl6810146>
                                            <font class="font610146">FECHA</font>
                                            <font class="font510146">: {{ $laFecha }}</font>
                                          </td>
                                         </tr>
                                         <tr height=20 style='height:15.0pt'>
                                          <td height=20 class=xl6510146 style='height:15.0pt'>HORA</td>
                                          <td class=xl6510146 style='border-left:none'>DETALLE</td>
                                          <td class=xl6510146 style='border-left:none'>OBSERVACION</td>
                                         </tr>
                                         <tr height=102 style='height:76.5pt'>
                                          <td height=102 class=xl6610146 style='height:76.5pt;border-top:none'>{{ $rows->hora_novedad }}</td>
                                          <td class=xl7010146 width=455 style='border-top:none;border-left:none; width:341pt'>
                                            <?php 
                                                if ( trim($rows->detalle_novedad) != '' && trim($rows->nombrev_novedad) == '' && trim($rows->civ_novedad) == '' ) {
                                                    $valorDato = "DETALLE DE NOVEDAD"; ?>
                                                    <font class="font610146">{{ $valorDato }}</font><br>
                                                    <div style="text-align: justify;">{!! strtoupper($rows->detalle_novedad) !!}</div>
                                                <?php } 
                                                if ( trim($rows->nombrev_novedad) != '' && trim($rows->civ_novedad) != '' && trim($rows->detalle_novedad) == '') {
                                                    $datoValor = "DETALLE DE VISITA"; ?>
                                                    <font class="font610146">{{ $datoValor }}</font><br>
                                                    <font class="font610146">NOMBRE: </font>{{ strtoupper($rows->nombrev_novedad) }}<br>
                                                    <font class="font610146">Nº C.I.: </font>{{ strtoupper($rows->civ_novedad) }}<br>
                                                    <font class="font610146">MOTIVO: </font>{{ strtoupper($rows->motivov_novedad) }}<br>
                                                    <font class="font610146">A QUIEN: </font>{{ strtoupper($rows->aquienv_novedad) }}<br>
                                                    <font class="font610146">LUGAR: </font>{{ strtoupper($rows->lugarv_novedad) }}<br>
                                                <?php } 
                                                if ( trim($rows->detalle_novedad) != '' && trim($rows->nombrev_novedad) != '' && trim($rows->civ_novedad) != '' ) {
                                                    $valorDato = "DETALLE DE NOVEDAD";
                                                    $datoValor = "DETALLE DE VISITA"; ?>
                                                    <font class="font610146">{{ $valorDato }}</font><br>
                                                    <div style="text-align: justify;">{!! strtoupper($rows->detalle_novedad) !!}</div><br><br>
                                                    <font class="font610146">{{ $datoValor }}</font><br>
                                                    <font class="font610146">NOMBRE: </font>{{ strtoupper($rows->nombrev_novedad) }}<br>
                                                    <font class="font610146">Nº C.I.: </font>{{ strtoupper($rows->civ_novedad) }}<br>
                                                    <font class="font610146">MOTIVO: </font>{{ strtoupper($rows->motivov_novedad) }}<br>
                                                    <font class="font610146">A QUIEN: </font>{{ strtoupper($rows->aquienv_novedad) }}<br>
                                                    <font class="font610146">LUGAR: </font>{{ strtoupper($rows->lugarv_novedad) }}<br>
                                                <?php }
                                            ?>
                                          </td>
                                          <td class=xl7010146 width=145 style='border-top:none;border-left:none; width:109pt'>
                                            {{ $rows->observacion_novedades }}
                                          </td>
                                         <![if supportMisalignedColumns]>
                                         <tr height=0 style='display:none'>
                                          <td width=80 style='width:60pt'></td>
                                          <td width=455 style='width:341pt'></td>
                                          <td width=145 style='width:109pt'></td>
                                         </tr>
                                         <![endif]>
                                        </table>
                                    </div>                                        
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <!--END AUTO MARGIN-->

    <!-- para botton-up -->
    <div id="button-up">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
        document.getElementById("icon-menu").addEventListener("click", mostrar_menu);

        function mostrar_menu() {}

        // Scroll up
        document.getElementById("button-up").addEventListener("click", scrollUp);
        function scrollUp(){
            var currentScroll = document.documentElement.scrollTop;
            if (currentScroll > 0){
                window.requestAnimationFrame(scrollUp);
                window.scrollTo (0, currentScroll - (currentScroll / 10));
            }
        }

        buttonUp = document.getElementById("button-up");
        window.onscroll = function(){
            var scroll = document.documentElement.scrollTop;
            if (scroll > 500){
                buttonUp.style.transform = "scale(1)";
            }else if(scroll < 500){
                buttonUp.style.transform = "scale(0)";
            }
        }
    </script>

@endsection

