$(document).ready(function () {
    $('#saveButton').on('click', function (e) {
        e.preventDefault(); // Mencegah reload halaman
        const formData = {
            Nomor_Tlp: $('#Nomor-Tlp').val(),
            IG: $('#IG').val(),
            Email: $('#Email').val()
        };

        // Kirim data dengan AJAX
        $.ajax({
            url: '', // URL yang sama untuk memproses form
            method: 'POST',
            data: formData,
            success: function (response) {
                alert(response); // Menampilkan pesan dari server
            },
            error: function (xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            }
        });
    });
   });