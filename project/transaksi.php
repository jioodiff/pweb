<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Transaksi</title>
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
      background-color: #000;
      color: white;
      margin: 0;
      padding: 20px;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }
    body.loaded {
      opacity: 1;
    }
    .container {
      max-width: 1715px;
      margin: auto;
      background: rgba(255, 255, 255, 0.05);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
    }
    h2 {
      text-align: center;
      color:rgb(255, 255, 255);
    }
    input, select {
      padding: 10px;
      width: 98.6%;
      margin: 10px 0;
      border: 1px solid #444;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }
    button {
      padding: 10px 20px;
      background-color:rgb(255, 0, 17);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }
    button:hover { background-color:#444; }
    table {
      width: 100%;
      margin-top: 15px;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #555;
      padding: 10px;
    }
    th { background: rgba(255, 255, 255, 0.1); }
    tr:hover { background-color: rgba(255, 255, 255, 0.05); cursor: pointer; }
    .form-buttons button { margin-right: 10px; }
    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 25px;
    }
  </style>
</head>
<body onload="document.body.classList.add('loaded')">
<div class="full-bg-wrapper">
  <img src="https://i.pinimg.com/736x/b5/1e/cd/b51ecd29b2da337f61fed572094be5c9.jpg" class="bg-image" alt="bg valorant" />
  <div class="bg-overlay"></div>
</div>
<div class="container">
  <h2>Daftar Transaksi</h2>

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
    <tbody id="dataBody"></tbody>
  </table>

  <form id="crudForm" style="display:none;">
    <input type="hidden" id="recordId" />
    <label>Riot ID:</label>
    <input type="text" id="riotIdInput" required />
    <label>Email:</label>
    <input type="email" id="emailInput" />
    <label>Item:</label>
    <input type="text" id="itemInput" required />
    <label>Jumlah:</label>
    <input type="number" id="jumlahInput" required />
    <label>Metode:</label>
    <input type="text" id="metodeInput" required />
    <label>Total Harga:</label>
    <input type="number" id="totalInput" required />
    <label>Tanggal:</label>
    <input type="date" id="tanggalInput" required />
    <label>Status:</label>
    <select id="statusInput" required>
      <option value="Pending">Pending</option>
      <option value="Paid">Paid</option>
      <option value="Cancelled">Cancelled</option>
    </select>
    <div class="form-buttons">
      <button type="submit">Simpan</button>
      <button type="button" onclick="deleteData()">Hapus</button>
      <button type="button" onclick="hideForm()">Batal</button>
    </div>
  </form>

  <div class="action-buttons">
    <button id="addBtn">Tambah Transaksi</button>
    <button id="logoutBtn">Logout</button>
  </div>
</div>

<script>
  const userEmail = localStorage.getItem("userEmail")
  const adminDataKey = "adminTransaksi"
  const dataBody = document.getElementById("dataBody")
  const crudForm = document.getElementById("crudForm")

  const recordId = document.getElementById("recordId")
  const riotIdInput = document.getElementById("riotIdInput")
  const emailInput = document.getElementById("emailInput")
  const itemInput = document.getElementById("itemInput")
  const jumlahInput = document.getElementById("jumlahInput")
  const metodeInput = document.getElementById("metodeInput")
  const totalInput = document.getElementById("totalInput")
  const tanggalInput = document.getElementById("tanggalInput")
  const statusInput = document.getElementById("statusInput")

  if (userEmail !== "admin@gmail.com") {
    alert("❌ Anda bukan admin. Akses ditolak.")
    document.body.classList.remove("loaded")
    setTimeout(() => window.location.href = "login.php", 300)
  }

  document.getElementById("addBtn").onclick = () => showForm()
  document.getElementById("logoutBtn").onclick = () => {
    localStorage.clear()
    document.body.classList.remove("loaded")
    setTimeout(() => window.location.href = "login.php", 300)
  }

  crudForm.onsubmit = function(e) {
    e.preventDefault()
    let transaksi = JSON.parse(localStorage.getItem(adminDataKey)) || []
    const id = recordId.value ? parseInt(recordId.value) : Date.now()

    const data = {
      id,
      riot_id: riotIdInput.value,
      email: emailInput.value || "-",
      item: itemInput.value,
      jumlah: parseInt(jumlahInput.value),
      metode: metodeInput.value,
      total: parseInt(totalInput.value),
      tanggal: tanggalInput.value,
      status: statusInput.value
    }

    if (recordId.value) {
      transaksi = transaksi.map(t => (t.id === id ? data : t))
    } else {
      transaksi.push(data)
    }

    localStorage.setItem(adminDataKey, JSON.stringify(transaksi))
    hideForm()
    loadData()
  }

  window.deleteData = function () {
    if (!confirm("Yakin ingin menghapus transaksi ini?")) return
    const id = parseInt(recordId.value)
    let transaksi = JSON.parse(localStorage.getItem(adminDataKey)) || []
    transaksi = transaksi.filter(t => t.id !== id)
    localStorage.setItem(adminDataKey, JSON.stringify(transaksi))
    hideForm()
    loadData()
  }

  window.hideForm = function () {
    crudForm.reset()
    crudForm.style.display = "none"
  }

  function showForm(data = null) {
    if (data) {
      recordId.value = data.id
      riotIdInput.value = data.riot_id
      emailInput.value = data.email
      itemInput.value = data.item
      jumlahInput.value = data.jumlah
      metodeInput.value = data.metode
      totalInput.value = data.total
      tanggalInput.value = data.tanggal
      statusInput.value = data.status
    } else {
      recordId.value = ""
      riotIdInput.value = ""
      emailInput.value = ""
      itemInput.value = ""
      jumlahInput.value = 1
      metodeInput.value = ""
      totalInput.value = 0
      tanggalInput.value = new Date().toISOString().split("T")[0]
      statusInput.value = "Pending"
    }
    crudForm.style.display = "block"
  }

  function loadData() {
    const transaksi = JSON.parse(localStorage.getItem(adminDataKey)) || []
    dataBody.innerHTML = ""
    if (transaksi.length === 0) {
      dataBody.innerHTML = `<tr><td colspan="9" style="text-align:center;">Belum ada transaksi.</td></tr>`
      return
    }

    transaksi.forEach(t => {
      const tr = document.createElement("tr")
      tr.innerHTML = `
        <td>${t.id}</td>
        <td>${t.riot_id}</td>
        <td>${t.email}</td>
        <td>${t.item}</td>
        <td>${t.jumlah}</td>
        <td>${t.metode}</td>
        <td>Rp${t.total.toLocaleString("id-ID")}</td>
        <td>${t.tanggal}</td>
        <td>${t.status}</td>
      `
      tr.onclick = () => showForm(t)
      dataBody.appendChild(tr)
    })
  }

  loadData()
</script>

</body>
</html>
