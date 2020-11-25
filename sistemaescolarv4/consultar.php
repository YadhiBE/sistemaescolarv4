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

    <table class="table is-fullwidth" id='tablacalificaciones'>
      <thead>
        <tr>
          <th class="has-text-centered is-size-3 has-text-weight-light">ID</th>
          <th class="has-text-centered is-size-3 has-text-weight-light">Nombre del alumno</th>
          <th class="has-text-centered is-size-3 has-text-weight-light">Español</th>
          <th class="has-text-centered is-size-3 has-text-weight-light">Matemáticas</th>
          <th class="has-text-centered is-size-3 has-text-weight-light">Historia</th>
          <th class="has-text-centered is-size-3 has-text-weight-light">Eliminar</th>
          <th class="has-text-centered is-size-3 has-text-weight-light">Actualizar calificaciones</th>
        </tr>
       </thead>
       <tr>
         <td class="has-text-centered is-size-5 has-text-weight-light">$colum->idcalificacion</td>
         <td class="has-text-centered is-size-5 has-text-weight-light">$colum->nombrecompleto</td>
         <td class="has-text-centered is-size-5 has-text-weight-light">$colum->calespañol</td>
         <td class="has-text-centered is-size-5 has-text-weight-light">$colum->calmate</td>
         <td class="has-text-centered is-size-5 has-text-weight-light">$colum->calhistoria</td>
         <td class="has-text-centered is-size-5 has-text-weight-light">
            <form action='api/index.php/delete' method='POST'>
            <a class="button is-info" href='id={$colum->idcalificacion}'>Eliminar</a>
         </td>
         <td class="has-text-centered is-size-5 has-text-weight-light"> 
           <form action='api/index.php/update' method='POST'>
               <input id='idcalificacion' type='text' name='idcalificacion' value='{$colum->idcalificacion}' hidden>

               <label  size="5">Calificación Español:</label>
               <input id="calespañol" type="text" name="calespañol" size="5"><br>

               <label  size="5">Calificación Matemáticas:</label>
               <input id="calmate" type="text" name="calmate" size="5"><br>

               <label  size="5">Calificación Historia:</label>
               <input id="calhistoria" type="text" name="calhistoria" size="3"><br>


               <button class='button is-info' type='submit' onclick="update()">Actualizar calificacion</button>
           </form>
         </td>
       </tr>
    </table>
    <br>
    <div class='has-text-centered'>
    <a class='button is-primary m-6 is-rounded buton' href='asking.php'>Regresar a página anterior</a>
  </div>
</body>
</html>