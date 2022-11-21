<?php

class Ttd extends CI_Controller {


	public function index()
	{
		$data['title'] = 'Input Tanda Tangan';
		$this->load->view('templates_guru/header');
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/ttd', $data);
		$this->load->view('templates_guru/footer');
	}

	Public function insert_single_signature()
	{

	$img = $this->input->post('image');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = './assets/ttd/' . $this->session->userdata('id_guru') . '.png';
	$success = file_put_contents($file, $data);
	$image= str_replace('./','',$file);
	$where= array('id_guru' => $this->session->userdata('id_guru'));

    $this->m_ttd->insert_single_signature($image,$where);
	echo '<img src="'.base_url().$image.'">';
	}
	public function multiple()
	{
			$this->load->view('header');
		    $this->load->view('multiple_sign');
	}

	Public function get_multiple()
	{
	$img = $this->input->post('image');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$image=uniqid() . '.png';
	$file = './signature-image/' .$image;
	$success = file_put_contents($file, $data);


	$this->welcome_model->insert_signature($image);
	 echo '<img src="'.base_url().'signature-image/'.$image.'">';

	}
}
