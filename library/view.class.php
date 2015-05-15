<?php

class view {
    
   public $content;
   public $title;
   public $keywords;
   public $decription;
   public $template = 'default';

    function __construct() {
              
    }

    function setContent($name) {
        $this->content = $name;
    }
    
    function content(){
        require ($this->content);
    }
    
    function baseUrl($path){
       $basePath = BASEURL.'/'.$path;
       return $basePath;
    }
    
    function __destruct() {
        require(APPLICATION_PATH . 'templates/'.$this->template.'.phtml');
    }
}

?>
