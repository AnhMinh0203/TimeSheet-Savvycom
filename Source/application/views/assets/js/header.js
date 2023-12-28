// Language 
$(document).click(function (e) {
    // Kiểm tra xem sự kiện click có xảy ra bên ngoài .header-right-side-dropdown hay không
    if (!$(e.target).closest('.header-right-side-dropdown').length) {
        $('.header-right-side-dropdown').removeClass('header-active');
    }
    else{
        $('.header-right-side-dropdown').addClass('header-active');
    }
});
$(document).ready(function(){
    $('.options-list li').click(function(){
        $('.options-list li').removeClass('header-text-active');
        $(this).addClass('header-text-active')
    })
})
$(document).ready(function () {
    $('.options-list').hide();

    $('.header-right-side-dropdown').click(function () {
        $(this).find('.options-list').slideToggle(200);
    });

    $(document).click(function (event) {
        if (!$(event.target).closest('.header-right-side-dropdown').length) {
            $('.options-list').slideUp(200);
        }
    });
    $('.options-list li').click(function (event) {
        event.stopPropagation();
    });
});

// Account
$(document).ready(function(){
    $('.header-account-infor').hide();
    
    $('.user-account-icon').click(function(){
        $('.header-account-infor').slideToggle(200);
    })

    // Sự kiện click trên toàn bộ tài liệu
    $(document).click(function (event) {
        if (!$(event.target).closest('.header-account-infor').length && !$(event.target).hasClass('user-account-icon')){
            $('.header-account-infor').slideUp(200);
        }
    });
    $('.header-account-infor li').click(function (event) {
        event.stopPropagation();
    });
})