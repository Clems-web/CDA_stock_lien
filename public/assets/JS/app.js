let allLinks = document.getElementsByClassName('linkCountable');

for (let link of allLinks) {
    link.addEventListener('click', function () {

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "?controller=incrementeLink&linkId=" + link.getAttribute('data-id') + "");

        // Send request
        xhr.send();
    })
}


// Ajax request for input search in recipe page
function getNumberOfClick(){

    tabName = [];
    tabClickNumber = [];

    // AJAX request to connect to server and manager.php
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "?controller=getLinkStats");

    // Exploit JSON and display them in HTML format
    xhr.onload = function(){
        const result = JSON.parse(xhr.responseText);

        for (let link of result) {

            tabName.push(link.name);
            tabClickNumber.push(link.clickNumber);
        }


    }

    // Send request
    xhr.send();

    
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tabName,
            datasets: [{
                label: 'Number of clicks per link',
                data: tabClickNumber,
                backgroundColor: 'red',
                borderColor: 'black',
                borderWidth: '2px'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

}

getNumberOfClick();