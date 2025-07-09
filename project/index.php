<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Valorant Point Store</title>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-G_eLugz8Bc9tndFC"></script>
<style>
.full-bg-wrapper {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 1000px; /* Tinggi gambar background */
  overflow: hidden;
  z-index: -1;
}

.bg-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  filter: brightness(1);
}

.bg-overlay {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,1));
}

/* === BANNER PROMO OPSIONAL === */
.promo-banner {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  max-width: 500px;
  z-index: 2;
}

.hero-detail {
  margin-top: 380px;
  background: rgba(0, 0, 0, 0); /* Semakin kecil angkanya, makin transparan */
  padding: 30px 5%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  border-top: 0px solid #1a1a1a;
}

.hero-card {
  display: flex;
  align-items: center;
  gap: 20px;
  color: white;
  margin-bottom: 15px;
}

.hero-card img {
  width: 80px;
  border-radius: 10px;
  box-shadow: 0 0 8px rgba(255, 255, 255, 0.05);
}

.hero-card h1 {
  margin: 0;
  font-size: 24px;
  color: white;
}

.hero-card p {
  margin: 5px 0 0;
  font-size: 14px;
  color: #ccc;
}

.info-bar {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  color: white;
  font-size: 14px;
  font-weight: bold;
}

@media screen and (max-width: 768px) {
  .hero-detail {
    align-items: center;
    text-align: center;
  }

  .hero-card {
    flex-direction: column;
    align-items: center;
  }

  .info-bar {
    justify-content: center;
  }
}

/* === STYLE UTAMA WEBSITE === */
body {
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  background: #000;
  color: white;
}

.container {
  max-width: 1715px;
  margin: 0px auto;
  padding: 20px;
  background: rgba(0, 0, 0, 0);
  border-radius: 10px;
  z-index: 1;
  position: relative;
}

label,
input,
select,
.btn {
  display: block;
  width: 100%;
  box-sizing: border-box;
}

label {
  margin-top: 12px;
  font-weight: bold;
  color: #ccc;
}

input,
select {
  font-size: 15px;
  margin-top: 6px;
  margin-bottom: 15px;
  padding: 10px;
  border-radius: 6px;
  background-color: #1a1a1a;
  color: white;
  border: 1px solid #444;
  transition: border 0.3s ease;
}

input:focus,
select:focus {
  outline: none;
  border-color:rgba(255, 255, 255, 0.1);
}

.btn {
  padding: 12px 25px;
  background:rgb(255, 0, 0);
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
  font-weight: bold;
  transition: background 0.3s ease;
}

.btn:hover {
  background:rgb(37, 211, 102);
}

h1, h2 {
  text-align: center;
  color:rgb(255, 255, 255);
}

.product-options {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
}

.qty-wrapper {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: 6px;
  margin-bottom: 15px;
}

.qty-display {
  flex: 1;
  background-color: rgba(255, 255, 255, 0.1);
  padding: 10px;
  border: 1px solid #444;
  border-radius: 8px;
  text-align: left;
  color: white;
}

.qty-btn {
  font-size: 18px;
  padding: 10px 13px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  color: white;
}

.qty-btn.plus {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid #444;
  border-radius: 8px;
}

.qty-btn.plus:hover {
  background:rgba(255, 255, 255, 0.3);
}

.qty-btn.minus {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid #444;
  border-radius: 8px;

}
.qty-btn.minus:hover {
  background:rgba(255, 255, 255, 0.3);
}

.promo-wrapper {
  display: flex;
  gap: 10px;
  margin-top: 6px;
  margin-bottom: 10px;
  align-items: center;
}

.promo-wrapper input {
  flex: 1;
  height: 40px;
  padding: 0 15px;
  border-radius: 8px;
  background-color: rgba(255, 255, 255, 0.1);
  color: white;
  border: 1px solid #444;
  font-size: 14px;
  box-sizing: border-box;
}

.promo-wrapper input::placeholder {
  color: #bbb;
}

