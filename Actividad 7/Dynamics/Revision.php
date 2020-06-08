<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Una ayudadita... ¿O no?</title>
    <link rel="stylesheet" href="../statics/hojisha.css">
  </head>
  <body>
    <form action="revision.php" method="post">
      <fieldset>
        <legend><h1>Regístrate</h1> </legend>
        <div class="transparente">
          <?php
            //recuibe variables
            $nombre = (isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido";
            $papellido = (isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido";
            $mapellido = (isset($_POST['Mapellido']))? $_POST['Mapellido'] : "";
            $col = (isset($_POST['col']) && $_POST['col'] != " ")? $_POST['col'] : "Desconocido";
            $rfc = (isset($_POST['rfc']) && $_POST['rfc'] != " ")? $_POST['rfc'] : " ";
            echo "Hola, ".$nombre." ".$papellido." ".$mapellido.". <br>";
          //validaciones
            if (preg_match('/^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*$/', $nombre)) {
              echo " Tu nombre ha sido validado <br>";
            }
            else {
              echo "Tu nombre no es válido <br>";
            }
            if (preg_match('/^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*$/', $papellido)) {
              echo "Tu apellido paterno ha sido validado <br>";
            }
            else {
              echo "Tu nombre no es válido <br>";
            }
            if (preg_match('/^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*$/', $mapellido)) {
              echo "Tu apellido materno ha sido validado <br>";
            }
            else {
              echo "Tu apellido materno no es válido <br>";
            }
            if (preg_match('/^[A-Z]{4}[0-9][0-9]([0][1-9]|[1][0-2])([0][1-9]|[1-2][0-9]|[3][0-1])[A-Z1-9]{3}$/', $rfc)) {
              echo "Tu RFC ha sido validado <br>";
            }
            else {
              echo "Tu RFC no es válido <br>";
            }
          ?>
        </div>
      </fieldset>
  </body>
</html>
