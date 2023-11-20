<?= view('template/header')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">

                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4 justify-content-center">
            <h2 class="text-center">Selamat datang!</h2>
                <?php if(session()->getFlashdata('pesantambah')){?>
                  <script>alert("<?php echo session()->getFlashdata('pesantambah')?>")</script>
                <?php } ?>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
          <?= view('template/footer')?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
   <?= view('template/script')?>