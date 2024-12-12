// Ambil data dari server menggunakan Fetch API
fetch('BerandaKoneksi.php')
.then(response => response.json())
.then(data => {
    // Update konten dengan data dari server
    document.getElementById('description').innerText = data.Deskripsi;
    document.getElementById('image').src = 'Gambar/' + data.Gambar;
})
.catch(error => console.error('Error:', error));