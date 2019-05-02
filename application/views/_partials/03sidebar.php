<div class="col-md-2" style="padding: 1% 1% 1% 1%;">
					<aside class="list-group shadow-sm" style="width: 100%;">
						<a class="list-group-item list-group-item-action <?php if($selected=='dashboard') echo 'active'; ?>" href="#"><i class="fa fa-tachometer"></i> Dashboard</a>
						<a class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" href="#dropInput"><i class="fa fa-th-large"></i> Input Data</a>
						<div class="collapse" id="dropInput">
							<a class="list-group-item list-group-item-action" href="#"><i class="fa fa-chevron-right"></i> Absensi</a>
							<a class="list-group-item list-group-item-action" href="#"><i class="fa fa-chevron-right"></i> Sikap/perilaku</a>
							<a class="list-group-item list-group-item-action" href="#"><i class="fa fa-chevron-right"></i> Nilai Ujian</a>
						</div>
						<a class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" href="#dropData"><i class="fa fa-sitemap"></i> Data Master</a>
						<div class="collapse" id="dropData">
							<a class="list-group-item list-group-item-action <?php if($selected=='datasiswa') echo 'active'; ?>" href="#"><i class="fa fa-chevron-right"></i> Data Siswa</a>
							<a class="list-group-item list-group-item-action" href="#"><i class="fa fa-chevron-right"></i> Data Kelas</a>
							<a class="list-group-item list-group-item-action" href="#"><i class="fa fa-chevron-right"></i> Data Pelajaran</a>
						</div>
						<a class="list-group-item list-group-item-action" href="#"><i class="fa fa-bullhorn"></i> Contact Us</a>
					</aside>
				</div>