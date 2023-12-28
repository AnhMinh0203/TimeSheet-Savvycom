 // Show - hide side bar
 $(document).ready(function(){
    $('.child-feature').hide();

    $('.feature-item').click(function(event){
        event.stopPropagation();
        $('.child-feature a').removeClass('active');
        $('.child-feature').not($(this).find('.child-feature')).slideUp(200);
        
        $(this).find('.child-feature').slideToggle(200);
        $('.fa-chevron-down').not($(this).find('.fa-chevron-down')).removeClass('rotate');
        $(this).find('.fa-chevron-down').toggleClass('rotate');
    });

    $('.child-feature li').click(function(event){
        event.stopPropagation();
    });

    $(document).click(function(){
        $('.child-feature').slideUp(200);
        $('.fa-chevron-down').removeClass('rotate');
    });

    $('.child-feature a').click(function(){
        $('.feature-item-dashboard').removeClass('active');
        $('.child-feature a').removeClass('active');
        $(this).addClass('active');
        $(this).css({
            'color': 'var(--primary--color)',
            'transition': 'color .6s ease'
        });
    });
    $('.feature-item-dashboard').click(function(){
        $(this).addClass('active');
    });
});
