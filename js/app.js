const webName = document.querySelector('#webName');
const amount = document.querySelector('#amount');
const calc = document.querySelector('#calc');
const result = document.querySelector('#result');

/* beregning af værdien  */
calc.addEventListener('click', (e) => {
    e.preventDefault();

    if(webName.value === '1'){
        const inputAmount = parseFloat(amount.value);

        let initialAmount;
        const fragtPris = 200;

        if (inputAmount > 1151) {
            initialAmount = ((inputAmount + fragtPris) * 1.12).toFixed(2);
        } else {
            initialAmount = (inputAmount + fragtPris).toFixed(2);
        }

        const kr = (parseFloat(initialAmount) * 1.25).toFixed(2);

        /* skift af baggrund farve */
        if (inputAmount > 1150) {

            let told = (inputAmount + fragtPris) * 0.12;

            document.body.style.backgroundColor = 'rgba(255, 0, 0, 0.10)';
            result.style.color = '#111111';
            result.style.fontFamily = 'Satoshi, sans-serif';
            result.innerText = 'Vi har grundigt beregnet dine værdier og fundet, at beløbet er på ' + kr + 'kr pga. fragt pris og moms.\nDette indebærer en toldforpligtelse, og du kommer til at betale ' + told.toFixed(2) + 'kr. for at fuldføre transaktionen.';

        } else {
            document.body.style.backgroundColor = 'rgba(0, 255, 0, 0.10)';
            result.style.color = '#111111';
            result.style.fontFamily = 'Satoshi, sans-serif';
            result.innerText = 'Vi har grundigt beregnet dine værdier: ' + kr + ' kr.\nGod nyhed! Du skal ikke betale tolden.';
        }
    } else {
        document.body.style.backgroundColor = 'rgba(0, 255, 0, 0.10)';
        result.style.color = '#111111';
        result.style.fontFamily = 'Satoshi, sans-serif';
        result.innerText = 'Vi har grundigt beregnet dine værdier og dine varer bliver sendt fra EU. \nDu skal ikke betale tolden.';
    }
});

/* Knappen kun virker, hvis værdien er indtastet*/
calc.disabled = amount.value.trim() === '';

amount.addEventListener('input', () => {
    calc.disabled = amount.value.trim() === '';
});



