<?php
  // dd($datoEs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>.:: Formulario - FELCC ::.</title>
  <style>
    @page {
      size: 215mm 320mm;
      /* margin: 0.5cm 0 1cm 1.5cm;*/
      margin: 0.5cm 0.5cm 0.5cm 2cm;
      font-family: Arial;
    }
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
  </style>
</head>
<body>
  <table class="tg">
    <colgroup>
      <col style="width: 25%;">
      <col style="width: 25%;">
      <col style="width: 25%;">
      <col style="width: 25%;">
    </colgroup>
    <tbody>
      <tr>
        <td class="tg-eo8x">
          <img src="{{ asset('uploads/miu/logo_redcorporation-24062024.jpg') }}" alt="REDCOPORATION" width="175" height="50">
        </td>
        <td class="tg-d9ao" colspan="2">

        </td>
        <td class="tg-fwxl">FORM-UB-001<br>
          <img src="data:image/svg+xml;base64, {{ 
            base64_encode( 
            CRUDBooster::QrCode(CRUDBooster::myIdEmpresa(), 
            CRUDBooster::myEmpresaCliente(), 
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
        <td class="tg-2qvl" colspan="4"><span style="color:#CB0000">FICHA DE IDENTIFICACIÓN Y UBICACIÓN</span></td>
      </tr>
      <tr>
        <td class="tg-zu9e" colspan="2" style="border: 1px solid #000;">Nº CASO: <span style="color:#CB0000">{{ $datoEs[0]['codigo_asigcasos'] }}</span></td>
        <td class="tg-zu9e" colspan="2" style="border: 1px solid #000;">FECHA: <span style="color:#CB0000">{{ date('Y-m-d') }}</span></td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">ZONA</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['zona_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">DIRECCION (CALLE O AVENIDA)</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['lugar_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">Nº DE INMUEBLE</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['nroinmueble_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">DETALLE DE LA VIVIENDA</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['detinmueble_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">GEOREFERENCIA</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000; text-transform: lowercase;">{{ $datoEs[0]['latlong_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">COLINDANCIA LADO IZQUIERDO</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['colindaizq_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">Nº DE INMUEBLE</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['colindaizqnro_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">COLINDANCIA LADO DERECHA</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['colindader_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">Nº DE INMUEBLE</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['colindadernro_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">REFERENCIA FOTOGRAFICA</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">3</td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">LATITUD Y LONGITUD</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">{{ $datoEs[0]['geolat_regseg'].",".$datoEs[0]['geolon_regseg'] }}</td>
      </tr>
      <tr>
        <td class="tg-zu9e" colspan="4">IMAGENES DE REFERENCIAS</td>
      </tr>
      <tr>
        <td class="tg-zu9e" colspan="4" style="border: 1px solid #000;">IMAGENES DE LA VIVIENDA</td>
      </tr>
      <tr>
        <td class="tg-eo8x" colspan="4" style="border: 1px solid #000;"><img src="{{ asset($datoEs[0]['imginmueble_regseg']) }}" width="500" height="250"></td>
      </tr>
      <tr>
        <td class="tg-zu9e" colspan="4" style="border: 1px solid #000;">IMAGENES COLINDANCIA LADO IZQUIERDO</td>
      </tr>
      <tr>
        <td class="tg-eo8x" colspan="4" style="border: 1px solid #000;"><img src="{{ asset($datoEs[0]['imgcolizq_regseg']) }}" width="500" height="250"></td>
      </tr>
      <tr>
        <td class="tg-zu9e" colspan="4" style="border: 1px solid #000;">IMAGENES COLINDANCIA LADO DERECHO</td>
      </tr>
      <tr>
        <td class="tg-eo8x" colspan="4" style="border: 1px solid #000;"><img src="{{ asset($datoEs[0]['imgcolder_regseg']) }}" width="500" height="250"></td>
      </tr>
      <tr>
        <td class="tg-cq1w" style="border: 1px solid #000;">OBSERVACIONES</td>
        <td class="tg-z56b" colspan="3" style="border: 1px solid #000;">
          {{ $datoEs[0]['adicional_regseg'] }}
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>

{{-- 
https://www.google.com/maps/place/17%C2%B047'06.1%22S+63%C2%B012'14.1%22W/@-17.7850278,-63.2039167,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-17.7850278!4d-63.2039167?entry=ttu

array:1 [▼
  0 => array:84 [▼
    "id" => 1
    "id_caso" => 28
    "codigosegi_regsegs" => "CBNSCZ1020523"
    "id_empresa" => 0
    "id_empcli" => 1
    "id_usuario" => 2
    "fecha_regseg" => "2023-05-02"
    "horainicio_regseg" => "14:30:45"
    "horafinal_regseg" => "14:30:45"
    "detalle_regseg" => "<p></p><p>El 01 de mayo del 2023, se recibió una denuncia de un posible caso de compra de productos adulterados en la ciudad de Santa Cruz, motivo por el cual el 02/05/2023 me contituí a esta ciudad para tomar contacto con el Sr. Arturo Flores Villegas, con Cédula de Identidad 3852585 SC, quién supuestamente ha sido el afectado como dueño de la comercializadora de cerveza Rey Arturo, el mismo que está situado en la Av. Roca y Coronado S/N entre segundo y tercer anillo de esta ciudad.&nbsp;</p><p>En la entrevista efectuada, esta persona indica que el 06 de abril adquirió 400 cajas de cervezas entre paceña y huari de 2 personas extrañas quienes se presentaron con distribuidores de cerveza paceña en 2 vehículos tipo camión, ofreciendo cervezas económicas en ambos productos. En el caso Huari, adquirió la caja a Bs. 152 y la caja de PACEÑA a Bs. 110. Estos supuestos vendedores habrían traslado el producto desde la ciudad de La Paz. Uno de estos vendedores aparentemente responde a nombre de Giovani Morón, con número de teléfono 76705175.<br></p><p>Posterior a la compra, el Sr. Flores habría distribuido a diferentes locales donde los clientes finales, habrían realizado reclamos y la devolución de productos por que aparentemente el sabor no era como suele ser; por otro lado los rasgos externos no serían como&nbsp; propiamente son de un producto original.&nbsp;<br></p><p>Al percatarse de estos reclamos, el Sr. Flores habría tratado de comunicarse con los vendedores para que le hagan el cambio de estos pruductos, quienes hasta la fecha no han respondido más.&nbsp;<br></p><p>Para obtener mayor información sobre las placas de vehículos en imágenes captadas por las cámaras de seguridad en dicha instalación, se verificó en los equipos de grabación de seguridad, no teniendo éxito debido al tiempo transcurrido ya que únicamente las imágenes se almacenan solo 11 días . Asimismo, se trató de verificar imágenes de las cámaras de seguridad de la vecina del Sr. Flores, donde de igual forma no se encontró información oportuna por el tiempo trascurrido.&nbsp;<br></p><p>De acuerdo a la informacion proporcionada por el Sr. Arturo Flores, se comunicó a la Cbn sobre este hecho el 11 de Abril, fecha desde el cual no se obtuvo una respuesta rápida.<br></p><p>Asimismo, se le pidió al Sr. Flores, las muestras de estos productos para someter al peritaje correspondiente, solicitud ante el cual, respondió que ya habían sido desechados los productos y los envases remitidos a la CBN, de modo que ello implica que no se tiene ninguna evidencia concreta&nbsp;para realizar la denuncia sobre este hecho.<br></p><p>Posteriormente se tomó contacto con el Sr. Ronny, ejecutivo Asignado a la atención del Sr. Flores por parte de la CBN. El propósito de este contacto fue precisamente para obtener más información sobre este hecho suscitado, el mismo que manifestó no tener mayor información.&nbsp;<br></p><p>Para recabar más datos sobre estos supuestos distribuidores, se visitó a otros comercializadores de cerveza entre los cuales se encuentra el Sr. Américo, local ubicado en la Av. Mutualista, pero lamentablemente no se pudo reunir mayores evidencias.<br></p><p>Con la información escasa y limitada se procederá a la investigación correspondiente.<br><br>Atte. HCC</p><p><br></p><p><img src="https://info.redcorporation.org/uploads/2/2023-05/cb0bf2b5ea9ab0d73e74ed983a7441fb.jpeg" style="width: 25%;">&nbsp;&nbsp;<img src="https://info.redcorporation.org/uploads/2/2023-05/ef9071f65b4f0db6a396bef01e2d8669.jpeg" style="width: 25%;">&nbsp;<img src="https://info.redcorporation.org/uploads/2/2023-05/c1be126fca805ef3535a72828f1daeef.jpeg" style="width: 25%;">&nbsp;</p><p><img src="https://info.redcorporation.org/uploads/2/2023-05/623a826a3602efb980723b7bc99c7967.jpeg" style="width: 25%;">&nbsp;</p><p><br></p><p><br></p> ◀"
    "lugar_regseg" => "AV. LOS ALAMOS DEL NORTE ESQ. CALLE 8 NRO. 123"
    "id_ciudad" => 1
    "poblacion_regseg" => null
    "area_regseg" => null
    "zona_regseg" => "VILLA DOLORES"
    "detinmueble_regseg" => "CASA CON PARED DE LADRILLO PUERTA CELESTE CON VERDE"
    "imginmueble_regseg" => "uploads/1/2024-06/9328f2f3e2a252b9f2a18c7edf66de1e.jpg"
    "colindaizq_regseg" => "CASA DE LADRILLOS PUERTA ROJA NRO 258"
    "imgcolizq_regseg" => "uploads/1/2024-06/3d9956eaf3f8c625f956b6a9fdb60bf0.png"
    "colindader_regseg" => "CASA DE LADRILLO CON PUERTA DE GARAJE VERDE NRO. 741"
    "imgcolder_regseg" => "uploads/1/2024-06/9b5953afd0821e2e1a1b69665d0d8d47.JPG"
    "latlong_regseg" => "https://www.google.com/maps/@-17.7850324,-63.2039269,20z"
    "geolat_regseg" => "-17.7850324"
    "geolon_regseg" => "-63.2039269"
    "placa_regseg" => null
    "marca_regseg" => null
    "color_regseg" => null
    "modelo_regseg" => null
    "adicional_regseg" => null
    "imagenes_regseg" => null
    "prioridad_regseg" => "Media"
    "fecha_baja" => null
    "voboemp_regseg" => 0
    "vobocli_regseg" => null
    "dateclose_regseg" => null
    "status" => "Activo"
    "created_at" => "2022-07-25 17:13:27"
    "updated_at" => null
    "id_cliente" => 1
    "id_tipodenu" => 3
    "codigo_asigcasos" => "CBNDI0028"
    "nrocaso_asigcasos" => 28
    "id_departamento" => 9
    "ciudad_asigcasos" => "Santa Cruz"
    "zona_asigcasos" => "Expoferia"
    "sector_asigcasos" => "Roca y coronado"
    "area_asigcasos" => "Entre segundo y tercer anillo"
    "calle_asigcasos" => "Avenida"
    "direccion_asigcasos" => "AV. ROCA Y CORONADO S/N"
    "detalle_asigcasos" => "<p>01/05/2023</p><p>En fecha 01 de mayo, se recibió la denuncia por CBN, específicamente del Sr. Orlando Duarte, qué en la Ciudad de Santa Cruz, un distribuidor habría recibido una 400 cajas de cerveza Huari adulterado de unos extraños que, aparentemente habrían traído el producto de la ciudad de La Paz. Cuanto el distribuidor quizo vender el producto en su local, muchos clientes habrían devuelto con serios reclamos. En razón de este inconveniente el distribuidor llamado Arturo Flores, hizo el reclamo a la CBN, así como también hizo el reclamo a quienes le habrían vendido estos productos, sin mucho éxito ya qué estos ni le devolvieron el producto ni mucho menos han contestado el teléfono.&nbsp;</p><p>Este razón de este reclamo, personal de Red Corp se hizo presente en la ciudad de santa cruz para colectar la información pertinente.&nbsp;</p><p><br></p><p>05/05/2023</p><p>Luego de haber hecho el seguimiento a este caso, se requiere realizar las siguientes acciones para proseguir con la investigación:</p><p>Se tiene información que uno de los transportistas distribuidores se llama Giovani Morón el mismo tiene el número de teléfono 76705175</p><ul><li>- Pedir tráfico de llamadas de ENTEL S.A.</li><li>- Verificar con quienes tienen mayor contacto</li><li>- Lugar desde donde mayormente se comunica</li><li>- Obtener mayor información sobre las personas con las que mayormente se comunica este número</li><li>- Tomar contacto con estas personas para corroborar si evidentemente existe el Sr. Giovani Morón y que el mismo le distribuye producto relacionados a la cerveza.</li></ul><p><b>Tareas para ejecutar:</b></p><ul><li>Importante obtener sobre nombre completo del Sr. Gionani Moron o el titular de la línea telefónica 76705175</li><li>Insistir al al Sr. Arturo Flores sobre la información relacionada a personas que hayan recibido productos de este supuesto distribuidor.</li><li>Insistir el Sr. Ronny Chávez, para que nos proporcione información sobre posibles personas que estén realizando la comercialización de productos adulterados o en el peor de los casos, la adulteración del mismo.</li><li>Tomar contacto con el Sr. Américo Saavedra, para recabar información de posibles comercializadores y adulteradores de cerveza en la ciudad de Santa Cruz, considerando que este señor, conoce a muchas personas en el medio. El teléfono celular de contacto es el 77331309.</li></ul><p>&nbsp;</p> ◀"
    "fecha_asigcasos" => "2023-05-02 00:00:00"
    "id_token" => 1
    "id_region" => 1
    "nombe_empresa" => "HCC-REDCORPORATION"
    "razonsocial_empresa" => "HCC REDCORPORATION"
    "nit_empresa" => "4332517013"
    "direccion_empresa" => "CALLE 1 - EDIFICIO TORRES SUR  - OFICINA TS17"
    "zona_empresa" => "OBRAJES"
    "contacto_empresa" => "HUMBERTO COPA"
    "telefono_empresa" => "75363523"
    "imagen_empresa" => "uploads/1/2022-12/separador_1.png"
    "prisec_empresa" => "Central"
    "totlib_empresa" => 1
    "codigocliente_empcli" => "CBN-IFP-001"
    "razonsocial_empcli" => "CERVECERIA BOLIVIANA NACIONAL"
    "nit_empcli" => "1234567010"
    "direccion_empcli" => "AV. MONTES #400 - CASILL 421"
    "telefonos_empcli" => "2455455 - 2454454"
    "logo_empcli" => "uploads/1/2022-12/logo_cbn.png"
    "tiposervicio_empcli" => "INVESTIGACION DE MERCADO Y PIRATERIA"
    "telefonocontacto_empcli" => "12345678"
    "nombrecontacto_empcli" => "CARLOS VACA CAMPOS"
    "cargocontacto_empcli" => "JEFE DE OPERACIONES NACIONAL"
    "emailempresa_empcli" => "cvaca@cbn.bo"
    "emailcontacto_empcli" => "cvaca@gmail.com"
    "contrato_empcli" => "SI"
    "notariadoen_empcli" => "100"
    "tipocontrato_empcli" => "PERSONA JURIDICA"
    "nropodernotarial_empcli" => "123-1899"
    "fechainicial_empcli" => "2022-11-01 00:00:00"
    "fechafinal_empcli" => "2023-01-31 00:00:00"
    "imagenescontrato_empcli" => "uploads/1/2022-12/anexo1_sql.pdf"
    "ciudad_ciudad" => "LA PAZ"
    "pais_ciudad" => "BOLIVIA"
  ]
]
--}}













