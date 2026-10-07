let cart = [];

function addToCart(name, price) {
    cart.push({
        name: name,
        price: price
    });

    document.getElementById("cartCount").textContent = cart.length;

    alert(name + " себетке қосылды!");
}

function showCart() {
    if (cart.length === 0) {
        alert("Себет бос!");
        return;
    }

    let text = "Себет:\n\n";
    let total = 0;

    cart.forEach((item, index) => {
        text += (index + 1) + ". " + item.name + 
                " — " + item.price + " ₸\n";

        total += Number(item.price);
    });

    text += "\nЖалпы: " + total + " ₸";

    alert(text);
}