.promo-wrapper button {
  height: 40px;
  padding: 0 20px;
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid #444;
  border-radius: 8px;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
  box-sizing: border-box;
}

.promo-wrapper button:hover {
  background-color: rgba(255, 255, 255, 0.3);
}

.option-card {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px;
  border: 1px solid #444;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.1);
  cursor: pointer;
  transition: background 0.2s;
}

.option-card:hover {
  background: rgba(255, 255, 255, 0.3);
}

.option-image {
  width: 50px;
  height: 50px;
  object-fit: cover;
  border-radius: 6px;
}

.cart {
  margin-top: 20px;
  padding: 10px;
  border: 1px solid #666;
  border-radius: 6px;
  background: rgba(255, 255, 255, 0.05);
}

.cart-item {
  display: flex;
  justify-content: space-between;
  margin-bottom: 8px;
}

.cart-total {
  font-weight: bold;
  text-align: right;
  margin-top: 10px;
}

.deskripsi-box {
  background-color: rgba(255, 255, 255, 0.05); /* transparan keabu-an */
  padding: 25px 30px;
  border-radius: 12px;
  margin-top: 30px;
  color: white;
  max-width: 1657px;
  margin-left: auto;
  margin-right: auto;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.deskripsi-box h2 {
  color: gold;
  text-align: left;
  margin-bottom: 20px;
}

.deskripsi-box ol {
  padding-left: 20px;
  line-height: 1.8;
}

.deskripsi-box ol li {
  margin-bottom: 8px;
  font-size: 15px;
}

.tooltip {
  position: relative;
  display: inline-block;
  cursor: pointer;
  color: #ccc;
  margin-left: 5px;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 240px;
  background-color: #333;
  color: #fff;
  text-align: left;
  border-radius: 6px;
  padding: 8px 10px;
  position: absolute;
  z-index: 1;
  top: -5px;
  left: 110%;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.modal-content {
  background: #000;
  padding: 30px;
  border-radius: 10px;
  text-align: center;
  color: white;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
}

#paymentModal {
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.4s ease;
  z-index: 1000;
}

#paymentModal.show {
  opacity: 1;
  pointer-events: all;
}

