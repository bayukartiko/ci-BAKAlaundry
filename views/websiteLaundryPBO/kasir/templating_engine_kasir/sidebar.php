<!-- Sidebar  -->
<nav id="sidebar">
	<div class="sidebar-header">
		<h3>BAKA Laundry</h3>
	</div>

	<ul class="list-unstyled components">
		<li>
			<a href="#profilSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<!-- <i class="fas fa-user-circle"></i> -->
				<img src="<?= base_url('assets/img/foto/') . $tb_user['foto']; ?>" alt="" srcset="" style="border-radius: 50%; width: 50px; height: 50px;">
				<?= $tb_user['nama']; ?>
				<p class="text-muted">Kasir</p>
			</a>
			<ul class="collapse list-unstyled" id="profilSubmenu">
				<li>
					<a href="<?php echo site_url('KasirControl/e_profil'); ?>">Ubah Profil</a>
				</li>
				<li>
					<a href="<?php echo site_url('KasirControl/e_password'); ?>">Ubah Password</a>
				</li>
				<li>
					<a href="<?php echo base_url('BAKAControl/logout'); ?>">Logout</a>
				</li>
			</ul>
		</li>
		<br>
		<li>
			<a href="<?php echo site_url('KasirControl/home'); ?>"><i class="fas fa-fw fa-home"></i> Home</a>
		</li>
		<li>
			<a href="<?php echo site_url('KasirControl/dashboard'); ?>"><i class="fas fa-fw fa-info"></i> Dashboard</a>
		</li>
		<li>
			<a href="<?php echo site_url('KasirControl/m_transaksi'); ?>"><i class="fas fa-fw fa-money-bill-wave"></i> Transaksi</a>
		</li>
		<li>
			<a href="<?php echo site_url('KasirControl/m_member'); ?>"><i class="fas fa-fw fa-users"></i>Manajemen Member</a>
		</li>
		<li>
			<a href="<?php echo site_url('KasirControl/laporan'); ?>"><i class="fas fa-fw fa-chart-line"></i> Laporan</a>
		</li>
	</ul>

	<ul class="list-unstyled tentang">
			<a href="<?php echo site_url('KasirControl/tentang'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-book"></i> Tentang Website ini</a>
		</li>
	</ul>
</nav>
