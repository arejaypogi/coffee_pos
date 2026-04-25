<?php 
require_once '../app/views/layouts/header.php';
?>

<h1 style="margin-bottom:20px;">Coffee POS System</h1>

<div style="display:flex; gap:20px;">

    <!-- PRODUCTS -->
    <div style="flex:1; background:#f9f9f9; padding:20px; border-radius:10px;">

        <h2 style="margin-bottom:15px;">Products</h2>

        <div style="display:flex; flex-wrap:wrap; gap:10px;">

            <?php while($row = $products->fetch_assoc()): ?>
                <button
                    onclick="addToCart(<?= $row['id'] ?>, '<?= $row['name']; ?>', <?= $row['price'] ?>)"
                    style="
                        padding:10px;
                        border:none;
                        background:#4CAF50;
                        color:white;
                        border-radius:8px;
                        cursor:pointer;
                        min-width:120px;
                    "
                >
                    <?= $row['name']; ?><br>
                    <small>P<?= $row['price']; ?></small>
                </button>
            <?php endwhile; ?>

        </div>

    </div>

    <!-- CART -->
    <div style="width:300px; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <h2>Cart</h2>

        <ul id="cart" style="list-style:none; padding:0; min-height:150px;"></ul>

        <hr>

        <h3>Total: P <span id="total">0</span></h3>

        <button onclick="checkout()"
                style="
                    width:100%;
                    padding:10px;
                    background:#2196F3;
                    color:white;
                    border:none;
                    border-radius:8px;
                    cursor:pointer;
                    margin-top:10px;
                ">
            Checkout
        </button>

    </div>

</div>

<script>
let cart = [];

function addToCart(id, name, price){

    let found = cart.find(item => item.id === id);

    if(found){
        found.qty++;
    } else {
        cart.push({ id, name, price, qty: 1 });
    }

    renderCart();
}

function renderCart() {
    let cartList = document.getElementById("cart");
    let total = 0;

    cartList.innerHTML = "";

    cart.forEach(item => {
        let li = document.createElement("li");

        li.innerText = item.name + " x " + item.qty;

        cartList.appendChild(li);

        total += item.price * item.qty;
    });

    document.getElementById("total").innerText = total;
}

function checkout() {

    fetch('index.php?url=orders/store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            cart: cart,
            total: cart.reduce((sum, item) => sum + item.price * item.qty, 0)
        })
    })
    .then(res => res.text())
    .then(data => {

        console.log("RESPONSE:", data);

        if(data && data !== "SUCCESS"){
            window.location.href = "index.php?url=orders/receipt&id=" + data;
        } else {
            alert("Order saved but no ID returned");
        }

    })
    .catch(err => {
        console.error("ERROR:", err);
        alert("Checkout failed");
    });
}


</script>