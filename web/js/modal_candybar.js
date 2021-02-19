var itemCandybar;
var dataId;
var qtyStart = 0;
var counterForQuantity;
var cartCountItem = $('.header__cart-count');
//let candybarCatId = $('.modal-content').data('id');

var modal = document.getElementById('myModal');

var span = document.getElementsByClassName("candynar-close")[0];



//cart scripts
$(document).on('click', '.open-cart', function(){
        let item = $(this);
        let image = $('.modal_image');
        let imageSrc = item.parent().parent().find('img').attr('src');
        let imageSrcMany = item.siblings('img').attr('src');

        if(window.innerWidth <= 440){
            if(item.hasClass('modal-lg')){
                image.css('top', '145px');
                $('.modal-content').css('height', '900px');
            }else{
                $('.modal_image').css('top', '85px');
                $('.modal-content').css('height', '826px');
            }
        }
        
        let header = $('.modal__title');
        
        let name = $(this).siblings('h3').html();
        if(!name){
            name = $(this).parent().parent().siblings('h3').html();
        }
        header.html(name);
        $('.modal-content br').hide();
        
        if(imageSrcMany){
            image.attr('src', imageSrcMany);
        }else{
            image.attr('src', imageSrc);
        }
        
        counterForQuantity = 0;
        
//        ajax and params
        let ajaxContainer = $('.modal-edit');
        let itemId = item.data('id');
        $.post('/candybar/prepare', {
            'id' : itemId,
        }, function(data){
            ajaxContainer.html(data);
            
        });
        
        dataId = itemId;
//        temp = itemId;
//        let addToCartButton = $('.candybar__modal-button2');
//        if(!cartItems.includes(itemId)){
//            addToCartButton.removeClass('candybar__modal-button2-active');
//            addToCartButton.html('Додати до кошика');
//            addToCartButton.css('cursor', 'pointer');
//        }
        
        modal.style.display = "block";
});

$(document).on('click', '.candybar__modal-button2', function () {
    let item = $(this);
    
    
    if(!item.hasClass('candybar__modal-button2-active')){
        let idCategory = dataId;
        let id = $('.modal__select').val();
        let qty = $('.quantity-value').html();
        $.post('/cart/add', {'id': id, 'qty' : qty}, function(data){  //{'id': id, 'qty' : qty, 'catId' : candybarCatId}
        if(!data){
            alert('error');
        }
//        console.log(data);
        });
        setTimeout(checkCart, 50);

        item.addClass('candybar__modal-button2-active');
        item.html('Перейти до кошика');
    }else{
        $.get('/cart/redirect', {}, function(){});
    }
});

$(document).on('click', '.candybar__modal-button1', function () {
    modal.style.display = "none";
       
});

$(document).on('click', '.quantity-value-plus', function(){
    counterForQuantity++;
    
    let qtyItem = $('.quantity-value');
    let qty = +qtyItem.html();
    
    if(counterForQuantity == 1){
        qtyStart = qty;
    }
    
    if(qty < 50 ){
        ++qty;
    }
    qtyItem.html(qty);
});
$(document).on('click', '.quantity-value-minus', function(){
    counterForQuantity++;
    let qtyItem = $('.quantity-value');
    let qty = +qtyItem.html();
    
    if(counterForQuantity == 1){
        qtyStart = qty;
    }
    
    if(qtyStart < qty ){
        --qty;
    }
    qtyItem.html(qty);
});
$(document).on('click', '.quantity-value-minus1', function(){
    let qtyItem = $(this).parent().find('.quantity-value1');
    let qty = +qtyItem.html();
    let minVal = $(this).data('value');
    
    
    let parent = $(this).parents('.candybar__cart-content');
    let type = parent.find('.candybar__remove-button').data('type');
    
    if (+type == 2) {
        if (qty > 1) {
            --qty;
        }
    } else {
        if (minVal < qty) {
            --qty;
        }
    }
    
    qtyItem.html(qty);
    ajaxCart(this);
});
$(document).on('click', '.quantity-value-plus1', function(){
    let qtyItem = $(this).parent().find('.quantity-value1');
    let qty = +qtyItem.html();
    let minVal = $(this).data('value');
    
    if(30 > qty ){
        ++qty;
    }
    qtyItem.html(qty);
    ajaxCart(this);
});

$(document).on('click', '.candybar__remove-button', function(){
    let item = $(this).parent();
    let id = item.data('id');
    let type = $(this).data('type');
    $.post('/cart/delete', {'id' : id, 'type' : type}, function(data){
        if(!data){
            alert('товар не знайдено');
        }else{
            if(+data == 0){
                $('.order-diatery').hide();
            }
            $('.candybar__order-sum-price-val').html(data);
        }
    });
    setTimeout(checkCart, 50);
    item.remove();
});




if (span) {
    span.onclick = function () {
        modal.style.display = "none";
    };
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

//circle script

$(document).on('click', '.slider-cicle1', function () {
    let itemButton = $(this);
    let siblingItemButton = itemButton.siblings('span');

    if(!itemButton.hasClass('circle-active')){
        itemButton.addClass('circle-active');
        siblingItemButton.removeClass('circle-active');
        let parent = $(this).parent().parent();
        let images = parent.find('img');
        let image1 = images[0];
        let image2 = images[1];
        let src1 = $(image1).attr('src');
        let src2 = $(image2).attr('src');
        $(image1).attr('src', src2);
        $(image2).attr('src', src1);
    }

});
$(document).on('click', '.slider-cicle2', function () {
    let itemButton = $(this);
    let siblingItemButton = itemButton.siblings('span');
    
    if(!itemButton.hasClass('circle-active')){
        itemButton.addClass('circle-active');
        siblingItemButton.removeClass('circle-active');
        let parent = $(this).parent().parent();
        let images = parent.find('img');
        let image1 = images[0];
        let image2 = images[1];
        let src1 = $(image1).attr('src');
        let src2 = $(image2).attr('src');
        $(image1).attr('src', src2);
        $(image2).attr('src', src1);
    }
});

function ajaxCart(item){
    let parent = $(item).parents('.candybar__cart-content');
    let id = $(parent).data('id');
    let value = $(item).siblings('.quantity-value1').html();
    let type = parent.find('.candybar__remove-button').data('type');
//    alert(1);
    $.post('/cart/ajax-qty', {'id' : id, 'value' : value, 'type' : type}, function(data){
        $('.candybar__order-sum-price-val').html(data);
//            console.log(data);
    });
    console.log(id);
    console.log(value);
}

$(document).on('change', '.modal__select-cart', function () {
    let parent = $(this).parents('.candybar__cart-content');
    let id = $(parent).data('id');
    let idNew = $(this).val();
    $.post('/cart/ajax-filling', {'id' : id, 'idNew' : idNew}, function(data){
        if(!data){
            alert('товар не знайдено');
            
        }
        console.log(data);
    });
});

function checkCart(){
    $.post('/cart/check-status', {}, function(data){
//        data = +data;
        if(+data != 0){
            cartCountItem.html(data);
            cartCountItem.show();
        }else{
            cartCountItem.hide();
        }
    });
}


//pp deserts and diatery



$(document).on('click', '.desert-order', function(){
    let item = $(this);
    let id = item.data('id');
    console.log(id);
    $.post('/cart/add-diatery', {'id': id, 'qty' : 1}, function(data){});
//    $.get('/cart/redirect', {}, function(){});
    setTimeout(checkCart, 50);
});

    