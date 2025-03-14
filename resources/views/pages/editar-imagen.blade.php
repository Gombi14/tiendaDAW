<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dibujar sobre Imagen</title>
    <style>
        body { text-align: center; }
        canvas { border: 1px solid black; cursor: crosshair; }
    </style>
</head>
<body>
    <input type="file" id="imageLoader" accept="image/*">
    <input type="color" id="colorPicker" value="#ff0000">
    <input type="text" id="textInput" placeholder="Escribe algo">
    <button id="addText">Añadir Texto</button>
    <canvas id="paintCanvas"></canvas>
    <script>
        const canvas = document.getElementById("paintCanvas");
        const ctx = canvas.getContext("2d");
        const imageLoader = document.getElementById("imageLoader");
        const colorPicker = document.getElementById("colorPicker");
        const textInput = document.getElementById("textInput");
        const addTextButton = document.getElementById("addText");
        let painting = false;
        let currentColor = "red";

        imageLoader.addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = new Image();
                    img.onload = function () {
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        colorPicker.addEventListener("input", function () {
            currentColor = this.value;
        });

        function startPosition(e) {
            painting = true;
            draw(e);
        }

        function endPosition() {
            painting = false;
            ctx.beginPath();
        }

        function draw(e) {
            if (!painting) return;
            ctx.lineWidth = 5;
            ctx.lineCap = "round";
            ctx.strokeStyle = currentColor;
            const rect = canvas.getBoundingClientRect();
            ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
        }

        canvas.addEventListener("mousedown", startPosition);
        canvas.addEventListener("mouseup", endPosition);
        canvas.addEventListener("mousemove", draw);

        addTextButton.addEventListener("click", function () {
            const text = textInput.value;
            if (text) {
                ctx.fillStyle = currentColor;
                ctx.font = "20px Arial";
                ctx.fillText(text, 50, 50);
            }
        });
    </script>
</body>
</html>
