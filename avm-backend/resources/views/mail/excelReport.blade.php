<table>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
        <th colspan="8" rowspan="1" style="font-weight: bold; color: black; font-size: 14;" align="center">
            Informe de Estimación de Valor
        </th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th style="font-weight: bold; color: back;" align="right">UF:</th>
        <th align="center" >{{ $details['value_uf_saved'] }}</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; font-weight: bold; color: back;" align="center">
            Informe de la Propiedad Evaluada
        </th>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Cliente:</th>
        <th></th>
        <th></th>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Informe:</th>
        <th></th>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Fecha:</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="text-justify: left;">{{ $details['nombre_cliente'] }}</td>
        <td></td>
        <td></td>
        <td scope="row" style="text-justify: left;">N°{{ $details['informe'] }}</td>
        <td></td>
        <td style="text-justify: left;">{{ $details['fecha'] }}</td>
    </tr>
    <tr>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Región/Comuna:</th>
        <th></th>
        <th></th>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Rol:</th>
        <th></th>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Tipo de Vivienda:</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td scope="row" style="text-justify: left;">{{ $details['region'] }}</td>
        <td></td>
        <td></td>
        <td style="text-justify: left;">{{ $details['rol'] }}</td>
        <td></td>
        <td style="text-justify: left;">{{ $details['tipo_bien'] }}</td>
    </tr>

    <tr>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Sup. Construccion:</th>
        <th></th>
        <th></th>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Sup. Terreno:</th>
        <th></th>
        <th scope="col" style="font-weight: bold; text-justify: left;" align="start">Dirección:</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="text-justify: left;">{{ $details['sup_const'] }} m&#178;</td>
        <td></td>
        <td></td>
        <td style="text-justify: left;">{{ $details['sup_terreno'] }} m&#178;</td>
        <td></td>
    @if (strlen($details['direccion']) < 25)
        <td style="text-justify: left;">{{ $details['direccion'] }}</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    @else
        @if(isset(explode(" ", $details['direccion'])[2]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[0].' '.explode(" ", $details['direccion'])[1].' '.explode(" ", $details['direccion'])[2]  }}</td>
        @elseif(isset(explode(" ", $details['direccion'])[1]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[0].' '.explode(" ", $details['direccion'])[1]}}</td>
        @elseif(isset(explode(" ", $details['direccion'])[0]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[0]}}</td>
        @endif
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        @if(isset(explode(" ", $details['direccion'])[7]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[3].' '.explode(" ", $details['direccion'])[4].' '.explode(" ", $details['direccion'])[5].' '.explode(" ", $details['direccion'])[6].' '.explode(" ", $details['direccion'])[7]}}</td>
        @elseif(isset(explode(" ", $details['direccion'])[6]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[3].' '.explode(" ", $details['direccion'])[4].' '.explode(" ", $details['direccion'])[5].' '.explode(" ", $details['direccion'])[6]}}</td>
        @elseif(isset(explode(" ", $details['direccion'])[5]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[3].' '.explode(" ", $details['direccion'])[4].' '.explode(" ", $details['direccion'])[5]}}</td>
        @elseif(isset(explode(" ", $details['direccion'])[4]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[3].' '.explode(" ", $details['direccion'])[4]}}</td>
        @elseif(isset(explode(" ", $details['direccion'])[3]))
        <td style="text-justify: left;">{{ explode(" ", $details['direccion'])[3]}}</td>
        @endif
    </tr>
    @endif


    <!-- Mapa section -->

    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold"
            align="center">
            Mapa ubicación propiedad
        </th>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td><img colspan="8" width="480px" style="margin-left='-20px'" align="center" src="{{ public_path('mapa.png') }}"></td>
    </tr>
    <tr>

    </tr>



    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold"
            align="center">
            Valor Calculado
        </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="3" align="center">Valor en Pesos:</th>
        <th colspan="3" align="center">Valor en UF:</th>
        <th colspan="2" align="center">Calidad (1 a 7):</th>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" align="center" style="font-weight: bold; font-size: 13px;">${{ $details['valor_pesos'] }}</td>
        <td colspan="3" align="center" style="font-weight: bold; font-size: 13px;">UF {{ $details['valor_uf'] }}</td>
        <td colspan="2" align="center" style="font-weight: bold; font-size: 13px;">{{ $details['quality'] }}</td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" style="font-weight: bold">ADVERTENCIA: </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">Tenga en cuenta que la precision de esta valoracion automatica esta directamente</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">relacionada con la calidad de las referencias disponibles. en una escala de 1 al 7,</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">donde 1 representa pocas referencias y 7 representa muchas, una puntuacion mas alta</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">indica una valoracion mas precisa.</th>
    </tr>

    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
        <th colspan="8" rowspan="1" style=" font-weight: bold; color: black; font-size: 14;" align="center">
            Informe de Estimación de Valor
        </th>
    </tr>
    <tr>
        <td></td>
    </tr>
    <!-- Datos del SII -->

    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold;"
            align="center">
            Datos del SII
        </th>
    </tr>

    <tr>
        <td></td>
        <th scope="col" align="center" style="font-weight: bold;">Dirección:</th>
        <th></th>
        <th scope="col" align="center" style="font-weight: bold;">Rol:</th>
        <th scope="col" align="center" style="font-weight: bold;">Destino:</th>
        <th scope="col" style="font-weight: bold;">Avalúo Fiscal:</th>
        <th></th>
        <th scope="col" style="font-weight: bold;">Sup. Total Terreno:</th>
    </tr>
    <tr>
        <td></td>
        <td scope="row">{{ $details['direccion'] }}</td>
        <td></td>
        <td align="center">{{ $details['rol'] }}</td>
        <td align="center">{{ $details['destino'] }}</td>
        <td align="center">${{ $details['avaluo'] }}</td>
        <td></td>
        <td align="center">{{ $details['sup_sii'] }} m&#178;</td>
    </tr>




    <tr>
        <td></td>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold;">Linea
        </th>
        <th colspan="3" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold;">
            Materialidad</th>
        <th colspan="2" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold;">Calidad
        </th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold;">Año</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold;">Sup.
            L.C.</th>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" align="center">{{ $details['linea'] }}</td>
        <td colspan="3">{{ $details['materialidad'] }}</td>
        <td colspan="2" align="center">{{ $details['calidad'] }}</td>
        <td colspan="1" align="center">{{ $details['ano'] }}</td>
        <td colspan="1" align="center">{{ $details['sup_lc'] }}</td>
    </tr>
    <tr>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold"
            align="center">
            Fotos del Sector
        </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="4">Norte</th>
        <th colspan="4">Sur</th>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="word-wrap:break-word"><img width="290px" align="center"
                src="{{ public_path('streetView0.png') }}"></td>
        <td colspan="4" style="word-wrap:break-word"><img width="290px" align="center"
                src="{{ public_path('streetView2.png') }}"></td>
    </tr>
    <tr>
        <td></td>
        <th colspan="4">Este</th>
        <th colspan="4">Oeste</th>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="word-wrap:break-word"><img colspan="4" width="290px" align="center"
                src="{{ public_path('streetView1.png') }}"></td>
        <td colspan="4" style="word-wrap:break-word"><img colspan="4" width="290px" align="center"
                src="{{ public_path('streetView3.png') }}"></td>
    </tr>

    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
        <th colspan="8" rowspan="1" style=" font-weight: bold; color: black; font-size: 14;" align="center">
            Informe de Estimación de Valor
        </th>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; font-weight: bold; color: back; " align="center">
            Mapa Referencias de Valuaciones
        </th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="1" style="word-wrap:break-word"><img colspan="6" width="400px" align="center" src="{{ public_path('mapa_valo.png') }}"></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold" align="center">
            Referencias de Valuaciones
        </th>
    </tr>



    <tr>
        <td></td>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Exp.
        </th>
        <th colspan="3" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">
            Dirección</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Sup.
            Útil</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Sup.
            Total</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Valor
            UF</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">
            Dist.(Km)</th>
    </tr>

    <?php $count = 0; ?>
    @foreach ($details['valo'] as $row)
        <?php if($count > 10){break;} ?>
        <tr>
            <td></td>
            <td colspan="1" align="center">{{ $row['NUMERO_EXPEDIENTE'] }}</td>
            <td colspan="3">{{ $row['CALLE_BIEN'] . ' ' . $row['NUMERO_BIEN'] }}</td>
            <td colspan="1" align="center">{{ $row['SUP_EDIFICADA'] }}</td>
            <td colspan="1" align="center">{{ $row['SUP_EDIFICADA'] }}</td>
            <td colspan="1" align="center">{{ $row['VALOR_COMERCIAL_ENCARGO_SUPERVISADO_UF'] }}</td>
            <td colspan="1" align="center">{{ $row['distancia'] }}</td>
        </tr>
        <?php $count++; ?>
    @endforeach
    <!-- Add cell 10 if data is 1 -->
    @if(count($details['valo']) === 1)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr>
    @elseif (count($details['valo']) === 0)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 2)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 3)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 4)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr>
    @elseif (count($details['valo']) === 5)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 6)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 7)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr>
    @elseif (count($details['valo']) === 8)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 9)
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['valo']) === 10)
        <tr><td></td></tr>
    @elseif (count($details['valo']) > 11)
        <!-- sin espacio -->
    @endif
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>

    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
        <th colspan="8" rowspan="1" style=" font-weight: bold; color: black; font-size: 14;" align="center">
            Informe de Estimación de Valor
        </th>
    </tr>

    <tr >
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold"
            align="center">
            Mapa Referencias de Mercado
        </th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="word-wrap:break-word"><img colspan="7" width="480px" align="center"
                src="{{ public_path('mapa_wit.png') }}"></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold"
            align="center">
            Referencias de Mercado
        </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Exp.
        </th>
        <th colspan="3" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">
            Dirección</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Sup.
            Útil</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Sup.
            Total</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">Valor
            UF</th>
        <th colspan="1" align="center" style="background-color: #ffbf8f; color: black; font-weight: bold">
            Dist.(Km)</th>
    </tr>

    <?php $count2 = 0; ?>
    @foreach ($details['wit'] as $row)
        <?php if($count2 > 10){break;} ?>
        <tr>
            <td></td>
            <td colspan="1" align="center">{{ $row['id'] }}</td>
            <td colspan="3">{{ $row['address'] }}</td>
            <td colspan="1" align="center">{{ $row['construction_area'] }}</td>
            <td colspan="1" align="center">{{ $row['terrain_area'] }}</td>
            <td colspan="1" align="center">{{ $row['value_uf'] }}</td>
            <td colspan="1" align="center">{{ $row['distancia'] }}</td>
        </tr>
        <?php $count2++; ?>
    @endforeach

    <!-- Add cell 10 if data is 1 -->
    @if(count($details['wit']) === 1)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr>
    @elseif (count($details['wit']) === 0)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['wit']) === 2)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['wit']) === 3)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['wit']) === 4)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr>
    @elseif (count($details['wit']) === 5)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['wit']) === 6)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['wit']) === 7)
        <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
        <tr><td></td></tr>
    @elseif (count($details['wit']) === 8)
        <tr><td></td></tr><tr><td></td></tr><tr><td>8</td></tr>
    @elseif (count($details['wit']) === 9)
        <tr><td></td></tr><tr><td></td></tr>
    @elseif (count($details['wit']) === 10)
        <tr><td></td></tr>
    @elseif (count($details['wit']) > 11)
        <!-- sin espacio -->
    @endif
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
        <th colspan="8" rowspan="1" style=" font-weight: bold; color: black; font-size: 14;" align="center">
            Informe de Estimación de Valor
        </th>
    </tr>

    <tr>
        <td>
            <!-- Espacio para separar titulo de informacion -->
        </td>
    </tr>
    <tr>
        <td></td>
        <th colspan="8" rowspan="1" style="background-color: #ffbf8f; color: black; font-weight: bold"
            align="center">
            Valor estimado calculado
        </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="4" align="center">Rango mínimo pesos:</th>
        <th colspan="4" align="center">Rango máximo pesos:</th>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" align="center" style="font-weight: bold; font-size: 13px">${{ $details['min_pesos'] }}</td>
        <td colspan="4" align="center" style="font-weight: bold; font-size: 13px">${{ $details['max_pesos'] }}</td>
    </tr>

    <tr>
        <td></td>
        <th colspan="4" align="center">Rango mínimo UF:</th>
        <th colspan="4" align="center">Rango máximo UF:</th>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" align="center" style="font-weight: bold; font-size: 13px">UF {{ $details['min_uf'] }}</td>
        <td colspan="4" align="center" style="font-weight: bold; font-size: 13px">UF {{ $details['max_uf'] }}</td>
    </tr>


    <tr>
        <td></td>
        <th colspan="8" style="font-weight: bold">ADVERTENCIA: </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">El valor se ha calculado por procedimientos estadísticos, basados en precios testigo
        </th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">de propiedades existente en nuestra base de datos, correspondientes al mercado</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">donde se encuentra el inmueble, de acuerdo con las características aportadas en la</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">solicitud que figuran en este documento y que no han sido contrastadas por</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="8">VALUACIONES.</th>
    </tr>
    <tr>
        <td></td>
        <th style="font-weight: bold">La presente Estimación de Valor no reemplaza una Tasación. </th>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <th>La presente Estimación considera que: </th>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">• La propiedad se encuentra en buen estado de conservación en cuanto estructura,</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">terminaciones e instalaciones. </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">• La propiedad no considera ampliaciones y/o demoliciones en relación con lo</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">indicado por el solicitante.</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">• La propiedad no ha modificado su estructura, terminaciones y/o instalaciones con</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">relación a lo indicado por el solicitante.</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">• La propiedad no ha sufrido fusiones o subdivisiones que modifiquen su forma y/o</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">superficie del terreno.</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8">• La propiedad no se encuentra afecta a cesión por utilidad pública y/o expropiación.</td>
    </tr>
</table>
