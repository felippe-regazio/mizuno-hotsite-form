<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mizuno - Fale com a Mizu</title>

  <link rel="stylesheet" href="vendor/normalize-css/normalize.css">
  <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="vendor/milligram/dist/milligram.min.css">
  <link rel="stylesheet" href="dist/main.css">
</head>
<body>
  
  <header>
		<div class="container">
			<div class="logo">
				<a href="https://www.mizuno.com.br/" target="_blank">
					<img src="img/logo-mizuno.webp">
					<span class="logo-bg"></span>
				</a>
			</div>
		</div>
  </header>
    
  <form id="main-form" action="send.php" method="POST" enctype="multipart/form-data">
    
    <?php require './steps/helpers/utils.php' ?>

    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php

          require './steps/getBasics.php';
          require './steps/getEmail.php';
          require './steps/getGender.php';
          require './steps/getBirth.php';
          require './steps/getAddress.php';
          require './steps/getRegion.php';
          require './steps/getCellphone.php';
          
          require './steps/whichProduct.php';
          require './steps/getProductType.php';
          require './steps/getProductLine.php';
          require './steps/whatHappened.php';
          require './steps/getProductInfo.php';
          require './steps/formResume.php';
          require './steps/showTerms.php';
          require './steps/showOrientation.php';
          require './steps/uploadImages.php';
          
          require './steps/allDone.php';

        ?>
      </div>
    </div>

    <script src="vendor/inputmask/inputmask.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="dist/validate-form.js"></script>
    <script src="dist/main.js"></script>
  </form>
</body>
</html>