function show()
{

var t=document.forma1.Address.value;

ymaps.geocode(t,{results:1}).then(
function(res){  var MyGeoObj = res.geoObjects.get(0);

document.getElementById('one').value = [MyGeoObj.geometry.getCoordinates()[0], MyGeoObj.geometry.getCoordinates()[1]];
 myMap.panTo([MyGeoObj.geometry.getCoordinates()[0], MyGeoObj.geometry.getCoordinates()[1]]);
 myMap.setCenter([59.402549,56.788133]);

});
}