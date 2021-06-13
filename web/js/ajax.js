(function ($) {
    var categoryId = 0;
    var activeButton = null;
    var limit = 0;

    $('.filling-filter').on('click', function () {
        if (categoryId !== $(this).data('category')) {
            categoryId = $(this).data('category');
            let container = $('.filling-cards');
            let obj = {
                'categoryId': categoryId,
            };

            if (activeButton !== null) {
                activeButton.toggleClass('products__filter-buttons-active');
            }
            activeButton = $(this).parent();
            activeButton.toggleClass('products__filter-buttons-active');

            $.post('/filling/filter', obj, function (data) {
                if (data.success) {

                    let out = '';
                    data.items.forEach(function (item) {
                        let itemQuantName = (+item.category_id == 4) ? 'шт' : 'кг';
                        out += '<div class="products__card filling-card"><div class="products__card-pic-wrapper">';
                        out += '<img src=' + item.image + ' alt="filling" class="products__card-pic">';
                        out += '<div class="products__card-active"><h3 class="producrs__card-desc-title">' + item.name + '</h3>';
                        out += '<p class="products__card-desc-content">' + item.description + '</p>';
                        out += '</div></div><p class="products__card-name">' + item.name + '</p>';
                        out += '<div class="products__card-info"><span class="products__card-price">' + item.price + ' грн/' + itemQuantName + '</span>';
                        out += '<span class="products__card-order">від ' + item.min_weight + ' ' + itemQuantName + '.</span></div></div>';
                    });
                    container.html(out);
                }
            });
        }

    });

    $(document).on('click', '.filling-more', function () {
        let initialLimit = $(this).data('initial_limit');
        let fillingCatId = $(this).data('filling_cat'); //
        let fillingOrder = $(this).data('filling_order');
        console.log(categoryId);
        if (fillingCatId) {   //
            categoryId = fillingCatId;//
            console.log(categoryId);

        }//
//        if($(this).hasData('filling_cat')){
//            $(this).data('filling_cat') = 1;
//        }
        initialLimit = +initialLimit;
        limit = limit + initialLimit;
        if (limit == initialLimit) {
            limit = limit * 2;
        }

        let container = $('.filling-cards');

        let obj = {
            'categoryId': categoryId,
            'limit': limit,
        };
        $.post('/filling/filter', obj, function (data) {
            if (data.success) {
                let out = '';
                data.items.forEach(function (item) {
                    let itemQuantName = (item.category_id == 4) ? 'шт' : 'кг';
                    if (fillingOrder == 1) {
                        out += '<div class="products__card filling-card"><div class="products__card-pic-wrapper filling-pointer filling-order" data-id="' + item.id + '">';
                    } else {
                        out += '<div class="products__card filling-card"><div class="products__card-pic-wrapper">';
                    }
                    out += '<img src=' + item.image + ' alt="filling" class="products__card-pic">';
                    out += '<div class="products__card-active"><h3 class="producrs__card-desc-title">' + item.name + '</h3>';
                    out += '<p class="products__card-desc-content">' + item.description + '</p>';
                    out += '</div></div><p class="products__card-name">' + item.name + '</p>';
                    out += '<div class="products__card-info"><span class="products__card-price"><span class="filling-price">' + item.price + '</span> грн/' + itemQuantName + '</span>';
                    if (fillingOrder == 1) {
                        out += '<span class="products__card-order" style="visibility: hidden;">від <span class="product__card-weight-min">' + item.min_weight + '</span> ' + itemQuantName + '.</span></div></div>';
                    } else {
                        out += '<span class="products__card-order">від ' + item.min_weight + ' ' + itemQuantName + '.</span></div></div>';
                    }


                });
                container.html(out);
            }
        });

    });

}(jQuery));

