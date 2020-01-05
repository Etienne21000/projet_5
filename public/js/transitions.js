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
