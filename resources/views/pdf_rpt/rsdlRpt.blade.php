<?php
    set_time_limit(0);
    ini_set("memory_limit",-1);
    ini_set('max_execution_time', 0);

    $canids = count($datoEs);
    $ids = "";
    for ($i=0; $i < count($datoEs) ; $i++) { 
        $ids = $datoEs[$i]['id']."|".$ids;
    }

    $dateIni = CRUDBooster::myConverDate($iniDate);
    $dateFin = CRUDBooster::myConverDate($finDate);

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
        <title>Reporte de Seguimiento Area Legal</title>
        <style>
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
                margin-bottom: 1.5cm;
            }

            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 1.5cm;
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
        </style>
    </head>
    <body>
        <header>
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
                <tr>
                    <td style="width: 10%;"></td>
                    <td class=xl7230306>REGISTRO DE SEGUIMIENTO LEGAL DE CASOS</td>
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
                    <td class=xl6630306>Del: 
                        <font class="font530306"> {{ $dateIni }}</font>
                    </td>
                </tr>
                <tr height=20 style='height:15.0pt'>
                    <td colspan=2 class=xl7330306>
                        <font class="font630306">EMPRESA DE SERVICIO</font>
                        <font class="font530306">: {{ strtoupper( CRUDBooster::myCompanyName() )  }}</font>
                    </td>
                    <td class=xl6630306>Al: 
                        <font class="font530306"> {{  $dateFin  }}</font>
                    </td>
                </tr>
            </table>
        </header>

        <footer>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td class=xl7030306>
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
                    </td>
                    <td class=xl7130306>La información impresa en este detalle está establecida en los registros de la base de datos del sistema<br>© copyright – OSINETPlus</td>
                    <td class=xl6930306>TR - {{ $x }} <br> </td>
                </tr>
            </table>
        </footer>

        <main>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td class=xl6830306a>CODIGO</td>
                    <td class=xl6830306b>DETALLE</td>
                    {{-- <td class=xl6830306c>OBSERVACION</td> --}}
                </tr>

