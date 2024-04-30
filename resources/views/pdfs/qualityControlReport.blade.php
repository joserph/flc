<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 1cm 1cm 1cm;
        }
        h1 {
            position: relative;
            /* width: 90%; */
            top: -30px;
            color: blue;
            text-align: center;
        }
        .text-center{
            text-align: center;
        }
        .img{
            position: relative;
            width: 16%;
            display: inline-block;
            height: 80px;
            max-width: 125px;
            margin: 10px;
            text-align: center;
            margin: 0 auto;
            top: -10px;
        }
        .table-cabecera{
            position: relative;
            top: -30px;
            display: inline-block;
            width: 70%;
        }
        .calificacion{
            position: relative;
            top: -30px;
            width: 10%;
            display: inline-block;
        }
        .text-large{
            font-size: 14px;
        }
        .text-large-xl{
            font-size: 20px;
        }
        .text-medium{
            font-size: 12px;
        }
        .text-small{
            font-size: 9px;
        }
        .text-small-sx{
            font-size: 6px;
        }
        .t-cabecera{
            width: 100%;
        }
        .text-right{
            text-align: right;
        }
        .table-progress {
            width: 100%;
            margin: auto;
            border-collapse: collapse;
        }
        .progress{
            position: absolute;
            width: 90%;
            top: 130px;
        }
        .progress-part-1{
            background-color: green;
            width: 20%;
            border: 1px solid black;
        }
        .progress-part-2{
            background-color: orange;
            width: 30%;
            border: 1px solid black;
        }
        .progress-part-3{
            background-color: red;
            width: 50%;
            border: 1px solid black;
        }
        .diseases-apariencia{
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 30%;
        }
        .diseases-flor{
            position: absolute;
            top: 150px;
            left: 278px;
            display: inline-block;
            width: 30%;
        }
        .diseases-sanidad{
            position: absolute;
            top: 150px;
            left: 518px;
            display: inline-block;
            width: 30%;
        }
        .diseases-tallos{
            position: absolute;
            top: 330px;
            display: inline-block;
            width: 30%;
        }
        .diseases-follaje{
            position: absolute;
            top: 330px;
            left: 278px;
            display: inline-block;
            width: 30%;
        }
        .diseases-empaque{
            position: absolute;
            top: 330px;
            left: 518px;
            display: inline-block;
            width: 30%;
        }
        .table-enfermedades{
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            
            /* border: 1px solid black; */
        }
        .th-enfermedad{
            border: 1px solid black;
        }
        span{
            content: "\2713";
        }
        .check-icon{
            width: 8px;
            margin: auto;
            margin-left: 7px;
        }
        .x-icon{
            width: 7px;
            margin: auto;
            margin-left: 7px;
        }
        .capitalize{
            text-transform: capitalize;
        }
        .lowercase{
            text-transform: lowercase;
        }
        .uppercase{
            text-transform: uppercase;
        }
        .treinta{
            width: 30%;
        }
        .cincuenta{
            width: 50%;
        }
        .diez{
            width: 10%;
        }
        .azul{
            color: white;
            background-color: rgb(60, 60, 240);
        }
        .verde{
            background-color: rgb(2, 210, 2);
        }
        .rojo{
            background-color: rgb(192, 1, 1);
            /* content: url('../../../public/storage/icons/x-solid.svg'); */
        }
        .observacion{
            background-color: red;
            position: absolute;
            top: 470px;
            width: 45%;
            padding-left: 10px;
            padding-top: 5px;
        }
        .text-observacion{
            height: 20px;
            font-size: 12px;
            padding: 0;
            margin: 0;
            color: white;
        }
        .imagenes{
            position: absolute;
            top: 520px;
            width: 90%;
            border: 1px solid black;
            padding-top: 25px;
            padding-left: 5px;
            padding-bottom: 5px;
        }
        .foto{
            width: 19.4%;
            height: 100px;
            top: 10px;
        }
        .img_size{
            width: 120px;
        }
    </style>
