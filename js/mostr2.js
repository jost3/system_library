/* de la seccion 3*/ 
let most1 = document.getElementById('most1');
let oclt1 = document.getElementById('oclt1');

most1.addEventListener('click',toggleText);
function toggleText(){
    oclt1.classList.toggle('tv');
    
    if(oclt.classList.contains('tv')){
        most1.innerHTML = 'mostar menos'
    }else{
        most1.innerHTML = 'mostar mas'
    }
}