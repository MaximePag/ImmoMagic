//ipc permet de communiquer avec l'index.js d'intéragir avec notre application notre window
const {ipcRenderer} = require('electron')
const ipc = ipcRenderer

const reduceBtn = document.getElementById("reduceBtn")
const sizeBtn = document.getElementById("sizeBtn")
const closeBtn = document.getElementById("closeBtn")


reduceBtn.addEventListener("click", () => {
    ipc.send("reduceApp")
})

sizeBtn.addEventListener("click", () => {
    ipc.send("sizeApp")
})

closeBtn.addEventListener("click", () => {
    ipc.send("closeApp")
})
//Au click sur un boutton on envoie une IPC a l'index.js et en fonctione de l'IPC envoyé l'index effectue une action, l'index capte les IPC