$(document).ready(function () {
    $('#saveButton').on('click', function () {
        const username = $('#username').val().trim();
        const noTelpon = $('#no_telpon').val().trim();
        const gambar = $('#gambar')[0].files[0];

        // Validasi kolom kosong
        if (!username || !noTelpon ) {
            alert('Kolom username dan no telpon harus diisi!');
            setTimeout(() => {
                location.reload(); // Refresh halaman setelah pesan ditutup
            }, 2000);
            return;
        }

        // Validasi nomor telepon (harus 11 digit angka)
        if (!/^\d{11}$/.test(noTelpon)) {
            alert('Nomor telepon harus tepat 11 digit.');
            setTimeout(() => {
                location.reload(); // Refresh halaman setelah pesan ditutup
            }, 2000);
            return;
        }


        // Siapkan FormData untuk dikirim melalui AJAX
        const formData = new FormData();
        formData.append('username', username);
        formData.append('no_telpon', noTelpon);

        if (gambar) {
            formData.append('gambar', gambar);
        }

        // Kirim data melalui AJAX
        $.ajax({
            url: '', // Sesuaikan dengan URL tujuan
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#responseMessage').text('Data Berhasil Disimpan!').css('color', 'green');
                setTimeout(() => {
                    location.reload(); // Refresh halaman setelah berhasil menyimpan
                }, 2000);
            },
            error: function () {
                $('#responseMessage').text('Terjadi kesalahan saat menyimpan data.').css('color', 'red');
                setTimeout(() => {
                    location.reload(); // Refresh halaman setelah error
                }, 3000);
            }
        });
    });

    // Preview gambar saat diunggah
    $('#gambar').on('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
