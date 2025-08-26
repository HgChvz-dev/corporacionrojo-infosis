<?php
    set_time_limit(0);
    ini_set("memory_limit",-1);
    ini_set('max_execution_time', 0);

    $y = 1;

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
        <title>.:: Solicitud de Laboratorio ::.</title>
        <style>
            @page {
                size: 215mm 275mm;
                margin: 1cm 0cm;
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
                text-align: center;
            }

            main {
                position: relative;
                top: 3cm;
                right: 1cm;
                bottom: 0cm;
                left: 1.5cm;                
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

            .saltopagina{
                page-break-after:always;
            }

            /*PARA LOS DETALLES*/
            .tg  {border-collapse:collapse;border-spacing:0;width: 100%;}
            .tg td{border-color:black;border-style:solid;border-width:1px; font-size:11px; overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px; font-size:11px; font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-34fe{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top;}
            .tg .tg-zlqz{background-color:#c0c0c0;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top;}
            .tg .tg-baqh{text-align:center;vertical-align:top}
            .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top;}
            .tg .tg-u1yq{background-color:#c0c0c0;font-weight:bold;text-align:center;vertical-align:top;}
            .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top;}
            .tg .tg-0lax{text-align:left;vertical-align:top}

            /*PARA LAS IMAGENES*/
            .tgI {border-collapse:collapse;border-spacing:0; width: 100%;}
            .tgI td{border-color:black;border-style:solid;border-width:0px;font-size:11px;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tgI th{border-color:black;border-style:solid;border-width:0px;font-size:11px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tgI .tg-0w9m{font-weight:bold;text-align:center;vertical-align:top;}
            .tgI .tg-baqh{text-align:center;vertical-align:top;}
        </style>
    </head>
    <body>
        <header>
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <img src="{{ asset('uploads/miu/logo_redcorp_1.png') }}" style="width: 70%;">
                    </td>
                </tr>
            </table>
        </header>

        <footer>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td>
                        <img src="{{ asset('uploads/miu/solo_direccion_membrete_1.png') }}" style="width: 100%;">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </footer>

        <main style="width: 90%;">
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: right;">La Paz, {{ CRUDBooster::myDateEsp($datoEs[0]['fecha_carlab']) }}</td>
                </tr>
            </table>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: right; font-weight: bold;">CITE: {{ $datoEs[0]['cite_carlab'] }}</td>
                </tr>
            </table>
            <br><br><br>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: left; font-weight: bold;">Señores</td>
                </tr>
                
                <tr>
                    <td style="text-align: left; font-weight: bold;">CERVECERIA BOLIVIANA NACIONAL S.A.</td>
                </tr>
                
                <tr>
                    <td style="text-align: left; font-weight: bold; text-decoration: underline;">Presente.-</td>
                </tr>
            </table>
            <br>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: right; font-weight: bold; text-decoration: underline;">Ref. {{ $datoEs[0]['ref_carlab'] }}</td>
                </tr>
            </table>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td>
                       {!! $datoEs[0]['detalle_carlab'] !!}
                    </td>
                </tr>
            </table>
            <br>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: left;">
                        Atentamente.
                    </td>
                </tr>
            </table>
            <br>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: center;">
                        <img src="{{ asset('uploads/miu/pie_de_firma_hcc.svg') }}" style="width: 35%;">
                    </td>
                </tr>
            </table>
            <table border=0 cellpadding=0 cellspacing=0 width="100%"> 
                <tr>
                    <td style="text-align: left; font-size: 8px;">
                        c.c.: {{ $datoEs[0]['cc_carlab'] }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; font-size: 8px;">
                        @php
                            $adjuntos = explode("*", $datoEs[0]['adj_carlab']);
                        @endphp
                        <div style="padding: 0; padding: 0; display: flex; width: 300px;"></div>
                            <div>
                                Adj.:
                            </div>
                            <div style="padding-left: 20px;">
                                @foreach($adjuntos as $juntosAd)
                                    {{ $juntosAd }} <br>
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; font-size: 8px;">
                        HCC/jvm
                    </td>
                </tr>
            </table> 

            <div class="saltopagina"></div>            

            <table class="tgI">
                <thead>
                    <tr>
                        <th class="tg-0w9m" style="text-align: left;" colspan="3">ADJUNTOS:</th>
                    </tr>
                </thead>
            </table>  
            <table class="tg">
                <thead>
                  <tr>
                    <th class="tg-0w9m" colspan="8">DETALLE</th>
                  </tr>
                  <tr>
                    <th class="tg-zlqz">Nº</th>
                    <th class="tg-zlqz">DESCRIPCION</th>
                    <th class="tg-zlqz">MARCA</th>
                    <th class="tg-zlqz">CANTIDAD</th>
                    <th class="tg-u1yq">EMVASE DE</th>
                    <th class="tg-u1yq">LOTE</th>
                    <th class="tg-u1yq">VTO</th>
                    <th class="tg-zlqz">CARACTERISTICAS</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datoEs as $esElDato)
                        <tr>
                            <td class="tg-34fe" style="width: 5.5%;">{{ $y }}</td>
                            {{-- <td class="tg-0pky">{{ CRUDBooster::idADetalle($esElDato['desc_carlab']) }}</td> --}}
                            @php $deta = CRUDBooster::idADetalle($esElDato['desc_carlab']); @endphp
                            <td class="tg-0pky" style="width: 13.5%;">{{ $deta[0]['detalleproducto_producto'] }}</td>
                            <td class="tg-0pky" style="width: 13.5%;">{{ $esElDato['marca_carlab'] }}</td>
                            <td class="tg-c3ow" style="width: 11%;">{{ $esElDato['cant_carlab'] }}</td>
                            <td class="tg-baqh" style="width: 13.5%;">{{ $esElDato['envase_carlab'] }}</td>
                            <td class="tg-0lax" style="width: 13.5%;">{{ $esElDato['lote_carlab'] }}</td>
                            <td class="tg-baqh" style="width: 12%;">{{ $esElDato['vence_carlab'] }}</td>
                            <td class="tg-0pky" style="width: 17.5%;">{{ $esElDato['carc_carlab'] }}</td>
                            <?php $y = $y + 1; ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tgI">
                <thead>
                    <tr>
                        <th class="tg-0w9m" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @for($i=1;$i=4;$i++) --}}
                        <tr>
                            @if($datoEs[0]['img1_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img1_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img2_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img2_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img3_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img3_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                        </tr>
                        <tr>
                            @if($datoEs[0]['img4_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img4_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img5_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img5_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img6_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img6_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                        </tr>
                        <tr>
                            @if($datoEs[0]['img7_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img7_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img8_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img8_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img9_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img9_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                        </tr>
                        <tr>
                            @if($datoEs[0]['img10_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img10_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img11_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img11_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                            @if($datoEs[0]['img12_carlab'] != "")
                                <td class="tg-baqh"><img src="{{ asset($datoEs[0]['img12_carlab']) }}" alt="Image" width="200" height="350"></td>
                            @else
                                ""
                            @endif
                        </tr>
                    {{-- @endfor --}}
                </tbody>
            </table>  
            {{-- <div class="saltopagina"></div> --}}
        </main>
    </body>
</html>





