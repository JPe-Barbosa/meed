/* google maps*/
function initMap() {
    var location1 = { lat: -22.887580, lng: -47.045934 };
    var location2 = { lat: -22.904243, lng: 47.109468 };
    var location3 = { lat: -22.873300, lng: -47.068460 };
    var location4 = { lat: -22.895080, lng: -47.052460 };
    var location5 = { lat: -22.898120, lng: -47.085710 };
    var location6 = { lat: -22.927310, lng: -47.082940 };
    var location7 = { lat: -22.864490, lng: -47.021460 };
    var location8 = { lat: -22.760790, lng: -47.339890 };
    var location9 = { lat: -22.889010, lng: -46.982160 };
    var location10 = { lat: -22.563210, lng: -47.401660 };
    var location11 = { lat: -22.916870, lng: -47.054380 };
    var location12 = { lat: -22.850500, lng: -47.109630 };



    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: location1
    });
    var marker1 = new google.maps.Marker({
        position : location1,
        map: map
    });

    var marker2 = new google.maps.Marker({
        position : location2,
        map: map
    });

    var marker3 = new google.maps.Marker({
        position : location3,
        map: map
    });

    var marker4 = new google.maps.Marker({
        position : location4,
        map: map
    });

    var marker5 = new google.maps.Marker({
        position : location5,
        map: map
    });

    var marker6 = new google.maps.Marker({
        position : location6,
        map: map
    });

    var marker7 = new google.maps.Marker({
        position : location7,
        map: map
    });

    var marker8 = new google.maps.Marker({
        position : location8,
        map: map
    });

    var marker9 = new google.maps.Marker({
        position : location9,
        map: map
    });

    var marker10 = new google.maps.Marker({
        position : location10,
        map: map
    });

    var marker11 = new google.maps.Marker({
        position : location11,
        map: map
    });

    var marker12 = new google.maps.Marker({
        position : location12,
        map: map
    });




}
