//burger menu scripts

(function(){
    const burgerItem = document.querySelector(".burger");
    const  headerNavItem = document.querySelector(".header__nav");
    burgerItem.addEventListener('click', () => {
        headerNavItem.classList.add("header__nav-active");
    });
    const headerNavClose = document.querySelector(".header__nav-close");
    headerNavClose.addEventListener('click', () => {
        headerNavItem.classList.remove("header__nav-active");
    });
    
    const categoryItem = document.querySelector(".catalog-menu");
    const subMenuItem = document.querySelector(".header__sub-menu");
    categoryItem.addEventListener("click", () => {
        subMenuItem.classList.toggle("sub-menu-active");
    });
    
}());

//filling hover effect

var activeElement;
jQuery(document).ready(function ($){
        $(document).on('mouseleave', '.filling-card', function(){
            if($(window).width() > 600){
                    if(activeElement){
                       $(activeElement).removeClass('active-view');
                    }
                    $(this).find('.products__card-active').toggleClass('active-view');
                    activeElement = $(this);
               }
        }); 
        $(document).on('mouseenter', '.filling-card', function(){
            if($(window).width() > 600){
                    $(this).find('.products__card-active').toggleClass('active-view');
               }
                        
        });
    
//        $('.filling-card').on('click', function(){
//            const productCardActive = $(this).find('.products__card-active');
//            if(productCardActive.hasClass('active-view')){
//                productCardActive.toggleClass('active-view');
//            }
//        });
        
});
jQuery(document).ready(function ($){
   
//            $('.filling-card').on('click', function(){
            $(document).on('click', '.filling-card', function(){
                if($(window).width() <= 600){
                    if(!$(this).find('.products__card-active').hasClass('active-view')){
                        $(activeElement).find('.products__card-active').removeClass('active-view');
                    }
                    $(this).find('.products__card-active').toggleClass('active-view');
                    activeElement = $(this);
                }
                
            });
       
});

//scroll-up button styles and functional

(function(){
    const scrollUpButton = document.querySelector('.header__scroll-up');
    window.onscroll = () => {
        if(window.pageYOffset > 500){
            scrollUpButton.classList.add('header__scroll-up-active');
        }else{
            scrollUpButton.classList.remove('header__scroll-up-active');
        }
    }
}());

(function($){
    $(function(){
        $('#up').click(function(){
            $('html, body').animate({scrollTop: 0}, 500);
        });
    });
}(jQuery));


// js for image zomming for filling and other

$(document).ready(function() { // Ждём загрузки страницы
        $(document).on('click', '.products__card-zoom', function(){ // Событие клика на маленькое изображение
          if($(window).width() >= 600){  
            var img = $(this).siblings('.image');	// Получаем изображение, на которое кликнули
            var src = img.attr('src'); // Достаем из этого изображения путь до картинки
            $("body").append("<div class='popup'>"+ //Добавляем в тело документа разметку всплывающего окна
                             "<div class='popup_bg'></div>"+ // Блок, который будет служить фоном затемненным
                             "<img src='"+src+"' class='popup_img' />"+ // Само увеличенное фото
                             "</div>");
            $(".popup").fadeIn(200); // Медленно выводим изображение
            $(".popup_bg").click(function(){	// Событие клика на затемненный фон	   
                $(".popup").fadeOut(200);	// Медленно убираем всплывающее окн	
          setTimeout(function() {	// Выставляем таймер
                  $(".popup").remove(); // Удаляем разметку всплывающего окна
                }, 200);
            });
          }
        });
});
//slide script
$(document).ready(function(){
    let width = 241 + 70;
    let count = 3;
    
    let asd = $('.comment');
    
    let list = $('.comment__cards');
    let listElems = $('.comment__card');
    let position = 0;
    
    $('.prev').on('click', function(){
//        console.log(list);
        position += width * count;
        position = Math.min(position, 0);
        list.css('margin-left', position + 'px');
//        list.style.marginLeft = position + 'px';
    });

$('.next').on('click', function(){
        position -= width * count;
        position = Math.max(position, -width * (listElems.length - count));
        list.css('margin-left', position + 'px');
    });
});

// DatePicker
$('[data-toggle="datepicker"]').datepicker({
    format: 'dd.mm.yy',
    'autoHide': true
});
//$(document).ready(function() { // Ждём загрузки страницы
//	
//        $(".image").click(function(){	// Событие клика на маленькое изображение
//          if($(window).width() >= 600){  
//            var img = $(this);	// Получаем изображение, на которое кликнули
//            var src = img.attr('src'); // Достаем из этого изображения путь до картинки
//            $("body").append("<div class='popup'>"+ //Добавляем в тело документа разметку всплывающего окна
//                             "<div class='popup_bg'></div>"+ // Блок, который будет служить фоном затемненным
//                             "<img src='"+src+"' class='popup_img' />"+ // Само увеличенное фото
//                             "</div>");
//            $(".popup").fadeIn(200); // Медленно выводим изображение
//            $(".popup_bg").click(function(){	// Событие клика на затемненный фон	   
//                $(".popup").fadeOut(200);	// Медленно убираем всплывающее окн	
//          setTimeout(function() {	// Выставляем таймер
//                  $(".popup").remove(); // Удаляем разметку всплывающего окна
//                }, 200);
//            });
//          }
//        });
//});
/*

(function(){
    const header = document.querySelector('header');
    window.onscroll = () => {
        if(window.pageYOffset > 50){
            header.classList.add('header_active');
        }else{
            header.classList.remove('header_active');
        }
    }
}());



(function(){
    const burgerItem = document.querySelector(".burger");
    const  headerNavItem = document.querySelector(".header__nav");
    burgerItem.addEventListener('click', () => {
        headerNavItem.classList.add("header__nav-active");
    });
    const headerNavClose = document.querySelector(".header__nav-close");
    const menuItem = document.querySelectorAll('.header__link');
    headerNavClose.addEventListener('click', () => {
        headerNavItem.classList.remove("header__nav-active");
    });
    if(window.innerWidth <= 767){
        for(let i=0; i < menuItem.length; i++){
            menuItem[i].addEventListener('click', () => {
                headerNavItem.classList.remove("header__nav-active");
            });
        }   
    }
}());


(function () {

    const smoothScroll = function (targetEl, duration) {
        const headerElHeight = document.querySelector('.header').clientHeight;
        let target = document.querySelector(targetEl);
        let targetPosition = target.getBoundingClientRect().top - headerElHeight;
        let startPosition = window.pageYOffset;
        let startTime = null;
    
        const ease = function(t,b,c,d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        };
    
        const animation = function(currentTime){
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, startPosition, targetPosition, duration);
            window.scrollTo(0,run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        };
        requestAnimationFrame(animation);

    };

    const scrollTo = function () {
        const links = document.querySelectorAll('.js-scroll');
        links.forEach(each => {
            each.addEventListener('click', function () {
                const currentTarget = this.getAttribute('href');
                smoothScroll(currentTarget, 1000);
            });
        });
    };
    scrollTo();
}());
*/