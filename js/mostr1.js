let most = document.getElementById('most');
let oclt = document.getElementById('oclt');

most.addEventListener('click',toggleText);
function toggleText(){
    oclt.classList.toggle('tv');
    
    if(oclt.classList.contains('tv')){
        most.innerHTML = 'mostar menos'
    }else{
        most.innerHTML = 'mostar mas'
    }
}