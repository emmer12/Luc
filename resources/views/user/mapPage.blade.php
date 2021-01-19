@extends('layouts.map')

@section('content')
<div class="container">
    <br><br>
    <style>
            #map,.map{
               width: 100%;
               height: 100%;
               padding: 0;
               margin: 0;
           }
           </style>
       
    @if (session('msg'))
        <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
    <div id="map" height="100%" width="100%"  >
        <div style="height:100%;width:100%;background:red">s</div>
    </div>
    <script src="js/qgis2web_expressions.js"></script>
    <script src="js/leaflet-src.js"></script><script src="js/L.Control.Locate.min.js"></script>
    <script src="js/leaflet.rotatedMarker.js"></script>
    <script src="js/leaflet.pattern.js"></script>
    <script src="js/leaflet-hash.js"></script>
    <script src="js/Autolinker.min.js"></script>
    <script src="js/rbush.min.js"></script>
    <script src="js/labelgun.min.js"></script>
    <script src="js/labels.js"></script>
    <script src="js/leaflet-search.js"></script>
    <script src="data/ALagbakaBuilding_0.js"></script>
    <script src="data/AuleBuilding_1.js"></script>
    <script src="data/AlagbakaRoadNetwork_2.js"></script>
    <script src="data/AuleRoadNetwork_3.js"></script>
    <script>
    var highlightLayer;
    function highlightFeature(e) {
        highlightLayer = e.target;

        if (e.target.feature.geometry.type === 'LineString') {
          highlightLayer.setStyle({
            color: '#ffff00',
          });
        } else {
          highlightLayer.setStyle({
            fillColor: '#ffff00',
            fillOpacity: 1
          });
        }
        highlightLayer.openPopup();
    }
    var map = L.map('map', {
        zoomControl:true, maxZoom:20, minZoom:6
    }).fitBounds([[7.2585941075,5.12366847845],[7.2949657925,5.18203072155]]);
    var hash = new L.Hash(map);
    map.attributionControl.addAttribution('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>');
    L.control.locate().addTo(map);
    var bounds_group = new L.featureGroup([]);
    function setBounds() {
    }
    function pop_ALagbakaBuilding_0(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature){
                        feature.closePopup()
                    });
                }
            },
            mouseover: highlightFeature,
            click:function(e){
                var Id=e.target.feature.properties.ID_numbers;
                var url="http://localhost/laravelApps/luc/public/login?id="+Id
                console.log(Id);
                console.log(url);
                window.location.href=url;
            }
        });
        
        var popupContent = '<table>\
                <tr>\
                    <th scope="row">Feature Type</th>\
                    <td>' + (feature.properties['building'] !== null ? Autolinker.link(String(feature.properties['building'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Identification Numbers</th>\
                    <td>' + (feature.properties['ID_numbers'] !== null ? Autolinker.link(String(feature.properties['ID_numbers'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Name</th>\
                    <td>' + (feature.properties['BDG_Name'] !== null ? Autolinker.link(String(feature.properties['BDG_Name'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Type</th>\
                    <td>' + (feature.properties['BDG_Type'] !== null ? Autolinker.link(String(feature.properties['BDG_Type'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Class</th>\
                    <td>' + (feature.properties['BDG_Class'] !== null ? Autolinker.link(String(feature.properties['BDG_Class'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Road Name</th>\
                    <td>' + (feature.properties['Street'] !== null ? Autolinker.link(String(feature.properties['Street'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Floor</th>\
                    <td>' + (feature.properties['BDG_Floors'] !== null ? Autolinker.link(String(feature.properties['BDG_Floors'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Local Government</th>\
                    <td>' + (feature.properties['Local_Govt'] !== null ? Autolinker.link(String(feature.properties['Local_Govt'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">State</th>\
                    <td>' + (feature.properties['State'] !== null ? Autolinker.link(String(feature.properties['State'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Country</th>\
                    <td>' + (feature.properties['Country'] !== null ? Autolinker.link(String(feature.properties['Country'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Area Classification</th>\
                    <td>' + (feature.properties['Area_Class'] !== null ? Autolinker.link(String(feature.properties['Area_Class'])) : '') + '</td>\
                </tr>\
            </table>';
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_ALagbakaBuilding_0_0(feature) {
        switch(String(feature.properties['BDG_Class'])) {
            case 'Agriculture':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(86,57,214,1.0)',
        }
                break;
            case 'Commercial':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(229,181,114,1.0)',
        }
                break;
            case 'Education':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(204,36,39,1.0)',
        }
                break;
            case 'Government':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(205,105,232,1.0)',
        }
                break;
            case 'Govt Buildings':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(105,221,76,1.0)',
        }
                break;
            case 'Industry':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(55,206,204,1.0)',
        }
                break;
            case 'Recreational':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(25,103,211,1.0)',
        }
                break;
            case 'Religious':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(236,35,159,1.0)',
        }
                break;
            case 'Residential':
                return {
            pane: 'pane_ALagbakaBuilding_0',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(47,208,112,1.0)',
        }
                break;
        }
    }
    map.createPane('pane_ALagbakaBuilding_0');
    map.getPane('pane_ALagbakaBuilding_0').style.zIndex = 400;
    map.getPane('pane_ALagbakaBuilding_0').style['mix-blend-mode'] = 'normal';
    var layer_ALagbakaBuilding_0 = new L.geoJson(json_ALagbakaBuilding_0, {
        attribution: '<a href=""></a>',
        pane: 'pane_ALagbakaBuilding_0',
        onEachFeature: pop_ALagbakaBuilding_0,
        style: style_ALagbakaBuilding_0_0,
    });
    bounds_group.addLayer(layer_ALagbakaBuilding_0);
    map.addLayer(layer_ALagbakaBuilding_0);
    function pop_AuleBuilding_1(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature){
                        feature.closePopup()
                    });
                }
            },
            click:function(e){
                var Id=e.target.feature.properties.id_Numbers;
                var url="http://localhost/laravelApps/luc/public/login?id="+Id
                console.log(e.target.feature);
                console.log(url);
                window.location.href=url
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                <tr>\
                    <th scope="row">Feature Type</th>\
                    <td>' + (feature.properties['building'] !== null ? Autolinker.link(String(feature.properties['building'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Name</th>\
                    <td>' + (feature.properties['BDG_Name'] !== null ? Autolinker.link(String(feature.properties['BDG_Name'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Type</th>\
                    <td>' + (feature.properties['BDG_Type'] !== null ? Autolinker.link(String(feature.properties['BDG_Type'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Class</th>\
                    <td>' + (feature.properties['BDG_Class'] !== null ? Autolinker.link(String(feature.properties['BDG_Class'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Road Name</th>\
                    <td>' + (feature.properties['Street'] !== null ? Autolinker.link(String(feature.properties['Street'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Local Government</th>\
                    <td>' + (feature.properties['Local_Govt'] !== null ? Autolinker.link(String(feature.properties['Local_Govt'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">State</th>\
                    <td>' + (feature.properties['State'] !== null ? Autolinker.link(String(feature.properties['State'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Building Floor</th>\
                    <td>' + (feature.properties['BDG_Floors'] !== null ? Autolinker.link(String(feature.properties['BDG_Floors'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Country</th>\
                    <td>' + (feature.properties['Country'] !== null ? Autolinker.link(String(feature.properties['Country'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Identification Numbers</th>\
                    <td>' + (feature.properties['id_Numbers'] !== null ? Autolinker.link(String(feature.properties['id_Numbers'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Area Classification</th>\
                    <td>' + (feature.properties['Area_Class'] !== null ? Autolinker.link(String(feature.properties['Area_Class'])) : '') + '</td>\
                </tr>\
            </table>';
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_AuleBuilding_1_0(feature) {
        switch(String(feature.properties['BDG_Class'])) {
            case 'Commercial':
                return {
            pane: 'pane_AuleBuilding_1',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(152,127,224,1.0)',
        }
                break;
            case 'Industrial':
                return {
            pane: 'pane_AuleBuilding_1',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(226,149,123,1.0)',
        }
                break;
            case 'Religious':
                return {
            pane: 'pane_AuleBuilding_1',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(215,83,182,1.0)',
        }
                break;
            case 'Residential':
                return {
            pane: 'pane_AuleBuilding_1',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(177,218,54,1.0)',
        }
                break;
            case 'Unclassified':
                return {
            pane: 'pane_AuleBuilding_1',
            opacity: 1,
            color: 'rgba(0,0,0,1.0)',
            dashArray: '',
            lineCap: 'butt',
            lineJoin: 'miter',
            weight: 1.0, 
            fill: true,
            fillOpacity: 1,
            fillColor: 'rgba(18,172,228,1.0)',
        }
                break;
        }
    }
    map.createPane('pane_AuleBuilding_1');
    map.getPane('pane_AuleBuilding_1').style.zIndex = 401;
    map.getPane('pane_AuleBuilding_1').style['mix-blend-mode'] = 'normal';
    var layer_AuleBuilding_1 = new L.geoJson(json_AuleBuilding_1, {
        attribution: '<a href=""></a>',
        pane: 'pane_AuleBuilding_1',
        onEachFeature: pop_AuleBuilding_1,
        style: style_AuleBuilding_1_0,
    });
    bounds_group.addLayer(layer_AuleBuilding_1);
    map.addLayer(layer_AuleBuilding_1);
    function pop_AlagbakaRoadNetwork_2(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature){
                        feature.closePopup()
                    });
                }
            },
            click:function(e){
                var Id=e.target.feature.properties.id_Numbers;
                var url="http://localhost/laravelApps/luc/public/login?id="+Id
                console.log(e.target.feature);
                console.log(url);
                window.location.href=url
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                <tr>\
                    <th scope="row">Road Name</th>\
                    <td>' + (feature.properties['name'] !== null ? Autolinker.link(String(feature.properties['name'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Road Class</th>\
                    <td>' + (feature.properties['highway'] !== null ? Autolinker.link(String(feature.properties['highway'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Order Classification</th>\
                    <td>' + (feature.properties['z_order'] !== null ? Autolinker.link(String(feature.properties['z_order'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Other Feature</th>\
                    <td>' + (feature.properties['other_tags'] !== null ? Autolinker.link(String(feature.properties['other_tags'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Road Type</th>\
                    <td>' + (feature.properties['Road_Type'] !== null ? Autolinker.link(String(feature.properties['Road_Type'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Speed Limit</th>\
                    <td>' + (feature.properties['SpeedLimit'] !== null ? Autolinker.link(String(feature.properties['SpeedLimit'])) : '') + '</td>\
                </tr>\
            </table>';
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_AlagbakaRoadNetwork_2_0(feature) {
        switch(String(feature.properties['Road_Type'])) {
            case 'Path':
                return {
            pane: 'pane_AlagbakaRoadNetwork_2',
            opacity: 1,
            color: 'rgba(191,162,66,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 1.0,
            fillOpacity: 0,
        }
                break;
            case 'Road':
                return {
            pane: 'pane_AlagbakaRoadNetwork_2',
            opacity: 1,
            color: 'rgba(242,255,118,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 4.0,
            fillOpacity: 0,
        }
                break;
            case 'Street':
                return {
            pane: 'pane_AlagbakaRoadNetwork_2',
            opacity: 1,
            color: 'rgba(197,197,197,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 2.0,
            fillOpacity: 0,
        }
                break;
            case 'Unclassified':
                return {
            pane: 'pane_AlagbakaRoadNetwork_2',
            opacity: 1,
            color: 'rgba(197,197,197,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 2.0,
            fillOpacity: 0,
        }
                break;
        }
    }
    map.createPane('pane_AlagbakaRoadNetwork_2');
    map.getPane('pane_AlagbakaRoadNetwork_2').style.zIndex = 402;
    map.getPane('pane_AlagbakaRoadNetwork_2').style['mix-blend-mode'] = 'normal';
    var layer_AlagbakaRoadNetwork_2 = new L.geoJson(json_AlagbakaRoadNetwork_2, {
        attribution: '<a href=""></a>',
        pane: 'pane_AlagbakaRoadNetwork_2',
        onEachFeature: pop_AlagbakaRoadNetwork_2,
        style: style_AlagbakaRoadNetwork_2_0,
    });
    bounds_group.addLayer(layer_AlagbakaRoadNetwork_2);
    map.addLayer(layer_AlagbakaRoadNetwork_2);
    function pop_AuleRoadNetwork_3(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature){
                        feature.closePopup()
                    });
                }
            },
            click:function(e){
                var Id=e.target.feature.properties.id_Numbers;
                var url="http://localhost/laravelApps/luc/public/login?id="+Id
                console.log(e.target.feature);
                console.log(url);
                window.location.href=url
            },
            mouseover: highlightFeature,
        });
        var popupContent = '<table>\
                <tr>\
                    <th scope="row">Road Name</th>\
                    <td>' + (feature.properties['name'] !== null ? Autolinker.link(String(feature.properties['name'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Road Class</th>\
                    <td>' + (feature.properties['highway'] !== null ? Autolinker.link(String(feature.properties['highway'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Order Classification</th>\
                    <td>' + (feature.properties['z_order'] !== null ? Autolinker.link(String(feature.properties['z_order'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Other Features</th>\
                    <td>' + (feature.properties['other_tags'] !== null ? Autolinker.link(String(feature.properties['other_tags'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Road Type</th>\
                    <td>' + (feature.properties['Road_Type'] !== null ? Autolinker.link(String(feature.properties['Road_Type'])) : '') + '</td>\
                </tr>\
                <tr>\
                    <th scope="row">Speed Limit</th>\
                    <td>' + (feature.properties['SpeedLimit'] !== null ? Autolinker.link(String(feature.properties['SpeedLimit'])) : '') + '</td>\
                </tr>\
            </table>';
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_AuleRoadNetwork_3_0(feature) {
        switch(String(feature.properties['Road_Type'])) {
            case 'Close':
                return {
            pane: 'pane_AuleRoadNetwork_3',
            opacity: 1,
            color: 'rgba(197,197,197,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 2.0,
            fillOpacity: 0,
        }
                break;
            case 'Road':
                return {
            pane: 'pane_AuleRoadNetwork_3',
            opacity: 1,
            color: 'rgba(242,255,118,0.921568627451)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 4.0,
            fillOpacity: 0,
        }
                break;
            case 'Street':
                return {
            pane: 'pane_AuleRoadNetwork_3',
            opacity: 1,
            color: 'rgba(197,197,197,1.0)',
            dashArray: '',
            lineCap: 'square',
            lineJoin: 'bevel',
            weight: 2.0,
            fillOpacity: 0,
        }
                break;
        }
    }
    map.createPane('pane_AuleRoadNetwork_3');
    map.getPane('pane_AuleRoadNetwork_3').style.zIndex = 403;
    map.getPane('pane_AuleRoadNetwork_3').style['mix-blend-mode'] = 'normal';
    var layer_AuleRoadNetwork_3 = new L.geoJson(json_AuleRoadNetwork_3, {
        attribution: '<a href=""></a>',
        pane: 'pane_AuleRoadNetwork_3',
        onEachFeature: pop_AuleRoadNetwork_3,
        style: style_AuleRoadNetwork_3_0,
    });
    bounds_group.addLayer(layer_AuleRoadNetwork_3);
    map.addLayer(layer_AuleRoadNetwork_3);
    var title = new L.Control();
    title.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };
    title.update = function () {
        this._div.innerHTML = '<h2>Property Identification</h2>';
    };
    title.addTo(map);
    var baseMaps = {};
    L.control.layers(baseMaps,{'Aule Road Network<br /><table><tr><td style="text-align: center;"><img src="legend/AuleRoadNetwork_3_Close0.png" /></td><td>Close</td></tr><tr><td style="text-align: center;"><img src="legend/AuleRoadNetwork_3_Road1.png" /></td><td>Road</td></tr><tr><td style="text-align: center;"><img src="legend/AuleRoadNetwork_3_Street2.png" /></td><td>Street</td></tr></table>': layer_AuleRoadNetwork_3,'Alagbaka Road Network<br /><table><tr><td style="text-align: center;"><img src="legend/AlagbakaRoadNetwork_2_Path0.png" /></td><td>Path</td></tr><tr><td style="text-align: center;"><img src="legend/AlagbakaRoadNetwork_2_Road1.png" /></td><td>Road</td></tr><tr><td style="text-align: center;"><img src="legend/AlagbakaRoadNetwork_2_Street2.png" /></td><td>Street</td></tr><tr><td style="text-align: center;"><img src="legend/AlagbakaRoadNetwork_2_Unclassified3.png" /></td><td>Unclassified</td></tr></table>': layer_AlagbakaRoadNetwork_2,'Aule Building<br /><table><tr><td style="text-align: center;"><img src="legend/AuleBuilding_1_Commercial0.png" /></td><td>Commercial</td></tr><tr><td style="text-align: center;"><img src="legend/AuleBuilding_1_Industrial1.png" /></td><td>Industrial</td></tr><tr><td style="text-align: center;"><img src="legend/AuleBuilding_1_Religious2.png" /></td><td>Religious</td></tr><tr><td style="text-align: center;"><img src="legend/AuleBuilding_1_Residential3.png" /></td><td>Residential</td></tr><tr><td style="text-align: center;"><img src="legend/AuleBuilding_1_Unclassified4.png" /></td><td>Unclassified</td></tr></table>': layer_AuleBuilding_1,'ALagbaka Building<br /><table><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Agriculture0.png" /></td><td>Agriculture</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Commercial1.png" /></td><td>Commercial</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Education2.png" /></td><td>Education</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Government3.png" /></td><td>Government</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_GovtBuildings4.png" /></td><td>Govt Buildings</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Industry5.png" /></td><td>Industry</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Recreational6.png" /></td><td>Recreational</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Religious7.png" /></td><td>Religious</td></tr><tr><td style="text-align: center;"><img src="legend/ALagbakaBuilding_0_Residential8.png" /></td><td>Residential</td></tr></table>': layer_ALagbakaBuilding_0,}).addTo(map);
    setBounds();
    map.addControl(new L.Control.Search({
        layer: layer_AuleBuilding_1,
        initial: false,
        hideMarkerOnCollapse: true,
        propertyName: 'id_Numbers'}));
    </script>
</div>
@endsection
