// JavaScript source code
var spinning = false;

function spin(typeOfTimer) {
    spinning = !spinning;
    var alltimers = document.querySelectorAll('[id^=model__Rot]');
    alltimers.forEach(element => element.setAttribute('enabled', 'false'));
    var timers = document.querySelectorAll('[id^=model__Rot' + typeOfTimer + ']');
    timers.forEach(element => element.setAttribute('enabled', 'true'));
}
function stopRot() {
    spinning = false;
    var timers = document.querySelectorAll('[id^=model__Rot]');
    timers.forEach(element => element.setAttribute('enabled', 'false'));
}
function animateModel() {
    if (document.getElementById('model__RotZ-TIMER').getAttribute('enabled') != 'true')
        document.getElementById('model__RotZ-TIMER').setAttribute('enabled', 'true');
    else
        document.getElementById('model__RotZ-TIMER').setAttribute('enabled', 'false');
}
function cameraSwitch(camera) {
    var cameras = document.querySelectorAll('[id^=model__Camera' + camera + ']');
    cameras.forEach(element => element.setAttribute('set_bind', 'true'));
}
function cameraFront() {
    document.getElementById('model__CameraFront').setAttribute('set_bind', 'true');
}
function cameraBack() {
    document.getElementById('model__CameraBack').setAttribute('set_bind', 'true');
}
function cameraLeft() {
    document.getElementById('model__CameraLeft').setAttribute('set_bind', 'true');
}
function cameraRight() {
    document.getElementById('model__CameraRight').setAttribute('set_bind', 'true');
}
function cameraTop() {
    document.getElementById('model__CameraTop').setAttribute('set_bind', 'true');
}
function wireframe() {
    var x = document.querySelectorAll('[id$=Model]');
    x.forEach(element => element.runtime.togglePoints(true));
    x.forEach(element => element.runtime.togglePoints(true));
}
function points() {
    var x = document.querySelectorAll('[id$=Model]');
    x.forEach(element => element.runtime.togglePoints(true));
}
function polygon() {
    var x = document.querySelectorAll('[id$=Model]');
    x.forEach(element => element.runtime.togglePoints(false));
    x.forEach(element => element.runtime.togglePoints(false));
}
var headlightOn = false;

function headlight() {
    headlightOn = !headlightOn;
    var headlights = document.querySelectorAll('[id=model__headlight]');
    headlights.forEach(element => element.setAttribute('headlight', headlightOn.toString()));
}

var omniLights = true;
function omnilight() {
    omniLights = !omniLights;
    var lights = document.querySelectorAll('[id^=model__Omni]');
    lights.forEach(element => element.setAttribute('on', omniLights.toString()));
}
var targetlightOn = true;
function targetlight() {

}
function defaultSettings() {
    headlightOn = true; //True 
    headlight(); // -> false because function call
    omniLights = false;
    omnilight();
    polygone();
    spin('Z');
}