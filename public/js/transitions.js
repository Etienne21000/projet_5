document.addEventListener('DOMContentLoaded', function(){

    class Transition {
        constructor(images, open, single_img) {
            this.images = document.querySelector('.image_title');
            this.open = document.querySelector('.open');
            this.single_img = document.querySelector('.single_img');
        }

        init()
        {
            this.hideOpen();
            this.single_img.addEventListener('click', this.showSingleImg.bind(this));
        }

        hideOpen()
        {
            this.open.style.display = "none";
            this.images.style.display = "block";
        }

        showSingleImg()
        {
            this.open.style.display = "block";
            this.images.style.display = "none";
        }
    };

    var new_transition = new Transition();
    new_transition.init();
});
