document.addEventListener("keyup", e=>{

    if (e.target.matches("#buscar")){
  
        if (e.key ==="Escape")e.target.value = ""
  
        document.querySelectorAll("#a1").forEach(libro =>{
  
            libro.textContent.toLowerCase().includes(e.target.value.toLowerCase())
              ?libro.classList.remove("filtro")
              :libro.classList.add("filtro")
        })
  
    }
  
  
  })