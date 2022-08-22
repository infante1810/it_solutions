<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de gastos</title>
    <style>
        h2{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #444;
            text-align: left;
            padding: 8px;
        }
        .my-table{
            text-align: right;            
        }
        #sign{
            text-align: right;
            pading-top: 50px;
        }
    </style>
</head>
<body>
    <h2>Reporte de gastos</h2>
    </br>
    <h2>{{$title}}</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Servicio/Producto</th>
                <th>Descripcion</th>
                <th>Costos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variables as $variable)
            <tr>
                <td>{{$variable->id}}</td>
                <td>{{$variable->name}}</td>
                <td>{{$variable->description}}</td>
                <td>{{$variable->total_cost}}</td>
            </tr>
            @endforeach
        </tbody>
        <tr>
            <th colspan="4" class= "mitablita">Total</th>
            <th>${{$total}}</th>
        </tr>
        <tr>
            <td colspan ="5" id="sign">Firma</td>
        </tr>    
    </table>    
</body>
</html>