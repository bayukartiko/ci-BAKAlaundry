<!-- Sidebar  -->
<nav id="sidebar">
	<div class="sidebar-header">
		<h3>BAKA Laundry</h3>
	</div>

	<ul class="list-unstyled components">
		<li style="margin-top: -20px; margin-bottom: -24px;">
			<!-- <p>
				<img src="imgnotfound.png" alt="" srcset="" style="border-radius: 50%; width: 50px; height: 50px;">
				<i class="fas fa-user-circle"></i>
				Bayu Kartiko
				Administrator
			</p> -->
			<a href="#profilSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-center custom-carets">
				<!-- <i class="fas fa-user-circle"></i> -->
				<img src="<?= base_url('assets/img/foto/') . $tb_user['foto']; ?>" alt="" srcset="" style="border-radius: 50%; width: 100px; height: 100px;"> <br>
				<?= $tb_user['nama']; ?> <br>
				<span class="text-muted">Administrator</span> <br>
				<span class="text-muted" style="font-size: 5px;">Semua Cabang</span>
			</a>
			<ul class="collapse list-unstyled" id="profilSubmenu">
				<li>
					<a href="<?php echo site_url('AdminControl/e_profil') ?>">Ubah Profil</a>
				</li>
				<li>
					<a href="<?php echo site_url('AdminControl/e_password'); ?>">Ubah Kata sandi</a>
				</li>
				<li>
					<a href="<?php echo site_url('BAKAcontrol/logout'); ?>" onclick="return confirm('yakin mau keluar ?')">Keluar</a>
				</li>
			</ul>
		</li>
		<br>
			<li>
				<a href="home"><i class="fas fa-fw fa-home"></i> Home</a>
			</li>
			<li>
				<a href="dashboard"><i class="fas fa-fw fa-info"></i> Dashboard</a>
			</li>
		<li>
			<a href="#manajemenUserSubmenu" type="button" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<i class="fas fa-fw fa-user-tie"></i> User
				<span class="caret"></span>
			</a>
			<ul class="collapse list-unstyled" id="manajemenUserSubmenu">
				<li>
					<a href="<?php echo site_url('AdminControl/m_admin'); ?>">Admin</a>
				</li>
				<li>
					<a href="<?php echo site_url('AdminControl/m_kasir'); ?>">Kasir</a>
				</li>
				<li>
					<a href="<?php echo site_url('AdminControl/m_owner'); ?>">Owner</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/m_member'); ?>"><i class="fas fa-fw fa-user-tag"></i> Pelanggan</a>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/m_laundry'); ?>"><i class="fas fa-fw fa-th-list"></i> Paket Laundry</a>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/m_outlet'); ?>"><i class="fas fa-fw fa-store"></i> Cabang toko</a>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/m_transaksi'); ?>"><i class="fas fa-fw fa-shopping-cart"></i> Transaksi</a>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/laporan'); ?>"><i class="fas fa-fw fa-chart-line"></i> Laporan</a>
		</li>
	</ul>

	<ul class="list-unstyled tentang">
		<li>
			<a href="<?php echo site_url('AdminControl/tentang'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-book"></i> Tentang Website ini</a>
		</li>
	</ul>
</nav>
