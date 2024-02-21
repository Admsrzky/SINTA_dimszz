<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Export -->
<script>
    $(document).ready(function() {
        $('#tabel-data').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });
    });
</script>

<script>
    $(document).on('click', '#btn-logout', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
            title: "Anda Yakin Ingin Logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Logout!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Logout!",
                    text: "Berhasil Logout, Silahkan Login Kembali.",
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                });
            }
        });
    })
</script>

<script>
    $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data Akan Dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Data Sudah Dihapus.",
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                });
            }
        });
    })
</script>


</body>
</html>