</head>
<body>
    <h1 class="text-center text-large-xl">Control de Calidad</h1>
    <section>
        <article class="img">
            <img class="img_size" src="{{ public_path('storage/'. $returnReport->logistic->image_url) }}" alt="">
        </article>
        <article class="table-cabecera">
            <table class="t-cabecera">
                <tr>
                    <td class="text-small text-right"><strong>FINCA:</strong></td>
                    <td class="text-small">{{ $returnReportItem->farm->name }}</td>
                    <td class="text-small text-right"><strong>DIA DE  INSPECCION:</strong></td>
                    <td class="text-small">{{ $returnReport->date }}</td>
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>CLIENTE:</strong></td>
                    <td class="text-small">{{ $returnReportItem->dialing->name }}</td>
                    <td class="text-small text-right"><strong>AGENCIA DE CARGA:</strong></td>
                    <td class="text-small">{{ $returnReport->logistic->name }}</td>
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>PRODUCTO:</strong></td>
                    <td class="text-small">{{ $returnReportItem->product->name }}</td>
                    <td class="text-small text-right">
                        @if ($returnReport->guide_type == 'maritimo')
                            <strong>BL:</strong>
                        @else
                            <strong>AWB:</strong>
                        @endif
                    </td>
                    <td class="text-small">
                        @if ($returnReport->guide_type == 'maritimo')
                            {{ str_replace('BL', '', $returnReport->guide_number) }}
                        @else
                            {{ str_replace('AWB', '', $returnReport->guide_number) }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>EMPAQUE:</strong></td>
                    <td class="text-small">{{ $returnReportItem->variety->name }} {{ $returnReportItem->packing }}</td>
                    <td class="text-small text-right"><strong>HAWB:</strong></td>
                    <td class="text-small">{{ $returnReportItem->hawb }}</td>
                </tr>
            </table>
        </article>
        <article class="calificacion">
            <h3 class="text-small">Calificacion</h3>
            <p><span>{{ $returnReportItem->qualification }}%</span></p>
        </article>
    </section>
    <section class="progress">
        <table class="table-progress">
            <th class="th-progress">
                <td class="progress-part-1 text-center text-small">100 - 96 EXCELENTE</td>
                <td class="progress-part-2 text-center text-small">95 - 91 BUENO</td>
                <td class="progress-part-3 text-center text-small">90 - 86 REGULAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 85 - 80 MALO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FINCA EN ALERTA</td>
            </th>
        </table>
        {{-- <div class="progress-part-1">Free Space</div>
        <div class="progress-part-2">Warning</div>
        <div class="progress-part-3">Danger</div> --}}
    </section>
    <section class="diseases-apariencia">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad cincuenta">APARIENCIA</th>
                <th class="text-small th-enfermedad diez"></th>
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad treinta">VARIEDAD</th>
            </tr>
            @foreach ($diseasesApariencia as $item)
                <tr>
                    <td class="text-small-sx">{{ $item->name }}</td>
                    <td class="text-small-sx th-enfermedad
                            @if ($item->return_report_items_diseases == '[]')
                            verde
                            @else
                                @foreach ($item->return_report_items_diseases as $disease)
                                    @if ($disease->return_report_item_id == $returnReportItem->id)
                                        rojo
                                    @else
                                        verde
                                    @endif
                                @endforeach
                            @endif
                        ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    <img class="x-icon" src="{{ public_path('storage/icons/x-solid.svg') }}" alt="">
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx th-enfermedad text-center">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-small-sx th-enfermedad uppercase">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->returnReportItem->variety->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-flor">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad cincuenta">FLOR</th>
                <th class="text-small th-enfermedad diez"></th>
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad treinta">VARIEDAD</th>
            </tr>
            @foreach ($diseasesFlor as $item)
                <tr>
                    <td class="text-small-sx">{{ $item->name }}</td>
                    <td class="text-small-sx th-enfermedad
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    <img class="x-icon" src="{{ public_path('storage/icons/x-solid.svg') }}" alt="">
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx th-enfermedad text-center">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-small-sx th-enfermedad uppercase">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->returnReportItem->variety->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-sanidad">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad cincuenta">SANIDAD</th>
                <th class="text-small th-enfermedad diez"></th>
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad treinta">VARIEDAD</th>
            </tr>
            @foreach ($diseasesSanidad as $item)
                <tr>
                    <td class="text-small-sx">{{ $item->name }}</td>
                    <td class="text-small-sx th-enfermedad
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    <img class="x-icon" src="{{ public_path('storage/icons/x-solid.svg') }}" alt="">
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx th-enfermedad text-center">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-small-sx th-enfermedad uppercase">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->returnReportItem->variety->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </section>

    <section class="diseases-tallos">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad cincuenta">TALLOS</th>
                <th class="text-small th-enfermedad diez"></th>
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad treinta">VARIEDAD</th>
            </tr>
            @foreach ($diseasesTallos as $item)
                <tr>
                    <td class="text-small-sx">{{ $item->name }}</td>
                    <td class="text-small-sx th-enfermedad
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    <img class="x-icon" src="{{ public_path('storage/icons/x-solid.svg') }}" alt="">
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx th-enfermedad text-center">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-small-sx th-enfermedad uppercase">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->returnReportItem->variety->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-follaje">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad cincuenta">FOLLAJE</th>
                <th class="text-small th-enfermedad diez"></th>
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad treinta">VARIEDAD</th>
            </tr>
            @foreach ($diseasesFollaje as $item)
                <tr>
                    <td class="text-small-sx">{{ $item->name }}</td>
                    <td class="text-small-sx th-enfermedad
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    <img class="x-icon" src="{{ public_path('storage/icons/x-solid.svg') }}" alt="">
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx th-enfermedad text-center">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-small-sx th-enfermedad uppercase">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->returnReportItem->variety->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-empaque">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad cincuenta">EMPAQUE</th>
                <th class="text-small th-enfermedad diez"></th>
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad treinta">VARIEDAD</th>
            </tr>
            @foreach ($diseasesEmpaque as $item)
                <tr>
                    <td class="text-small-sx">{{ $item->name }}</td>
                    <td class="text-small-sx th-enfermedad
                        @if ($item->return_report_items_diseases == '[]')
                            verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                        
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    <img class="x-icon" src="{{ public_path('storage/icons/x-solid.svg') }}" alt="">
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx th-enfermedad text-center">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-small-sx th-enfermedad uppercase">
                        @foreach ($item->return_report_items_diseases as $disease)
                            @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->returnReportItem->variety->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="observacion">
        <p class="text-observacion uppercase">Observaciones: {{ $returnReportItem->piece }} {{ $returnReportItem->type_piece }} en devolucion</p>
    </section>
    <section class="imagenes">
        @if ($arrayImages)
            @foreach ($arrayImages as $item)
                <img class="foto" src="{{ public_path('storage/'. $item) }}" alt="">
            @endforeach
        @endif
    </section>
</body>
</html>