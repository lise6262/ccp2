/*eslint-env browser*/
/*eslint-env jquery */
/*jslint browser: true, devel: true*/
/*global $, jQuery*/


// procédure qui permet de changer le theme du site
function themeChange(color) {
    "use strict";
    $("body").attr("id", color);
    localStorage.setItem("style", color);
}
// procédure de déclaratiion d'ecouteur d'événements sur le clic des éléments dédiés au changement de thème
function themeEventListener() {
    "use strict";
    $("#dropdownMenuStyle").children().on("click", function () {
        themeChange($(this).attr("data-color"));
    });
}

// procédure qui adapte la taille du titre du site en fonction des breakpoint

function responsiveTitle() {
    "use strict";
    if (window.matchMedia('(min-width: 1200px)').matches) {
        $("#nomSite").removeAttr('class');
        $("#nomSite").addClass('display-1');
    }
    if (window.matchMedia('(min-width: 992px) and (max-width: 1199px)').matches) {
        $("#nomSite").removeAttr('class');
        $("#nomSite").addClass('display-3');
    }
    if (window.matchMedia('(min-width: 768px) and (max-width: 991px)').matches) {
        $("#nomSite").removeAttr('class');
        $("#nomSite").addClass('display-4');
    }
    if (window.matchMedia('(min-width: 576px) and (max-width: 767px)').matches) {
        $("#nomSite").removeAttr('class');
        $("#nomSite").addClass('display-5');
    }
    if (window.matchMedia('(min-width: 376px) and (max-width: 575px)').matches) {
        $("#nomSite").removeAttr('class');
        $("#nomSite").addClass('display-5');
    }
    if (window.matchMedia('(max-width: 375px)').matches) {
        $("#nomSite").removeAttr('class');
        $("#nomSite").addClass('h3');
    }
}




// procédure qui interdit le clic droit sur les éléments de type image
function disableRightClicOnImages() {
    "use strict";
    $("img").on("contextmenu", function () {
        alert('Merci de respecter le travail du webmaster en ne copiant pas le contenu sans autorisation');
        return false;
    });
}
// procédure d'excution sur le chragement de la page fonctionne aussi lorsqu'on la rafraichit
$(document).ready(function () {
    "use strict";
    // verification que le navigateur suporte les variables session
    if (typeof (Storage) === "undefined") {
        alert(" votre navigateur ne gere pas les sessionStorage en javascript ! ");
    } else {
        // liste des actions executées pour les navigateurs qui supporte les variables sessions
        // si la variable session "style" n'existe pas on la crée avec une valeur par défaut ici "default"
        if (!(localStorage.getItem("style"))) {
            localStorage.setItem("style", "default");
        } else {
            // sinon on vient affecter la valeur de la variable session à la propriété id de la variable bodyPage
            $("body").attr("id", localStorage.getItem("style"));
        }
    }
    responsiveTitle();
    $(window).resize(responsiveTitle);
    themeEventListener();
    disableRightClicOnImages();

});

// Pour afficher l'image en grand
$(document).ready(function () {
    $('.img-thumbnail').click(function () {
        $('.overlay').show()
        $('.img-full').attr("src", $(this).attr('src'))
        
        
       
    })
    //bouton pour fermer
    $('.closeMe').click(function () {
        $('.overlay').hide()
       
        $('.img-thumbnail').show()
       
    })

    //echap
    $(document).keydown(function (event) {
        if (event.keyCode == 27){
            $('.overlay').hide()
            
        }
    })
})