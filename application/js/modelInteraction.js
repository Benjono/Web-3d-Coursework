// JavaScript source code
var spinning = false;
/* 
 * Enables an animation
 * @param {string} typeOfTimer - The type of timer (x, y or z) to enable.
 */
function spin(typeOfTimer) {
    var alltimers = document.querySelectorAll('[id^=model__Rot]');
    alltimers.forEach(element => element.setAttribute('enabled', 'false'));
    var timers = document.querySelectorAll('[id^=model__Rot' + typeOfTimer + ']');
    timers.forEach(element => element.setAttribute('enabled', 'true'));
}
/*
 * Stops rotation of all animations
 */
function stopRot() {
    spinning = false;
    var timers = document.querySelectorAll('[id^=model__Rot]');
    timers.forEach(element => element.setAttribute('enabled', 'false'));
}
/*
 * Legacy 
 */
function animateModel() {
    if (document.getElementById('model__RotZ-TIMER').getAttribute('enabled') != 'true')
        document.getElementById('model__RotZ-TIMER').setAttribute('enabled', 'true');
    else
        document.getElementById('model__RotZ-TIMER').setAttribute('enabled', 'false');
}
/*
 * Changes the camera the user views the 3d model from
 * @param {string} camera - The type of camera to focus on
 */
function cameraSwitch(camera) {
    var cameras = document.querySelectorAll('[id^=model__Camera' + camera + ']');
    cameras.forEach(element => element.setAttribute('set_bind', 'true'));
}
/*
 * Legacy
 */
function cameraFront() {
    document.getElementById('model__CameraFront').setAttribute('set_bind', 'true');
}
/*
 * Legacy
 */
function cameraBack() {
    document.getElementById('model__CameraBack').setAttribute('set_bind', 'true');
}
/*
 * Legacy
 */
function cameraLeft() {
    document.getElementById('model__CameraLeft').setAttribute('set_bind', 'true');
}
/*
 * Legacy
 */
function cameraRight() {
    document.getElementById('model__CameraRight').setAttribute('set_bind', 'true');
}
/*
 * Legacy
 */
function cameraTop() {
    document.getElementById('model__CameraTop').setAttribute('set_bind', 'true');
}
/*
 * Allows user to see the edges the model is constructed from
 */
function wireframe() {
    var x = document.querySelectorAll('[id$=Model]');
    x.forEach(element => element.runtime.togglePoints(true));
    x.forEach(element => element.runtime.togglePoints(true));
}
/*
 * Allows user to see the vertices the model is constructed from
 */
function points() {
    var x = document.querySelectorAll('[id$=Model]');
    x.forEach(element => element.runtime.togglePoints(true));
}
/*
 * Allows user to see the model
 */
function polygon() {
    var x = document.querySelectorAll('[id$=Model]');
    x.forEach(element => element.runtime.togglePoints(false));
    x.forEach(element => element.runtime.togglePoints(false));
}
var headlightOn = false;
/*
 * Turns headlight on/off
 */
function headlight() {
    headlightOn = !headlightOn;
    var headlights = document.querySelectorAll('[id=model__headlight]');
    headlights.forEach(element => element.setAttribute('headlight', headlightOn.toString()));
}
/*
 * Turns omniLights on/off
 */
var omniLights = true;
function omnilight() {
    omniLights = !omniLights;
    var lights = document.querySelectorAll('[id^=model__Omni]');
    lights.forEach(element => element.setAttribute('on', omniLights.toString()));
}
/*
 * Turns targetted lights on/off
 */
var targetlightOn = true;
function targetlight() {
    targetlightOn = !targetlightOn;
    var lights = document.querySelectorAll('[id^=model__Direct]');
    lights.forEach(element => element.setAttribute('on', targetlightOn.toString()));
}
/*
 * Resets to default settings
 */
function defaultSettings() {
    headlightOn = true; //True 
    headlight(); // -> false because function call
    omniLights = false;
    omnilight();
    targetlightOn = false;
    targetlight();
    polygon();
    spin('Z');
}