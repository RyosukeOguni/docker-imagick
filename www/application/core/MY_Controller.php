<?php
class My_Controller extends CI_Controller
{
  protected $template;

  public function __construct()
  {
    parent::__construct();
    $this->smarty->template_dir = APPPATH . 'views/templates';
    $this->smarty->compile_dir  = APPPATH . 'views/templates_c';
    $this->template = 'layout.tpl';
    $this->load->helper('download');
  }

  public function view($template)
  {
    $this->template = $template;
  }

  public function _output($output)
  {
      if (strlen($output) > 0) {
          echo $output;
      } else {
          $this->smarty->display($this->template); 
      }
  }
  
  public function assign($name, $value, $nocache = FALSE)
  {
    $this->smarty->assign($name, $value, $nocache);
  }
}
