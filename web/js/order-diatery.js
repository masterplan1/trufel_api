var str = new Object();
var name;
var phone_number;
var address;
var date;
var errorItem = $('.error-show');
str['name'] = 'введіть ім\'я';
str['phone_number'] = ' введіть номер телефону';
str['address'] = 'введіть адресу';
str['date'] = 'введіть дату';

$(document).on('change', '.name-value', function(){
    let val = $(this).val();
    if(val.length < 3){
        str['name'] = 'коротке ім\'я';
        checkError();
    }else{
        delete str['name'];
        name = val;
        errorItem.hide();
    }
//    console.log(Object.keys(str).length);
    checkButtonStatus();
});
$(document).on('change', '.phone-value', function(){
    let val = $(this).val();
    if(val.length < 10 || /\D/.test(val)){
        str['phone_number'] = 'невірний номер';
        checkError();
    }else{
        delete str['phone_number'];
        phone_number = val;
        errorItem.hide();
    }
    checkButtonStatus();
});
$(document).on('change', '.input-date', function(){
    let val = $(this).val();
    if(val.length < 6){
        str['date'] = 'оберіть дату замовлення';
        checkError();
    }else{
        delete str['date'];
        date = val;
        errorItem.hide();
    }
    checkButtonStatus();
});

$(document).on('change', '.input-address', function(){
    let val = $(this).val();
    if(val.length < 6){
        str['address'] = 'вкажіть населений пункт';
        checkError();
    }else{
        delete str['address'];
        address = val;
        errorItem.hide();
    }
    checkButtonStatus();
});

$(document).on('click', '.botton-get', function(){
    if(checkError()){
        let comment = $('.candybar__get-order-comment').val();
        let delivery = $('.delivery-value').val();
        let payment_method = $('.payment_method-value').val();
        let params = {
            'name' : name,
            'phone_number' : phone_number,
            'address' : address,
            'date' : date,
            'comment' : comment,
            'delivery' : delivery,
            'payment_method' : payment_method,
        };
        $.post('/order/make-order-cart', params, function(data){
            console.log(data);
        });
    }
});

function checkError(){
    
    if(Object.keys(str).length != 0){
        for (let key in str){
            if (str.hasOwnProperty(key)){
                errorItem.html(str[key]);
                break;
            }
        }
        errorItem.show();
        return false;
    }else{
        errorItem.hide();
        return true;
    }
    
}

function checkButtonStatus(){
    if(Object.keys(str).length == 0){
        $('.botton-get').addClass('active-order-button');
    }else{
        $('.botton-get').removeClass('active-order-button');
    }
}