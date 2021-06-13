$(document).ready(function () {

//    var i = 0;
    var param = +$('.order').data('id');

    if (param == 0) {
        var step = $('.order__content').children();
        var orderStatus = $('.order__status').children();
        var i = 0;
        var nextButton = $('.forward-button');
        var prevButton = $('.back-button');
        var orderDescription = $('.order__description');
        var step2container = $('.second__container-actve');
        var step3container = $('.filling__container-actve');
        var step4price = $('.order__third-value');
        var showError = $('.error-container');
        var step5weightName = $('.order-weight-name');
        var step5weightValue = $('.order-weight-value');
        var orderMinWeightDesc = $('.order__min-weight-desc');
        var productType = ['солодощі', 'торти', 'капкейки', 'candybar', 'подарункові набори', 'дієтичні десерти'];

//    steps order
        var categoryItem;
        var step2Item;
        var step2ItemOwn;
        var productChosenItem;
        var fillingChosenItem;

//    values
        var categoryId;
        var step2Id;
        var orderWeight;
        var orderMinWeight;
        var candybarId;
        var productId;
        var productCatId;
        var fillingId;
        var totalPrice;
        var price;
        var customerName;
        var customerPhone;
        var orderToDate;
        var orderPrice;


//    order with params - from products




//    steps validator

//    function validateStep(param, message){
//        if(!param){
//            showError.html(message);
//            showError.show();
//        }
//    }
//    validateStep(5, 'asd');

        function checkErrors() {
            let param;
            let message;
            switch (i) {
                case 0:
                    param = categoryId;
                    message = 'Оберіть категорію.';
                    break;
                case 1:
                    param = productId;
                    message = 'Оберіть оформлення.';
                    break;
                case 2:
                    param = fillingId;
                    message = 'Оберіть начинку.';
                    break;
                case 4:
                    param = !step5errors;
                    message = step5errors;
                    break;
                default:
                    param = 100;
                    message = 'error';
            }
            if (!param) {
//            showError.html(message);
//            showError.show();
                showError.html(message);
                return false;
            } else {
//            showError.hide();
                showError.html('');
                return true;
            }

        }

        function calculateSum(price, orderWeight) {
            return price * orderWeight;
        }
        function scrollUp() {
            $('html, body').animate({scrollTop: 400}, 500);
        }
        function makeOrder() {
            nextButton.text('Підтвердити');
            nextButton.on('click', order);
        }
        function order() {
            orderPrice = orderPrice || tempPrice; //asd
            let params = {
                'product_id': productId,
                'filling_id': fillingId,
                'weight': orderWeight,
                'total_price': orderPrice,
                'date': orderToDate,
                'customer_name': customerName,
                'customer_phone': customerPhone,
            }
            $.post('/order/create', params, function (data) {

            });

        }
        function unMakeOrder() {
            nextButton.html('Далі');
            nextButton.off('click', order);
        }
        function noError() {
            return true;
        }
        function firstStep() {
            if (i === 0) {
                prevButton.css('visibility', 'hidden');
            } else {
                prevButton.css('visibility', 'visible');
            }
        }
        function descriptionPlus(param) {
            switch (param) {
                case 0:
                    orderDescription.html('Оберіть категорію замовлення');
                    break;
                case 1:
                    orderDescription.html('Оберіть оформлення на свій смак');
                    break;
                case 2:
                    orderDescription.html('Оберіть начинку серед наявних');
                    break;
                case 3:
                    orderDescription.html('Оберіть потрібну вагу Вашого замовлення');
                    break;
                case 4:
                    orderDescription.html("Заповніть інформацію для зворотнього зв'язку та дату видачі");
                    break;
                case 5:
                    orderDescription.html('Підтвердження замовлення');
                    break;
//            default:
//                alert('error');
            }
        }
        function statusPlus(param) {
            switch (param) {
                case 0:
//                $(orderStatus[0]).toggleClass('.first-active');
//                break;
                case 1:
                    $(orderStatus[0]).toggleClass('first-active');
                    $(orderStatus[0]).find('div').toggleClass('order__status-number-active');
                    $(orderStatus[1]).toggleClass('second_active');
                    $(orderStatus[1]).find('div').toggleClass('order__status-number-active');
                    break;
                case 2:
                    $('.products__card-order').css('visibility', 'hidden'); // min_weight hide
                    $(orderStatus[1]).toggleClass('second_active');
                    $(orderStatus[1]).find('div').toggleClass('order__status-number-active');
                    $(orderStatus[2]).toggleClass('third-active');
                    $(orderStatus[2]).find('div').toggleClass('order__status-number-active');
                    break;
                case 3:
                    $(orderStatus[2]).toggleClass('third-active');
                    $(orderStatus[2]).find('div').toggleClass('order__status-number-active');
                    $(orderStatus[3]).toggleClass('forth-active');
                    $(orderStatus[3]).find('div').toggleClass('order__status-number-active');
                    break;
                case 4:
                    $(orderStatus[3]).toggleClass('forth-active');
                    $(orderStatus[3]).find('div').toggleClass('order__status-number-active');
                    $(orderStatus[4]).toggleClass('fifth-active');
                    $(orderStatus[4]).find('div').toggleClass('order__status-number-active');
                    
                    break;
                case 5:
                    $(orderStatus[4]).toggleClass('fifth-active');
                    $(orderStatus[4]).find('div').toggleClass('order__status-number-active');
                    $(orderStatus[5]).toggleClass('sixth-active');
                    $(orderStatus[5]).find('div').toggleClass('order__status-number-active');
                    prepareOrder();
                    break;
//            default:
//                alert('error');
            }
        }

        prevButton.css('visibility', 'hidden');

        nextButton.on('click', function () {

//        if(i < step.length){
            if (checkErrors()) {
                if (step.length === (i + 2) && noError()) {
                    makeOrder();
                }
                $(step[i]).toggleClass('inactive-status');
                $(step[++i]).toggleClass('inactive-status');
//        }
                statusPlus(i);
                descriptionPlus(i);
                firstStep();
                scrollUp();
//            console.log(i);
            }
        });

        prevButton.on('click', function () {
            statusPlus(i);
            $(step[i]).toggleClass('inactive-status');
            $(step[--i]).toggleClass('inactive-status');
            checkErrors();
            firstStep();
            descriptionPlus(i);
            unMakeOrder();
            scrollUp();
//        console.log(i);
        });
//    1 - step
        $('.order-item').on('click', function () {
            if (categoryItem) {
                categoryItem.toggleClass('order__content-card-active');
            }
            categoryItem = $(this);
            $(this).toggleClass('order__content-card-active');
            categoryId = categoryItem.data('id1');
            if (categoryId == 3) {
                $(this).addClass('first_active');
                candybarId = $(this);
                categoryId = null;
            } else {
                if (candybarId) {
                    candybarId.removeClass('first_active');
                }
            }
            step2container.html('');
//        step3container();
        });

//    2 - step
        $('.card-second').on('click', function () {
            if (step2Item) {
                step2Item.toggleClass('order__content-card-active');
            }
            step2Item = $(this);
            $(this).toggleClass('order__content-card-active');
            step2Id = step2Item.data('id2');
            if (step2Id == 1) {
                if (categoryId != 3) {
                    $.post('/order/category', {
                        'categoryId': categoryId,
                    },
                            function (data) {
                                step2container.html(data);
                            });
                }
            }
            if (step2Id == 2) {
                $(this).addClass('second-active');
                step2ItemOwn = $(this);
                step2container.html('');
                if(categoryId == 1){
                    productId = -1;
                }
                if(categoryId == 2){
                    productId = -2;
                }
                 //
                fillingPagePrepare(productId, categoryId);
            } else {
                if (step2ItemOwn) {
                    step2ItemOwn.removeClass('second-active');
                }

            }
        });

        $('.order').on('click', '.products__cake-choose', function () {
            productId = $(this).data('id');
//        productCatId = $(this).data('cat_id');
            if (productChosenItem) {
                productChosenItem.toggleClass('product-chosen');
            }
            productChosenItem = $(this).parent().parent().find('.products__card-pic-wrapper');
            productChosenItem.toggleClass('product-chosen');

            fillingPagePrepare(productId);
//        $('.products__card-order').html('aosdhaoskdjasjdlas');
//        $('.products__card-order').css('visibility', 'hidden');
        });

//    3 - step
        function fillingPagePrepare(productId, productCatId = 0) {
            $.post('/order/filling', {
                'categoryId': categoryId,
                'productId': productId,
            }, function (data) {
                step3container.html(data);
            });

        }
        $(document).on('click', '.filling-order', function () {
            fillingId = $(this).data('id');
            if (fillingChosenItem) {
                fillingChosenItem.toggleClass('product-chosen');
            }
            fillingChosenItem = $(this);
            fillingChosenItem.toggleClass('product-chosen');

//        weight prepare

            orderMinWeight = +fillingChosenItem.parent().find('.product__card-weight-min').html();
//        console.log(orderMinWeight);
            $('.order__min-weight').text(orderMinWeight);
            
            $('.order-weight').text(orderMinWeight);
            orderWeight = orderMinWeight;

//        price prepare

            price = +$(this).parent().find('.filling-price').html();

            totalPrice = calculateSum(price, orderWeight);
//            console.log(totalPrice);
//            console.log(price);
//            console.log(orderWeight);
            $('.order-price').html(totalPrice);
            $('.order__content-filling').css('visibility', 'visible');
            if (categoryId == 1) {
                step5weightName.html('Вага');
                step5weightValue.html('Кг');
                orderMinWeightDesc.html('Кг');
            }
            if (categoryId == 2) {
                step5weightName.html('К-сть');
                step5weightValue.html('шт.');
                orderMinWeightDesc.html('шт');
            }
//        console.log(price);
//        console.log(orderWeight);
//        console.log(totalPrice);
        });
//    4 - step

//    orderMinWeight = +$('.order__min-weight').text();


        $('.order-choose').on('click', function () {
            if ($(this).hasClass('order-plus') && orderWeight <= orderMinWeight + 10) {
                ++orderWeight;
            }
            if ($(this).hasClass('order-minus') && orderWeight > orderMinWeight) {
                --orderWeight;
            }
            $('.order-weight').text(orderWeight);
            orderPrice = calculateSum(price, orderWeight);
            $('.order-price').html(orderPrice);
        });

//5 - step
        var step5errors = 'Заповніть форму зворотнього зв\'язку';
        var step5nameErrors = 'Введіть ваше ім\'я';
        var step5phoneErrors = 'Введіть номер телефону';
        var step5DateErrors = 'Оберіть дату';
        var tempPrice; //asd
        $('.order-name').on('change', function () {
            
            
        tempPrice = $('.order-price').html(); //asd
        tempPrice = +tempPrice;
        console.log(tempPrice);
        $('.order-value').html(tempPrice); //new calculate
            
            
            
            customerName = $(this).val();
            if (!customerName || customerName.length < 3) {
                step5nameErrors = 'Не коректно введене ім\'я';
            } else {
                step5nameErrors = false;
            }
            step5errors = step5nameErrors || step5phoneErrors || step5DateErrors;
        });
        $('.order-number').on('change', function () {
            customerPhone = $(this).val();
            if (!customerPhone || customerPhone.length !== 10) {
                step5phoneErrors = 'Не коректно введений контактний номер';
            } else {
                step5phoneErrors = false;
            }
            step5errors = step5nameErrors || step5phoneErrors || step5DateErrors;
        });
        $('.order-date').on('change', function () {
            orderToDate = $(this).val();
            if (!orderToDate) {
                step5DateErrors = 'Оберіть дату';
            } else {
                step5DateErrors = false;
            }
            step5errors = step5nameErrors || step5phoneErrors || step5DateErrors;
//            console.log(step5errors);
        });
        
        var orderCategory = $('.order-category-desc');
        var orderDecoration = $('.order-decoration-desc');
        var orderFilling = $('.order-filling-desc');
        var orderWeightTitle = $('.order-weight-desc');
        var orderPriceTitle = $('.order-price-desc');
        var orderCustomerInfo = $('.order-customer-desc');
        var orderDate = $('.order-date-desc');
        
        function prepareOrder(){
            orderCategory.html(productType[categoryId]);
            
            if(productId == -1 || productId == -2){
                orderDecoration.html('свій варіант');
            }else{
                let orderDecorationName = $('.product-container .product-chosen').parent().find('.products__cake-name').html();
                orderDecoration.html(orderDecorationName);
            }
            
            let orderFillingName = $('.filling-cards .product-chosen').parent().find('.products__card-name').html();
            orderFilling.html(orderFillingName);
            
            orderWeightTitle.html(orderWeight);
            
            orderPriceTitle.html(orderPrice);
            
            let customer = customerName + ', ' + customerPhone;
            console.log(customer);
            orderCustomerInfo.html(customer);
            
            orderDate.html(orderToDate);

        }
    }

});