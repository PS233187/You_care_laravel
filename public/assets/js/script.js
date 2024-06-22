// window.onload = function() {
//     var popup = document.querySelector('#popupContainer .popup');
//     popup.style.right = '-400px';
//     setTimeout(function() {
//         popup.style.right = '0';
//     }, 100);
// }

// let sidebarVisible = false;

// function toggleNav() {
//   if (!sidebarVisible) {
//     openNav();
//   } else {
//     closeNav();
//   }
// }


// function closeNav() {
//   document.getElementById("mySidebar").style.width = "0";
//   document.getElementById("main").style.marginRight = "0";
//   sidebarVisible = false;
// }


window.onload = function() {
    var popup = document.querySelector('#popupContainer .popup');
    var closeButton = document.getElementById('closeButton');

    popup.style.right = '-400px';
    closeButton.style.right = '-400px';
    closeButton.style.opacity = '0'; // Maak de sluitknop in het begin onzichtbaar

    setTimeout(function() {
        popup.style.right = '0';
        closeButton.style.right = '-310px';
        closeButton.style.opacity = '1'; // Laat de sluitknop verschijnen samen met het pop-upvenster
    }, 100);

    closeButton.onclick = function() {
        closePopup();
    };

    popup.onclick = function() {
        closePopup();
    };
}

function closePopup() {
    var popup = document.querySelector('#popupContainer .popup');
    var closeButton = document.getElementById('closeButton');

    popup.style.right = '-400px';
    closeButton.style.opacity = '0'; // Verberg de sluitknop bij het sluiten van het pop-upvenster
}

// product modal