.modal-content button {
  margin-top: 20px;
  padding: 10px 20px;
  background:rgb(255, 0, 21);
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

.modal-content button:hover {
  background:rgb(37, 211, 102);
  color: white;
  border: 0px solid rgb(37, 211, 102);
}

.modal-content button:disabled {
  background: #555;
  cursor: not-allowed;
}

.top-right {
  position: absolute;
  top: 20px;
  right: 20px;
}

.top-left {
  position: absolute;
  top: 20px;
  left: 20px;
  color: #ccc;
  font-size: 14px;
}

.auth-btn {
  padding: 8px 16px;
  background: rgb(255, 0, 21);
  border: 1px solid rgb(255, 0, 0);
  color: white;
  border-radius: 6px;
  cursor: pointer;
}

.auth-btn:hover {
  background:rgb(0, 0, 0, 0);
  color: white;
  border: 1px solid rgb(0, 0, 0, 0);
}

.fade-out {
  opacity: 0;
  transition: opacity 0.5s ease-out;
}

.help-float {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color:rgb(255, 0, 21);
  color: white;
  padding: 10px 16px;
  border-radius: 30px;
  cursor: pointer;
  font-size: 14px;
  font-weight: bold;
  z-index: 999;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: background 0.3s;
}

.help-float:hover {
  background-color:rgb(255, 0, 21);
}

.help-float img {
  width: 22px;
  height: 22px;
}

.help-popup {
  position: fixed;
  bottom: 80px;
  right: 20px;
  background: #1e1e1e;
  color: white;
  padding: 15px;
  border-radius: 10px;
  width: 220px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
  z-index: 999;
  opacity: 0;
  transform: translateY(20px);
  pointer-events: none;
  transition: all 0.3s ease;
}

.help-popup.show {
  opacity: 1;
  transform: translateY(0);
  pointer-events: all;
}

.help-popup h3 {
  margin: 0;
  font-size: 16px;
  color:rgb(255, 255, 255);
}

.help-popup a {
  text-decoration: none;
  background:rgb(37, 211, 102);
  color: white;
  padding: 10px;
  border-radius: 6px;
  text-align: center;
  font-weight: bold;
}

.help-popup button {
  background:rgb(255, 0, 21);
  border: none;
  color: white;
  padding: 8px;
  border-radius: 6px;
  cursor: pointer;
}

small {
  color: lightgreen;
}
</style>
</head>
<body>
<div class="full-bg-wrapper">
  <img src="https://i.pinimg.com/736x/b5/1e/cd/b51ecd29b2da337f61fed572094be5c9.jpg" class="bg-image" alt="bg valorant" />
  <div class="bg-overlay"></div>
</div>
<section class="hero-detail">
  <div class="hero-card">
    <img src="https://i.pinimg.com/736x/39/dc/66/39dc66a4fbaa85dcd12a49f216b60ead.jpg" alt="Logo Game">
    <div>
      <h1>VALORANT</h1>
      <p>Riot Games</p>
    </div>
  </div>
  <div class="info-bar">
    <span>⚡ Proses Cepat</span>
    <span>💬 Layanan Chat 24/7</span>
    <span>🔒 Pembayaran Aman!</span>
  </div>
</section>
</div>
<div class="header-banner"></div>  
<div class="top-left" id="userEmailDisplay"></div>
<div class="top-right" id="topRightButtons">
  <button id="authButton" class="auth-btn">Daftar / Login</button>
</div>

<div class="container">
  <label>Masukkan Data Akun<span class="tooltip">❓<span class="tooltiptext">Contoh: Sungjioo#2005</span></span></label>
  <input type="text" id="riotId" placeholder="Masukkan ID Valorant" />

  <label>Pilih Nominal</label>
  <div class="product-options" id="productList"></div>

  <label>Masukkan Jumlah Pembelian</label>
<div class="qty-wrapper">
  <div id="qtyBox" class="qty-display">1</div>
  <button id="plusBtn" class="qty-btn plus">+</button>
  <button id="minusBtn" class="qty-btn minus">−</button>
</div>

  <label for="promoCode">Masukkan Kode Promo</label>
<div class="promo-wrapper">
  <input type="text" id="promoCode" placeholder="Ketik Kode Promo Kamu">
  <button id="promoApplyBtn">Gunakan</button>
</div>
<small id="promoFeedback"></small>

<div id="cartBox" class="cart" style="display: none;">
  <h3>🛒 Pesanan Anda</h3>
  <div id="cartItems"></div>
  <div id="cartTotal" class="cart-total"></div>
</div>

  <button class="btn" id="pesanBtn">Pesan Sekarang</button>
</div>

<!-- Modal -->
<div id="paymentModal">
  <div class="modal-content">
    <h2>✅ Buat Pesanan</h2>
    <p id="orderDetails"></p>
    <button id="confirmPayBtn">Lanjutkan Pembayaran</button>
    <button id="cancelBtn">Batalkan</button>
  </div>
</div>

<!-- Bantuan -->
<div class="help-float" onclick="toggleHelpPopup()">
  <img src="https://cdn-icons-png.flaticon.com/512/4712/4712039.png" alt="CS" />
  Butuh Bantuan
</div>
<div class="help-popup" id="helpPopup">
  <h3>Chat CS</h3>
  <a href="https://wa.me/6289614247391" target="_blank">💬 Chat WhatsApp</a>
  <button onclick="toggleHelpPopup()">Tutup</button>
</div>

<!-- Cara Topup -->
<div class="deskripsi-box">
  <h2>Deskripsi Valorant</h2>
  <ol>
    <li>Masukkan Data Akun (Riot ID)</li>
    <li>Pilih Nominal Valorant Points</li>
    <li>Masukkan Jumlah Pembelian</li>
    <li>Tulis Kode Promo (jika ada)</li>
    <li>Klik <strong>"Pesan Sekarang"</strong> & lakukan pembayaran</li>
    <li>Produk otomatis masuk ke akun game Anda</li>
  </ol>
</div>

  <script>
  const imageURL = "https://i.pinimg.com/736x/23/ff/c5/23ffc5965f06b63d156e6d85cdea8e04.jpg";
  const productListDOM = document.getElementById('productList');
  const cartBox = document.getElementById('cartBox');
  const cartItemsDOM = document.getElementById('cartItems');
  const cartTotalDOM = document.getElementById('cartTotal');
  const qtyInput = document.getElementById('qtyInput');
  const modal = document.getElementById('paymentModal');
  const orderDetails = document.getElementById('orderDetails');
  const confirmPayBtn = document.getElementById('confirmPayBtn');
  const promoInput = document.getElementById('promoCode');
  const promoFeedback = document.getElementById('promoFeedback');
  let cart = [], promoAktif = false;

  function getProdukList() {
    const list = [
      { item: "475 VP", price: 57000 }, { item: "950 VP", price: 114000 },
      { item: "1000 VP", price: 124000 }, { item: "1475 VP", price: 170000 },
      { item: "2000 VP", price: 228000 }, { item: "2050 VP", price: 238000 },
      { item: "2525 VP", price: 285000 }, { item: "3050 VP", price: 342000 },
      { item: "3650 VP", price: 395000 }, { item: "4125 VP", price: 450000 }
    ];
    return promoAktif
    ? list.map(p => ({ item: p.item, price: Math.round(p.price * 0.9) })) // Diskon 10%
    : list;
  }

  function renderProduk() {
  const kode = promoInput.value.trim().toLowerCase();
  promoAktif = (kode === "mantap");
  promoFeedback.innerText = promoAktif ? "✅ Kode promo aktif! Diskon 10%" : "";

  const produkList = getProdukList();
  productListDOM.innerHTML = '';

  produkList.forEach(p => {
    const card = document.createElement('div');
    card.className = 'option-card';
    card.innerHTML = `<img src="${imageURL}" class="option-image" />
      <div><div>${p.item}</div><strong>Rp ${p.price.toLocaleString('id-ID')}</strong></div>`;

    card.onclick = () => {
      selectedProduct = p;
      cart = Array(qty).fill(selectedProduct);
      updateCart();
    };

    productListDOM.appendChild(card);
    });

    // Jika sebelumnya sudah pilih produk, update ulang dengan harga promo
    if (selectedProduct) {
      const produkBaru = produkList.find(p => p.item === selectedProduct.item);
      if (produkBaru) {
        selectedProduct = produkBaru;
        cart = Array(qty).fill(selectedProduct);
        updateCart();
      }
    }
  }


  // Gabungan tombol promo
  const promoApplyBtn = document.getElementById('promoApplyBtn');
  promoApplyBtn.onclick = () => {
    const kode = promoInput.value.trim().toLowerCase();
    if (kode === 'mantap') {
      promoAktif = true;
      promoFeedback.innerText = "✅ Kode promo aktif! Diskon 10%";
      } else {
        promoAktif = false;
        promoFeedback.innerText = "❌ Kode promo tidak valid.";
      }
      renderProduk(); // ini penting agar harga produk update otomatis
    };

  let qty = 1;
  const qtyBox = document.getElementById('qtyBox');
  const plusBtn = document.getElementById('plusBtn');
  const minusBtn = document.getElementById('minusBtn');

  plusBtn.onclick = () => {
  qty++;
  qtyBox.innerText = qty;
  if (selectedProduct) {
    cart = Array(qty).fill(selectedProduct);
    updateCart();
    }
  };

  minusBtn.onclick = () => {
    if (qty > 1) {
      qty--;
      qtyBox.innerText = qty;
      if (selectedProduct) {
        cart = Array(qty).fill(selectedProduct);
        updateCart();
      }
    }
  };

  function updateCart() {
  cartBox.style.display = cart.length ? 'block' : 'none';
  cartItemsDOM.innerHTML = '';
  
  if (cart.length) {
    const item = cart[0];
    const qty = cart.length;
    const subTotal = item.price * qty;
    const diskon = promoAktif ? Math.round(subTotal * 0.1) : 0;
    const total = subTotal - diskon;

    cartItemsDOM.innerHTML = `
      <div class="cart-item"><span>${item.item} x${qty}</span><span>Rp ${subTotal.toLocaleString('id-ID')}</span></div>
      ${promoAktif ? `<div class="cart-item"><span>Diskon 10%</span><span>- Rp ${diskon.toLocaleString('id-ID')}</span></div>` : ''}
    `;
    cartTotalDOM.innerText = 'Total: Rp ' + total.toLocaleString('id-ID');
    }
  }

  document.getElementById('pesanBtn').onclick = () => {
  const riotId = document.getElementById('riotId').value.trim();
  if (!riotId || cart.length === 0) return alert("Lengkapi data terlebih dahulu.");
  const item = cart[0], qty = cart.length, total = item.price * qty;
  orderDetails.innerText = `Username: ${riotId}\nItem: ${item.item}\nJumlah: ${qty}\nTotal: Rp${total.toLocaleString('id-ID')}`;
  modal.classList.add('show');
  confirmPayBtn.disabled = false;
  };

  confirmPayBtn.onclick = async () => {
  const riotId = document.getElementById('riotId').value.trim();
  const item = cart[0].item;
  const qty = cart.length;
  const price = cart[0].price;
  const total = price * qty;
  const email = localStorage.getItem("userEmail") || "guest@email.com";

  try {
    const res = await fetch('placeOrder.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        riot_id: riotId,
        email: email,
        item: item,
        qty: qty,
        price: price,
        total: total
      })
    });

    const result = await res.json();

    if (result.token) {
      snap.pay(result.token, {
        onSuccess: function(result) {
          alert("✅ Pembayaran berhasil!");
          window.location.href = 'riwayat.php';
        },
        onPending: function(result) {
          alert("⏳ Menunggu pembayaran...");
          window.location.href = 'riwayat.php';
        },
        onError: function(result) {
          alert("❌ Pembayaran gagal!");
        },
        onClose: function() {
          alert("⚠️ Pembayaran dibatalkan.");
        }
      });
    } else {
      alert("❌ Gagal mendapatkan token Midtrans.");
    }

    } catch (err) {
    console.error(err);
    alert("❌ Gagal memproses transaksi.");
    }
  };

  const style = document.createElement("style");
  style.innerHTML = `.fade-out { opacity: 0; transition: opacity 0.5s ease-out; }`;
  document.head.appendChild(style);
  document.getElementById('cancelBtn').onclick = () => modal.classList.remove('show');

  const authButton = document.getElementById('authButton');
  const topRightButtons = document.getElementById('topRightButtons');
  const isLoggedIn = localStorage.getItem('isLoggedIn');
  const userEmail = localStorage.getItem('userEmail');

  if (isLoggedIn === 'true' && userEmail) {
    authButton.innerText = "Logout";
    authButton.onclick = () => {
      if (confirm("Yakin ingin logout?")) {
        localStorage.clear();
        location.reload();
      }
    };
    const riwayatBtn = document.createElement('button');
    riwayatBtn.className = 'auth-btn';
    riwayatBtn.innerText = "Riwayat";
    riwayatBtn.onclick = () => window.location.href = "riwayat.php";
    topRightButtons.appendChild(riwayatBtn);
    document.getElementById('userEmailDisplay').innerText = `👤 ${userEmail}`;
  } else {
    authButton.innerText = "Daftar / Login";
    authButton.onclick = () => {
      document.body.classList.add('fade-out');
      setTimeout(() => {
        window.location.href = "login.php";
      }, 500);
    };
  }

  renderProduk();
</script>

<script>
  function toggleHelpPopup() {
    document.getElementById("helpPopup").classList.toggle("show");
  }
</script>

</body>
</html>
