document.addEventListener('DOMContentLoaded', () => {
    // Default ID_Admin = 1
    const adminId = 1;

    // Fetch data untuk admin pertama
    fetch(`getAdminDetails.php?ID_Admin=${adminId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update elemen dengan data admin ID 1
                document.getElementById('phone').href = `https://wa.me/+62${data.No_Telpon}`;
                document.getElementById('phone').textContent = data.No_Telpon ? `(+62) ${data.No_Telpon}` : 'Tidak tersedia';

                document.getElementById('ig').href = `https://instagram.com/${data.IG}`;
                document.getElementById('ig').textContent = data.IG ? `Follow Instagram (${data.IG})` : 'Tidak tersedia';

                document.getElementById('email').href = `mailto:${data.Email_Borneo}`;
                document.getElementById('email').textContent = data.Email_Borneo || 'Tidak tersedia';
            } else {
                alert('Data admin tidak ditemukan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memuat data admin');
        });
});


// Event listener untuk item admin
const adminItems = document.querySelectorAll('.admin-item');
adminItems.forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const adminId = this.dataset.id;

        // AJAX request untuk mendapatkan detail admin
        fetch(`getAdminDetails.php?ID_Admin=${adminId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('phone').href = `https://wa.me/+62${data.No_Telpon}`;
                    document.getElementById('phone').textContent = data.No_Telpon ? `(+62) ${data.No_Telpon}` : 'Tidak tersedia';

                    document.getElementById('ig').href = `https://instagram.com/${data.IG}`;
                    document.getElementById('ig').textContent = data.IG ? `Follow Instagram (${data.IG})` : 'Tidak tersedia';

                    document.getElementById('email').href = `mailto:${data.Email_Borneo}`;
                    document.getElementById('email').textContent = data.Email_Borneo || 'Tidak tersedia';
                } else {
                    alert('Data admin tidak ditemukan');
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
