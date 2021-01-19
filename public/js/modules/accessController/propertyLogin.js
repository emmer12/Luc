var map = null;

function initMap() {
            console.log("init map called");
            var myLatLng = {lat: 6.465422, lng: 3.406448};
           
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                scrollwheel: false
                //zoom: 1
            });
            if (map == null) {
                console.log("Map failed to initialise");
            } else {
                console.log("Map initialised");
            }
        }

function addMarkerClusters(data) {

                    console.log("adding marker to map")

                    var bounds = new google.maps.LatLngBounds();



                        var latLng = new google.maps.LatLng(data.lat, data.lng);
                        var marker = new google.maps.Marker({
                            position: latLng,
                            title: data.label,
                            map: map,

                        });

                        bounds.extend(marker.getPosition());


                if(data.lat !== 0){
                    map.setCenter(bounds.getCenter());
                    map.fitBounds(bounds);
                        $('#demoMap').addClass('hidden');
                        $('#mapView').removeClass('hidden');
                    }else{
                         $('#demoMap').removeClass('hidden');
                         $('#mapView').addClass('hidden');
                    }
                }

function getMapResults(){
    initMap();
    var pid = $('#pid').val() === undefined ? '' : $('#pid').val();
    var lga = $('#lga').val() === undefined ? '' : $('#lga').val();
    var params = 'pid='+pid;
    params += '&lga='+lga;
    var mapUrl = "/api/property/location?"+ params;
    console.log('map url '+mapUrl);
     jQuery.ajax({
        		     url: mapUrl,
        		     type: "GET",
        		     dataType: "json",
        		     success: function(data, textStatus, jqXHR){
        		            console.log('data '+data);
        		            if(data.code != '200'){
        		                console.log('data msg '+data.message);
        		                showErrorMsg(data.message);
        		                 $('#demoMap').removeClass('hidden');
                                 $('#mapView').addClass('hidden');
                                 return;

        		            }
                            addMarkerClusters(data.data);
        		     }
        		   });
}



function showErrorMsg(message){
        $('#messageDiv').removeClass("hidden");
		 $('#errormessage').text(message);
}