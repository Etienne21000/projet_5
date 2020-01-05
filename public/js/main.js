document.addEventListener('DOMContentLoaded', function(){
    var Main = {

        newSlider: new Slider(('#banner'), ('.banner_image'), ('.slide'), ('.slide'), 0),

        init: function(){
            Main.newSlider.init();
        },
    };

    Main.init();
});
