/* de la seccion 3*/ 
let most2 = document.getElementById('most2');
let oclt2 = document.getElementById('oclt2');

most2.addEventListener('click',toggleText);
function toggleText(){
    oclt2.classList.toggle('tv');
    
    if(oclt2.classList.contains('tv')){
        most2.innerHTML = 'Mostar Menos'
    }else{
        most2.innerHTML = 'Mostar Mas'
    }
}