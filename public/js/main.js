
window.map;
window.onload = function () {

    window.map = L.map('map').setView([48.85913493741727, 2.3475296076799217], 11);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(window.map);

    let parkings_list = JSON.parse(parkings);

    parkings_list.forEach(element => {
        new Marker(element.lat, element.lng);

    });

}

class Marker {
    obj;
    constructor(lat, lng) {
        this.obj = L.marker([lat, lng]).addTo(window.map);
        this.obj.bindPopup("<b>Rich content</b><br>More info here");
        this.initEvent();
    }
    initEvent() {
        this.obj.on('mouseover', function (e) {
            this.openPopup();
        });

        // Close when mouse leaves
        this.obj.on('mouseout', function (e) {
            this.closePopup();
        });

    }


}
