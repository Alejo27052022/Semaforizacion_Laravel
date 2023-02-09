// Crear la variable mapa con coordenadas de centro y zoom
var map = L.map('map').setView([-2.3075364902590434, -78.12068985924168],12)

// Agregar mapa base de OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Volar a coordenadas de los sitios de la Lista desplegable
document.getElementById('select-location').addEventListener('change', function(e){
    let coords = e.target.value.split(",");
    map.flyTo(coords,13);
})

// Agregar mapa base para el Mini Mapa
var carto_light = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {attribution: '©OpenStreetMap, ©CartoDB',subdomains: 'abcd',maxZoom: 24});

// Agregar escala
 new L.control.scale({imperial: false}).addTo(map);

// Coordenadas
$lat= -2.3075364902590434; $lng = -78.12068985924168;
$lat1= -2.456614437892746; $lng11 = -78.16753239973752;
$lat2 = -1.698704212208859; $lng12 = -77.96131980117164;
$lat3 = -2.6166923842820093; $lng13= -78.20732847869333;
$lat4 = -2.7143546517751167; $lng14= -78.31796602659166;
$lat5= -2.34019531286782; $lng15= -77.45778149828521;
$lat6= -3.4062400944523565; $lng16= -78.57040569940868;
$lat7= -1.9449167639911342; $lng17= -78.00101982236892;
$lat8= -1.9200408748910287; $lng18= -78.00675685782805;
$lat9= -3.0453985915199007; $lng19= -78.29012407181673;
$lat10 = -2.8781092172764153; $lng20 = -77.74616401634414;

var marker = L.marker([-2.3075364902590434, -78.12068985924168],{
    icon: L.divIcon({
        className: 'icong',
        html: '<i class="fas fa-map-marker-alt"></i>'
    })
}).addTo(map);

var marker = L.marker([-2.456614437892746, -78.16753239973752],{
    icon: L.divIcon({
        className: 'iconr',
        html: '<i class="fas fa-map-marker-alt"></i>'
    })
}).addTo(map);

if ($lat == -2.3075364902590434 && $lng == -78.12068985924168){
    $('.icong').css({
        'color': 'green',
        'width': '40px',
        'height': '40px',
        'line-height': '40px',
        'text-align': 'center',
        'font-size': '30px'
    });
}if($lat1 == -2.456614437892746 && $lng11 == -78.16753239973752){
    $('.iconr').css({
        'color': 'red',
        'width': '40px',
        'height': '40px',
        'line-height': '40px',
        'text-align': 'center',
        'font-size': '30px'
    });
}

map.invalidateSize();


