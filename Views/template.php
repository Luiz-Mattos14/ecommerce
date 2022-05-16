<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/images/logo.png">

  <!-- CSS BOOTSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">

  <!--FONT AWESOME-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>

  <!--SWEET ALERT-->

  <link rel="stylesheet" href="sweetalert2.min.css">


  <title>Games ON</title>
</head>
<body>

  <header id="header" class="width-mobile fixed-top">
    <div class="row header-top width-mobile ">
      <div class="col-md-3 mobile-hidden">
          <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.png" class="brand"></a>
      </div>
      <div class="col-md-6 search mobile-hidden">
        <ul>
          <li class="icon-navbar">
            <div class="researchArea mobile-hidden">
              <form action="<?php echo BASE_URL; ?>search" method="GET">
                  <input type="text" name="s" value="" required placeholder="Pesquise aqui seu produto GEEK" />
                  <input type="submit" value="" />
              </form>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-md-3 col-12 icon-user width-mobile">
        <ul class="icon">
          <a href="<?php echo BASE_URL; ?>" class="fa-icon desktop-hidden"><li><i class="fa-solid fa-house-user desktop-hidden"></i></li></a>
          <li><i class="fa-solid fa-user"></i></li>
          <li><i class="fa-solid fa-cart-shopping"></i></li>
        </ul>
      </div>
    </div>


    <div class="row header-nav width-mobile">
        <div class="col-sm-12 text-center desktop-hidden">
          <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.png" class="brand"></a>
        </div>
        <div class="col-md-12 width-mobile">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="search desktop-hidden">
              <ul>
                <li class="icon-navbar">
                <div class="researchArea desktop-hidden">
                  <form action="<?php echo BASE_URL; ?>search" method="GET">
                      <input type="text" name="s" value="" required placeholder="Pesquise aqui seu produto GEEK" />
                      <input type="submit" value="" />
                  </form>
                </div>
                </li>
              </ul>
            </div>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expandes="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
              <ul class="navbar-nav ">
                <?php foreach($viewData['categories'] as $cat): ?>
                <li class="nav-item active"><a href="<?php echo BASE_URL; ?>categories/enter/<?php echo $cat['id_category']; ?>" class="nav-link"><?php echo $cat['category_name']; ?></a></li>  
                <?php endforeach; ?>             
              </ul>
            </div>
          </nav>       
      </div> 
    </div>

  
  </header>

  <section id="section" class="width-mobile mobile">
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
  </section></br></br>

  <div id="subarea" class="mobile-hidden">
    <div class="row">
        <div class="col-md-4 col-sm-4 subarea-text"><b>Newsletter,</b>  Novidades, Promoções e Tonts</div>
        <div class="col-md-8 col-sm-8 col-sm-offset-2 subAreaForm no-padding text-right">
            <form action="<?php echo BASE_URL; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
                <input type="email" value="" name="EMAIL" class="subemail required email" id="mce-EMAIL" placeholder="Digite seu email...">
                <input type="hidden" name="b_0d44bd14b441c2648668c0c5c_156305bc7f" tabindex="-1" value="">
                <input type="submit" value="ENVIAR" name="subscribe" id="mc-embedded-subscribe" class="button">
            </form>
        </div>
    </div>
	</div>
  <footer>
      <div class="row">
          <div class="col-md-6">
              <span>Atendimento:</span> 
              <ul>
                  <li><img src="<?php echo BASE_URL; ?>assets/images/phone.svg" id="rel">  Seg. a Sex. 8h âs 18h</li>
                  <li><img src="<?php echo BASE_URL; ?>assets/images/letter.svg" id="carta"> no-email@email.com.br</li>
                  <li><img src="<?php echo BASE_URL; ?>assets/images/question.svg" id="duvidas"> Dúvidas frequentes</li>
              </ul>
          </div>
          <div class="col-md-3">
              <span>Pagamentos:</span>
              <ul>
                  <li>Boleto</li>
                  <li>Cartão de crétido</li>
                  <li>Cartão de débito</li>
              </ul>
          </div>
          <div class="col-md-3">
              <span>Informações:</span>
              <ul>
                  <li>Lei de proteção de dados</li>
                  <li>Termos de uso</li>
              </ul>
          </div>
      </div>
  </footer>

  <script type="text/javascript">
		var BASE_URL = '<?php echo BASE_URL; ?>';
        <?php if(isset($viewData['filters'])): ?>
		var maxslider = <?php echo $viewData['filters']['maxslider']; ?>;
        <?php endif; ?>
  </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"> </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
  </body>
</html>