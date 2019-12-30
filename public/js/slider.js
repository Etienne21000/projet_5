document.addEventListener('DOMContentLoaded', function(){

    class Slider {
        constructor(slider, slide){
            this.slider = document.querySelector('#banner_image');
            this.slide = document.querySelector('.slide');
        }

        init(){
            this.slideShow();
        }

        slideShow(){
            var slideCount = this.slide.length;
            var slideWidth = this.slide.width();
            var slideHeigh = this.slide.height();
            // this.slide.style.display = "none";
        }

    };

    var newSlider = new Slider();
    newSlider.init();

});
