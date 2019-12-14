document.addEventListener('DOMContentLoaded', function(){

    $('.js-form').click(function(e){

        e.preventDefault();

        document.querySelector('#open').style.display = "block";
        document.querySelector('.images').style.display = "none";


    });

    $('.close').click(function(e){

        e.preventDefault();

        document.querySelector('#open').style.display = "none";
        document.querySelector('.images').style.display = "flex";

    });

});

// document.addEventListener('DOMContentLoaded', function(){
//
//     class Transition {
//         constructor(images, open, open_img) {
//             this.images = document.querySelector('.images');
//             this.open = document.querySelector('#open');
//             this.open_img = document.querySelector('.js-form');
//         }
//
//         init()
//         {
//             this.hideOpen();
//             this.open_img.addEventListener('click', this.showSingleImg.bind(this));
//         }
//
//         hideOpen()
//         {
//             this.open.style.display = "none";
//             this.images.style.display = "flex";
//         }
//
//         showSingleImg()
//         {
//             this.open.style.display = "block";
//             this.images.style.display = "none";
//         }
//     };
//
//     // var new_transition = new Transition();
//     // new_transition.init();
// });

// <div class="single_img">
//     <img href="/public/upload/<?= $data->image(); ?>">
//     <a href="#open" class="js-form"></a>
// </div>
