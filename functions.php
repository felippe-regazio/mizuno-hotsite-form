<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require_once __DIR__ . '/config.php';
  require_once __DIR__ . '/php-mailer/src/Exception.php';
  require_once __DIR__ . '/php-mailer/src/PHPMailer.php';
  require_once __DIR__ . '/php-mailer/src/SMTP.php';

  function sendEmail($to, $subject, $content) {		
    
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->IsSMTP();
    $mail->SMTPDebug = EMAIL_APP_DEBUG;
    $mail->SMTPAuth = EMAIL_SMTP_AUTH;
    $mail->SMTPSecure = EMAIL_SMTP_SECURE;
    $mail->Host = EMAIL_HOST;
    $mail->Port = EMAIL_PORT;
    $mail->Username = EMAIL_ACCOUNT;
    $mail->Password = EMAIL_PASSWORD;
    $mail->From = EMAIL_FROM_ADDRESS;
    $mail->SetFrom(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);
    $mail->AddReplyTo(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);
    $mail->Subject = !empty($subject) ? $subject : EMAIL_DEFAULT_SUBJECT;
    $mail->Body = $content;
    $mail->IsHTML(EMAIL_ALLOW_HTML);

    foreach ($to as $address) {
      $mail->AddAddress($address);
    }
    
    return $mail->Send() ? true : false;
  }

  function saveFiles ($files) {
    if (empty($files)) {
      return [];
    }

    if (!file_exists(__DIR__ . '/images/')) {
      mkdir(__DIR__ . '/images', 0777, true);
    }

    $images = [];

    foreach ($files as $name => $file) {
      $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
      $name = createID() . '.' . $ext;
      $dest = __DIR__ . "/images/" . $name;

      if ($ext && $dest) {
        move_uploaded_file($file['tmp_name'], $dest);
        $images[] = APPLICATION_URL . '/images/' . $name;
      }
    }

    return $images;
  }

  function getEmailBody ($data, $files) {
    
    $body = "";
    $images = saveFiles($files);
    $data['opened-at'] = date('d/m/Y');

    $friendly_names = [
      "name" => "Nome",
      "cpf" => "CPF",
      "email" => "E-Mail",
      "gender" => "Genero",
      "birth" => "Data de Nascimento",
      "cep" => "CEP",
      "street" => "Rua",
      "neighborhood" => "Bairro",
      "house-number" => "No Residencia",
      "complement" => "Complemento",
      "city" => "Cidade",
      "region" => "Estado",
      "cellphone" => "Celular",
      "extra-contact" => "Contato",
      "which-product" => "Produto",
      "product-type" => "Tipo do Produto",
      "product-line" => "Linha do Produto",
      "product-size" => "Tamanho",
      "purchase-date" => "Data de Compra",
      "what-happened" => "O que aconteceu",
      "image-1" => "Imagem 1",
      "image-2" => "Imagem 2",
      "image-3" => "Imagem 3",
      "opened-at" => "Data da Solicitacao",
    ];

    foreach($data as $field => $value) {
      $body .= '<strong>' . (!empty($friendly_names[$field]) ? strtoupper($friendly_names[$field]) : strtoupper($field)) . '</strong><br/>' . $value . '<br/><br/>';
    }
    
    foreach ($images as $key => $image) {
      $body .= '<strong>IMAGEM ' . $key . '<br/>' . $image . '<br/><br/>';
    }

    return $body;
  }

  function showSuccess () {
    ?>
      <div class="content">
        <p style="color: #333333; font-weight: 600; margin-bottom: 4px">Processo finalizado com sucesso!</p>
        <p>A sua solicitação foi enviada, você recebeu uma cópia dela em seu E-Mail</p>
      </div>
    <?php
  }

  function showError ($error) {
    ?>
      <div class="content">
        <p style="color: #333333; font-weight: 600; margin-bottom: 4px">Falha ao abrir a solicitação :(</p>
        <p><strong style="color:red"> <?= $error ?> </strong></p>
      </div>
    <?php    
  }

  function createID() {
    $lenght = 20;

    if (function_exists("random_bytes")) {
      $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
      $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
      throw new Exception("No cryptographically secure random function available");
    }

    return str_replace([' ', '.'], ['-', ''], substr(bin2hex($bytes), 0, $lenght) . microtime());
  }  