<script src="{{asset('map/js/posko-pengungsi.js')}}"></script>
<script>
    function onEachFeature(feature, layer) {
            //var popupContent = '<h5>'+feature.properties.Name+'</h5>';
            var popupContent = "<table class='table table-striped table-bordered table-condensed'>" +
					"<tr><td>" + feature.properties.description + "</td></tr>" + 
					"<tr><td>Koordinat Bujur (X): " + feature.geometry.coordinates[0] + "</td></tr>" + 
					"<tr><td>Koordinat Lintang (Y): " + feature.geometry.coordinates[1] + "</td></tr>" + 
					"</table>";
			/* if (feature.properties && feature.properties.description) {
                popupContent += '<p>'+feature.properties.description+'</p>'; */
			if (feature.properties) {
				layer.on({
					click: function (e) {
					  $("#feature-title").html(feature.properties.Name);
					  $("#feature-info").html(popupContent);
					  $("#featureModal").modal("show");
					  highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
					}
				});
            }
            layer.bindPopup(popupContent);
        }
    var BingLayer = L.TileLayer.extend({
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

    var layer = new BingLayer('http://t{s}.tiles.virtualearth.net/tiles/a{q}.jpeg?g=1398', {
        subdomains: ['0', '1', '2', '3', '4'],
        attribution: '&copy; <a href="http://bing.com/maps">Bing Maps</a>'
    });

    var kmlLayer = new L.KML("{{ asset('map/kml/krb_merapi.kml') }}", {async: true});
    var tngmLayer = new L.KML("{{ asset('map/kml/tngmerapi.kml') }}", {async: true});
    var posko = new L.geoJson(poskoPengungsi, {onEachFeature: onEachFeature});

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

	var overlayMaps = {
        "Kawasan Rawan Bencana": kmlLayer,
        "Kawasan Taman Nasional": tngmLayer,
        "Posko Pengungsi": posko,
        "Citra Satelit": layer
    }
    var options = {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    };

    function error(err) {
      console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    var customControl =  L.Control.extend({

      options: {
        position: 'topleft',
      },

      onAdd: function (map) {
        this._map = map;
        var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');

        container.style.backgroundColor = 'white';     
        container.style.backgroundImage = "url({{asset('map/css/img/oo_icon.gif')}})";
        container.style.backgroundSize = "18px 18px";
        container.style.backgroundRepeat = "no-repeat";
        container.style.backgroundPosition = "center center";
        container.style.width = '28px';
        container.style.height = '28px';

        container.onclick = function(){
              navigator.geolocation.getCurrentPosition(function success(pos) {
                var crd = pos.coords;
                marker = L.userMarker([crd.latitude,crd.longitude], {pulsing:true, smallIcon:true}).addTo(map);
                marker.setLatLng([crd.latitude,crd.longitude]);
                marker.setAccuracy(100);
                map.locate({
                    watch: false,
                    locate: true,
                    setView: true,
                    enableHighAccuracy: true
                });
            }, error, options);
        }

        return container;
      }
    });
                                               
    function map_init(map, options) {
        var marker = null;
        L.control.layers(null,overlayMaps).addTo(map);
        map.scrollWheelZoom.disable();
        //map.addControl(new customControl());
		posko.addTo(map);
		locateControl.addTo(map);
    }
    
</script>

<script type="text/javascript">
(function () {

    function loadmap() {
        var djoptions = {"layers": [["Background", "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", ""]], "minimap": false, "scale": "metric", "center": [-7.5407423, 110.4097974], "tilesextent": [], "attributionprefix": "Powered by Rakyat Seputar Merapi", "zoom": 13, "maxzoom": 20, "minzoom": 3, "extent": [[-90, -180], [90, 180]], "resetview": false, "srid": null, "overlays": [], "fitextent": true},
            options = {djoptions: djoptions, initfunc: loadmap,
                       globals: false, callback: window.map_init};
        L.Map.poskoMap('spots', options);
    }
    var loadevents = ["load"];
    if (loadevents.length === 0) loadmap();
    else if (window.addEventListener) for (var i=0; i<loadevents.length; i++) window.addEventListener(loadevents[i], loadmap, false);
    else if (window.jQuery) jQuery(window).on(loadevents.join(' '), loadmap);
    
})();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.31&region=ID&language=id&key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&libraries=places"></script>
<style>
.leaflet-control-custom:hover {
    cursor: pointer;
}
</style>
