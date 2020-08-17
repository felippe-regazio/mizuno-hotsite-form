<?php

  define('APPLICATION_URL', 'http://localhost/');

  define('EMAIL_ACCOUNT', 'account@gmail.com');

  define('EMAIL_PASSWORD', 'password');

  define('EMAIL_FROM_NAME', 'Mizuno Ticket Center');

  define('EMAIL_FROM_ADDRESS', 'noreply@mizuno.com.br');

  define('EMAIL_DEFAULT_SUBJECT', 'Mizuno - Abertura de Chamado');

  define('EMAIL_DEFAULT_DESTINY', 'maskedfrom@gmail.com');

  // ----------------------------------------------
  
  define('EMAIL_HOST', 'smtp.gmail.com');
  
  define('EMAIL_ALLOW_HTML', true);
  
  define('EMAIL_PORT', 465);
  
  define('EMAIL_SMTP_AUTH', true);
  
  define('EMAIL_SMTP_SECURE', 'ssl');
  
  define('EMAIL_APP_DEBUG', false);

  // ----------------------------------------------

  if (EMAIL_APP_DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  }
