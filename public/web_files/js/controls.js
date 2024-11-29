document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const alertContainer = document.getElementById('alert-container') || createAlertContainer();

    // Function to create and append the alert container dynamically if it doesn't exist
    function createAlertContainer() {
        const container = document.createElement('div');
        container.id = 'alert-container';
        container.style.marginTop = '20px';
        document.body.prepend(container);
        return container;
    }

    // Function to display alerts
    const showAlert = (message, type = 'info') => {
        const alertHTML = `
            <div class="alert mb-3 alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        alertContainer.innerHTML = alertHTML;

        // Auto-dismiss the alert after 5 seconds
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) alert.remove();
        }, 5000);
    };

    // Add to Cart
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', async () => {
            const productId = button.dataset.id;

            try {
                const response = await fetch(`http://localhost/ecommerce/zuli/cart/add`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ product_id: productId }),
                });

                const data = await response.json();
                showAlert(data.message, 'success');
            } catch (error) {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
            }
        });
    });
    // remove from cart
    document.querySelectorAll('.remove-from-cart').forEach(button => {
        button.addEventListener('click', async () => {
            const productId = button.dataset.id;

            try {
                const response = await fetch(`http://localhost/ecommerce/zuli/cart/remove`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ product_id: productId }),
                });

                const data = await response.json();
                showAlert(data.message, 'success');
                location.reload();
            } catch (error) {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
            }
        });
    });

     // Update Quantity
     document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('change', function () {
            const productId = this.closest('tr').querySelector('.remove-from-cart').dataset.id;
            const quantity = this.value;

            fetch('http://localhost/ecommerce/zuli/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ product_id: productId, quantity: quantity }),
            })
                .then(response => response.json())
                .then(data => {
                    showAlert(data.message, 'success');
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        });
    });

    //make order
    document.querySelector('.proceed-to-checkout').addEventListener('click', function () {
        fetch('http://localhost/ecommerce/zuli/cart/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    showAlert(data.message, 'success');
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Add to Wishlist
    document.querySelectorAll('.add-to-wishlist').forEach(button => {
        button.addEventListener('click', async () => {
            const productId = button.dataset.id;

            try {
                const response = await fetch(`http://localhost/ecommerce/zuli/wishlist/add`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ product_id: productId }),
                });

                const data = await response.json();
                if (response.ok) {
                    showAlert(data.message, 'success'); // Success message
                } else {
                    showAlert(data.message, 'faild'); // Already exists message
                }
            } catch (error) {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
            }
        });
    });

     // Remove from Wishlist
     document.querySelectorAll('.remove-from-wishlist').forEach(button => {
        button.addEventListener('click', async () => {
            const productId = button.dataset.id;

            try {
                const response = await fetch(`http://localhost/ecommerce/zuli/wishlist/remove`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ product_id: productId }),
                });

                const data = await response.json();
                if (response.ok) {
                    showAlert(data.message, 'success'); // Success message
                    location.reload();
                } else {
                    showAlert(data.message, 'faild'); // Already exists message
                }
            } catch (error) {
                console.log('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
            }
        });
    });


});
