<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotating Atom Animation</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #111;
            overflow: hidden;
        }
        canvas {
            display: block;
        }
    </style>
</head>
<body>
    <canvas id="atomCanvas"></canvas>
    <script>
        const canvas = document.getElementById("atomCanvas");
        const ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        class Electron {
            constructor(radius, color, speed, orbitRadius, phase) {
                this.radius = radius;
                this.color = color;
                this.speed = speed;
                this.orbitRadius = orbitRadius;
                this.angle = phase;
            }
            update() {
                this.angle += this.speed;
                this.x = nucleus.x + Math.cos(this.angle) * this.orbitRadius;
                this.y = nucleus.y + Math.sin(this.angle) * this.orbitRadius;
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.closePath();
            }
        }

        const nucleus = { x: canvas.width / 2, y: canvas.height / 2, radius: 20, color: "orange" };
        const electrons = [
            new Electron(5, "cyan", 0.05, 60, 0),
            new Electron(5, "blue", 0.04, 80, Math.PI / 3),
            new Electron(5, "purple", 0.03, 100, Math.PI / 1.5)
        ];

        function drawNucleus() {
            ctx.beginPath();
            ctx.arc(nucleus.x, nucleus.y, nucleus.radius, 0, Math.PI * 2);
            ctx.fillStyle = nucleus.color;
            ctx.fill();
            ctx.closePath();
        }

        function drawOrbits() {
            ctx.strokeStyle = "rgba(255, 255, 255, 0.2)";
            ctx.lineWidth = 1;
            electrons.forEach(electron => {
                ctx.beginPath();
                ctx.arc(nucleus.x, nucleus.y, electron.orbitRadius, 0, Math.PI * 2);
                ctx.stroke();
                ctx.closePath();
            });
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawOrbits();
            drawNucleus();
            electrons.forEach(electron => {
                electron.update();
                electron.draw();
            });
            requestAnimationFrame(animate);
        }

        animate();
    </script>
</body>
</html>