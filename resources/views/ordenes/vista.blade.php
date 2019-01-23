<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OT_{{$orden->id_orden_trabajo}}</title>
        <meta charset="utf-8">
    </head>
    <style>
        td {
            border-bottom: 1px solid #ddd;
            margin: 5px;
        }
    </style>
    <body>
        <div style="height: 45%">
            <div>
                <div style="float: left;">
                    <p>RICARDO'S ATELIER<br/>
                   Av. José Aguirre Achá Nº200<br/>
                    entre calle 1 - Los Pinos <br/>
                    Contacto: 71597118 - 2791112 <br/>
                    La Paz - Bolivia<br/>
                    Orden Nro: {{$orden->id_orden_trabajo}}</p>
                </div>
                <div style="float: right">
                    <img style="width: 130px" src="{{ public_path('images/logo.jpg') }}">
                </div>
            </div>
            <div>
                <div style="text-align: center; padding-top: 130px;">
                    <h1>ORDEN DE TRABAJO</h1>
                </div>
            </div>
            <div>
                <div style="float: Left">
                    <p>Nombre: {{$orden->cliente}}<br/>
                    </p>
                </div>
                <div style="text-align: right">
                    <p>
                    Fecha recepción: {{$orden->fecha_inicio}}<br/>
                   CI: {{$orden->CI}}
                    </p>
                </div>
            </div>
            <div>
                <table cellspacing="0">
                    <thead style="background-color: #eeeeee; border: none;">
                        <tr>
                            <th width="100px" height="35px" style="margin: 5px">F. Entrega </th>
                            <th width="60px">Cant.</th>
                            <th width="280px">Detalle</th>
                            <th width="100px">Total</th>
                            <th width="100px">A/C</th>
                            <th width="80px">Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td height="45px">{{$orden->fecha_entrega}}</td>
                            <td>{{$orden->cantidad}}</td>
                            <td>{{$orden->detalle}}</td>
                            <td>Bs. {{$orden->total}}</td>
                            <td>Bs. {{$orden->cuenta}}</td>
                            <td>Bs. {{$orden->saldo}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
         <p style="margin-top: 0px;">----------------------------------------------------------------------------------------------------------------------------------------</p>
        <div>
            <div>
                <br>
                <div style="float: left;">
                    <p>RICARDO'S ATELIER<br/>
                   Av. José Aguirre Achá Nº200<br/>
                    entre calle 1 - Los Pinos <br/>
                    Contacto: 71597118 - 2791112 <br/>
                    La Paz - Bolivia<br/>
                    Orden Nro: {{$orden->id_orden_trabajo}}</p>
                </div>
                <div style="float: right">
                    <img style="width: 130px" src="{{ public_path('images/logo.jpg') }}">
                </div>
                <div style="float: left; margin-right: 55%; text-align: center; ">
                        <h4>COPIA</h4>
                        <h5>NO ES NOTA FISCAL</h5>
                </div>

            </div>
            <div>
                <div style="text-align: center; padding-top: 130px;">
                    <h1>ORDEN DE TRABAJO</h1>
                </div>
            </div>
            <div>
                <div style="float: Left">
                    <p>Nombre: {{$orden->cliente}}
                    </p>
                </div>
                <div style="text-align: right">
                    <p>
                    Fecha recepción: {{$orden->fecha_inicio}}<br/>
                   CI: {{$orden->CI}}
                    </p>
                </div>
            </div>
            <div>
                <table cellspacing="0">
                    <thead style="background-color: #eeeeee; border: none;">
                    <tr>
                        <th width="100px" height="35px" style="margin: 5px">F. Entrega </th>
                        <th width="60px">Cant.</th>
                        <th width="280px">Detalle</th>
                        <th width="100px">Total</th>
                        <th width="100px">A/C</th>
                        <th width="80px">Saldo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td height="45px">{{$orden->fecha_entrega}}</td>
                        <td>{{$orden->cantidad}}</td>
                        <td>{{$orden->detalle}}</td>
                        <td>Bs. {{$orden->total}}</td>
                        <td>Bs. {{$orden->cuenta}}</td>
                        <td>Bs. {{$orden->saldo}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>   