// Seleksi elemen dropdown
const dropdown = document.getElementById('dropdown');
const dropdownMenu = dropdown.querySelector('.dropdown-menu');
let hideTimeout;

// Fungsi untuk menampilkan dropdown menu
function showDropdown() {
    clearTimeout(hideTimeout); // Batalkan timer sebelumnya
    dropdownMenu.style.display = 'block';
}

// Fungsi untuk menyembunyikan dropdown menu setelah 3 detik
function hideDropdown() {
    hideTimeout = setTimeout(() => {
        dropdownMenu.style.display = 'none';
    }, 200); // 3000ms = 3 detik
}

// Event listener untuk mouseenter dan mouseleave
dropdown.addEventListener('mouseenter', showDropdown);
dropdown.addEventListener('mouseleave', hideDropdown);

