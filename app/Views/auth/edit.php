<?= view('template/header')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Data</h4>
                  <p class="card-description">
                   Satuan
                  </p>
                  <form class="forms-sample" action="/ubah/<?= $results[0]->user_id?>" method="POST">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Laboratorium</label>
                          <?php $selectedLab = $results[0]->lab_id; ?>
                            <select class="form-control" name="lab_id" required>
                                <option value="1" <?= ($selectedLab == '1') ? 'selected' : ''; ?>>Dasar</option>
                                <option value="2" <?= ($selectedLab == '2') ? 'selected' : ''; ?>>Menengah</option>
                                <option value="3" <?= ($selectedLab == '3') ? 'selected' : ''; ?>>Lanjut</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jabatan</label>
                          <select class="form-control" name="role" required>
                            <?php $selectedRole = $results[0]->role; ?>
                            <option value="Asisten" <?= ($selectedRole == 'Asisten') ? 'selected' : ''; ?>>Asisten</option>
                            <option value="Koordinator Asisten" <?= ($selectedRole == 'Koordinator Asisten') ? 'selected' : ''; ?>>Koordinator Asisten</option>
                            <option value="Sekretaris Asisten" <?= ($selectedRole == 'Sekretaris Asisten') ? 'selected' : ''; ?>>Sekretaris Asisten</option>
                            <option value="Bendahara Asisten" <?= ($selectedRole == 'Bendahara Asisten') ? 'selected' : ''; ?>>Bendahara Asisten</option>
                            <option value="Programmer" <?= ($selectedRole == 'Programmer') ? 'selected' : ''; ?>>Programmer</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label for="name">Nama Lengkap</label>
                          <input value="<?= $results[0]->name ?>" type="text" class="form-control" id="name" placeholder="El Rumi Davianto" name="name" required >
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="npm">NPM</label>
                          <input type="text" value="<?= $results[0]->npm ?>" class="form-control" id="npm" placeholder="12119740" name="npm" required>
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label for="ttl">Tempat Tanggal Lahir</label>
                          <input type="text" value="<?= $results[0]->ttl ?>" class="form-control" id="ttl" placeholder="Jakarta, 06 Oktober 2001" name="ttl" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="praktikum">Mata Kuliah Praktikum</label>
                          <input type="text" value="<?= $results[0]->praktikum ?>" class="form-control" id="praktikum" placeholder="Kognitif / Observasi" name="praktikum" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="period">Periode</label>
                          <input type="text" value="<?= $results[0]->period ?>" class="form-control" id="period" placeholder="ATA 2023/2024" name="period" required>
                        </div>
                      </div>
                    </div>                 

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="cert">Nomor Sertifikat</label>
                          <input type="text" value="<?= $results[0]->cert ?>" class="form-control" id="cert" placeholder="xxx" name="cert" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="sk">Nomor Surat Keterangan</label>
                          <input type="text" value="<?= $results[0]->sk ?>" class="form-control" id="sk" placeholder="xxx" name="sk" required>
                        </div>
                      </div>
                    </div>        

                    <button type="submit" class="btn btn-primary me-2" name="submit">Edit</button>
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