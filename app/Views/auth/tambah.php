<?= view('template/header')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-8 grid-margin ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data</h4>
                  <p class="card-description">
                   Satuan
                  </p>
                  <form class="forms-sample" action="" method="POST">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Laboratorium</label>
                            <select class="form-control" name="lab_id" required>
                              <?php foreach ($result as $row): ?>
                                <option value="<?= $row['lab_id']?>"><?= $row['lab_name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jabatan</label>
                            <select class="form-control" name="role" required>
                                <option value="Asisten">Asisten</option>
                                <option value="Koordinator Asisten">Koordinator Asisten</option>
                                <option value="Sekretaris Asisten">Sekretaris Asisten</option>
                                <option value="Bendahara Asisten">Bendahara Asisten</option>
                                <option value="Programmer">Programmer</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label for="name">Nama Lengkap</label>
                          <input type="text" class="form-control" id="name" placeholder="El Rumi Davianto" name="name" required >
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="npm">NPM</label>
                          <input type="text" class="form-control" id="npm" placeholder="12119740" name="npm" required>
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label for="ttl">Tempat Tanggal Lahir</label>
                          <input type="text" class="form-control" id="ttl" placeholder="Jakarta, 06 Oktober 2001" name="ttl" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="praktikum">Mata Kuliah Praktikum</label>
                          <input type="text" class="form-control" id="praktikum" placeholder="Kognitif / Observasi" name="praktikum" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="period">Periode</label>
                          <input type="text" class="form-control" id="period" placeholder="ATA 2023/2024" name="period" required>
                        </div>
                      </div>
                    </div>                 

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="cert">Nomor Sertifikat</label>
                          <input type="text" class="form-control" id="cert" placeholder="xxx" name="cert" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="sk">Nomor Surat Keterangan</label>
                          <input type="text" class="form-control" id="sk" placeholder="xxx" name="sk" required>
                        </div>
                      </div>
                    </div>        

                    <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data</h4>
                  <p class="card-description">
                    Sekaligus
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="form-control p-2">
                    </div>
                    <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
          <?= view('template/footer')?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
   <?= view('template/script')?>