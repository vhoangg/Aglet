var toggle = document.querySelectorAll(".nav-header")
var display = document.querySelectorAll(".nav .tree")
var arrow = document.querySelectorAll(".fa-solid.fa-angle-up")
var icon = document.querySelectorAll(".icon");
var tmp = window.location.search;
console.log(tmp);
var gender = '.'+ tmp[1];
console.log(arrow[0].classList.contains("fa-angle-down"));
for(let i = 0; i < toggle.length; i++){
  toggle[i].addEventListener('click',()=>{

      toggle[i].classList.toggle("orange");


      if(display[i].style.display == "none" ){

        display[i].style.display = "block";
        arrow[i].classList.toggle("fa-angle-up");
        arrow[i].classList.toggle("fa-angle-down");
        icon[i].classList.toggle("orange");
      }
      else{
        display[i].style.display="none";
        icon[i].classList.toggle("orange");
        arrow[i].classList.toggle("fa-angle-down");
        arrow[i].classList.toggle("fa-angle-up");


      }
  });
}
document.querySelector(gender).classList.add('orange');
