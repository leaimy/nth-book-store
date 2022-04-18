

window.addEventListener('DOMContentLoaded', function () {
    var submit_delete = Array.from(document.querySelectorAll('a[id^="submit-delete-"]'));

    for (const item of submit_delete) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            var product_id = e.target.dataset.id;

            var formData = new FormData();

            formData.append('product_id', product_id);

            fetch("/api/v1/cart/delete", {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(result => {
                    var product_cart = document.getElementById('cart-product-' + product_id);
                    var p_cart = document.getElementById('cart-p-' + product_id);
                    var pt_cart = document.getElementById('cart-pt-' + product_id);
                    var subtotal = document.getElementById('subtotal');
                    var total = document.getElementById('total');
                    var stotal = document.getElementById('stotal');
                    var count = document.getElementById('count');
                    var ct = document.getElementById('ct');
                    
                    if (subtotal) subtotal.innerHTML = result.total + "VND";
                    if (total) total.innerHTML = result.total + "VND";
                    if (stotal) stotal.innerHTML = result.total + "VND";
                    if (count) count.innerHTML = result.count;
                    if (ct) ct.innerHTML = result.count;

                    if (product_cart) product_cart.remove();
                    if (p_cart) p_cart.remove();
                    if (pt_cart) pt_cart.remove();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })
    }
});