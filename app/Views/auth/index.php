<?= view('template/header')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
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