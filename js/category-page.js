(function($){
    $(window).on('load', function(){
        if($('.category-page-row .term-description').length > 0){
            let wrap = $('.category-page-row .term-description');
            let current_height = wrap.height();
            let your_height = 300;
            if(current_height > your_height){
                wrap.addClass('fix_height_300');
                wrap.append(function(){
                    return '<div class="devvn_readmore_flatsome devvn_readmore_flatsome_more"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                });
                wrap.append(function(){
                    return '<div class="devvn_readmore_flatsome devvn_readmore_flatsome_less" style="display: none;"><a title="Xem thêm" href="javascript:void(0);">Thu gọn</a></div>';
                });
                $('body').on('click','.devvn_readmore_flatsome_more', function(){
                    wrap.removeClass('fix_height_300');
                    $('body .devvn_readmore_flatsome_more').hide();
                    $('body .devvn_readmore_flatsome_less').show();
                });
                $('body').on('click','.devvn_readmore_flatsome_less', function(){
                    wrap.addClass('fix_height_300');
                    $('body .devvn_readmore_flatsome_less').hide();
                    $('body .devvn_readmore_flatsome_more').show();
                });
            }
        }
    });
})(jQuery);