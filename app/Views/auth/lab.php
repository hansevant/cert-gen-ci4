<?= view('template/header')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Anggota Laboratorium Psikologi</h4>
                  <div class="d-flex gap-2">
                    <div class="dropdown mb-4">
                      <button class="btn btn-md btn-warning dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Lab
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header">Laboratorium</h6>
                        <a class="dropdown-item" href="/lab/1">Dasar</a>
                        <a class="dropdown-item" href="/lab/2">Menengah</a>
                        <a class="dropdown-item" href="/lab/3">Lanjut</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/lab">Reset</a>
                      </div>
                    </div>
                    <a href="/clear" class="btn btn-outline-dark h-25"  onclick="return confirmDelete();">Hapus Semua</a>
                  </div>
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
                          <th style="width: 22%;">
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                        if($data){
                        foreach ($data as $row): ?>
                            <tr>
                            <td>
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
                                    <button type="button" class="btn btn-sm btn-success">Detail</button>
                                </a>
                                <a href="<?=base_url('sertif/'.$row->user_id)?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary">Sertif</button>
                                </a>
                                <a href="<?=base_url('surket/'.$row->user_id)?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary">Surket</button>
                                </a>
                                <a href="<?=base_url('hapus/'.$row->user_id)?>" onclick="return confirmDelete();">
                                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                </a>
                            </td>
                            </tr>
                        <?php endforeach; 
                        }else{
                          echo "<tr>                          
                            <td> No data
                          </td>
                          </tr> ";
                        }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
        <?php if(session()->getFlashdata('pesanmasuk')){?>
                  <script>alert("<?php echo session()->getFlashdata('pesanmasuk')?>")</script>
                <?php } ?>
        <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
          <?= view('template/footer')?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
   <?= view('template/script')?>