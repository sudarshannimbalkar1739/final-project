cart = {};

function addToCart(name, price) {
    document.getElementById("cart").classList.remove("hidden");
    document.getElementById("cartTotalValue").value = total;

    if (cart[name]) {
        cart[name].qty++;
    } else {
        cart[name] = { name: name, price: price, qty: 1 };
    }

    renderCart();
}

function changeQty(name, type) {
    if (!cart[name]) return;

    if (type === "plus") {
        cart[name].qty++;
    } else {
        cart[name].qty--;
        if (cart[name].qty <= 0) {
            delete cart[name];
        }
    }

    renderCart();
}

function renderCart() {

    let cartItems = document.getElementById("cartItems");
    let cartTotal = document.getElementById("cartTotal");
    let cartData = document.getElementById("cartData");

    if (!cartItems || !cartData) return;

    let total = 0;
    cartItems.innerHTML = "";
    let output = [];

    for (let name in cart) {

        let item = cart[name];
        let itemTotal = item.price * item.qty;
        total += itemTotal;

        output.push(item.name + "|" + item.price + "|" + item.qty);

        cartItems.innerHTML += `
            <div class="cart-item">
                <span>${item.name} (₹${item.price})</span>
                <span>
                    <button type="button" onclick="changeQty('${item.name}', 'minus')">−</button>
                    ${item.qty}
                    <button type="button" onclick="changeQty('${item.name}', 'plus')">+</button>
                </span>
            </div>
        `;
    }

    cartTotal.innerText = total;
    cartData.value = output.join(",");
}