@extends('app')

@section('title', 'Dashboard')

@section('content')
<style>
    body { text-align: center; }
    canvas { border: 1px solid white; cursor: crosshair; background-color: white; }
</style>
<body>
    <input class="text-white" type="file" id="imageLoader" accept="image/*">
    <input type="color" id="colorPicker" value="#ff0000">
    <input class="text-black" type="text" id="textInput" placeholder="Escribe algo">
    <button id="addText" style="display:none">Añadir Texto</button>
    <button class='text-white' id="modeToggle">Cambiar de modo</button>
    <button class="text-white" id="clearCanvas">Limpiar Dibujo</button>
    <canvas id="paintCanvas"></canvas>
    <form action="{{ route('producto.updateImg') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="imageData" id="imageData">
        <button type="submit" class="btn btn-primary text-white">Guardar Imagen</button>
    </form>
    <div id="shapeButtons"></div>
    <div id="brushSizeContainer" style="display:none;">
        <label for="brushSize" class="text-white">Tamaño del Pincel:</label>
        <input type="range" id="brushSize" min="1" max="50" value="5">
    </div>
    <script>
        let img;
        const canvas = document.getElementById("paintCanvas");
        const ctx = canvas.getContext("2d");
        const imageLoader = document.getElementById("imageLoader");
        const colorPicker = document.getElementById("colorPicker");
        const textInput = document.getElementById("textInput");
        let painting = false;
        let currentColor = "red";
        let textPosition = { x: 50, y: 50 };
        let mode = "draw"; // default mode
        let shape = "brush"; // default shape
        let savedImageData;
        let startX, startY;
        let brushSize = 5;

        const clearCanvasButton = document.getElementById("clearCanvas");

        clearCanvasButton.addEventListener("click", function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            if (img) {
                ctx.drawImage(img, 0, 0); // Redraw the image
            }
            savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data
        });

        const modeToggleButton = document.getElementById("modeToggle");
        modeToggleButton.textContent = "Modo Texto";
        modeToggleButton.classList.add("text-white");
        modeToggleButton.style.display = "block";
        modeToggleButton.style.margin = "10px auto";

        const textInputBox = document.getElementById("textInput");
        const addTextButton = document.getElementById("addText");

        modeToggleButton.addEventListener("click", function () {
            if (mode === "draw") {
                mode = "text";
                modeToggleButton.textContent = "Modo Dibujo";
                textInputBox.style.display = "block";
                textInputBox.style.position = "absolute";
                textInputBox.style.backgroundColor = "transparent";
                textInputBox.style.border = "none";
                textInputBox.style.color = currentColor;
                const rect = canvas.getBoundingClientRect();
                textInputBox.style.left = textPosition.x + "px";
                textInputBox.style.top = textPosition.y + "px";
                textInputBox.focus();
                addTextButton.style.display = "block";
            } else {
                mode = "draw";
                modeToggleButton.textContent = "Modo Texto";
                textInputBox.style.display = "none";
                addTextButton.style.display = "none";
                ctx.putImageData(savedImageData, 0, 0); // Restore the saved image data
            }
        });

        canvas.addEventListener("mousedown", function (e) {
            if (mode === "draw") {
                startPosition(e);
            }
        });

        canvas.addEventListener("mouseup", function (e) {
            if (mode === "draw") {
                endPosition(e);
                savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data
            }
        });

        canvas.addEventListener("mousemove", function (e) {
            if (mode === "draw" && shape === "brush") {
                draw(e);
            }
        });

        canvas.addEventListener("click", function (e) {
            if (mode === "text") {
                const rect = canvas.getBoundingClientRect();
                textPosition.x = e.clientX - rect.left;
                textPosition.y = e.clientY - rect.top;
                textInputBox.style.left = textPosition.x + "px";
                textInputBox.style.top = textPosition.y + "px";
                textInputBox.focus();
                savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data with the new cursor position
            }
        });

        imageLoader.addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    img = new Image();
                    img.onload = function () {
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        ctx.drawImage(img, 0, 0);
                        savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        colorPicker.addEventListener("input", function () {
            currentColor = this.value;
            textInputBox.style.color = currentColor;
        });

        function startPosition(e) {
            painting = true;
            const rect = canvas.getBoundingClientRect();
            startX = e.clientX - rect.left;
            startY = e.clientY - rect.top;
            if (shape !== "brush") {
                ctx.putImageData(savedImageData, 0, 0); // Restore the saved image data
            }
        }

        function endPosition(e) {
            painting = false;
            ctx.beginPath();
            if (shape !== "brush") {
                drawShape(e);
                savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data
            }
        }

        function draw(e) {
            if (!painting) return;
            ctx.lineWidth = brushSize;
            ctx.lineCap = "round";
            ctx.strokeStyle = currentColor;
            const rect = canvas.getBoundingClientRect();
            ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
        }

        function drawShape(e) {
            const rect = canvas.getBoundingClientRect();
            const endX = e.clientX - rect.left;
            const endY = e.clientY - rect.top;
            ctx.strokeStyle = currentColor; 
            ctx.lineWidth = brushSize;

            switch (shape) {
            case "line":
                ctx.beginPath();
                ctx.moveTo(startX, startY);
                ctx.lineTo(endX, endY);
                ctx.lineWidth = 8; // Grosor predefinido
                ctx.stroke();
                break;
            case "circle":
                const radius = Math.sqrt(Math.pow(endX - startX, 2) + Math.pow(endY - startY, 2));
                ctx.beginPath();
                ctx.arc(startX, startY, radius, 0, 2 * Math.PI);
                ctx.fillStyle = currentColor;
                ctx.fill();
                ctx.stroke();
                break;
            case "square":
                const side = Math.max(Math.abs(endX - startX), Math.abs(endY - startY));
                ctx.fillStyle = currentColor;
                ctx.fillRect(startX, startY, side, side);
                ctx.strokeRect(startX, startY, side, side);
                break;
            case "rectangle":
                ctx.fillStyle = currentColor;
                ctx.fillRect(startX, startY, endX - startX, endY - startY);
                ctx.strokeRect(startX, startY, endX - startX, endY - startY);
                break;
            case "triangle":
                ctx.beginPath();
                ctx.moveTo(startX, startY);
                ctx.lineTo(endX, endY);
                ctx.lineTo(startX * 2 - endX, endY);
                ctx.closePath();
                ctx.fillStyle = currentColor;
                ctx.fill();
                ctx.stroke();
                break;
            }
            savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data
        }

        addTextButton.addEventListener("click", function () {
            addTextToCanvas();
        });

        textInputBox.addEventListener("keydown", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                addTextToCanvas();
            }
        });

        function addTextToCanvas() {
            const text = textInput.value;
            if (text) {
                ctx.fillStyle = currentColor;
                ctx.font = "20px Arial";
                ctx.fillText(text, textPosition.x, textPosition.y);
                savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data
                textInput.value = ""; // Clear the text input
                textInputBox.style.display = "none";
                addTextButton.style.display = "none";
                mode = "draw";
                modeToggleButton.textContent = "Modo Texto";
            }
        }

        // Initially hide text input and button
        textInputBox.style.display = "none";
        addTextButton.style.display = "none";

        // Add shape selection buttons
        const shapes = ["brush", "line", "circle", "square", "rectangle", "triangle"];
        const shapeButtonsContainer = document.getElementById("shapeButtons");
        shapes.forEach(s => {
            const button = document.createElement("button");
            button.textContent = s.charAt(0).toUpperCase() + s.slice(1);
            button.classList.add("text-white");
            button.style.margin = "5px";
            button.style.display = "none"; // Initially hide the buttons
            button.addEventListener("click", function () {
                shape = s;
                if (shape === "brush") {
                    document.getElementById("brushSizeContainer").style.display = "block";
                } else {
                    document.getElementById("brushSizeContainer").style.display = "none";
                }
                savedImageData = ctx.getImageData(0, 0, canvas.width, canvas.height); // Save the image data when changing shape
            });
            shapeButtonsContainer.appendChild(button);
        });

        // Show or hide shape buttons based on mode
        modeToggleButton.addEventListener("click", function () {
            const buttons = shapeButtonsContainer.querySelectorAll("button");
            if (mode === "draw") {
                buttons.forEach(button => button.style.display = "inline-block");
            } else {
                buttons.forEach(button => button.style.display = "none");
            }
        });

        // Brush size selector
        const brushSizeInput = document.getElementById("brushSize");
        brushSizeInput.addEventListener("input", function () {
            brushSize = this.value;
        });
    </script>
</body>
@endsection
