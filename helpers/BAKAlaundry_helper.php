<?php

	function cek_user_login(){
		$cek_login = get_instance();
		if(!$cek_login->session->userdata('is_active')){
			redirect('BAKAcontrol/aksi_login');
		}else{
			$role = $cek_login->session->userdata('role');
			$controller = $cek_login->uri->segment(1);

			$admin = 'AdminControl';
			$kasir = 'KasirControl';
			$owner = 'OwnerControl';

			if($role ==	'admin' && $controller != $admin){
				redirect('BAKAcontrol/block');
			}elseif($role == 'kasir' && $controller != $kasir){
				redirect('BAKAcontrol/block');
			}elseif($role == 'owner' && $controller != $owner){
				redirect('BAKAcontrol/block');
			}

		}
	}

?>
