let today = new Date(); //today's date

let month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

let m = today.getMonth(); //month of index 
let date = today.getDate() + " " + month[m] + ", " + today.getFullYear();

document.getElementsByClassName('date')[0].textContent = date;
document.getElementById('main-unit').addEventListener('keyup', () => {

    let main = document.querySelector('.main-unit-options');
    let second = document.querySelector('.second-unit-options');
    let mainUnit = main.options[main.selectedIndex].textContent.toLowerCase();
    let secondUnit = second.options[second.selectedIndex].textContent.toLowerCase();

    let inputnum = document.getElementById('main-unit').value;
    inputnum = parseInt(inputnum);
    if(mainUnit === 'celsius'){
        if(secondUnit === 'kelvin'){
            document.getElementById('second-unit').value = inputnum+273.15
        }else if (secondUnit === 'farenheight') {
            document.getElementById('second-unit').value = (inputnum * (9/5)) + 32;

        } else{
            document.getElementById('second-unit').value = inputnum;

        }
        
    }else if(mainUnit === 'kelvin'){
        if (secondUnit === 'celsius') {
            document.getElementById('second-unit').value = inputnum - 273.15;
        } else if (secondUnit === 'farenheight') {
            document.getElementById('second-unit').value = (inputnum - 273.15) * 9/5 + 32;

        } else {
            document.getElementById('second-unit').value = inputnum;

        }
    }else{
        if (secondUnit === 'celsius') {
            document.getElementById('second-unit').value = (inputnum - 32) * 5/9;
        } else if (secondUnit === 'kelvin') {
            document.getElementById('second-unit').value = (inputnum - 32) * 5/9 + 273.15;

        } else {
            document.getElementById('second-unit').value = inputnum;

        }
    }

    Array.from(document.querySelectorAll('.reset')).forEach( select => {
        select.addEventListener('change', () => {
            document.getElementById('main-unit').value='';
            document.getElementById('second-unit').value = '';
        })
    });
});