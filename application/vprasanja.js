var json = require('vprasanja/vprasanja.json');
var obj = JSON.parse(json);

function neki(){
    document.getElementById("neki").innerHTML = obj.resource;
}