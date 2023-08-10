// JavaScript code to make the element draggable
var dragItem = document.getElementById("mydiv");
var pos1 = 0,
    pos2 = 0,
    pos3 = 0,
    pos4 = 0;

dragItem.onmousedown = dragMouseDown;

function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
}

function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    dragItem.style.top = dragItem.offsetTop - pos2 + "px";
    dragItem.style.left = dragItem.offsetLeft - pos1 + "px";
}

function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
}

const openButton = document.getElementById('openButton');
const mydiv = document.getElementById('mydiv');
const dismissButton = document.getElementById('dismissButton');

openButton.addEventListener('click', function() {
    mydiv.style.display = 'block';
});

dismissButton.addEventListener('click', function() {
    mydiv.style.display = 'none';
});

// Prevent drag interaction while interacting with the Quill editor
var quillEditor = document.querySelector(".quill-editor-full");
quillEditor.addEventListener("mousedown", function (e) {
    e.stopPropagation();
});
