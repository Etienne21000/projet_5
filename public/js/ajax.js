document.addEventListener('DOMContentLoaded', function(){

    $('.js-form').click(function(e){

        e.preventDefault();
        var image_id = $(this).attr('id');
        // var title = $(this).attr('title');
        // var image = $(this).attr('image');

        $.ajax({
            url:'/?action=singleImg&id=' + image_id,
            method:'GET',
            data:{
                image_id:image_id,
                // title:title,
                // image:image,
            },
            dataType:'json',

            success:function(data){
                var img_container = document.getElementById('image_details');

                while(img_container.firstChild) {
                    img_container.removeChild(img_container.firstChild)
                }

                 var p = document.createElement('p');
                 var p2 = document.createElement('p');
                 var img = document.createElement('img');

                 p.innerHTML = data.title + '<br>' + data.date + '<br>';
                 img.src = '/public/upload/' + data.image;
                 p2.textContent = data.description;

                 img_container.append(p);
                 img_container.append(img);
                 img_container.append(p2);

                document.querySelector('#open').style.display = "block";
                document.querySelector('.images').style.display = "none";
                console.log(data);
            }

        });
        // document.querySelector('.images').style.transition = "all .4s ease-in-out";
    });

    $('.close').click(function(e){

        e.preventDefault();

        document.querySelector('#open').style.display = "none";
        document.querySelector('.images').style.display = "flex";

    });

});

// document.addEventListener('DOMContentLoaded', function(){

// $('.js-form').click(function(e){
//
//     e.preventDefault();
//
//     $('#open').style.display = "block";

// $.ajax({
//
//     // url: 'singleImageView.php',
//     url: 'index.php?action=singleSerie&id=',
//     type: 'GET',
//     data: 'id=' + id,
//     dataType: 'HTML',
//
//     success : function(code_html, statut){
//         $('#open').style.display = "block";
//         $('.images').style.display = "none";
//     },
//
//     error : function(resultat, statut, erreur){
//          $('#open').innerHtml("<p>Erreur lors de la connexion...</p>");
//     },
//
//     complete : function(resultat, statut){
//
//     }
//
// });

// });

// });
