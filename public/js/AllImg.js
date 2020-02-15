document.addEventListener('DOMContentLoaded', function(){

    class AllImg {
        constructor(cross, imgForm, imgOpen, imagesRow){

            this.cross = document.querySelector('.close');
            this.imgForm = document.querySelector('.img-form');
            this.imgOpen = document.querySelector('.img_open');
            this.imagesRow = document.querySelector('.removeContainer');
        };

        init(){
            this.imgForm.addEventListener('click', this.openPage.bind(this));
            this.cross.style.display = "none";
        };

        openPage(){
            $.ajax({
                url:'/allImg',
                method: 'GET',
                cache:false,

                success:function(php){

                    this.display(php);
                }.bind(this),

                error:function(res, status, err){
                    alert('problème de chargement de la page');
                }
            });
        };

        openBillets(){
            $.ajax({
                url:'/',
                method:'GET',
                cache: false,

                success: function(){
                    this.display(php);
                }.bind(this),

                error:function(res, status, err){
                    alert('Aucune informations');
                }

            });
        };

        display(data){
            var remove = document.querySelector('.containerAdmin');
            remove.classList.add('removeContainer');
            $('.removeContainer').slideUp(400, function(){
                $('.removeContainer').empty();
                $('.removeContainer').append(data);
                $('.removeContainer').slideDown(1000);
            });

        };

    };

    var newAllImg = new AllImg();
    newAllImg.init();

});
