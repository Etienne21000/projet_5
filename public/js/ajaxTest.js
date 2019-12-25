document.addEventListener('DOMContentLoaded', function(){

    class SingleImg {
        // construtor(imageDetails){
        //
        //     // this.js_form = document.querySelectorAll('.js-form');
        //     this.imageDetails = document.querySelectorAll('#image_details');
        // };

        init(){
            var el = document.querySelectorAll('.js-form');

            el.forEach(function(element) {
                element.addEventListener('click', this.openImg.bind(this));
            }.bind(this));

            var close = document.querySelector('#image_details');
            close.addEventListener('click', this.closeImg.bind(this));
        };

        openImg(){
            
                var image_id = $(this).attr('id');
                console.log(image_id);

            $.ajax({
                url: '/singleImg/' + image_id,
                method:'GET',
                data:{image_id:image_id},
                // dataType:'json',

                success:function(data){
                    var img_container = document.getElementById('image_details');

                    while(img_container.firstChild) {
                        img_container.removeChild(img_container.firstChild)
                    }

                    var p = document.createElement('p');
                    // var p2 = document.createElement('p');
                    var img = document.createElement('img');

                    img.src = '/public/upload/' + data.image;
                    p.innerHTML = data.title + '<br>'; //+ data.date + '<br>';
                    // p2.textContent = data.description;

                    img_container.append(img);
                    img_container.append(p);
                    // img_container.append(p2);

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
            //     });
            // });
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
