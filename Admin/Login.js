document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');

    // Validasi input kosong
    form.addEventListener("submit", function (e) {
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (!email) {
            e.preventDefault(); // Mencegah pengiriman formulir
            alert("Mohon isi Email");
            return;
        }

        if (!password) {
            e.preventDefault(); // Mencegah pengiriman formulir
            alert("Silahkan masukan Password");
            return;
        }

        // Jika semua input terisi, formulir akan dikirim ke server
    });

    // Tampilkan pesan error jika ada parameter 'error' di URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("error") && urlParams.get("error") === "1") {
        alert("Maaf Email atau Password anda Salah");
    }

    // Redirect ke halaman Logins.php jika pengguna merefresh halaman
    if (performance.navigation.type === 1) {
        window.location.href = "Logins.php";
    }
});