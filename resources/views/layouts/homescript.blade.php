<script src="{{asset('map/js/posko-pengungsi.js')}}"></script>
<script>
  /* Posko Popup Function */
  function onEachFeature(feature, layer) {
    var popupContent = "<table class='table table-striped table-bordered table-condensed'>" +
				"<tr><td colspan='2'>" + feature.properties.description + "</td></tr>" + 
				"<tr><td>Koordinat</td><td>" + feature.geometry.coordinates[0] + ", " + feature.geometry.coordinates[1] + "</td></tr>" + 
				"<tr><td>Status</td><td>" + "-" + "</td></tr>" + 
        "<tr><td>Koordinator</td><td>" + "-" + "</td></tr>" + 
        "<tr><td>Telepon</td><td>" + "-" + "</td></tr>" +
				"</table>" + "<a href='#'>Detil Info >></a>";
		if (feature.properties) {
			layer.on({
				click: function (e) {
				  $("#feature-title").html(feature.properties.Name);
				  $("#feature-info").html(popupContent);
				  $("#featureModal").modal("show");
				}
			});
    }
  }

  /* Basemap */
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

  var basemapBing = new BingLayer('https://t{s}.tiles.virtualearth.net/tiles/a{q}.jpeg?g=1398', {
      subdomains: ['0', '1', '2', '3', '4'],
      attribution: '&copy; <a href="https://bing.com/maps">Bing Maps</a>'
  });

  var basemapOSM = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
     maxZoom: 18,
     attribution: 'OpenStreetMap'
  });

  var basemapGoogleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
     maxZoom: 20,
     subdomains:['mt0','mt1','mt2','mt3'],
     attribution: 'Google Streets'
  });

  var basemapGoogleSatellite = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
     maxZoom: 20,
     subdomains:['mt0','mt1','mt2','mt3'],
     attribution: 'Google Satellite'
  });

  var basemapGoogleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
     maxZoom: 20,
     subdomains:['mt0','mt1','mt2','mt3'],
     attribution: 'Google Hybrid'
  }); 

  var basemapGoogleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
     maxZoom: 20,
     subdomains:['mt0','mt1','mt2','mt3'],
     attribution: 'Google Terrain'
  }); 

  /* Layer */
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

  /* Control Layer */
	var baseMaps = {
      "OpenStreetMap": basemapOSM,
      "Bing Satellite": basemapBing,
      "Google Streets": basemapGoogleStreets,
      "Google Satellite": basemapGoogleSatellite,
      "Google Hybrid": basemapGoogleHybrid,
      "Google Terrain": basemapGoogleTerrain,
  }
  var overlayMaps = {
      "Kawasan Rawan Bencana": kmlLayer,
      "Kawasan Taman Nasional": tngmLayer,
      "Posko Pengungsi": posko,
  }
                                             
  function map_init(map, options) {
      var marker = null;
      basemapOSM.addTo(map);
      L.control.layers(baseMaps, overlayMaps).addTo(map);
      map.scrollWheelZoom.disable();
  		posko.addTo(map);
  		locateControl.addTo(map);

      /* Layer Overlay FitBounds*/
      map.on("overlayadd", function(e){
        map.fitBounds(e.layer.getBounds());
      });
  }
    
</script>

<script type="text/javascript">
  (function () {

      function loadmap() {
          var djoptions = {"layers": [[basemapOSM, ""]], "minimap": false, "scale": "metric", "center": [-7.5407423, 110.4097974], "tilesextent": [], "attributionprefix": "Powered by Rakyat Seputar Merapi", "zoom": 13, "maxzoom": 20, "minzoom": 3, "extent": [[-90, -180], [90, 180]], "resetview": false, "srid": null, "overlays": [], "fitextent": true},
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
