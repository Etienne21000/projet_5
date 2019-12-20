document.addEventListener('DOMContentLoaded', function(){

    $('.js-form').click(function(e){

        e.preventDefault();
        var image_id = $(this).attr('id');

        $.ajax({
            // url:'/?action=singleImg&id=' + image_id,
            url: '/singleImg/:id' + image_id,
            // url: 'singleSerie/singleImg/' + image_id,
            method:'GET',
            data:{
                image_id:image_id,
            },
            dataType:'json',

            success:function(data) {
                var img_container = document.getElementById('image_details');

                while(img_container.firstChild) {
                    img_container.removeChild(img_container.firstChild)
                }

                 var p = document.createElement('p');
                 var p2 = document.createElement('p');
                 var img = document.createElement('img');

                 img.src = '/public/upload/' + data.image;
                 p.innerHTML = data.title + '<br>' + data.date + '<br>';
                 p2.textContent = data.description;

                 img_container.append(img);
                 img_container.append(p);
                 img_container.append(p2);

                document.querySelector('#open').style.display = "block";
                var img_general = document.querySelector('.images');
                img_general.classList.add('transform');
            }

        });
        // document.querySelector('.images').style.transition = "all .4s ease-in-out";
    });

    $('#image_details').click(function(e){

        e.preventDefault();

        document.querySelector('#open').style.display = "none";
        document.querySelector('.transform').classList.add('images');
        document.querySelector('.transform').classList.remove('transform');
        // document.querySelector('.images').style.display = "flex";

    });

});
