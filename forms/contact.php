<?php
  $receiving_email_address = 'your-email@example.com'; // O'zingizning email manzilingizni kiriting

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new $php_email_form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Gmail SMTP orqali yuborish
  $contact->smtp = array(
    'host' => 'smtp.gmail.com', // Gmail SMTP server
    'username' => 'asrorabdimannonov363@gmail.com', // Gmail manzilingiz
    'password' => 'your-app-password', // Google App Password (2FA yoqilgan bo‘lsa)
    'port' => '587', // TLS uchun 587, SSL uchun 465
    'encryption' => 'tls' // Agar 465 port bo'lsa, 'ssl' qilib qo'ying
  );

  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>
