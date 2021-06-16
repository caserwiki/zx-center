
export default class Footer {
    constructor(Zx) {
        this.boot(Zx)
    }

    boot(Zx) {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scroll-top').fadeIn();
            } else {
                $('.scroll-top').fadeOut();
            }
        });

        //Click event to scroll to top
        $('.scroll-top').click(function(){
            $('html, body').animate({scrollTop : 0},1000);
        });
    }
}
