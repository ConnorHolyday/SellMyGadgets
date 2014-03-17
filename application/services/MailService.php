<?php

  class MailService {

    function __construct() {

    }

    public static function sendMail($to, $subj, $message) {

      $sendTo = $to;
      $subject = 'sellmygadgets. | ' . $subj;
      $body = $message;

      $headers =
        'From: webmaster@sellmygadgets.co.uk' . '\r\n' .
        'Reply-To: webmaster@sellmygadgets.co.uk' . '\r\n' .
        'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $body, $headers);
    }

    function getEmailTemplateById($id) {

      return $template;
    }

    function populateTemplate($template, $values) {
      foreach($values as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
      }
      return $template;
    }

  }