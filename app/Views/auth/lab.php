<?= view('template/header')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Anggota Laboratorium Psikologi</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Jabatan
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            Tempat Tanggal Lahir
                          </th>
                          <th>
                            Laboratorium
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                            <td class="py-1">
                                <?= $row->role?>
                            </td>
                            <td>
                                <?= $row->name?>
                            </td>
                            <td>
                                <?= $row->ttl?>
                            </td>
                            <td>
                                <?= $row->lab_name?>
                            </td>
                            <td>
                                <a href="<?=base_url('ubah/'.$row->user_id)?>">
                                    <button type="button" class="btn btn-sm btn-primary">Detail</button>
                                </a>
                                <a href="<?=base_url('cetak/'.$row->user_id)?>">
                                    <button type="button" class="btn btn-sm btn-primary">Cetak</button>
                                </a>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
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