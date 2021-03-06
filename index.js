// Основной файл
var a;
var b;
var i=0; // Счетчик ответов
var timer; // Общий таймер
var timer2; // Таймер одного ответа
var correct = 0; // Счетчик правильных ответов


var timerchecker = 0;
var timer2checker = 0;
var countdown = 5000;
var cd;

var textarea = document.getElementById('textarea');
var start = () => {
    document.removeEventListener('keypress', start)
    document.getElementById('button').style.display = "none";
    document.getElementById('divtheme').style.display = "none";
    document.getElementById('body').style.display = "";
    document.querySelector('input').focus();
    var c = 5;
    cd = setInterval(() => {document.getElementById('number').innerHTML = `${c--}`}, 1000)
    setTimeout(generator, 6000);
}

var generator = () => {
    clearInterval(cd);
    a = Math.floor(Math.random() * (50 - 10) + 10);
    b = Math.floor(Math.random() * (59 - 0) + 0)
    if(b<10){
        b = `0${b}`;
    }
    document.getElementById('number').innerHTML = (`${a}:${b}`);
    console.log(`${a+5} ${a+8} ${a+11} ${b}`) //meow
    if(i==0){
        input();
        timer = setInterval(() => { 
            timerchecker++
        }, 10)
        timer2 = setInterval(() => {
        document.getElementById('timer').innerHTML = `${timer2checker++/100}`;
        }, 10)
    }
}

var input = () => {
    textarea.oninput = () => {
        if(textarea.value == ` `) textarea.value = ``;
        if(textarea.value == `${a+5} ${a+8} ${a+11} ${b}`){
            correct++
            document.getElementById('correct').innerHTML = correct
            i++
            document.getElementById('total').innerHTML = i
            textarea.value = ``;
            document.getElementById('lastans').innerHTML = `${timer2checker/100}`;
            timer2checker = 0;
            generator();
        }
    }
    textarea.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            textarea.value = ``;
            i++
            document.getElementById('total').innerHTML = i
            document.getElementById('lastans').innerHTML = `${timer2checker/100}`;
            timer2checker = 0;
            generator();
        }
    });
}

var ending = () => {
    clearInterval(timer);
    clearInterval(timer2);
    document.getElementById('body').style.display = "none";
    document.getElementById('results').style.display = "";
    if(i!=0) {
        document.getElementById('emiddletime').innerHTML = `${Math.round(parseFloat((timerchecker-timer2checker)/i/100) * 100) / 100} секунд`
    }
    else{
        document.getElementById('emiddletime').innerHTML = `0 секунд`
    }
    document.getElementById('ecorrect').innerHTML = `${correct}`
    document.getElementById('etotal').innerHTML = `${i}`
    document.getElementById('etime').innerHTML = `${(timerchecker-timer2checker)/100} секунд`
}
document.addEventListener('keypress', start);
