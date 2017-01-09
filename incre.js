/**
 * Created by ACER on 12/6/2016.
 */
function inc(name) {
    var current = document.getElementById(name).value;
    if (current < 4) {
        document.getElementById(name).value = ++current;
    }
}
function dec(name) {
    var current = document.getElementById(name).value;
    if(current>0){
        document.getElementById(name).value = --current;
    }
}



