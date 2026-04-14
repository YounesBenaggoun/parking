
window.map;
window.onload = function () {

    window.map = L.map('map').setView([48.85913493741727, 2.3475296076799217], 12);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 23,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(window.map);

    let parkings_list = JSON.parse(parkings);
    console.log(parkings_list);

    parkings_list.forEach(element => {
        new Marker(element);

    });

}

class Marker {
    obj;
    constructor(element) {
        this.address = element.address;
        this.price = element.price;
        this.id_parking = element.id;
        this.obj = L.marker([element.lat, element.lng]).addTo(window.map);

        const contenuPopup = `
                <div style="font-size:22px; font-weight:600; margin-bottom:6px">
                    Mon lieu
                </div>
                <div style="font-size:16px; color:#555; margin-bottom:8px">
                    addresse ou description
                </div>
                <div style="font-size:15px">
                    Info complémentaire
                </div>
                `;
        this.obj.bindPopup(this.getPopup());
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
    getPopup() {
        const contenuPopup = `
                
                <div style="font-size:16px; color:#555; margin-bottom:8px">
                    ${this.price} €/15 minutes
                </div>
                <div style="font-size:15px">
                    ${this.address}
                </div>
                `;
        return contenuPopup;


    }


}
