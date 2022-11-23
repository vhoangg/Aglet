let page_item = document.querySelectorAll(".page-item");


console.log("helu");
console.log(page_item);

for(let i = 0; i < page_item.length; i++ ){
  page_item[i].addEventListener('click', ()=>{
    page_item[i].classList.toggle("active");
  });

}

console.log("hello");
function onFormSubmit() {
  event.preventDefault();

  // your Javascript code here
}