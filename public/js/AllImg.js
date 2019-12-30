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
            this.cross.addEventListener('click', this.closePage.bind(this));
            // this.closePage();
            this.cross.style.display = "none";
        };

        openPage(){
            $.ajax({
                url:'/allImg',
                method: 'GET',
                cache:false,
                // data:{image:image},
                // dataType: 'json',

                success:function(php){

                    this.display(php);

                    // document.querySelector('.close').style.display = "block";
                    // document.querySelector('.btnsuite').style.display = "none";
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

        closePage(){
            // $('.container').slideUp(400, function(){
            //     $('.container').empty();
            //     $('.container').append(data);
            //     $('.container').slideDown(1000);
            // });
            this.cross.style.display = "none"
            console.log('fermer');
        };

        display(data){
            var remove = document.querySelector('.containerAdmin');
            remove.classList.add('removeContainer');
            // var content = document.querySelector('.imagesRow');
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
