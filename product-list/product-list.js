var toggle = document.querySelectorAll(".nav-header")
var display = document.querySelectorAll(".nav .tree")


for(let i = 0; i < toggle.length; i++){
  toggle[i].addEventListener('click',()=>{

      toggle[i].classList.toggle("orange")
      if(display[i].style.display == "none")
        display[i].style.display = "block";
      else
        display[i].style.display="none";

  });
}

