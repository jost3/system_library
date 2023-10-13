/* de la seccion 3*/ 
let most3 = document.getElementById('most3');
let oclt3 = document.getElementById('oclt3');

most3.addEventListener('click',toggleText);
function toggleText(){
    oclt3.classList.toggle('tv');
    
    if(oclt3.classList.contains('tv')){
        most3.innerHTML = 'Mostar Menos'
    }else{
        most3.innerHTML = 'Mostar Mas'
    }
}