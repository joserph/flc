<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO DE DEVOLUCION FINCA</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 2cm 1cm 1cm;
        }
        
        /* 
        
        

        .small-letter{
            font-size: 8px;
            font-weight: normal;
        }
        .medium-letter{
            font-size: 8px;
        }
        .large-letter{
            font-size: 9px;
        }
        .farms{
            width: 300px;
        }
        
        table, th, td{
            border: 1px solid black;
        }
        .text-white{
            color: #fff;
        }
        .sin-border{
            border-top: 1px solid white;
            border-right: 1px solid white;
            border-bottom: 1px solid black;
            border-left: 1px solid white;
        }
        .sin-border2{
            padding: 5px;
            border-top: 1px solid white;
            border-right: 1px solid white;
            border-bottom: 1px solid black;
            border-left: 1px solid white;
        }
        .box-size{
            width: 40px;
        }
        .hawb{
            width: 75px;
        }
        .pcs-bxs{
            width: 40px;
        }
        .gris{
            background-color: #d1cfcf;
        }
        .gris2{
            background-color: #f0f0f0;
        }
        .coordinado{
            background-color: rgb(217, 244, 255);
        }
        .recibido{
            background-color: rgb(191, 255, 231);
        }
        .devolucion{
            background-color: rgb(255, 187, 200);
        }
        .faltante{
            background-color: rgb(255, 255, 175);
        }
        
         */
        /* NEW STYLE */
        header{
            position: fixed;
            top: 10px;
            left: 38px;
            right: 38px;
        }
        .text-center{
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        .cabezera{
            width: 60%;
            margin: auto;
        }
        .cab_td{
            border: 1px solid white;
        }
        .cab_tbody{
            font-size: 12px;
        }
        /* MAIN */
        main{
            position: relative;
            top: 60px;
        }
        .cuerpo{
            width: 100%;
            margin: auto;
        }
        .cuer_th{
            border: 1px solid black;
            font-size: 13px;
        }
        .cuer_tr{
            background: rgb(57, 57, 57);
            color: white;
        }
        .cuer_tr_{
            font-size: 10px;
        }
        .cuer_td{
            border: 1px solid black;
        }
        .cantidad{
            width: 72px;
        }
        .tipo{
            width: 40px;
        }
        .empaque{
            width: 80px;
        }
        .guia_hija{
            width: 90px;
        }
        .text-right{
            text-align: right;
        }
        .text-left{
            text-align: left;
        }
        .firma{
            width: 60%;
            margin: auto;
            font-size: 13px;
        }
        .firma_td{
            border-top: 1px solid black;
        }
    </style>
</head>
<body>
    <header>
        <h3 class="text-center"><ins>REGISTRO DE DEVOLUCION FINCA</ins></h3>
        <table class="cabezera">
            <tbody class="cab_tbody">
                <tr class="cab_tr">
                    <td class="cab_td">FECHA:</td>
                    <td class="cab_td">{{ date('d-m-Y', strtotime($returnReport->date)) }}</td>
                    <td class="cab_td">CLIENTE:</td>
                    <td class="cab_td">{{ $returnReport->client->name }}</td>
                </tr>
                <tr class="cab_tr">
                    <td class="cab_td">AGENCIA:</td>
                    <td class="cab_td">{{ $returnReport->logistic->name }}</td>
                    <td class="cab_td">AWB/BL:</td>
                    <td class="cab_td">{{ $returnReport->guide_number }}</td>
                </tr>
                <tr class="cab_tr">
                    <td class="cab_td">DESTINO:</td>
                    <td class="cab_td">{{ $returnReport->destination }}</td>
                    <td class="cab_td"></td>
                    <td class="cab_td"></td>
                </tr>
            </tbody>
        </table>
    </header>
    <main>
        <table class="cuerpo">
            <tbody class="cuer_tbody">
                <tr class="cuer_tr">
                    <th class="cuer_th marcacion">MARCACION</th>
                    <th class="cuer_th">FINCA</th>
                    <th class="cuer_th">VARIEDAD</th>
                    <th class="cuer_th guia_hija">GUIA HIJA</th>
                    <th class="cuer_th empaque">EMPAQUE</th>
                    <th class="cuer_th cantidad">CANTIDAD</th>
                    <th class="cuer_th tipo">TIPO</th>
                    <th class="cuer_th">PROBLEMA</th>
                </tr>
                @php
                    $total = 0;
                @endphp
                @foreach ($returnReportItems as $item)
                @php
                    $total+= $item->piece;
                @endphp
                <tr class="cuer_tr_">
                    <td class="cuer_td">{{ $item->dialing->name }}</td>
                    <td class="cuer_td">{{ $item->farm->name }}</td>
                    <td class="cuer_td text-center">{{ $item->variety->name }}</td>
                    <td class="cuer_td text-center">{{ $item->hawb }}</td>
                    <td class="cuer_td text-center">{{ $item->packing }}</td>
                    <td class="cuer_td text-center">{{ $item->piece }}</td>
                    <td class="cuer_td text-center">{{ Str::of($item->type_piece)->upper()  }}</td>
                    <td class="cuer_td text-center">
                        @php
                            $str_diseases = '';
                        @endphp
                        @foreach ($item->diseases as $disease)
                            @php
                                $str_diseases .= $disease->name . ' - ';
                            @endphp
                        @endforeach
                        {{ substr($str_diseases, 0, -2) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="cuer_tfoot">
                <tr>
                    <th colspan="5" class="cuer_th text-right">TOTAL PIEZAS: </th>
                    <th class="cuer_th">{{ $total }}</th>
                    <th colspan="2" class="cuer_th"></th>
                </tr>
            </tfoot>
        </table>
        <br>
        <br>
        <br>
        <table class="firma">
            <tr class="firma_tr">
                <td class="firma_td_">FIRMA:</td>
                <td></td>
                <td></td>
                <td class="firma_td_">FIRMA:</td>
            </tr>
            
            <tr class="firma_tr">
                <td class="firma_td text-center">RESPONSABLE: AGENCIA DE CARGA</td>
                <td></td>
                <td></td>
                <td class="firma_td text-center">AUDITOR CONTROL DE CALIDAD</td>
            </tr>
        </table>
    </main>

    
</body>
</html>