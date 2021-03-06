<?
$b = "<style>body{overflow:hidden;background-color:black}</style><canvas id='world'></canvas>
<script>
(function() {
var COLORS, Confetti, NUM_CONFETTI, PI_2, canvas, confetti, context, drawCircle, i, range, resizeWindow, xpos;
NUM_CONFETTI = 350;
COLORS = [
[85, 71, 106],
[174, 61, 99],
[219, 56, 83],
[244, 92, 68],
[248, 182, 70]
];
PI_2 = 2 * Math.PI;
canvas = document.getElementById('world');
context = canvas.getContext('2d');
window.w = 0;
window.h = 0;
resizeWindow = function() {
window.w = canvas.width = window.innerWidth;
return window.h = canvas.height = window.innerHeight;
};
window.addEventListener('resize', resizeWindow, false);
window.onload = function() {
return setTimeout(resizeWindow, 0);
};
range = function(a, b) {
return (b - a) * Math.random() + a;
};
drawCircle = function(x, y, r, style) {
context.beginPath();
context.arc(x, y, r, 0, PI_2, false);
context.fillStyle = style;
return context.fill();
};
xpos = 0.5;
document.onmousemove = function(e) {
return xpos = e.pageX / w;
};
window.requestAnimationFrame = (function() {
return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
return window.setTimeout(callback, 1000 / 60);
};
})();
Confetti = (function() {
function Confetti() {
this.style = COLORS[~~range(0, 5)];
this.rgb = 'rgba(' + this.style[0] + ',' + this.style[1] + ',' + this.style[2];
this.r = ~~range(2, 6);
this.r2 = 2 * this.r;
this.replace();
}
Confetti.prototype.replace = function() {
this.opacity = 0;
this.dop = 0.03 * range(1, 4);
this.x = range(-this.r2, w - this.r2);
this.y = range(-20, h - this.r2);
this.xmax = w - this.r;
this.ymax = h - this.r;
this.vx = range(0, 2) + 8 * xpos - 5;
return this.vy = 0.7 * this.r + range(-1, 1);
};
Confetti.prototype.draw = function() {
var ref;
this.x += this.vx;
this.y += this.vy;
this.opacity += this.dop;
if (this.opacity > 1) {
this.opacity = 1;
this.dop *= -1;
}
if (this.opacity < 0 || this.y > this.ymax) {
this.replace();
}
if (!((0 < (ref = this.x) && ref < this.xmax))) {
this.x = (this.x + this.xmax) % this.xmax;
}
return drawCircle(~~this.x, ~~this.y, this.r, this.rgb + ',' + this.opacity + ')');
};
return Confetti;
})();
confetti = (function() {
var j, ref, results;
results = [];
for (i = j = 1, ref = NUM_CONFETTI; 1 <= ref ? j <= ref : j >= ref; i = 1 <= ref ? ++j : --j) {
results.push(new Confetti);
}
return results;
})();
window.step = function() {
var c, j, len, results;
requestAnimationFrame(step);
context.clearRect(0, 0, w, h);
results = [];
for (j = 0, len = confetti.length; j < len; j++) {
c = confetti[j];
results.push(c.draw());
}
return results;
};
step();
}).call(this);
</script>";
$a = rand(1, 100);
if($a == 1)
    echo $b;
elseif($a == 100)
    echo "<img src='icons/pika.png' width='300px' height='300px' style='float:right'>"; 
?>
<!DOCTYPE html>
<html lang="ru">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dota gavno</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    
</head>

<body>
<div id='container' class="container">
<button id='button' onclick="start()" class='startbutton'>Начать</button>
<div id='divtheme' class="theme"><button id="theme" onclick='dark()' class='button-light'></button></div>
<div id='body' style='display:none'>
    <em><div id="counter">

        Выполнено правильно: <span id='correct'>0</span><br>
        Всего: <span id='total'>0</span><br>
        Время последнего ответа: <span id='lastans'>0</span><br>
        Таймер: <span id='timer'>0</span><br>

    </div></em>
    <h1><div id='number'><br></div></h1>
    <div class="group">      
        <input type="text" id='textarea' autocomplete="off">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label></label>
      </div>
    <button id='end' onclick="ending()">Закончить</button>
</div>

<div id='results' style='display:none'>
Среднее время ответа: <span id="emiddletime"></span><br>
Правильных ответов: <span id="ecorrect"></span><br>
Всего ответов: <span id='etotal'></span><br>
Всего времени затрачено: <span id="etime"></span><br><br><br>
<button id='anotherbutton' onclick="window.location.reload();">Перезапустить</button>
</div>
</div>
</body>
<link rel="stylesheet" href="style.css">
<script src="theme.js"></script>
<script src="index.js"></script>
<script src="button.js"></script>
</html>