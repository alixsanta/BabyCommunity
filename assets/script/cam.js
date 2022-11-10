const camElement = document.getElementById("webCam");
const canvasElement = document.getElementById("canvas");
const cam = new Webcam(camElement, "user", canvasElement);
cam.start();

function prendrePhoto(){
    let photo = cam.snap();
    document.querySelector("a").href = photo;
}