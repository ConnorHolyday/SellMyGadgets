<?php
  class SiteController extends BaseController {

    function __construct() {
      parent::__construct();

      //retrive and create the sitemodel in $this->model
      require "application/model/SiteModel.php";
      $this->model = new SiteModel();
    }

    function index() {

    }

    function about() {
      $about = $this->model->about();

      $this->view->page_title = $about[0]['title'];
      $this->view->content = $about[0]['content'];

      $this->view->render('site/content', 'About', true, false);
    }

    function terms () {
      $terms = $this->model->terms();

      $this->view->page_title = $terms[0]['title'];
      $this->view->content = $terms[0]['content'];

      $this->view->render('site/content', 'Terms and Conditions', true, false);
    }

    function privacy () {
      $privacy = $this->model->privacy();

      $this->view->page_title = $privacy[0]['title'];
      $this->view->content = $privacy[0]['content'];

      $this->view->render('site/content', 'Privacy Statement', true, false);
    }

    function advertising() {
      $advertising = $this->model->advertising();

      $this->view->page_title = $advertising[0]['title'];
      $this->view->content = $advertising[0]['content'];

      $this->view->render('site/content', 'Advertising', true, false);
    }

    function cookies() {
      $cookies = $this->model->cookies();

      $this->view->page_title = $cookies[0]['title'];
      $this->view->content = $cookies[0]['content'];

      $this->view->render('site/content', 'Cookie Policy', true, false);
    }

    function help() {
      $help = $this->model->help();

      $this->view->page_title = $help[0]['title'];
      $this->view->content = $help[0]['content'];

      $this->view->render('site/content', 'Help', true, false);
    }

    function map() {

      //set filter parameters put any sensitive files and directorys
      //that should stay hidden in this array
      $filter = array(
        ".",
        "..",
        ".DS_Store",
        "BaseView.php",
        "error",
        "master",
        "index"
        );

      //Get all files from application/view directory with filtered array
      list($links, $dirs) = $this->model->map('application/view', $filter);

      //create new sitemap array
      $sitemap = array();

      //start a loop for each directory
      foreach($dirs as $dir){

        //create a multidimensional array with directory name handles
        $siteMap[$dir] = array();

          //create a loop of to loop through all page/files
          foreach($links as $link){
            //if the directory name doesnt appera in the string skip loop
            if (strpos($link,$dir) === false) continue;

            //trim the $link result
            $trimmed = str_replace("application/view", "", $link);
            $trim = str_replace(".php", "", $trimmed);
            $name = str_replace('/' . $dir . '/',"", $trim);

            //push the file name with no extension to the multidimensional array
            //where the directory match the files existance
            array_push($siteMap[$dir], $name);
          }
      }

      $this->view->siteMap = $siteMap;
      $this->view->render('site/map', 'Sitemap', true, false);
    }

    function contact() {
      $contact = $this->model->contact();

      $this->view->page_title = $contact[0]['title'];
      $this->view->content = $contact[0]['content'];

      $this->view->render('site/content', 'Contact', true, false);
    }
  }