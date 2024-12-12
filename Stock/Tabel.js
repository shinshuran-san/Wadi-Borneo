document.querySelectorAll('.table-item').forEach(item => {
    item.addEventListener('click', function () {
        // Remove 'active' class from all categories
        document.querySelectorAll('.table-item').forEach(el => el.classList.remove('active'));

        // Add 'active' class to the clicked category
        this.classList.add('active');

        const category = this.getAttribute('data-table'); // Get category name
        loadProductData(category);
    });
});

function loadProductData(category) {
    fetch('product_table.php?table=' + category)  // Fetch products based on the category
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            productList.innerHTML = ''; // Clear previous content

            if (data.length === 0) {
                productList.innerHTML = `<li class="faq-item">Data produk tidak ditemukan untuk kategori ini.</li>`;
                return;
            }

            data.forEach(product => {
                const listItem = document.createElement('li');
                listItem.className = 'faq-item';
                listItem.innerHTML = `
                    <span>${product.nama_produk}</span>
                    <div class="counter-box">
                        <button class="button" onclick="decrement(this)">-</button>
                        <input type="text" class="count" value="${product.stok}" data-name="${product.nama_produk}" />
                        <button class="button" onclick="increment(this)">+</button>
                    </div>
                `;
                productList.appendChild(listItem);
            });
        })
        .catch(error => {
            console.error('Error:', error);
            const productList = document.getElementById('product-list');
            productList.innerHTML = `<li class="faq-item">Terjadi kesalahan saat memuat data produk.</li>`;
        });
}

function decrement(button) {
    const input = button.nextElementSibling;
    const currentValue = parseInt(input.value) || 0;
    if (currentValue > 0) {
        input.value = currentValue - 1;
    }
}

function increment(button) {
    const input = button.previousElementSibling;
    const currentValue = parseInt(input.value) || 0;
    input.value = currentValue + 1;
}

// Save function to send stock data to the server
document.getElementById('save-button').addEventListener('click', function () {
    const activeCategory = document.querySelector('.table-item.active');
    if (!activeCategory) {
        alert('Pilih kategori terlebih dahulu!');
        return;
    }

    const category = activeCategory.getAttribute('data-table');
    const inputs = document.querySelectorAll('#product-list .count');
    const updatedData = Array.from(inputs).map(input => {
        const stock = parseInt(input.value);
        return {
            nama_produk: input.getAttribute('data-name'),
            stok: isNaN(stock) || stock < 0 ? 0 : stock, // Validate stock value
        };
    });

    // Send updated data to the server
    fetch('save_stock.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ category: category, products: updatedData })
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            alert('Data stok berhasil disimpan!');
        } else {
            alert('Gagal menyimpan data: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan data.');
    });
});