(function ($) {

    var categoryId = 0;
    var activeButton = null;
    var limit = 0;

    $(document).on('click', '.products_only .product-filter', function () {
        if (categoryId !== $(this).data('category')) {
            categoryId = $(this).data('category');
            let container = $('.product-container');
            let typeId = $(this).parent().parent().data('type');
            let productLink = $(this).data('link');
            let obj = {
                'categoryId': categoryId,
                'typeId': typeId,
            };

            if (activeButton !== null) {
                activeButton.toggleClass('products__filter-buttons-active');
            }
            activeButton = $(this).parent();
            activeButton.toggleClass('products__filter-buttons-active');

            $.post('/product/filter', obj, function (data) {
                if (data.success) {
                    let out = '';

                    data.items.forEach(function (item) {
                        out += '<div class="products__card"><div class="products__card-pic-wrapper">';
                        out += '<img src=' + item.image + ' alt=' + item.name + ' class="products__card-pic image">';
                        out += '<div class="products__card-zoom"></div></div><div class="products__card-cake-info">';
                        out += '<span class="products__cake-name">' + item.name + '</span>';
                        if (productLink == 1) {
                            out += '<a href="/order/index?id=' + item.id + '" class="products__cake-choose" data-id=' + item.id + '>Обрати</a></div></div>';
                        } else {
                            out += '<span class="products__cake-choose" data-id=' + item.id + '>Обрати</span></div></div>';
                        }
                    });

                    container.html(out);
                } else {
                    container.html('<h3 style="text-align:center; width:300px; font-size:16px;">В даній категорії продукти відсутні</h3>');
                }
            });
        }
    });

    $(document).on('click', '.product-more', function () {
        let initialLimit = $(this).data('initial_limit');
        initialLimit = +initialLimit;
        limit = limit + initialLimit;
        let productLink = $(this).data('link');
        if (limit == initialLimit) {
            limit = limit * 2;
        }
        let container = $('.product-container');
        let typeId = $('.products__filter').data('type');
        let obj = {
            'typeId': typeId,
            'categoryId': categoryId,
            'limit': limit,
        };
        $.post('/product/filter', obj, function (data) {
            if (data.success) {
                let out = '';
                data.items.forEach(function (item) {
                    out += '<div class="products__card"><div class="products__card-pic-wrapper">';
                    out += '<img src=' + item.image + ' alt=' + item.name + ' class="products__card-pic image">';
                    out += '<div class="products__card-zoom"></div></div><div class="products__card-cake-info">';
                    out += '<span class="products__cake-name">' + item.name + '</span>';
                    if (productLink == 1) {
                        out += '<a href="/order/index?id=' + item.id + '" class="products__cake-choose" data-id=' + item.id + '>Обрати</a></div></div>';
                    } else {
                        out += '<span class="products__cake-choose" data-id=' + item.id + '>Обрати</span></div></div>';
                    }
                });
                container.html(out);
            }
        });
    });

    $(document).on('click', '.product-pp-deserts', function () {
        let desertsContainer = $('.products__content');
        let categoryItem = $('.products__filter');
        let typeId = categoryItem.data('type');

        let initialLimit = $(this).data('initial_limit');
        initialLimit = +initialLimit;
        limit = limit + initialLimit;
        if (limit == initialLimit) {
            limit = limit * 2;
        }


        let categoryIdItem = $('.products__filter-buttons-active span');
        let categoryId = categoryIdItem.data('category') || 0;
        $.post('/product/deserts', {
            'typeId': typeId,
            'categoryId': categoryId,
            'limit': limit,
        }, function (data) {
            desertsContainer.html(data);
        });
    });

    $(document).on('click', '.candybar-filter-item .candybar-filter', function () {
        let desertsContainer = $('.products__content');
        let categoryItem = $('.products__filter');
        let typeId = categoryItem.data('type');

        if (activeButton !== null) {
            activeButton.toggleClass('products__filter-buttons-active');
        }
        activeButton = $(this).parent();
        activeButton.toggleClass('products__filter-buttons-active');
//        let initialLimit = $(this).data('initial_limit');
//        initialLimit = +initialLimit;
//        limit = limit + initialLimit;
//        if(limit == initialLimit){
//            limit = limit * 2;
//        }


//        let categoryIdItem = $('.products__filter-buttons-active span');
        let categoryId = $(this).data('category') || 0;
        $.post('/product/deserts', {
            'typeId': typeId,
            'categoryId': categoryId,
//            'limit' : limit,
        }, function (data) {
            desertsContainer.html(data);
        });
    });

    $(document).on('click', '.candybar-more', function () {
        let candybarContainer = $('.products__content');
        let categoryId = $(this).data('category_id');

        let initialLimit = $(this).data('initial_limit');
        initialLimit = +initialLimit;
        limit = limit + initialLimit;
        if (limit == initialLimit) {
            limit = limit * 2;
        }

        $.post('/candybar/more', {
            'categoryId': categoryId,
            'limit': limit,
        }, function (data) {
            candybarContainer.html(data);
        });
    })


}(jQuery));
