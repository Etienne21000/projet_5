document.addEventListener('DOMContentLoaded', function(){
    var Main = {

        newSlider: new Slider(('#banner'), ('.banner_image'), ('.slide'), ('.slide'), 0, ('.suivant'), ('.precedent')),

        init: function(){
            Main.newSlider.init();
        },
    };

    Main.init();
});
