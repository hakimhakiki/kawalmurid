<form action="" method="post">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="kelas" class="control-label mb-1">Kelas</label>
                                                    <select name="kelas" id="kelas" class="form-control">
                                                        <option value="">Pilih Kelas</option>
                                                        <?php foreach ($kelas as $k){ ?>
                                                        <option value="<?php echo $k->nama_kelas ?>"><?php echo $k->nama_kelas ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
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
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="semester" class="control-label mb-1">Semester</label>
                                                    <select name="semester" id="semester" class="form-control">
                                                        <option value="">Pilih Semester</option>
                                                        <option value="ganjil">Ganjil</option>
                                                        <option value="genap">Genap</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Ruangan</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Hari</th>
                                                    <th>Jam Mulai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <th>
                                                        <select class="form-control" name="ruangan">
                                                            <option value="">Pilih Ruangan</option>
                                                            <?php foreach ($ruangan as $ru) {?>
                                                            <option value="<?php echo $ru->id_ruangan;?>"><?php echo $ru->lokasi;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>