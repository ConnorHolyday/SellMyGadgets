<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->title; ?></title>
    <meta name="description" content="<?php echo $this->description; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->

    <link rel="shortcut icon" href="/favicon.ico">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="/<?php echo STATIC_1; ?>js/libs/modernizr.js"></script>

    <link rel="stylesheet" href="/<?php echo STATIC_1; ?>css/styles.css" />
    <link rel="stylesheet" href="/<?php echo STATIC_1; ?>fonts/smg-icons/style.css" />


    <!--[if lt IE 9]>
    <script type="text/javascript" src="/<?php echo STATIC_1; ?>/js/libs/selectivizr-min.js"></script>
    <![endif]-->

    <!-- Google Analytics <script type="text/javascript">

    var _gaq = _gaq || [];
    var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
    _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
    _gaq.push(['_setAccount', 'UA-********-2']);
    _gaq.push(['_trackPageview']);

    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    </script> -->
  </head>
  <body class="<?php echo $this->page; ?>">
    <?php
      if($this->inc_master) {
        require APP_DIR . 'view/master/header.php';
      }

      if($this->inc_search) {
        $this->render_include('includes/globalsearchbar');
      }

      require $this->view;

      if($this->inc_master) {
        require APP_DIR . 'view/master/footer.php';
      }

      if($this->scripts != NULL) {
        foreach($this->scripts as $script) {
          if($script[0] == 'file') {
            echo '<script src="/' . STATIC_1 . 'js/' . $script[1] . '.js"></script>';
          } else if($script[0] == 'inline') {
            echo '<script>' . $script[1] . '</script>';
          }
        }
      }
    ?>
  </body>
</html>
