<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Transaksi</title>
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
      filter: brightness(0,6);
    }

    .bg-overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,1));
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #000;
      color: white;
      transition: opacity 0.5s ease-in-out;
      opacity: 0;
    }
    body.loaded {
      opacity: 1;
    }
    .container {
      max-width: 1715px;
      margin: 30px auto;
      padding: 20px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 10px;
    }
    h1 {
      text-align: center;
      color:rgb(255, 255, 255);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      border: 1px solid #444;
      text-align: left;
    }
    th {
      background-color: #222;
    }
    tr:hover {
      background-color: rgba(255, 255, 255, 0.05);
    }
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background: rgba(0, 0, 0, 0);
    }
    .top-left {
      font-size: 14px;
    }
    .top-right {
      display: flex;
      gap: 10px;
    }
    .auth-btn {
      padding: 8px 16px;
      background: rgb(255, 0, 0);
      border: 0px solid rgb(255, 0, 0);
      color: white;
      border-radius: 6px;
      cursor: pointer;
    }
    .auth-btn:hover {
      background:rgb(0, 0, 0, 0);
      color: white;
    }
  </style>
</head>
<body onload="document.body.classList.add('loaded')">
<div class="full-bg-wrapper">
  <img src="https://i.pinimg.com/736x/b5/1e/cd/b51ecd29b2da337f61fed572094be5c9.jpg" class="bg-image" alt="bg valorant" />
  <div class="bg-overlay"></div>
</div>
<div class="top-bar">
  <div id="userEmailDisplay" class="top-left"></div>
  <div class="top-right">
    <button id="backBtn" class="auth-btn">Kembali ke Topup</button>
    <button id="authButton" class="auth-btn">Logout</button>
  </div>
</div>

<div class="container">
  <h1>Riwayat Transaksi Anda</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Riot ID</th>
        <th>Email</th>
        <th>Item</th>
        <th>Jumlah</th>
        <th>Metode</th>
        <th>Total</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="transaksiBody"></tbody>
  </table>
</div>

<script>
  const userEmail = localStorage.getItem("userEmail");
  const transaksiBody = document.getElementById("transaksiBody");
  const emailDisplay = document.getElementById("userEmailDisplay");

  if (!userEmail) {
    alert("Silakan login terlebih dahulu untuk melihat riwayat transaksi.");
    document.body.classList.remove("loaded");
    setTimeout(() => {
      window.location.href = "login.php";
    }, 300);
  }

  emailDisplay.innerText = `👤 ${userEmail}`;

  document.getElementById("authButton").onclick = () => {
    if (confirm("Yakin ingin logout?")) {
      localStorage.clear();
      document.body.classList.remove("loaded");
      setTimeout(() => window.location.href = "login.php", 300);
    }
  };

  document.getElementById("backBtn").onclick = () => {
    document.body.classList.remove("loaded");
    setTimeout(() => window.location.href = "index.php", 300);
  };

  // Contoh data dummy dari localStorage
  const transaksi = JSON.parse(localStorage.getItem("riwayatTransaksi")) || [];

  if (transaksi.length === 0) {
    transaksiBody.innerHTML = '<tr><td colspan="9" style="text-align:center;">Belum ada transaksi.</td></tr>';
  } else {
    transaksi.forEach((t, i) => {
      transaksiBody.innerHTML += `
        <tr>
          <td>${i + 1}</td>
          <td>${t.riot_id}</td>
          <td>${t.email || '-'}</td>
          <td>${t.item}</td>
          <td>${t.qty}</td>
          <td>${t.metode || '-'}</td>
          <td>Rp${t.total.toLocaleString('id-ID')}</td>
          <td>${t.tanggal || '-'}</td>
          <td>${t.status || 'Selesai'}</td>
        </tr>
      `;
    });
  }
</script>

</body>
</html>
