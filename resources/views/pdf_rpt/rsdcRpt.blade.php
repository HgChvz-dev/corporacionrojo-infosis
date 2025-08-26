<?php
    set_time_limit(0);
    ini_set("memory_limit",-1);
    ini_set('max_execution_time', 0);

    $canids = count($datoEs);
    $ids = "";
    for ($i=0; $i < count($datoEs) ; $i++) { 
        $ids = $datoEs[$i]['id']."|".$ids;
    }

    $dateIni = CRUDBooster::myConverDate($datoEs[0]['fechainicial']);
    $dateFin = CRUDBooster::myConverDate($datoEs[0]['fechafinal']);

    $x = 0;

// print('<pre>');
// print_r($datoEs);
// print('</pre>');
// exit();

?>

@foreach ($datoEs as $valor)
    <?php $x = $x + 1; ?>
@endforeach   

<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Reporte de Seguimiento de Casos</title>
        <style>

            @page {
                size: 215mm 320mm;
                margin: 1cm 1cm;
                font-family: Arial;
            }

            table{
                table-layout: fixed;
                width: 100%;
            }

            th, td {
                word-wrap: break-word;
            }  

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
                /*background-color: #ff8000;*/
                /*color: white;*/
                text-align: center;
            }

            main {
                position: relative;
                top: 3cm;
                right: 0cm;
                bottom: 0cm;
                left: 0cm;                
                margin-bottom: 1.5cm;
            }

            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 1.5cm;
                /*background-color: #03a9f4;*/
                /*color: white;*/
                text-align: center;
            }

            .saltopagina{
                page-break-after:always;
            }

            .font530306
                {color:black;
                font-size:8.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;}
            .font630306
                {color:black;
                font-size:8.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;}
            .xl1530306
                {padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:11.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:general;
                vertical-align:bottom;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .styleCodRegSeg
            {
                width: 20%;
                padding-top:3px;
                padding-right:3px;
                padding-left:3px;
                padding-bottom: 3px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:"hh\:mm\:ss";
                text-align:top;
                vertical-align:top;
                border:.5pt solid windowtext;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:normal;
            }  
            .styleDetRegSec
            {
                width: 43%;
                padding-top:3px;
                padding-right:3px;
                padding-left:3px;
                padding-bottom: 3px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
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
                white-space:normal;
            }                          
            .styleObserRegSeg
            {
                width: 43%;
                padding-top:3px;
                padding-right:3px;
                padding-left:3px;
                padding-bottom: 3px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
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
                white-space:normal;
            }
            .xl6630306
                {padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:700;
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
            .xl6830306a
                {width: 20%;
                padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:center;
                vertical-align:middle;
                border:.5pt solid windowtext;
                background:#F2F2F2;
                mso-pattern:black none;
                white-space:nowrap;}
            .xl6830306b
                {width: 43%;
                padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:center;
                vertical-align:middle;
                border:.5pt solid windowtext;
                background:#F2F2F2;
                mso-pattern:black none;
                white-space:nowrap;}
            .xl6830306c
                {width: 43%;
                padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:center;
                vertical-align:middle;
                border:.5pt solid windowtext;
                background:#F2F2F2;
                mso-pattern:black none;
                white-space:nowrap;}
            .xl6930306
                {width: 15%;
                padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:400;
                font-style:italic;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:right;
                vertical-align:top;
                border-top:none;
                border-right:none;
                border-bottom:none;
                border-left:none;}
            .xl7030306
                {width: 10%;
                padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                padding-bottom: 1px;
                color:black;
                font-size:8.0pt;
                font-weight:400;
                font-style:italic;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:left;
                vertical-align:top;
                border-top:none;
                border-right:none;
                border-bottom:none;
                border-left:none;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .xl7130306
                {padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:400;
                font-style:italic;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:center;
                vertical-align:top;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:normal;}
            .xl7230306
                {width: 70%;
                padding-top:1px;
                padding-right:1px;
                padding-left:1px;
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
            .xl7330306
                {padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                padding-bottom: 3px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:left;
                vertical-align:middle;
                border-top:none;
                border-right:none;
                /*border-bottom:.5pt solid windowtext;*/
                border-left:none;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:normal;}
            .xl7430306
                {padding-top:1px;
                padding-right:1px;
                padding-left:1px;
                mso-ignore:padding;
                color:black;
                font-size:8.0pt;
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
                white-space:normal;}
            .font610146
                {color:black;
                font-size:10.0pt;
                font-weight:700;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;}
            .tg  {
              border-collapse:collapse;
              border-spacing:0;
              undefined;
              table-layout: fixed;
              width: 100%;
            }
            .tg td{
              font-family:Arial, sans-serif;
              font-size:14px;
              overflow:hidden;
              padding:5px 5px;
              word-break:normal;
              text-transform: uppercase;
            }
            .tg th{
              font-family:Arial, sans-serif;
              font-size:14px;
              font-weight:normal;
              overflow:hidden;
              padding:5px 5px;
              word-break:normal;
            }
            .tg .tg-zu9e{
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:12px;
              font-weight:bold;
              text-align:center;
              vertical-align:middle;
            }
            .tg .tg-eo8x{
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:12px;
              text-align:center;
              vertical-align:middle;
            }
            .tg .tg-cq1w{
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:12px;
              font-weight:bold;
              text-align:left;
              vertical-align:middle;
            }
            .tg .tg-z56b{
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:12px;
              text-align:left;
              vertical-align:middle;
            }
            .tg .tg-fwxl{
              color:#cb0000;
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:12px;
              font-weight:bold;
              text-align:center;
              vertical-align:middle;
            }
            .tg .tg-2qvl{
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:22px;
              font-weight:bold;
              text-align:center;
              vertical-align:middle;
            }
            .tg .tg-d9ao{
              border-color:#FFFFFF;
              font-family:Arial, Helvetica, sans-serif !important;
              font-size:12px;
              text-align:left;
              vertical-align:middle;
            } 
            .tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
            .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
            .tg .tg-iiav{border-color:inherit;font-weight:bold;text-align:center;text-decoration:underline;vertical-align:middle}
            .tg .tg-g7sd{border-color:inherit;font-weight:bold;text-align:left;vertical-align:middle}
        </style>
    </head>
    <body>
        <header>
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
                <tr>
                    <td style="width: 10%;"><img src="{{ asset($datoEs[0]['logo_empcli']) }}" width="100"></td>
                    <td class=xl7230306>SEGUIMIENTO DE CASO</td>
                    <td style="width: 20%; text-align: right; padding-bottom: 3px;">
                        <img src="data:image/svg+xml;base64, {{ 
                            base64_encode( 
                            CRUDBooster::QrCode(CRUDBooster::myIdEmpresa(), 
                            CRUDBooster::myIdCustodia(), 
                            CRUDBooster::myId(), 
                            $ids, 
                            $canids, 
                            $dateIni, 
                            $dateFin, 
                            date('H:i:s'), 
                            75 
                        ) ) }}">
                    </td>
                </tr>
                <tr>
                    <td colspan=2 class=xl7430306>
                        <font class="font630306">EMPRESA CLIENTE:</font>
                        <font class="font530306"> {{ strtoupper( strtoupper( CRUDBooster::myCompanyCustodi() ) ) }}</font>
                    </td>
                    <td class=xl6630306>Fecha: 
                        <font class="font530306"> {{ date('d/m/Y') }}</font>
                    </td>
                </tr>
                <tr height=20 style='height:15.0pt'>
                    <td colspan=2 class=xl7330306>
                        <font class="font630306">EMPRESA DE SEGURIDAD</font>
                        <font class="font530306">: {{ strtoupper( CRUDBooster::myCompanyName() )  }}</font>
                    </td>
                    <td class=xl6630306>Hora: 
                        <font class="font530306"> {{  date('H:i:s')  }}</font>
                    </td>
                </tr>
            </table>
        </header>

        <footer>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="width: 7%;"><img src="{{ asset('uploads/miu/logo_redcorporation-cuadrado.png') }}" width="80"></td>
                    {{-- <td class=xl7030306>
                        <div style="width: 100%; text-align: left; padding-bottom: 3px;">
                            <img src="data:image/svg+xml;base64, {{ 
                                base64_encode( 
                                CRUDBooster::QrCode(CRUDBooster::myIdEmpresa(), 
                                CRUDBooster::myIdCustodia(), 
                                CRUDBooster::myId(), 
                                $ids, 
                                $canids, 
                                $dateIni, 
                                $dateFin, 
                                date('H:i:s'), 
                                75 
                            ) ) }}">
                        </div>
                    </td> --}}
                    <td class=xl7130306>La información impresa en este detalle está establecida en los registros de la base de datos del sistema<br>© copyright – redcorporation.com</td>
                    <td class=xl6930306>TR - {{ $x }} <br> </td>
                </tr>
            </table>
        </footer>

        <main>
            @foreach ($datoEs as $valor)
                <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                    <tr>
                        <td class=xl6830306a>DETALLE DEL CASO</td>
                        <td class=xl6830306b>DETALLE DEL SEGUIMIENTO</td>
                        <td class=xl6830306c>OTROS</td>
                    </tr>
               
                    <tr>
                        <td class=styleCodRegSeg style="word-break: normal; word-wrap: break-word;">
                            <b>FECHA REGISTRO</b><br>{{ $valor['fecha_asigcasos'] }}<br>
                            <b>CODIGO CASO</b><br>{{ $valor['codigo_asigcasos'] }}<br>
                            {{-- <b>NRO. CASO</b><br>{{ $valor['nrocaso_asigcasos'] }}<br> --}}
                            {{-- <b>DEPARTAMENTO</b><br>{{ $valor['ciudad_ciudad'] }}<br> --}}
                            {{-- <b>CIUDAD</b><br>{{ $valor['detalle_poblacion'] }}<br> --}}
                            {{-- <b>REGION</b><br>{{ $valor['region_region'] }}<br> --}}
                            {{-- <b>AREA</b><br>{{ $valor['detalle_area'] }}<br> --}}
                            {{-- <b>ZONA</b><br>{{ $valor['detalle_zonaarea'] }}<br> --}}
                            {{-- <b>DIRECCION</b><br>{{ $valor['direccion_asigcasos'] }}<br> --}}
                            {{-- <b>DETALLE DEL CASO</b><br>{{ $valor['detalle_asigcasos'] }}<br> --}}
                        </td>

                        <td class=styleDetRegSec style="word-break: normal; word-wrap: break-word;">
                            <b>CODIGO SEGUIMIENTO</b><br>{{ $valor['codigosegi_regsegs'] }}<br>
                            <b>FECHA SEGUIMIENTO</b><br>{{ $valor['fecha_regseg'] }}<br>
                            <table>
                                <tr>
                                    <td><b>HORA INICIO</b><br>{{ $valor['horainicio_regseg'] }}<br></td>
                                    <td><b>HORA FINAL</b><br>{{ $valor['horafinal_regseg'] }}<br></td>
                                </tr>
                            </table>
                        </td>

                        <td class=styleObserRegSeg style="word-break: normal; word-wrap: break-word;">
                            <b>CIUDAD</b><br>
                            {{ $valor['ciudad_ciudad'] }}
                            <br>
                            <b>ZONA</b><br>
                            {{ $valor['zona_regseg'] }}
                            <br>
                            <b>DIRECCION</b><br>
                            {{ $valor['lugar_regseg'] }}<br>
                            @php 
                                $quienes = str_replace("*"," - ",$valor['quien_regseg'])
                            @endphp
                            <b>Realizado por:</b><br>{{ $quienes }}<br>                            
                        </td>
                    </tr>
                    <?php $x = $x + 1; ?>
                </table>
                <br>
                <b>DETALLE DE SEGUIMIENTO</b>
                {!! $valor['detalle_regseg'] !!}
                <b>DETALLE DE VEHICULO</b>
                <table class="tg" style="undefined;table-layout: fixed; width: 100%"><colgroup>
                <col style="width: 50%">
                <col style="width: 50%">
                </colgroup>
                <thead>
                  <tr>
                    <th class="tg-g7sd">NRO. PLACA:</th>
                    <th class="tg-lboi">{{ $valor['placa_regseg'] }}</th>
                  </tr></thead>
                <tbody>
                  <tr>
                    <td class="tg-g7sd">MARCA:</td>
                    <td class="tg-lboi">{{ $valor['marca_regseg'] }}</td>
                  </tr>
                  <tr>
                    <td class="tg-g7sd">COLOR:</td>
                    <td class="tg-lboi">{{ $valor['color_regseg'] }}</td>
                  </tr>
                  <tr>
                    <td class="tg-g7sd">MODELO:</td>
                    <td class="tg-lboi">{{ $valor['modelo_regseg'] }}</td>
                  </tr>
                  <tr>
                    <td class="tg-iiav">IMAGEN 1</td>
                    <td class="tg-iiav">IMAGEN 2</td>
                  </tr>
                  <tr>
                    @if(!empty($valor['imagenes_regseg']))
                        <td class="tg-9wq8"><img src="{{ asset($valor['imagenes_regseg']) }}" width="300" height="300"></td>
                    @endif
                    @if(!empty($valor['imagenesone_regseg']))
                        <td class="tg-9wq8"><img src="{{ asset($valor['imagenesone_regseg']) }}" width="300" height="300"></td>
                    @endif
                  </tr>
                </tbody></table>
                <br>
                @if($valor['primero_regseg'] == "Si")
                    <b>DATOS ADICIONALES</b>
                    <table class="tg">
                      <colgroup>
                        <col style="width: 25%;">
                        <col style="width: 25%;">
                        <col style="width: 25%;">
                        <col style="width: 25%;">
                      </colgroup>
                      <tbody>
                          <tr>
                            <td class="tg-cq1w" style="border: 1px solid #000;">LATITUD Y LONGITUD</td>
                            <td class="tg-z56b" colspan="3" style="border: 1px solid #000; text-transform: lowercase;">{{ $valor['latlong_regseg'] }}</td>
                          </tr>
                          <tr>
                            <td class="tg-zu9e" colspan="4">IMAGENES DE REFERENCIAS</td>
                          </tr>
                          <tr>
                            <td class="tg-zu9e" colspan="4" style="border: 1px solid #000;">IMAGENES DE LA VIVIENDA</td>
                          </tr>
                          <tr>
                            <td class="tg-eo8x" colspan="4" style="border: 1px solid #000;"><img src="{{ asset($valor['imginmueble_regseg']) }}" width="500" height="200"></td>
                          </tr>
                          <tr>
                            <td class="tg-zu9e" colspan="4" style="border: 1px solid #000;">IMAGENES COLINDANCIA LADO IZQUIERDO</td>
                          </tr>
                          <tr>
                            <td class="tg-eo8x" colspan="4" style="border: 1px solid #000;"><img src="{{ asset($valor['imgcolizq_regseg']) }}" width="500" height="200"></td>
                          </tr>
                          <tr>
                            <td class="tg-zu9e" colspan="4" style="border: 1px solid #000;">IMAGENES COLINDANCIA LADO DERECHO</td>
                          </tr>
                          <tr>
                            <td class="tg-eo8x" colspan="4" style="border: 1px solid #000;"><img src="{{ asset($valor['imgcolder_regseg']) }}" width="500" height="200"></td>
                          </tr>
                      </tbody>
                    </table>
                    <br>
                @endif
                <b>OBSERVACIONES</b><br>{{ $valor['adicional_regseg'] }}<br>
                <?php $hayTransito = CRUDBooster::getTransito($valor['regseg_id']);?>
                @if(!empty($hayTransito))
                    <hr>
                    <b>ANTECEDENTES DE TRANSITO</b><br>
                    <div style="margin-left: 10px;">
                            @foreach ($hayTransito as $valorT)
                                <b>PROPIETARIO</b><br>{{ $valorT['propietario_transito'] }}<br>
                                <b>C.I.</b><br>{{ $valorT['ciprop_transito'] }}<br>
                                <b>DOMICILIO</b><br>{{ $valorT['direccion_transito'] }}<br>
                                <b>NRO. RUAT</b><br>{{ $valorT['ruat_transito'] }}<br>
                                <b>TIPO MOVILIDAD</b><br>{{ $valorT['modelo_transito'] }}<br>
                                <b>AÑO</b><br>{{ $valorT['anio_transito'] }}<br>
                            @endforeach
                    </div>
                    <hr>
                @endif
                <?php $hayAntecede = CRUDBooster::getAntecedentes($valor['regseg_id']); ?>
                @if(!empty($hayAntecede))
                    <hr>
                    <b>DETALLE DE ENTIDAD JUDICIAL Y/O POLICIALES</b><br>
                    <div style="margin-left: 10px;">
                            @foreach ($hayAntecede as $valorA)
                                <b>ENTIDAD JUDICIAL Y/O POLICIALES</b><br>{{ $valorA['nombre_entidad'] }}<br>
                                <b>NRO. CASO</b><br>{{ $valorA['nrocaso_complementos'] }}<br>
                                <b>DETALLE DEL CASO</b><br>{!! $valorA['detalle_complementos'] !!}<br>
                                <?php 
                                    $fipc = CRUDBooster::myConverDate($valorA['inipro_complementos']); 
                                    $ffpc = CRUDBooster::myConverDate($valorA['finpro_complementos']); 
                                ?>
                                <b>FECHA INICIO DEL PROCESO</b><br>{{ $fipc }}<br>
                                <b>FECHA FINAL DEL PROCESO</b><br>{{ $ffpc }}<br>
                                <b>SENTENCIA EJECUTORIADA</b><br>{{ $valorA['sentencia_complementos'] }}<br>
                                <b>ADICIONALES</b><br>{{ $valorA['otros_complementos'] }}<br>
                            @endforeach
                    </div>                        
                    <hr>
                @endif
                <?php $hayAdmin = CRUDBooster::getAdministrativos($valor['regseg_id']); ?>
                @if(!empty($hayAdmin))
                    <hr>
                    <b>DETALLE DE ANTECEDENTES ADMINISTRATIVOS</b><br>
                    <div style="margin-left: 10px;">                
                            @foreach ($hayAdmin as $valorAd)
                                <b>ENTIDAD ADMINISTYRATIVAS</b><br>{{ $valorAD['nombre_entidad'] }}<br>
                                <b>NRO. CASO</b><br>{{ $valorAd['nrocaso_admini'] }}<br>
                                <b>DETALLE DEL CASO</b><br>{!! $valorAd['detalle_admini'] !!}<br>
                                <?php 
                                    $fipca = CRUDBooster::myConverDate($valorAD['inipro_admini']); 
                                    $ffpca = CRUDBooster::myConverDate($valorAD['finpro_admini']); 
                                ?>
                                <b>FECHA INICIO DEL PROCESO</b><br>{{ $fipca }}<br>
                                <b>FECHA FINAL DEL PROCESO</b><br>{{ $ffpca }}<br>
                                <b>SENTENCIA EJECUTORIADA</b><br>{{ $valorAD['sentencia_admini'] }}<br>
                                <b>ADICIONALES</b><br>{{ $valorAD['otros_admini'] }}<br>
                            @endforeach
                    </div>
                @endif
                <div class="saltopagina"></div>
            @endforeach 
        </main>
    </body>
</html>










