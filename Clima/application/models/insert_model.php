<?php if (!defined('BASEPATH')) OR exit('No direct script access allowed');

class insert_model extends CI_Model { 
  public function insertar_clima($clima){

   if ($this->bd->insert('mediciones',$clima))
      return true;
   else
      return false;
   
  }


}