<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
</head>
<body>
<div class="column is-full"><p class="is-size-1-fullhd has-text-centered has-background-info">Sistema escolar</p></div>
<table class="table is-fullwidth" if-info>
        <thead>
            <tr>
                <th class="has-text-centered is-size-3 has-text-weight-light">ID</th>
                <th class="has-text-centered is-size-3 has-text-weight-light">Nombre</th>
                <th class="has-text-centered is-size-3 has-text-weight-light">Español</th>
                <th class="has-text-centered is-size-3 has-text-weight-light">Matemáticas</th>
                <th class="has-text-centered is-size-3 has-text-weight-light">Historia</th>
            </tr>
        </thead>
        <tr>
            <td class="has-text-centered is-size-5 has-text-weight-light">$colum->idcalificacion</td>
            <td class="has-text-centered is-size-5 has-text-weight-light">$colum->nombrecompleto</td>
            <td class="has-text-centered is-size-5 has-text-weight-light">$colum->calespañol</td>
            <td class="has-text-centered is-size-5 has-text-weight-light">$colum->calmate</td>
            <td class="has-text-centered is-size-5 has-text-weight-light">$colum->calhistoria</td>
        </tr>
    </table>
    <br>
    <div class='has-text-centered'>
    <a class='button is-primary m-6 is-rounded buton' href='asking.php'>Regresar a página anterior</a>
</div>
</body>
</html>
