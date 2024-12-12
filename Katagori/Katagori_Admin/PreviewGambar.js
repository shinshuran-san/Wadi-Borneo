// Fungsi untuk menampilkan preview gambar yang dipilih
document.getElementById('gambar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; // Menampilkan gambar
        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagePreview').style.display = 'none'; // Menyembunyikan preview jika tidak ada gambar
    }
});