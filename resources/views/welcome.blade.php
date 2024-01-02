<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #0c2127;
        }

        .container {
            perspective: 1000px; /* Adjust the depth of perspective */
        }

        .cube {
            position: relative;
            width: 100px;
            height: 100px;
            transform-style: preserve-3d;
            animation: rotate 5s infinite linear; /* Optional: Add rotation animation */
        }

        .face {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #fff;
            border: 2px solid #000;
        }

        .front { transform: translateZ(50px); }
        .back { transform: rotateY(180deg) translateZ(50px); }
        .left { transform: rotateY(-90deg) translateZ(50px); }
        .right { transform: rotateY(90deg) translateZ(50px); }
        .top { transform: rotateX(90deg) translateZ(50px); }
        .bottom { transform: rotateX(-90deg) translateZ(50px); }
    </style>
</head>
<body>
    <div class="container">
        <div class="cube" onmouseover="hoverCube(true)" onmouseout="hoverCube(false)">
            <div class="face front"></div>
            <div class="face back"></div>
            <div class="face left"></div>
            <div class="face right"></div>
            <div class="face top"></div>
            <div class="face bottom"></div>
        </div>
    </div>

    <script>
        let rotating = true;
        let currentRotation = 0;

        function rotateCube() {
            const cube = document.querySelector('.cube');
            cube.style.transform = `rotateX(${currentRotation}deg) rotateY(${currentRotation}deg) rotateZ(20deg)`;
            if (rotating) {
                currentRotation += 1;
            }
            requestAnimationFrame(rotateCube);
        }

        function hoverCube(shouldRotate) {
            rotating = shouldRotate;
        }

        rotateCube(); // Start the rotation
    </script>
</body>
</html>
