document.addEventListener('DOMContentLoaded', function(){

    var el = document.querySelectorAll('.js-form');
    el.forEach((element, index) => {
        element.addEventListener('click', function(){
            // console.log("toto");

            // e.preventDefault();
            var image_id = $(this).attr('id');
            $.ajax({

                url: '/singleImg/' + image_id,
                method:'GET',
                data:{
                    image_id:image_id,
                },
                dataType:'json',

                success:function(data) {
                    console.log(data);
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
                    // console.log(err);
                }

            });
        });
    });

    $('#image_details').click(function(e){

        e.preventDefault();

        document.querySelector('#open').style.display = "none";
        document.querySelector('.transform').classList.add('images');
        document.querySelector('.transform').classList.remove('transform');
        // document.querySelector('.images').style.display = "flex";

    });


});
