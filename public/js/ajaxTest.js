document.addEventListener('DOMContentLoaded', function(){

    class SingleImg {

        init(){
            this.openImg();

            var close = document.querySelector('#image_details');
            close.addEventListener('click', this.closeImg.bind(this));
        };

        openImg(){

            var el = document.querySelectorAll('.js-form');
            el.forEach((element) => {
                element.addEventListener('click', function(){

                    var image_id = $(this).attr('id');
                    console.log(image_id);

                    $.ajax({
                        url: '/singleImg/' + image_id,
                        method:'GET',
                        data:{image_id:image_id},
                        dataType:'json',

                        success:function(data){
                            var img_container = document.getElementById('image_details');

                            while(img_container.firstChild) {
                                img_container.removeChild(img_container.firstChild)
                            }

                            var p = document.createElement('p');
                            var img = document.createElement('img');

                            img.src = '/public/upload/' + data.image;
                            p.innerHTML = data.title + '<br>';

                            img_container.append(img);
                            img_container.append(p);

                            document.querySelector('#open').style.display = "block";
                            var img_general = document.querySelector('.images');
                            img_general.classList.add('transform');
                        },

                        error:function(res, status, err){
                            console.log(err);
                            console.log(res);
                            console.log(status);
                        }
                    });
                });
            });
        };

        closeImg(){
            document.querySelector('#open').style.display = "none";
            document.querySelector('.transform').classList.add('images');
            document.querySelector('.transform').classList.remove('transform');
        };
    };

    var newSingleImg = new SingleImg();
    newSingleImg.init();

});
