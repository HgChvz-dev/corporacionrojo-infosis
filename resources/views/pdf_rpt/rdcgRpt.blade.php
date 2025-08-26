<?php
// print("<pre>");
// print_r($datoEs);
// print("</pre>");
// exit();

    set_time_limit(0);
    ini_set("memory_limit",-1);
    ini_set('max_execution_time', 0);

    $canids = count($datoEs);
    $ids = "";
    for ($i=0; $i < count($datoEs) ; $i++) { 
        $ids = $datoEs[$i]['id']."|".$ids;
    }

    $dateIni = CRUDBooster::myConverDate($datoEs[0]['fecha_asigcasos']);
    $dateFin = CRUDBooster::myConverDate(date('Y-m-d'));

    $x = 0;
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
        <title>Reporte de Casos Registrados por Cliente</title>
        <style>
            @page {
                size: 310mm 215mm; /* landscape; */
                margin: 0.5cm 0 1cm 1.5cm;
                font-family: Arial;
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
            .styleDetallRegCas
            {
                width: 40%;
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
            .styleObserRegCas
            {
                width: 40%;
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
            .styleCodigoRegCas
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
                {width: 10%;
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
                {width: 70%;
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
            .saltopagina{page-break-after:always;}
            .tg {width: 100%;border-collapse:collapse;border-spacing:0;}
            .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px; overflow:hidden;padding:5px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px; font-weight:normal;overflow:hidden;padding:5px 5px;word-break:normal;}
            .tg .tg-06y4{background-color:#efefef;font-family:Arial, Helvetica, sans-serif !important;font-size:10px;font-weight:bold; text-align:center;vertical-align:middle}
            .tg .tg-oj7j{font-family:Arial, Helvetica, sans-serif !important;font-size:10px;text-align:center;vertical-align:top}

        </style>
    </head>
    <body>
        <header>
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
                <tr>
                    <td style="width: 10%;"><img src="{{ asset($datoEs[0]['logo_empcli']) }}" width="100"></td>
                    <td class=xl7230306>CASOS EN GENERAL POR CLIENTE</td>
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
                    <td class=xl6630306>De: 
                        <font class="font530306"> {{ $dateIni }}</font>
                    </td>
                </tr>
                <tr height=20 style='height:15.0pt'>
                    <td colspan=2 class=xl7330306>
                        <font class="font630306">EMPRESA DE SERVICIO</font>
                        <font class="font530306">: {{ strtoupper( CRUDBooster::myCompanyName() )  }}</font>
                    </td>
                    <td class=xl6630306>Fecha: 
                        <font class="font530306"> {{  $dateFin  }}</font>
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
                    <td class=xl7130306>La información impresa en este detalle está establecida en los registros de la base de datos del sistema<br>© copyright – Redcorporation</td>
                    <td class=xl6930306>TR - {{ $x }} <br> </td>
                </tr>
            </table>
        </footer>

        <main>
            <table class="tg">
                <thead>
                  <tr>
                    <th class="tg-06y4">Nº</th>
                    <th class="tg-06y4">CODIGO DE CASO</th>
                    <th class="tg-06y4">TIPO DENUNCIA</th>
                    <th class="tg-06y4">FECHA DENUNCIA</th>
                    <th class="tg-06y4">DIRECCION</th>
                    <th class="tg-06y4">NOMBRE</th>
                    <th class="tg-06y4">CIUDAD</th>
                    <th class="tg-06y4">ZONA</th>
                    <th class="tg-06y4">OPERATIVO</th>
                  </tr>
                </thead>
                @foreach ($datoEs as $valor)
                    <tbody>
                      <tr>
                        <td class="tg-oj7j">{{ strtoupper($valor['id']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['codigo_asigcasos']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['detalle_tipodenun']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['fecha_asigcasos']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['direccion_asigcasos']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['nomdenunciado_asigcasos']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['ciudad_ciudad']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['zona_asigcasos']) }}</td>
                        <td class="tg-oj7j">{{ strtoupper($valor['id_operativo']) }}</td>
                      </tr>
                    </tbody>
                @endforeach
            </table>
        </main>
    </body>
</html>

