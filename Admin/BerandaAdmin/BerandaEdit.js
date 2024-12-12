$(document).ready(function () {
    $('#saveButton').on('click', function (e) {
        e.preventDefault(); // Mencegah reload halaman

        const deskripsi = $('#Deskripsi').val(); // Ambil nilai deskripsi
        const wordCount = deskripsi.trim().split(/\s+/).length; // Hitung jumlah kata

        // Validasi jumlah kata
        if (wordCount > 500) {
            alert('Deskripsi tidak boleh lebih dari 500 kata!');
            return; // Hentikan proses jika validasi gagal
        }

        // Siapkan data untuk dikirim
        const formData = {
            Deskripsi: deskripsi,
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
