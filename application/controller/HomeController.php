<?php

  class HomeController extends BaseController {

    function __construct() {
      parent::__construct();
    }

    function index() {
      $this->view->render('home/index', 'Homepage', '', true, true, [['file', 'smg'], ['inline', 'var sell=document.querySelector(\'.js-seller\'),stats=document.querySelector(\'.js-stats\');_.addEvent(window,\'scroll\',function(){if(_.inViewport(sell)){_.include(\'/home/star-seller\',sell);}if(_.inViewport(stats)){_.include(\'/home/stats\',stats);}});']]);
    }

    function star_seller() {
      $this->view->render_include('home/starseller');
    }

    function stats() {
      $this->view->render_include('home/stats');
    }
  }