let allLinks = document.getElementsByClassName('linkCountable');

for (let link of allLinks) {
    link.addEventListener('click', function () {

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "?controller=incrementeLink&linkId=" + link.getAttribute('data-id') + "");

        // Send request
        xhr.send();
    })
}