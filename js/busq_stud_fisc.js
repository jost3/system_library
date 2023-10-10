document.addEventListener("keyup", e=>{

    if (e.target.matches("#buscar")){
  
        if (e.key ==="Escape")e.target.value = ""
  
        document.querySelectorAll("#fisic").forEach(libro =>{
  
            libro.textContent.toLowerCase().includes(e.target.value.toLowerCase())
              ?libro.classList.remove("filtro")
              :libro.classList.add("filtro")
        })
    }
  })