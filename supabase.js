<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Todo, Produk & Belanja</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1, h2 {
      color: #333;
      margin-bottom: 20px;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 600px;
      margin-bottom: 40px;
    }

    input[type="text"] {
      width: 70%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    #add-button {
      background-color: #4f46e5;
      color: #fff;
      margin-left: 10px;
    }

    #add-button:hover {
      background-color: #4338ca;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-top: 20px;
    }

    li {
      background: #f9fafb;
      margin-bottom: 10px;
      padding: 12px 16px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .todo-title {
      flex-grow: 1;
      margin-right: 12px;
    }

    .actions button {
      margin-left: 8px;
      padding: 6px 10px;
      font-size: 14px;
      border-radius: 6px;
    }

    .done-btn {
      background-color: #10b981;
      color: white;
    }

    .done-btn:hover {
      background-color: #059669;
    }

    .delete-btn {
      background-color: #ef4444;
      color: white;
    }

    .delete-btn:hover {
      background-color: #dc2626;
    }
  </style>
</head>
<body>

  <h1 id="salam">Selamat Datang!</h1>

  <div class="container">
    <h2>📝 Todo List</h2>
    <input type="text" id="todo-input" placeholder="Tulis todo baru...">
    <button id="add-button">Tambah</button>
    <ul id="todo-list"></ul>
  </div>

  <div class="container">
    <h2>🛍️ Produk Kami</h2>
    <ul id="product-list"></ul>
  </div>

  <div class="container">
    <h2>🧾 Ringkasan Belanja</h2>
    <ul id="cart-summary"></ul>
    <p id="total-price"><strong>Total Belanja: Rp0</strong></p>
  </div>

  <script type="module">
    import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm";

    // Gunakan URL & Key dari kamu
    const supabaseUrl = "https://blnighctpjsimkwzpnil.supabase.co";
    const supabaseKey = "process.env.SUPABASE_KEY"; // Gantilah dengan key asli jika ingin digunakan langsung
    const supabase = createClient(supabaseUrl, supabaseKey);

    // Salam otomatis
    const hour = new Date().getHours();
    let salam = "Selamat Malam";
    if (hour >= 5 && hour < 12) salam = "Selamat Pagi";
    else if (hour >= 12 && hour < 18) salam = "Selamat Siang";
    else if (hour >= 18 && hour < 21) salam = "Selamat Sore";
    document.getElementById("salam").textContent = `${salam}, Mahasiswa!`;

    // Todo Section
    const input = document.getElementById("todo-input");
    const addButton = document.getElementById("add-button");
    const todoList = document.getElementById("todo-list");

    async function loadTodos() {
      const { data, error } = await supabase
        .from("todos")
        .select("*")
        .order("id", { ascending: false });

      if (error) {
        alert("Gagal memuat todo: " + error.message);
        return;
      }

      todoList.innerHTML = "";
      data.forEach(todo => {
        const li = document.createElement("li");

        const titleSpan = document.createElement("span");
        titleSpan.className = "todo-title";
        titleSpan.textContent = `${todo.title} ${todo.is_complete ? "✅" : ""}`;

        const actions = document.createElement("div");
        actions.className = "actions";

        const doneBtn = document.createElement("button");
        doneBtn.className = "done-btn";
        doneBtn.textContent = todo.is_complete ? "Batal" : "Selesai";
        doneBtn.onclick = async () => {
          await supabase.from("todos").update({ is_complete: !todo.is_complete }).eq("id", todo.id);
          loadTodos();
        };

        const delBtn = document.createElement("button");
        delBtn.className = "delete-btn";
        delBtn.textContent = "Hapus";
        delBtn.onclick = async () => {
          await supabase.from("todos").delete().eq("id", todo.id);
          loadTodos();
        };

        actions.appendChild(doneBtn);
        actions.appendChild(delBtn);

        li.appendChild(titleSpan);
        li.appendChild(actions);
        todoList.appendChild(li);
      });
    }

    async function addTodo() {
      const title = input.value.trim();
      if (!title) {
        alert("Todo tidak boleh kosong!");
        return;
      }

      const { error } = await supabase.from("todos").insert([{ title }]);
      if (error) {
        alert("Gagal menambahkan todo: " + error.message);
        return;
      }

      input.value = "";
      loadTodos();
    }

    addButton.addEventListener("click", addTodo);
    loadTodos();

    // Produk & Belanja (mock data)
    const products = [
      { name: "Buku Tulis", price: 5000 },
      { name: "Pulpen", price: 3000 }
    ];

    const cart = [
      { name: "Buku Tulis", quantity: 2, price: 5000 },
      { name: "Pulpen", quantity: 3, price: 3000 }
    ];

    const productList = document.getElementById("product-list");
    const cartSummary = document.getElementById("cart-summary");
    const totalPrice = document.getElementById("total-price");

    function loadProducts() {
      products.forEach(product => {
        const li = document.createElement("li");
        li.textContent = `${product.name} - Rp${product.price.toLocaleString()}`;
        productList.appendChild(li);
      });
    }

    function loadCart() {
      let total = 0;
      cart.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.quantity} x ${item.name} @ Rp${item.price.toLocaleString()}`;
        cartSummary.appendChild(li);
        total += item.quantity * item.price;
      });
      totalPrice.textContent = `Total Belanja: Rp${total.toLocaleString()}`;
    }

    loadProducts();
    loadCart();
  </script>
</body>
</html>
