<h1>POS</h1>

<div style="display: flex; gap: 50px;">
<div>
    <h2>Products</h2>
        <?php while($row = $products->fetch_assoc()): ?>
            <button onclick="addToCart(<?= $row['id'] ?>, '<?= $row['name']; ?>', <?= $row['price'] ?>)">
            <?= $row['name']; ?> - P <?= $row['price']; ?></button>
            <br><br>
            <?php endwhile; ?>
</div>

            <div>
                <h2>Cart</h2>
                <ul id="cart"></ul>
                <h3>Total: P <span id="total">0</h3>

                <button onclick="checkout()">Checkout</button>
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