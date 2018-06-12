<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .contenedor {
            background-color: #80bdff;
            text-align: center;
        }

        .infoGeneral {
            background-color: #6f42c1;
            margin: 200px 0;
            color: white;
            text-align: center;
        }

        .footer {
            background-color: #1e7e34;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="contenedor">
    @yield("cabecera")
</div>

<div class="infoGeneral">
    @yield("infoGeneral")
</div>

<div class="footer">
    @yield("pie")
</div>

</body>
</html>