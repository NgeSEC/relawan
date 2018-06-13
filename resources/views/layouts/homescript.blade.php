<script>
    function onEachFeature(feature, layer) {
            if (feature.properties && feature.properties.popupContent) {
                layer.bindPopup(feature.properties.popupContent);
            }
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
    var kmlLayer = new L.KML("{{ asset('js/map/krb_merapi.kml') }}", {async: true});
    var tngmLayer = new L.KML("{{ asset('js/map/tngmerapi.kml') }}", {async: true});
    var overlayMaps = {
        "Kawasan Rawan Bencana": kmlLayer,
        "Kawasan Taman Nasional": tngmLayer,
        "Citra Satelit": layer
    }
                                               
    function map_init(map, options) {
        L.control.layers(null,overlayMaps).addTo(map);      
        map.scrollWheelZoom.disable();
    }
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
(function () {

    function loadmap() {
        var djoptions = {"layers": [["Background", "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", ""]], "minimap": false, "scale": "metric", "center": [-7.5407423, 110.4097974], "tilesextent": [], "attributionprefix": "Powered by Rakyat Seputar Merapi", "zoom": 13, "maxzoom": 20, "minzoom": 3, "extent": [[-90, -180], [90, 180]], "resetview": false, "srid": null, "overlays": [], "fitextent": true, "scrollWheelZoom": false},
            options = {djoptions: djoptions, initfunc: loadmap,
                       globals: false, callback: window.map_init};
        L.Map.djangoMap('spots', options);
    }
    var loadevents = ["load"];
    if (loadevents.length === 0) loadmap();
    else if (window.addEventListener) for (var i=0; i<loadevents.length; i++) window.addEventListener(loadevents[i], loadmap, false);
    else if (window.jQuery) jQuery(window).on(loadevents.join(' '), loadmap);
    
})();
</script>