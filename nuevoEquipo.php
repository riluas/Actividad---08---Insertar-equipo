<?php
$conexion = new mysqli("localhost", "root", "", "liga");
if ($conexion->connect_errno) {
    echo "¡Atención cuidado esto no es un simulacro! Fallo al conectar a MySQL: (".$conexion->connect_errno.")".$conexion->connect_error;
} else {
  $id_equipo=$_POST["id_equipo"];
  $nombre=$_POST["nombre"];
  $ciudad=$_POST["ciudad"];
  $web=$_POST["web"];
  $consulta="INSERT INTO equipo (id_equipo, nombre, ciudad, web) VALUES ('$id_equipo', '$nombre', '$ciudad', '$web')";
  $resultado=$conexion->query($consulta);
  if ($resultado==false) {
    echo "Inerción Incorrecta";
  } else {
    echo "Inserción Correcta";
  }
  $resultado=$conexion->query("SELECT * FROM equipo");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    var_dump($_POST);
    ?>
    <table align=center class="striped">
        <thead>
          <tr style="background-color: rgb(255,205,225)">
            <th style="text-align:center;padding:25px">ID</th>
            <th style="text-align:center;padding:25px">Nombre</th>
            <th style="text-align:center;padding:25px">Ciudad</th>
            <th style="text-align:center;padding:25px">Web</th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($resultado as $equipo) {
        echo "<tr>";
        echo "<td style='text-align:center'>".$equipo["id_equipo"]."</td>";
        echo "<td style='text-align:center'>".$equipo["nombre"]."</td>";
        echo "<td style='text-align:center'>".$equipo["ciudad"]."</td>";
        echo "<td style='text-align:center'>".$equipo["web"]."</td>";
      }
      ?>
  </body>
</html>
