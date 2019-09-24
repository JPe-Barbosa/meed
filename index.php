
<!DOCTYPE html>
<html lang=" br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- font impot -->
    <link href="https://fonts.googleapis.com/css?family=Arvo|Oswald:400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Meed</title>
    
   

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/starter_pack/ie10-viewport-bug-workaround.css" rel="stylesheet">
   
     <!-- Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    -->
    <link href='css/main.css' rel='stylesheet'  type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Inconsolata|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php
session_start();
?>
<!-- nav bar-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top ">
    <div class="container-fluid" id="myNavColapsed">
        
    <a class="navbar-brand" href="#"><img src="img/Imagem1.png" width="100" height="70" alt=""></a>
          
      <ul class='list-unstyled list-inline text-center my-2 my-lg-0 btn_header navbar-toggler colapse'>
          <li class='list-inline-item'>
            <a   href="https://www.facebook.com/Projeto-Meed-110639850320644" class='btn-floating btn-fb mx-1'>
              <img src='img/fc_icon.png' width='60' height='50'>
            </a>
          </li>
          <li class='list-inline-item'>
            <a href='https://www.instagram.com/meedprojeto/?hl=pt-br' class='btn-floating btn-tw mx-1'>
              <img src='img/insta_icon.png' width='60' height='50'>
            </a>
          </li>
          <li class='list-inline-item'>
            <a href='https://twitter.com/MeedProjeto' class='btn-floating btn-gplus mx-1'>
              <img src='img/twitter_icon.png' width='60' height='50'>
            </a>
          </li>
          
      </ul>  
      
      <button   onclick="vtnc()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation" >
          <span  class="navbar-toggler-icon" ></span>
        </button>
        <script type="text/javascript">


</script>
      
        <div class=" collapse navbar-collapse " id="myNavbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#section1">QUEM SOMOS<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#section2">LOCAL DE COLETA<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#section3">TABELA DE PREÇO<span class="sr-only">(current)</span></a>
            </li>
          </ul>
            <ul class='list-unstyled list-inline text-center my-2 my-lg-0 btn_header logo'>
              <li class='list-inline-item'>
                <a  href="https://www.facebook.com/Projeto-Meed-110639850320644"class='btn-floating btn-fb mx-1'>
                  <img src='img/fc_icon.png' width='60' height='50'>
                </a>
              </li>
              <li class='list-inline-item'>
                <a href='https://www.instagram.com/meedprojeto/?hl=pt-br' class='btn-floating btn-tw mx-1'>
                  <img src='img/insta_icon.png' width='60' height='50'>
                </a>
              </li>
              <li class='list-inline-item'>
                <a class='btn-floating btn-gplus mx-1' href='https://twitter.com/MeedProjeto'>
                  <img src='img/twitter_icon.png' width='60' height='50'>
                </a>
              </li>
              <ul class='dropdown-menu'>
                  <a href='delet.php'>deletar conta</a>
                </ul>
          </ul>
          
          
            <?php
            if(isset($_SESSION['email'])){
            //echo "bem-vindo ". $_SESSION['nome'] ." ". $_SESSION['sobrenome'] ."!";
            echo "
            <ul class='list-unstyled list-inline text-center my-2 my-lg-0 btn_header'>
            <li class='list-inline-item'>
              <select id='inputState' class='form-control' onchange='location=this.value;'>
                <option selected value=''>opções de conta de ".$_SESSION['nome']."</option>
                <option value='delet.php'>deletar conta</option>
                <option value='nome.php'>mudar nome</option>
                <option value='e-mail.php'>mudar e-mail</option>
                <option value='senha.php'>mudar senha</option>
              <select>
            </li>
              <li class='list-inline-item '>
                <div class='pontos'>
                  pontos: ".$_SESSION['pontos']."
                </li>
              <li class='list-inline-item'> 
                <a href='logout.php'><button class='btn btn-outline-success my-2 my-sm-0' type='submit' >logout</button></a>
              </li>
              </ul>
              ";
            }else{
            echo "
            <ul class='list-unstyled list-inline text-center my-2 my-lg-0 btn_header'>
              <li class='list-inline-item'>
                <a href='login.php'><button class='btn btn-outline-success my-2 my-sm-0' type='submit' >login</button></a>
              </li>
            </ul>";
            }
            
            ?>
                <!--
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          -->
        </div>
    </div>
