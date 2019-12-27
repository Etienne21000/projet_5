document.addEventListener('DOMContentLoaded', function(){

    class AllImg {
        constructor(cross, imgForm, imgOpen, imagesRow){

            this.cross = document.querySelector('.close');
            this.imgForm = document.querySelector('.img-form');
            this.imgOpen = document.querySelector('.img_open');
            this.imagesRow = document.querySelector('.imagesRow');
        };

        init(){
            this.imgForm.addEventListener('click', this.openPage.bind(this));
            this.cross.addEventListener('click', this.closePage.bind(this));
            // this.closePage();
            this.cross.style.display = "none";
        };

        openPage(){

            // var image = $('.imagesRow').attr('img');
            var page = $(this).attr('href');

            $.ajax({
                // url: 'src/view/back-end/' + page,
                url:'/allImg',
                method: 'GET',
                cache:false,
                // data:{image:image},
                // dataType: 'json',

                success:function(php){
                    // alert('La page est bien chargée');
                    this.display(php);
                    // var images_container = document.querySelector('.img_open');
                    //
                    // var img = document.createElement('img');
                    //
                    // img.src = '/public/upload/' + data.image;
                    //
                    // images_container.append(img);
                    // alert(data);
                    // var img_container = document.querySelector('.img_open');
                    document.querySelector('.img_open').style.display = "block";
                    // document.querySelector('.imagesRow').style.display = "none";
                    document.querySelector('.close').style.display = "block";
                }.bind(this),

                error:function(res, status, err){
                    alert('problème de chargement de la page');
                }
            });
        };

        closePage(){
            // document.querySelector('.img_open').style.display = "none";
            // document.querySelector('.imagesRow').style.display = "flex";
            this.cross.style.display = "none"

        };

        display(data){
            // var content = document.querySelector('.imagesRow');
            $('.imagesRow').slideUp(400, function(){
                $('.imagesRow').empty();
                $('.imagesRow').append(data);
                $('.imagesRow').slideDown(1000);
            });

        };
    };

    var newAllImg = new AllImg();
    newAllImg.init();

});

// var el = document.querySelector('.img-form');
//
// // el.forEach(element, index) => {
// el.addEventListener('click', function(){
//     console.log('toto');
//     $.ajax({
//         url: '/allImg',
//         method: 'GET',
//
//         success:function(data){
//             // var img_container = document.querySelector('.img_open');
//             document.querySelector('.img_open').style.display = "block";
//             document.querySelector('.imagesRow').style.display = "none";
//
//             var btn_img = document.querySelector('.btn-outline-secondary');
//             btn_img.classList.add('close');
//         },
//
//         error:function(res, status, err){
//
//         }
//     });
// });
//
// // var close = document.querySelector('.close');
//
// // close.addEventListener('click', function(){
// $('.close').click(function(e){
//
//     e.preventDefault();
//
//     document.querySelector('.img_open').style.display = "none";
//     document.querySelector('.imagesRow').style.display = "block";
//     document.querySelector('.close').classList.remove('close');
// });

// }
