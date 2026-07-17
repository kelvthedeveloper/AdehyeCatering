document.addEventListener('DOMContentLoaded', function() {
    // Add to cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const foodId = this.dataset.foodId;
            
            fetch('<?php echo URLROOT; ?>/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'food_id=' + foodId + '&csrf_token=<?php echo Helpers\Session::generateCsrfToken(); ?>'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Item added to cart!');
                } else {
                    alert('Error adding item to cart');
                }
            });
        });
    });
});
