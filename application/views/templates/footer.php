<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Web Programming Unpas <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "<b>Logout</b>" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/') ?>vendor/sweetalert2/js/sweetalert2.all.min.js"></script>

<script>
    const deleteComponent = document.querySelectorAll('.delete')
    deleteComponent.forEach((dc) => {
        dc.addEventListener("click", () => {
            const dataid = dc.dataset.id;
            const data_name = dc.dataset.name;
            const base_url = dc.dataset.url;
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus <b>${data_name}</b>?`,
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5cb85c',
                confirmButtonText: `<i class="fas fa-trash"></i> Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `${base_url}/${dataid}`
                }
            })
        })
    })
</script>

</body>

</html>