<div class="table-data__tool">
                                        <form class="table-data__tool-left" action="" method="">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="tahunAjaran">
                                                    <option value="" selected="selected">Tahun Ajaran</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--light rs-select2--sm">
                                                <select class="js-select2" name="semester">
                                                    <option value="" selected="selected">Semester</option>
                                                    <option value="ganjil">Ganjil</option>
                                                    <option value="genap">Genap</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--light rs-select2--sm">
                                                <select class="js-select2" name="kelas">
                                                    <option value="" selected="selected">Kelas</option>
                                                    <?php foreach ($kelas as $k){ ?>
                                                    <option value="<?php echo $k->nama_kelas ?>"><?php echo $k->nama_kelas ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <button class="au-btn-filter">
                                                <i class="zmdi zmdi-filter-list"></i>filter</button>
                                            <a class="btn btn-outline-success" href="<?php echo base_url('admin/FormBuatJadwal'); ?>">Buat Jadwal <i class="fas fa-arrow-right"></i> </a>
                                        </form>
                                    </div>
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Id Jadwal</th>
                                                    <th>Kelas</th>
                                                    <th>Ruangan</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Semester</th>
                                                    <th>Id Pelajaran</th>
                                                    <th>Nama Pelajaran</th>
                                                    <th>Hari</th>
                                                    <th>Jam Mulai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal as $jd) {?>
                                                <tr>
                                                    <td><?php echo $jd->id_jadwal; ?></td>
                                                    <td><?php echo $jd->kelas; ?></td>
                                                    <td><?php echo $jd->ruangan; ?></td>
                                                    <td><?php echo $jd->tahun_ajaran; ?></td>
                                                    <td><?php echo $jd->semester; ?></td>
                                                    <td><?php echo $jd->id_pelajaran; ?></td>
                                                    <td><?php echo $jd->nama_pelajaran; ?></td>
                                                    <td><?php echo $jd->hari; ?></td>
                                                    <td><?php echo $jd->jam_mulai; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>