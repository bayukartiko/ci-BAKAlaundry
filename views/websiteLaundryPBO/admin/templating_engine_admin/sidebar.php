<!-- Sidebar  -->
<nav id="sidebar">
	<div class="sidebar-header">
		<h3>BAKA Laundry</h3>
	</div>

	<ul class="list-unstyled components">
		<li>
			<!-- <p>
				<img src="imgnotfound.png" alt="" srcset="" style="border-radius: 50%; width: 50px; height: 50px;">
				<i class="fas fa-user-circle"></i>
				Bayu Kartiko
				Administrator
			</p> -->
			<a href="#profilSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<!-- <i class="fas fa-user-circle"></i> -->
				<img src="<?= base_url('assets/img/foto/') . $tb_user['foto']; ?>" alt="" srcset="" style="border-radius: 50%; width: 50px; height: 50px;">
				<?= $tb_user['username']; ?>
				<p class="text-muted">Administrator</p>
			</a>
			<ul class="collapse list-unstyled" id="profilSubmenu">
				<li>
					<a href="<?php echo site_url('AdminControl/e_profil'); ?>">Ubah Profil</a>
				</li>
				<li>
					<a href="<?php echo site_url('AdminControl/e_password'); ?>">Ubah Password</a>
				</li>
				<li>
					<a href="<?php echo site_url('BAKAcontrol/logout'); ?>">Logout</a>
				</li>
			</ul>
		</li>
		<br>
		<li>
			<a href="AdminControl/dashboard"><i class="fas fa-fw fa-home"></i> Dashboard</a>
		</li>
		<li>
			<a href="#manajemenUserSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<i class="fas fa-fw fa-user"></i> Manajemen User</a>
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
			<a href="<?php echo site_url('AdminControl/m_laundry'); ?>"><i class="fas fa-fw fa-th-list"></i> Manajemen Laundry</a>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/m_outlet'); ?>"><i class="fas fa-fw fa-store"></i> Manajemen Outlet</a>
		</li>
		<li>
			<a href="<?php echo site_url('AdminControl/laporan'); ?>"><i class="fas fa-fw fa-chart-line"></i> Laporan</a>
		</li>
	</ul>

	<ul class="list-unstyled tentang">
			<a href="<?php echo site_url('AdminControl/tentang'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-book"></i> Tentang Website ini</a>
		</li>
	</ul>
</nav>