</nav>
<!--
<section class="hero">
        <div class="container">
            <h1 class = "h1_hero"> M<span>ee</span>d </h1>
            <div class="row">
                <div class="col-md-7">
                    <p>Faça o que ecorreto na meedida certa</p>
                </div>
            </div>
        </div>
    </section>

    
-->
    <!-- HERO SECTION -->
    
        
    <section class="hero">
      <div class="d-flex align-items-center  flex-column tudo" >
              <h1 class = "h1_hero"> M<span>ee</span>d </h1>
            <div class="row">
                <div class="col-12 hero_span">
                    <p>Faça o que <span>eco</span>rreto na <span>meed</span>ida certa</p>
                </div>
            </div>
        </div>
    </section>
    

    <!-- PRIMEIRA SECTION-->
<div class="container row-sm-12  text justify-content-center cont" id="myDIV">
    <section id="section1"id="myDIV" class="container bg_default" >
            
        <div class="row  " >
            <div class="col-md-5 justify-content bg-texto1">
            <h3>Sobre Nós</h3>
            <p>Somos uma empresa em desenvolvimento que busca a sustentabilidade acima
            da satisfação econômica.
            Nascido do estímulo da Bentotec, o Meed nos trouxe grandes expectativas, por
            isso esperamos atingir o patamar de conhecimento necessário para melhorar e
            aumentar o recolhimento de materiais recicláveis na maior área possível.
            A ideia por trás do projeto surgiu da necessidade de estímulos voltados à
            reciclagem. O cidadão moderno precisa de mais opções para destinar seu lixo
            corretamente, enquanto o planeta precisa de ajuda.</p>
          </div>
          <div class="col-md-6 align-self-center ">
                <img src= "img/bob.jpeg" class="img-fluid img_texto" >
          </div>
        </div>
        <div class="row spacing" >
          <div class="col bg-texto2">
            <h3>Como funciona?</h3>
            <p>O Meed é o facilitador da troca de materiais recicláveis, portanto o sistema é
            acessível a todos. Você poderá converter seus lixos inorgânicos em créditos, mais
            tarde revertidos em produtos dos supermercados mais próximos à sua casa. Antes de
            realizar a conversão, é importante dar uma olhada na tabela de créditos por produto e
            checar quais supermercados realizam a troca. Seus materiais serão pesados e a
            transferência de benefícios será feita.
            Após observar os pontos citados, faça seu cadastro e aproveite as vantagens!</p>
          </div>
          </div>
        <div class="row spacing" >
          <div class="col bg-texto2">
            <h3>O porquê</h3>
            <p>A cada dia, a necessidade de reciclar aumenta e o número de estímulos à
            reciclagem diminue. Segundo dados da ABRELPE (Associação Brasileira de
            Empresas de Limpeza Pública e Resíduos Especiais), em 2016, a média de produção
            de lixo per capta no Brasil era de um 1Kg por dia, lembrando que o número de
            brasileiros ultrapassa os 200 milhões. Há 30% de potencial para reciclagem, enquanto
            apenas 3% é realmente reciclado, o que nos leva a crer na falta de meios e
            oportunidades para reciclar.<p>

            <!--GRAFICO-->
            <p>O baixo valor agregado ao plástico, por exemplo, acaba superando o
            salvamento do meio-ambiente, o que coloca em pauta novamente a falta de
            encorajamentos e válvulas de escape para os consumidores. Se o plástico descartado
            fosse reciclado, seria possível retornar cerca de R$ 5,7 bilhões para a economia,
            segundo levantamento do Selurb (Sindicato Nacional das Empresas de Limpeza
            Urbana).</p>

            <p>Certamente, as vantagens em reciclar são inúmeras, incluindo a poupança de
            água e energia, a redução da extração de matérias-primas, taxas de tratamentos de
            resíduos, impactos dos aterros de resíduos, a promoção de empregos, além de áreas
            limpas e protegidas dos estragos feitos pelo lixo mal encaminhado.</p>
          </div>  
        </div>
        <div class="row">
            <div class="col ppt">
            <iframe src="https://onedrive.live.com/embed?cid=5607A2B76FBEE481&amp;resid=5607A2B76FBEE481%21426&amp;authkey=AP1ujrP8Ydp1fL8&amp;em=2&amp;wdAr=1.7777777777777777" width="962px" height="565px" frameborder="0">Este é um apresentação do <a target="_blank" href="https://office.com">Microsoft Office</a> incorporado, da plataforma <a target="_blank" href="https://office.com/webapps">Office</a>.</iframe>
            </div>
          </div>
        

    </section>
