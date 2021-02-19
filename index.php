<?php

?>

<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <link rel="stylesheet" href="css/style.css" media="screen">
  <link rel="stylesheet" href="css/style_movel.css" media="max-width:1024px">
  <title>conhecimento em programação</title>
</head>

<body>
<div class="body">
  <div class="cabecalho">

    <div class="logo">
      <img src="img/logo.gif" class="logo"alt="">
    </div>

    <a href="#">
    <div class="bt_home">
      <img src="img/bt_home_off.gif" class="bt_home" alt="">
    </div>
    </a>

    <div class="pesquisa_div">
      <form class="formulario" action="index.php" method="get">
        <input type="search" name="pesquisa" placeholder="pesquise..." class="pesquisa_br">
        <button type="submit" name="f_button" class="lupa_bt"><img src="img/bt_lupa.gif" class="lupa"></button>
      </form>
    </div>

  </div>

  <div class="position">
  <div class="subody">
    <?php
      $pesquisa = $_GET["pesquisa"];
      $files = glob("conteudo/texto/{*.txt}", GLOB_BRACE);
      $imagens = glob("conteudo/img/{*.gif}", GLOB_BRACE);
      $tam = count($files);
      $texto= array(60);

      for ($i=0; $i < $tam; $i++) {
       $texto[$i] = file_get_contents("$files[$i]");
      }

      function findKeyWord($str, $key){
	      $regex = '/'. $key .'/i';
	      return preg_match($regex, $str);
      }

      for ($i=0; $i < $tam; $i++) {
        $respesquisa= findKeyWord($texto[$i],$pesquisa);
        if ($respesquisa == 1) {
        echo "
        <div class='div_conteudo'>
          <div class='div_img'>
            <img src='".$imagens[$i]."' class='img_conteudo'>
          </div>

          <div class='div_txt'>
            <p class='txt_conteudo'>".$texto[$i]."</p>
          </div>
        </div>
        ";
        }
      }
    ?>

  </div>
  <div class="subody2">
    <?php

    ?>
  </div>
</div>
</div>
</body>
</html>
