
document.addEventListener('DOMContentLoaded', function() {
    if (typeof ymaps !== 'undefined') {
        ymaps.ready(initMap);
    } else {
        console.error('Yandex Maps API не загружен!');
    }
});

function initMap() {

    const salonCoords = [55.781966, 37.705052];

    const map = new ymaps.Map('yandexMap', {
        center: salonCoords,
        zoom: 16,
        controls: []
    });

    map.controls
        .add('zoomControl', { float: 'right' })
        .add('typeSelector')
        .add('fullscreenControl');

    const salonPlacemark = new ymaps.Placemark(salonCoords, {
        hintContent: 'Nova Beauty',
        balloonContent: 'Салон красоты Nova Beauty<br>ул. Большая Почтовая, 32, К2'
    }, {
        preset: 'islands#redDotIcon',
        iconColor: '#ff0000'
    });

    map.geoObjects.add(salonPlacemark);

    const searchControl = new ymaps.control.SearchControl({
        options: {
            float: 'left',
            noPlacemark: true
        }
    });
    map.controls.add(searchControl);
}