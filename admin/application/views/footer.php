 <!-- Content goes here -->
  
 <footer>
    <div class="bg-light py-3">
      <div>Copyright &copy; 2024. Amikom Yogyakarta</div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
  <script>new DataTable("#tabelku")</script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php if ($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success"); </script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error"); </script>
  <?php endif; ?>
</body>
</html>
