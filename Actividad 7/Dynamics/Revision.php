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

            if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
              $contrasenaprin = (isset($_POST['contrasena']) && $_POST['contrasena'] != "") ? $_POST['contrasena'] : '0' ;
              $resp="Okay";
              $mayus = array("A","B","C","D","E","F","G","H","I","J","K","L",
                "M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","y","Z");
              $minus = array("a","b","c","d","e","f","g","h","i","j","k","l",
                "m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");
              $numeros = array("1","2","3","4","5","6","7","8","9","0");
              $especiales = array("!","@","#","$","%","&","/","(",")","=","?","¿",
                "¡","<",">","´","¨","[","]","{","}","+","*","-",",",".");
              $contcomunes = array("1234567890","0987654321","qwertyuiop","asdfghjklñ","zxcvbnm",
                "123456","654321","1234567","7654321","12345678","87654321","123456789","987654321",
                "starwars","Starwars","StarWars","dragon","Dragon","letmein","LetMeIn","password","contraseña","Password","Contraseña",
                "111111","222222","333333","444444","555555","666666","777777","888888",
                "999999","000000","qwerty","asdfgh","zxcvbn","sunshine","Sunshine", "iloveyou","ILoveYou","princess","Princess",
                "welcome","Welcome","football","Football","monkey","Monkey","abc123","abcdefg","123123","master","Master"
              );
              //Filtro 1
              foreach ($contcomunes as $pass1)
              {
                if ($pass1 == $contrasenaprin)
                {
                  $resp= "Su contraseña es insegura";
                }
                else {
                  $resp="¡Bien! Su contraseña es segura";
                }
              };

              //Filtro 2
              if ($resp=="¡Bien! Su contraseña es segura") {
                $haymayus = 0;
                foreach($mayus as $evalu)
                {
                  if($haymayus == 0)
                  {
                    $presentamayus = strpos($contrasenaprin,$evalu);
                    if ($presentamayus != false)
                    {
                      $resp= "¡Bien! Su contraseña es segura";
                      $haymayus = 1;
                    }
                  }
                }
                if($haymayus == 0)
                {
                  $resp = "Se recomienda que su contraseña tenga mayúsculas";
                }
              }

              //Filtro 3
              if ($resp=="¡Bien! Su contraseña es segura") {
                $hayminus = 0;
                foreach($minus as $eval)
                {
                  if($hayminus == 0)
                  {
                    $presentaminus = strpos($contrasenaprin,$eval);
                    if ($presentaminus != false)
                    {
                      $resp= "¡Bien! Su contraseña es segura";
                      $hayminus = 1;
                    }
                  }
                }
                if($hayminus == 0)
                {
                  $resp = "Se recomienda que su contraseña tenga minúsculas";
                }
              }

              //Filtro 4
              if ($resp=="¡Bien! Su contraseña es segura") {
                $haynumeros = 0;
                foreach($numeros as $evaluar)
                {
                  if($haynumeros == 0)
                  {
                    $presentanumeros = strpos($contrasenaprin,$evaluar);
                    if ($presentanumeros != false)
                    {
                      $resp= "¡Bien! Su contraseña es segura";
                      $haynumeros = 1;
                    }
                  }
                }
                if($haynumeros == 0)
                {
                  $resp = "Se recomienda que su contraseña tenga números";
                }
              }

              //Filtro 5
              if ($resp=="¡Bien! Su contraseña es segura") {
                $hayespeciales = 0;
                foreach($especiales as $evaluarico)
                {
                  if($hayespeciales == 0)
                  {
                    $presentaespeciales = strpos($contrasenaprin,$evaluarico);
                    if ($presentaespeciales != false)
                    {
                      $resp= "¡Bien! Su contraseña es segura";
                      $hayespeciales = 1;
                    }
                  }
                }
                if($hayespeciales == 0)
                {
                  $resp = "Se recomienda que su contraseña tenga carácteres especiales";
                }
              }
              echo $resp;
            }
            else {
              echo "Sin contraseña";
            }
          ?>
        </div>
      </fieldset>
  </body>
</html>
