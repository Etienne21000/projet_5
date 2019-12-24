document.addEventListener('DOMContentLoaded', function(){

    var el = document.querySelector('.img-form');

    // el.forEach(element, index) => {
    el.addEventListener('click', function(){
        console.log('toto');
        $.ajax({
            url: '/allImg',
            method: 'GET',

            success:function(data){
                // var img_container = document.querySelector('.img_open');
                document.querySelector('.img_open').style.display = "block";
                document.querySelector('.imagesRow').style.display = "none";

                var btn_img = document.querySelector('.btn-outline-secondary');
                btn_img.classList.add('close');
            },

            error:function(res, status, err){

            }
        });
    });

    // var close = document.querySelector('.close');

    // close.addEventListener('click', function(){
    $('.close').click(function(e){

        e.preventDefault();

        document.querySelector('.img_open').style.display = "none";
        document.querySelector('.imagesRow').style.display = "block";
        document.querySelector('.close').classList.remove('close');
    });

    // }

});
