<div class="basket-modal">
    <div class="overlay"></div>
    <div class="basket-modal__wrapper">
        <div>
            <div class="basket-modal__top">
                <div class="basket-modal__basket">{{ __('static.Корзина') }} <span id="basketCount"></span></div>
                <div class="basket-modal__close">
                    <span>{{ __('static.Закрыть') }}</span>
                    <img src="/frontend/images/icon/Modalcancel.svg" alt=""/>
                </div>
            </div>
            <div class="basket-modal__center" id="basketItems"></div>
        </div>

        <div class="basket-modal__bottom">
            <div class="basket-modal__totalprice">
                <div class="basket-modal__total">{{ __('static.Итого') }}:</div>
                <div class="basket-modal__price"><span id="basketSum"></span> {{ __('static.сум') }}</div>
            </div>

            <button class="btn btn-main">
                <span>{{ __('static.Заказать') }}</span>
            </button>

            <div class="basket-modal__text">
                {{ __('static.Отправьте ваш заказ нам и наш менеджер свяжется с вами') }}
            </div>
        </div>
    </div>
</div>


<script>
    let body = $('body'),
        basketModal = $('.basket-modal'),
        basketBtn = $('.basketBtn'),
        basketCount = $('#basketCount'),
        basketItems = $('#basketItems'),
        basketSum = $('#basketSum'),
        disabled = false;

    basketBtn.click(function () {
        loadBasketItems();
        basketModal.addClass('opened');
    });

    function loadBasketItems() {
        let cart = (JSON.parse(localStorage.getItem('cart')) || []);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('get-basket-items') }}',
            method: 'GET',
            dataType: 'json',
            data: {data: cart},
            success: function (data) {
                basketItems.empty().append(data.products_view);
                basketCount.text('[' + data.products_count + ']');
                basketSum.text(data.products_sum);
            },
            error: function (error) {
                console.log(error)
            },
            complete: function () {
                disabled = false
            }
        });
    }

    function updateQuantity(productId, newQuantity) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];


        if (newQuantity > 0) {
            // Find the product and update its quantity
            let product = cart.find(item => item.id === productId);

            if (product) {
                product.quantity = newQuantity;
                localStorage.setItem('cart', JSON.stringify(cart));
            }
        } else {
            removeFromCart(productId);
        }

        console.log('Quantity updated. Cart:', cart);
    }

    function removeFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Filter out the product with the given ID
        cart = cart.filter(item => item.id !== productId);

        // Save the updated cart back to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        console.log('Item removed. Updated cart:', cart);
    }

    function addToCart(productId) {
        // Check if there is an existing cart in localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product is already in the cart
        let existingProduct = cart.find(item => item.id === productId);

        if (existingProduct) {
            // If the product is already in the cart, update the quantity
            existingProduct.quantity += 1;
        } else {
            // If the product is not in the cart, add it with quantity 1
            cart.push({id: productId, quantity: 1});
        }

        // Save the updated cart back to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    body.on('click', '.addToBasket', function (e) {
        e.preventDefault();

        let productId = this.getAttribute('data-id');

        addToCart(productId);

        if (basketModal.hasClass('opened')) {
            loadBasketItems();
        } else {
            Swal.fire({
                position: "top-end",
                text: '@lang('static.success_added_to_basket')',
                showConfirmButton: false,
                timer: 1000
            })
        }
    });

    body.on('click', '.removeFromBasket', function (e) {
        e.preventDefault();

        let productId = this.getAttribute('data-id');

        removeFromCart(productId);
        loadBasketItems();
    });

    body.on('click', '.decrementFromBasket', function (e) {
        e.preventDefault();

        let productId = this.getAttribute('data-id'),
            cart_quantity = Number($(this).next().text()) - 1;

        updateQuantity(productId, cart_quantity);
        loadBasketItems();
    });

    body.on('click', '.basket-modal__close', function () {
        basketModal.removeClass('opened');
        basketItems.html('')
    });

    body.on('click', '.overlay', function () {
        basketModal.removeClass('opened');
        basketItems.html('')
    });
</script>
