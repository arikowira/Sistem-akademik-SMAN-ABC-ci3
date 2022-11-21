<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ttd extends CI_Model {

Public function insert_single_signature($image,$where)
{
		$data=array(
			'ttd'=>$image
			);

		$this->db
		->where('id_walikelas',$where)
		->set('ttd', $data);
}
}