{{--     [0] => Array
        (
            [id] => 6
            [id_caso] => 6
            [fechaini_abogado] => 2023-02-22
            [fisasig_abogado] => DR. CARLOS BELLOTA MONTES DE OCA
            [detalle_abogado] => 
            SE PROCEDIO A REALIZAR EL SEGUIMIENTO DEL CASO ______ EN LA FISCALIA DE AYO-AYO
            SE ESTABLECIO QUE EL SIGUIENTE DOCUMENTO SE ESCRIBIO 
            [obs_abogado] => JUSGADO DE LA POBLACION DE AYO-AYO
            [status] => Activo
            [fecha_baja] => 
            [created_at] => 2023-02-09 10:49:22
            [updated_at] => 2023-02-09 10:58:25
            [id_cliente] => 1
            [id_tipodenu] => 2
            [codigo_asigcasos] => CBNDPT0006
            [nrocaso_asigcasos] => 6
            [id_departamento] => 4
            [ciudad_asigcasos] => SACABA
            [zona_asigcasos] => NORTE
            [sector_asigcasos] => PLAZA DEL MAESTRO
            [area_asigcasos] => SERCA AL COLEGIO 31 DE FEBRERO
            [calle_asigcasos] => CALLE
            [direccion_asigcasos] => CALLE 21 DE FEBRERO NRO. 1234 ZONA NORTE
            [detalle_asigcasos] => 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, soluta aspernatur vitae cum quidem ut modi sequi repudiandae magnam, sit tempore? Neque tempore soluta suscipit impedit similique eum veritatis aliquid.
            Expedita non optio esse accusamus cum vitae explicabo beatae, asperiores quo assumenda dolorum, ad neque aliquid voluptatum laudantium soluta impedit enim mollitia! Nostrum, itaque iste. Modi voluptates voluptatem totam enim?
            IMAGEN DE DATOS SEGIDOS
            Possimus accusamus officiis quae ipsum atque. Possimus magnam ratione, dolore vero velit laudantium, nesciunt dolores consectetur, odit atque inventore? Expedita repudiandae fugiat quae? Sapiente, repellat, sit soluta aspernatur harum voluptate.
            Possimus accusamus officiis quae ipsum atque. Possimus magnam ratione, dolore vero velit laudantium, nesciunt dolores consectetur, odit atque inventore? Expedita repudiandae fugiat quae? Sapiente, repellat, sit soluta aspernatur harum voluptate.
            Similique hic sint mollitia, non distinctio suscipit vel alias animi harum in velit consectetur consequuntur dignissimos. Est quos quisquam suscipit obcaecati? Fugiat sint impedit dolorem itaque nisi excepturi libero nihil?
            Tempore porro quae voluptatibus architecto nemo voluptas perspiciatis ipsa officia consequatur eligendi inventore modi excepturi enim deleniti earum blanditiis nihil ea ullam corporis, rem nobis voluptates veritatis repudiandae eum. Explicabo.
            Aperiam quibusdam est exercitationem, esse facere temporibus fugit obcaecati, asperiores odit error? Molestias praesentium, temporibus delectus ratione architecto nobis amet consectetur similique error illum dignissimos at rem reprehenderit cum obcaecati.
            Dolore, exercitationem accusamus. Minus nemo perspiciatis deserunt beatae ipsa? Ad maxime velit enim mollitia, saepe sunt fuga ullam quo fugit eius. Officiis, accusantium eaque perferendis quia. Reprehenderit dolore possimus, cupiditate.
            Sapiente doloremque consequuntur cupiditate consequatur qui vel exercitationem vero repudiandae ullam quaerat minima in laboriosam unde, eos ipsam? Omnis repudiandae odit praesentium nemo, molestias, sed quisquam vel distinctio labore accusantium.
            Vitae quaerat, odio velit ad magnam labore voluptate asperiores architecto quis, modi. In, illo, labore. Porro possimus repellendus enim minima distinctio quod voluptatibus quis nemo maxime! Delectus assumenda dolores voluptatem!
            Reiciendis quisquam commodi veritatis, ducimus iusto quod libero ipsam mollitia unde. Ipsa repellat laudantium odit possimus pariatur illo dolores eos ipsum repellendus hic exercitationem quae tempora excepturi odio, quas nostrum.
            esta es la primera imagen de los registros
            esta es la segunda referencia en imagen
            [fecha_asigcasos] => 2023-02-09 00:00:00
        )
 --}}

                @foreach ($datoEs as $valor)
                    <tr>
                        <td class=styleCodigoRegCas >
                            <b>CODIGO</b><br>{{ $valor['codigo_asigcasos'] }}<br>
                            <b>Nro. CASO</b><br>{{ $valor['nrocaso_asigcasos'] }}<br>
                            <b>FISCALIA DE</b><br>{{ $valor['obs_abogado'] }}<br>
                            <b>FECHA REGISTRO</b><br>{{ date( "d/m/Y", strtotime($valor['fechaini_abogado']) ) }}
                        </td>
                        <td class=styleDetallRegCas >
                            <b>FISCAAL ASIGNADO</b><br>{{ strtoupper($valor['fisasig_abogado']) }}<br><b>DETALLE DEL SEGUIMIENTO</b><br>{!! strtoupper($valor['detalle_abogado']) !!}
                        </td>
                        {{-- <td class=styleObserRegCas >
                            <b>DIRECCION</b><br>{{ strtoupper($valor['direccion_asigcasos']) }}
                        </td> --}}
                    </tr>
                    <?php $x = $x + 1; ?>
                @endforeach                  
            </table>
        </main>
    </body>
</html>


{{--  width=682 style='border-collapse:collapse;table-layout:fixed;width:512pt'> --}}
{{--  width=682 style='border-collapse:collapse;table-layout:fixed;width:512pt'> --}}
