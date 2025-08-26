<?php
// ini_set('max_execution_time', 300);
// print("<pre>");
// print_r($datoEs);
// print("</pre>");
// print($datoEs[0]['numero_operativo']."<br>");
// print($datoEs[0]['detalle_operativo']."<br>" );
// print($datoEs[0]['logo_empcli'] );

// exit();

    set_time_limit(0);
    ini_set("memory_limit",-1);
    ini_set('max_execution_time', 0);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
        <style id="Libro1_5948_Styles">
            @page {
                margin: 1cm 1cm;
                font-family: Arial;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
                text-align: center;
            }

            main {
                position: relative;
                top: 3cm;
                right: 0cm;
                bottom: 0cm;
                left: 0cm;                
                margin-bottom: 1cm;
            }

            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 0.5cm;
                text-align: center;
            }               
            table
            {
                mso-displayed-decimal-separator:"\,";
                mso-displayed-thousand-separator:"\.";
            }
            .txtBlancos
                {padding:0px;
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
            .txtDetalle
                {padding:0px;
                mso-ignore:padding;
                color:black;
                font-size:0.8em;
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
            .txtCabeza
                {padding:0px;
                mso-ignore:padding;
                color:black;
                font-size:0.8em;
                font-weight:700;
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
            .txtReferencia
                {padding:0px;
                mso-ignore:padding;
                color:black;
                font-size:0.8em;
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
            .txtDetalle
                {padding:0px;
                mso-ignore:padding;
                color:black;
                font-size:11.0pt;
                font-weight:400;
                font-style:normal;
                text-decoration:none;
                font-family:Calibri, sans-serif;
                mso-font-charset:0;
                mso-number-format:General;
                text-align:left;
                vertical-align:top;
                mso-background-source:auto;
                mso-pattern:auto;
                white-space:nowrap;}
            .txtSubRayado {
                text-decoration: underline;
            }
            .txtFooter
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
            .txtFooter01
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
        </style>
        <!-- <link rel=File-List href="Libro1_archivos/filelist.xml"> -->
    </head>

    <body>
        <header>
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
                <tr>
                    <td style="width: 10%;"><img src="{{ asset($datoEs[0]['logo_empcli']) }}" width="100"></td>
                    <td class=xl7230306></td>
                    <td style="width: 20%; text-align: right; padding-bottom: 3px;">
                        <img src="data:image/svg+xml;base64, {{ 
                            base64_encode( 
                            CRUDBooster::QrCode(CRUDBooster::myIdEmpresa(), 
                            CRUDBooster::myCompanyCustodi(), 
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
            </table>
        </header>  

        <footer>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td class=txtFooter>La información impresa en este detalle está establecida en los registros de la base de datos del sistema<br>© copyright – OSINETPlus</td>
                    {{-- <td class=txtFooter01>TR - {{ $x }} <br> </td> --}}
                </tr>
            </table>
        </footer>
          
        <main>
            <div id="Libro1_5948" align=center>
                <table border=0 cellpadding=0 cellspacing=0 width=550 style='border-collapse:collapse;table-layout:fixed;width:550pt;'>
                 {{-- <col width=80 span=8 style='width:60pt'> --}}
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=6 height=20 class=txtCabeza style='height:15.0pt'>
                    <?= ucwords(strtolower(CRUDBooster::myCityName())).", ".CRUDBooster::myDateEsp($datoEs[0]['fechaini_operativo']) ?>
                  </td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=6 height=20 class=txtCabeza style='height:15.0pt'>
                    CITE: <?= $datoEs[0]['codigo_asigcasos']."-".$datoEs[0]['numero_operativo']?>
                  </td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td height=20 class=txtBlancos style='height:15.0pt'></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=8 height=20 class=txtCabeza style='height:15.0pt'>Señores</td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=8 height=20 class=txtCabeza style='height:15.0pt'>
                    <?= CRUDBooster::myCompanyCustodi() ?>
                  </td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=8 height=20 class=txtCabeza style='height:15.0pt;'>
                    <span class="txtSubRayado">Presente</span>.-
                  </td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td height=20 class=txtBlancos style='height:15.0pt'></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=10 height=23 class=txtReferencia style='height:15.0pt;'>
                    REF. <span class="txtSubRayado">INFORME DE OPERATIVO DE INTERVENCION EN ACTIVIDAD ILICITA</span>
                  </td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td height=20 class=txtBlancos style='height:15.0pt'></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                  <td class=txtBlancos></td>
                 </tr>
                 <tr height=20 style='height:15.0pt'>
                  <td colspan=7 height=20 class=txtDetalle style='height:15.0pt'>Señores: informamos a ustede lo siguiente:</td>
                  <td class=txtBlancos></td>
                 </tr>
                </table>
                <div style="text-align: justify;">
                    {!! $datoEs[0]['detalle_operativo'] !!}
                    {!! $datoEs[0]['detalle_asigcasos'] !!}                    
                </div>
            </div>
        </main>
    </body>
</html>


