<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('_partials/header'); ?>
</head>
<body>
    <form action="<?php echo base_url('admin/FormBuatJadwal/save'); ?>" method="post" class="container">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="kelas" class="control-label mb-1">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas as $k){ ?>
                        <option value="<?php echo $k->id_kelas ?>"><?php echo $k->nama_kelas ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <?php 
                    $th_now = date("Y");
                    $th_next = $th_now + 1;
                    $_format = "". $th_now. "/". $th_next;
                    ?>
                    <label for="frag1" class="control-label mb-1">Tahun Ajaran</label>
                    <div class="row">
                        <div class="col-5">
                            <input id="frag1" name="frag1" type="number" onkeyup="ajaran()" onchange="ajaran()" inputmode="number" maxlength="4" class="form-control" value="<?php echo $th_now;?>">
                        </div>
                        <div class="col-1">/</div>
                        <div class="col-5">
                            <input id="frag2" name="frag2" type="text" disabled="disabled" class="form-control" value="<?php echo $th_next;?>">
                            <input type="hidden" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $_format; ?>">
                        </div>
                        <script type="text/javascript">
                            function ajaran () {
                                tahun1 = document.getElementById("frag1").value;
                                if(tahun1.length == 4){
                                    document.getElementById("frag2").value = parseInt(tahun1) + 1;
                                    document.getElementById("tahun_ajaran").value = tahun1 + '/' + document.getElementById("frag2").value;;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="semester" class="control-label mb-1">Semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="">Pilih Semester</option>
                        <option value="ganjil">Ganjil</option>
                        <option value="genap">Genap</option>
                    </select>
                </div>
            </div>
            <div class="col-3" style="margin-top: 30px;">
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="<?php echo base_url("admin/Jadwal");?>" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </form>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th class="text-left">No</th>
                    <th class="text-left">Ruangan</th>
                    <th class="text-left">Mata Pelajaran</th>
                    <th class="text-left">Hari</th>
                    <th class="text-left">Jam Mulai</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urutan = 0;
                if(is_array($data_list)){
                foreach ($data_list as $dl) {
                    $urutan = $urutan + 1;?>
                <tr>
                    <td><?php echo $urutan;?></td>
                    <td><?php echo $dl['idRuangan'];?></td>
                    <td><?php echo $dl['idPelajaran'];?></td>
                    <td><?php echo $dl['hari'];?></td>
                    <td><?php echo $dl['jamMulai'];?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#editModal<?php echo $dl['idj']; ?>" data-toggle="modal"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-secondary" href="<?php echo base_url('admin/FormBuatJadwal/deleteRow/'. $dl['idj']); ?>"><i class="fas fa-trash"></i></a>
                        <div class="modal fade" id="editModal<?php echo $dl['idj']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" align="left">
                                            <label for="id_jadwal" class="control-label mb-1">Id Jadwal</label>
                                            <input name="id_jadwal" id="id_jadwal" class="form-control" value="<?php echo $dl['idj']; ?>" disabled>
                                        </div>
                                        <div class="form-group" align="left">
                                            <label for="idRuangan" class="control-label mb-1">Ruangan</label>
                                            <select name="idRuangan" id="idRuangan" class="form-control">
                                                <option value="" <?php if($dl['idRuangan']==''){echo 'selected';}?>>---</option>
                                                <?php foreach ($ruangan as $r) { ?>
                                                <option value="<?php echo $r->id_ruangan; ?>" <?php if($dl['idRuangan']==$r->id_ruangan){echo 'selected';}?>><?php echo $r->lokasi;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" align="left">
                                            <label for="idPelajaran" class="control-label mb-1">Pelajaran</label>
                                            <select name="idPelajaran" id="idPelajaran" class="form-control">
                                                <option value="" <?php if($dl['idPelajaran']==''){echo 'selected';}?>>---</option>
                                                <?php foreach ($pelajaran as $p) { ?>
                                                <option value="<?php echo $p->id_pelajaran; ?>" <?php if($dl['idPelajaran']==$p->id_pelajaran){echo 'selected';}?>><?php echo $p->nama_pelajaran;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" align="left">
                                            <label for="hari" class="control-label mb-1">Hari</label>
                                            <input name="hari" id="hari" class="form-control" value="<?php echo $dl['hari'];?>">
                                        </div>
                                        <div class="form-group" align="left">
                                            <label for="jamMulai" class="control-label mb-1">Jam Mulai</label>
                                            <input type="time" name="jamMulai" id="jamMulai" class="form-control" value="<?php echo $dl['jamMulai'];?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php }}?>
                <tr>
                    <form method="post" action="<?php echo base_url("admin/FormBuatJadwal/addRow") ?>">
                        <td><?php echo $urutan+1; ?></td>
                        <td>
                            <select class="form-control" name="ruangan">
                                <option value="">Pilih Ruangan</option>
                                <?php foreach ($ruangan as $ru) {?>
                                <option value="<?php echo $ru->id_ruangan;?>"><?php echo $ru->lokasi;?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="pelajaran">
                                <option value="">Pilih Pelajaran</option>
                                <?php foreach ($pelajaran as $pl) {?>
                                <option value="<?php echo $pl->id_pelajaran;?>"><?php echo $pl->nama_pelajaran;?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="hari">
                                <option value="">Pilih Hari</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                            </select>
                        </td>
                        <td>
                            <input type="time" name="jam" class="form-control" min="00:00" max="23:59" value="07:00" />
                        </td>
                        <td>
                            <button class="btn btn-sm btn-secondary" type="submit">Simpan Sementara</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>

    <?php $this->load->view('_partials/footer'); ?>
</body>
</html>