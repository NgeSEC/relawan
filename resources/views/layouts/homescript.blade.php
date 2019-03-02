<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    function getDetailPoskoNameRoute(){
        detailPoskoNameRoute = detailPoskoNameRoute.replace(':slug','');
        return detailPoskoNameRoute;
    }
</script>
<script>

    function replaceSpaceOnPoskoName(poskoname)
    {
        //replace white space on posko name with - for generating url query string
        poskoname = poskoname.replace(/\s/g, '-');

        //set global variabel currentposkoname with posko name query string
        currentposkoname = poskoname;
    }

    function goToUrlDetailInfo()
    {
        //when detail info clicked, go to detail info posko page
        window.location.href = getDetailPoskoNameRoute() + currentposkoname;
    }

    /* Posko Popup Function */
    function onEachFeature(feature, layer) {

        var popupContent = "<table class='table table-striped table-bordered table-condensed'>" +
            "<tr><td colspan='2'>" + feature.properties.description + "</td></tr>" +
            "<tr><td>Koordinat</td><td>" + feature.geometry.coordinates[0] + ", " + feature.geometry.coordinates[1] + "</td></tr>" +
            "<tr><td>Status</td><td>" + "-" + "</td></tr>" +
            "<tr><td>Koordinator</td><td>" + "-" + "</td></tr>" +
            "<tr><td>Telepon</td><td>" + "-" + "</td></tr>" +
            "</table>" + "<a href='#' onclick='goToUrlDetailInfo(); return false;'>Detil Info >></a>";

        if (feature.properties) {
            layer.on({
                click: function (e) {
                    //sreplace whitespace on posko name to - and set to global variabel currentposkoname
                    replaceSpaceOnPoskoName(feature.properties.Name);

                    $("#feature-title").html(feature.properties.Name);
                    $("#feature-info").html(popupContent);
                    $("#featureModal").modal("show");
                }
            });
        }
    }

    /* Basemap */
    /* var BingLayer = L.TileLayer.extend({
        getTileUrl: function (tilePoint) {
            this._adjustTilePoint(tilePoint);
            return L.Util.template(this._url, {
                s: this._getSubdomain(tilePoint),
                q: this._quadKey(tilePoint.x, tilePoint.y, this._getZoomForUrl())
            });
        },
        _quadKey: function (x, y, z) {
            var quadKey = [];
            for (var i = z; i > 0; i--) {
                var digit = '0';
                var mask = 1 << (i - 1);
                if ((x & mask) != 0) {
                    digit++;
                }
                if ((y & mask) != 0) {
                    digit++;
                    digit++;
                }
                quadKey.push(digit);
            }
            return quadKey.join('');
        }
    });

    var basemapBing = new BingLayer('https://t{s}.tiles.virtualearth.net/tiles/a{q}.jpeg?g=1398', {
        subdomains: ['0', '1', '2', '3', '4'],
        attribution: '&copy; <a href="https://bing.com/maps">Bing Maps</a>'
    }); */

    var basemapOSM = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'OpenStreetMap'
    });

    var basemapGoogleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Google Streets'
    });

    var basemapGoogleSatellite = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Google Satellite'
    });

    var basemapGoogleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Google Hybrid'
    });

    var basemapGoogleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Google Terrain'
    });

    /* Layer */
    var kmlLayer = new L.KML("{{ asset('map/kml/krb_merapi.kml') }}", {async: true});
    var tngmLayer = new L.KML("{{ asset('map/kml/tngmerapi.kml') }}", {async: true});

    var poskoPengungsi = {!! $poskoList !!};

    var posko = new L.geoJson(poskoPengungsi, {
        pointToLayer: function (feature, latlng) {
            //console.log(latlng);
            if (feature.properties.Name.indexOf('Shelter') >= 0) {
                var shelterMarker = L.AwesomeMarkers.icon({
                    icon: 'paw',
                    markerColor: 'red'
                });
                return L.marker(latlng, {icon: shelterMarker});
            } else if (feature.properties.Name.indexOf('Pengamatan') >= 0) {
                var towerMarker = L.AwesomeMarkers.icon({
                    icon: 'eye',
                    markerColor: 'orange'
                });
                return L.marker(latlng, {icon: towerMarker});
            } else {
                var posMarker = L.AwesomeMarkers.icon({
                    icon: 'home',
                    markerColor: 'blue'
                });
                return L.marker(latlng, {icon: posMarker});
            }
        },
        onEachFeature: onEachFeature
    });

    /* Script Plugin Geolocation */
    var locateControl = L.control.locate({
        position: "topleft",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: false,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8,
        },
        circleStyle: {
            weight: 1,
            clickable: false,
        },
        icon: "fa fa-crosshairs",
        metric: true,
        strings: {
            title: "Klik untuk mengetahui lokasimu",
            popup: "Lokasimu sekarang di sini. Akurasi {distance} {unit}",
            outsideMapBoundsMsg: "Kamu berada di luar area peta"
        },
        locateOptions: {
            maxZoom: 15,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000
        },
    });

    /* Control Layer Tree */
    var baseTree = [
        {
            label: 'Basemap',
            children: [
                {label: ' OpenStreetMap', layer: basemapOSM, name: 'OpenStreeMap'},
                //{label: ' Bing Satellite', layer: basemapBing, name: 'Bing Satellite'},
                {label: ' Google Streets', layer: basemapGoogleStreets, name: 'Google Streets'},
                {label: ' Google Satellite', layer: basemapGoogleSatellite, name: 'Google Satellite'},
                {label: ' Google Hybrid', layer: basemapGoogleHybrid, name: 'Google Hybrid'},
                {label: ' Google Terrain', layer: basemapGoogleTerrain, name: 'Google Terrain'},
            ]
        }
    ];

    var overlaysTree = {
        label: 'Layer',
        children: [
            {label: ' Posko Pengungsi', layer: posko},
            {label: ' Kawasan Rawan Bencana', layer: kmlLayer},
            {label: ' Kawasan Taman Nasional', layer: tngmLayer},
        ]
    }

    function getDistance(origin, destination) {
        var lon1 = toRadian(origin[1]),
            lat1 = toRadian(origin[0]),
            lon2 = toRadian(destination[1]),
            lat2 = toRadian(destination[0]);

        var deltaLat = lat2 - lat1;
        var deltaLon = lon2 - lon1;
        var a = Math.pow(Math.sin(deltaLat / 2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(deltaLon / 2), 2);
        var c = 2 * Math.asin(Math.sqrt(a));
        var EARTH_RADIUS = 6371;
        return c * EARTH_RADIUS * 1000;
    }

    function toRadian(degree) {
        return degree * Math.PI / 180;
    }

    function findNearestMarker(map, posko, coords) {
        var minDist = 1000,
            nearest_text = '0',
            markerDist,
            objects = posko._layers,
            len = Object.keys(posko._layers).length,
            i;

        Object.keys(objects).forEach(function (key) {
            markerDist = getDistance([objects[key]._latlng.lat, objects[key]._latlng.lng], [coords.lat, coords.lng])
            if (markerDist < minDist) {
                minDist = markerDist;
                nearest_text = key;
            }
        });
        var customIcon = new L.Icon({
            iconUrl: '{{ asset('map/js/images/mic_green_hut.png') }}',
            shadowUrl: '{{ asset('map/js/images/marker-shadow.png') }}',
            iconSize: [32, 41],
            shadowSize: [52, 54],
            iconAnchor: [32, 41],
            shadowAnchor: [29, 54],
            popupAnchor: [-3, -76]
        });
        objects[nearest_text].setIcon(customIcon);
        objects[nearest_text].bounce({duration: 500, height: 30, loop: 10});
    }

    function map_init(map, options) {
        var marker = null;
        basemapOSM.addTo(map);
        map.scrollWheelZoom.disable();
        posko.addTo(map);
        kmlLayer.addTo(map);
        var conlay = L.control.layers.tree(baseTree, overlaysTree, {
            namedToggle: false,
            selectorBack: false,
            closedSymbol: '&#8862; &#x1f5c0;',
            openedSymbol: '&#8863; &#x1f5c1;',
        });
        conlay.addTo(map).collapseTree(false).expandSelected(true);
        locateControl.addTo(map);

        map.on('overlayadd', function (e) {
            map.fitBounds(e.layer.getBounds());
        });
                @if (app('request')->input('lat'))
        var coords = new L.LatLng({{ app('request')->input('lat')}},{{ app('request')->input('lon')}});
        map.panTo(coords);
        findNearestMarker(map, posko, coords);
        @endif
    }

</script>

<script type="text/javascript">
    (function () {

        function loadmap() {
            var djoptions = {
                    "layers": [[basemapOSM, ""]],
                    "minimap": false,
                    "scale": "metric",
                    "center": [-7.5907423, 110.4097974],
                    "tilesextent": [],
                    "attributionprefix": "Powered by Rakyat Seputar Merapi",
                    "zoom": 12,
                    "maxzoom": 20,
                    "minzoom": 3,
                    "extent": [[-90, -180], [90, 180]],
                    "resetview": false,
                    "srid": null,
                    "overlays": [],
                    "fitextent": true
                },
                options = {
                    djoptions: djoptions, initfunc: loadmap,
                    globals: false, callback: window.map_init
                };
            L.Map.poskoMap('spots', options);
        }

        var loadevents = ["load"];
        if (loadevents.length === 0) loadmap();
        else if (window.addEventListener) for (var i = 0; i < loadevents.length; i++) window.addEventListener(loadevents[i], loadmap, false);
        else if (window.jQuery) jQuery(window).on(loadevents.join(' '), loadmap);

    })();
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.31&region=ID&language=id&key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&libraries=places"></script>
<style>
    .leaflet-control-custom:hover {
        cursor: pointer;
    }
</style>