</div>

    <!--PRIMEIRA PARALLAX-->
<section id="prlx1" class = "container-fluid">
    <div >
    </div>
</section>

    <!--LOCAIS DE ENTREGA-->
<section class="container bg_default"id="section2" >
    <div class="row justify-content-center">
        <h1 class="titulo">Local de Coleta</h1>
    </div>


    <div class="row" >
        <div class="col-md-5 mapCol">
        <div class="d-flex justify-content-center">
          <img src="img/logomarca_nova.png" class="img-fluid">
        </div>
            <p>A rede de supermercados oba hortifruti é a nossa principal associada e suporta nosso modelo de negocios</p>
            
          </div>
        <div  class=" col-md-7">
            <div id="map"></div>
        </div>
    </div>
</section>
    <!-- SEGUNDA PARALLAX-->
<section id="prlx2" class = "container-fluid">
        <div>
        </div>
    </section>


<div id="section3" class="container margin">
        <!-- Table with panel -->
<div class="card card-cascade narrower mytable">

<!--Card image-->
<div
  class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

  <div>
   
  </div>

  <b class="white-text mx-3">TABELA DE PONTOS</b>

  <div>
    
  </div>

</div>
<!--/Card image-->

<div class="px-4">

  <div class="table-wrapper">
    <!--Table-->
    <table class="table table-hover mb-0">

      <!--Table head-->
      <thead>
        <tr>
          
          <th class="th-lg">
            <a>Material
              <i class="fas fa-sort ml-1"></i>
            </a>
          </th>
          <th class="th-lg">
            <a >Pontos por KG
              <i class="fas fa-sort ml-1"></i>
            </a>
          </th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
        <tr>
          
          <td>Papelão</td>
          <td>145</td>
          
        <tr>

          <td>Plastico filme</td>
          <td>150</td>
        
        </tr>
        <tr>

          <td>Plastico rígido</td>
          <td>462</td>
        
        </tr>
        <tr>

          <td>Pet</td>
          <td>675</td>
        
        </tr>
        <tr>

          <td>Aluminío</td>
          <td>1000</td>
        
        </tr>
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->
  </div>

</div>

</div>
<!-- Table with panel -->
    </div>
		
<!-- Footer -->
<footer class="page-footer  bg_footer">

  <div style="background-color: #6351ce;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Nos siga nas redes sociais!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic" href="https://www.facebook.com/Projeto-Meed-110639850320644">
            <img src="img/fc_icon.png" class="icons padding" >
          </a>
          <!-- Twitter -->
          <a class="tw-ic" href='https://twitter.com/MeedProjeto'>
          <img src="img/twitter_icon.png" class="icons padding" >
          </a>
          <!-- Instagram -->
          <a href="https://www.instagram.com/meedprojeto/?hl=pt-br" class="gplus-ic">
          <img src="img/insta_icon.png" class="icons" >
          </a>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->
    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">MEED</h6>
        <hr class="hr_footer accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>meed é um projeto independente que visa o bem estar ambinental a cima de tudo</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 col-xl-4 mx-auto mb-8">
        <img src="img/Imagem1.png" class="img-responsive img_footer">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contato</h6>
        <hr class="hr_footer accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Campinas, São Paulo Brasil</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> meedprojeto@gmail.com</p>
        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->
</footer>
<!-- Footer -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!--scrol js-->
    <script src="js/main.js"></script>
    <!--maps js-->
    <script src="js/initMap.js"></script>
    <!-- maps credential-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCol7eT80HdXb4iQHsNVxW-ZkyUqQLwTJM&callback=initMap"
    type="text/javascript"></script>
    <script src="js/screenWidth.js"></script>
    
    </body>

</html>