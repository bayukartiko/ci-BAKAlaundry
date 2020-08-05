<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BAKAcontrol extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->view('websiteLaundryPBO/admin/index');
	}
	public function register(){
		$this->load->view('websiteLaundryPBO/admin/register');
	}
	public function home(){
		$this->load->view('websiteLaundryPBO/admin/home');
	}
	public function m_admin(){
		$this->load->view('websiteLaundryPBO/admin/m_admin');
	}
	public function m_kasir(){
		$this->load->view('websiteLaundryPBO/admin/m_kasir');
	}
	public function t_kasir(){
		$this->load->view('websiteLaundryPBO/admin/t_kasir');
	}
	public function m_owner(){
		$this->load->view('websiteLaundryPBO/admin/m_owner');
	}
	public function t_owner(){
		$this->load->view('websiteLaundryPBO/admin/t_owner');
	}
	public function m_laundry(){
		$this->load->view('websiteLaundryPBO/admin/m_laundry');
	}
	public function t_paket(){
		$this->load->view('websiteLaundryPBO/admin/t_paket');
	}
	public function m_outlet(){
		// $this->load->view('websiteLaundryPBO/admin/m_laundry');
	}
	public function laporan(){
		$this->load->view('websiteLaundryPBO/admin/laporan');
	}
	public function tentang(){
		$this->load->view('websiteLaundryPBO/tentang/tentang');
	}
}
