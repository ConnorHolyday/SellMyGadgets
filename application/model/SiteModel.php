<?php

  class SiteModel extends BaseModel {
    //create global varibles for map function, these are needed to be global
    //so that the function can push the results to the array on each loop
    //without overwritting the array contents
    public  $links = array();
    public  $dirs = array();

    function __construct() {
      parent::__construct();
    }

    function about() {
      $about = $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'about\'');

      return $this->db->execute_assoc_query($about);
    }

    function terms() {
      $terms = $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'terms\'');

      return $this->db->execute_assoc_query($terms);
    }

    function privacy() {
      $privacy =  $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'privacy\'');

      return $this->db->execute_assoc_query($privacy);
    }

    function advertising() {
      //$advertising =  $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'advertising\'');

      //return $this->db->execute_assoc_query($advertising);

      $advertising['title'] = 'Advertising';
      $advertising['content'] = '<p>Ads appearing on our site may be delivered to Users by advertising partners, who may set cookies. These cookies allow the ad server to recognise your computer each time they send you an online advertisement to compile non personal identification information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This privacy policy does not cover the use of cookies by any advertisers.</p><br><p>Some of the ads may be served by Google. Google\'s use of the DART cookie enables it to serve ads to Users based on their visit to our Site and other sites on the Internet. DART uses "non personally identifiable information" and does NOT track personal information about you, such as your name, email address, physical address, etc. You may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at <a href="http://www.google.com/privacy_ads.html">http://www.google.com/privacy_ads.html</a></p>';

      return $advertising;
    }

    function cookies() {
      $cookies =  $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'cookies\'');

      return $this->db->execute_assoc_query($cookies);
    }

    function help() {
      $help = $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'help\'');;

      //contact forms and details etc

      return $this->db->execute_assoc_query($help);
    }

    //detect all files in given directory and store in array
    //filter via an array filled with strings
    function map($dir, $filter) {
      $links = array();
      $dirs = array();

      foreach (scandir($dir) as $file) {
        //do not search files/folders in the filter varible
        //skip to end of loop if file is in the filter
        if(in_array($file, $filter)) continue;

        //if scanned item is a file push file name and directory to global array
        if(is_file($dir . '/' . $file)){
          array_push($this->links, $dir . '/' . $file);
        }

        //if scanned item is a folder push dir name to global array
        if(is_dir($dir . '/' . $file)) {
          array_push($this->dirs, $file);
          $this->map($dir . '/' . $file, $filter);
        }
      }

      //return an array of results and picked up via the list function in siteController.php
      return array($this->links, $this->dirs);
    }

    function contact(){
      $contact =  $this->db->prepare_select('title, content', 'site_content', 'active = 1 AND page = \'contact\'');

      return $this->db->execute_assoc_query($contact);

    }
  }
