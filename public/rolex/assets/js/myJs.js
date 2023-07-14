let nav = document.querySelector("nav");
let loading = document.querySelector(".ss");

// To add background for nav
let upBtn = document.querySelector(".up");

onscroll = (_) => {
  if (scrollY < 10) {
    nav.classList.remove("headerScoll");
    upBtn.style.opacity = "0";
  } else {
    nav.classList.add("headerScoll");
    upBtn.style.opacity = "1";
  }
};

// To back for up step by step
upBtn.onclick = (_) => {
  console.log("ttt");
  window.scrollBy({
    top: -1000,
    left: 100,
    behavior: "smooth",
  });
};

// To change for dark mode
let darkmode = document.querySelector("nav .darkmood");
let bodarkmode = document.querySelector("body");
let Links = document.querySelectorAll("footer a");
let navbrand = document.querySelector(".navbar-brand");
let AllLinks = document.querySelectorAll("nav .nav-link");
let cards = document.querySelectorAll(".card");
let butn = document.querySelector(".hero .btntwo");
let btstory = document.querySelector(".story .dis");
darkmode.onclick = (_) => {
  nav.classList.toggle("dark");
  upBtn.classList.toggle("dark");
  darkmode.classList.toggle("fw-bold");
  bodarkmode.classList.toggle("bg-dark");
  bodarkmode.classList.toggle("text-white");
  navbrand.classList.toggle("textWhite");
  butn.classList.toggle("cardbgc");
  btstory.classList.toggle("cardbgc");

  for (let i = 0; i < Links.length; i++) {
    Links[i].classList.toggle("text-white");
  }

  for (let i = 0; i < AllLinks.length; i++) {
    AllLinks[i].classList.toggle("textWhite");
  }
  for (let i = 0; i < cards.length; i++) {
    cards[i].classList.toggle("cardbgc");
  }

  if (darkmode.innerHTML == `<i class="fa-solid fa-sun pe-3 ms-auto"></i>`) {
    darkmode.innerHTML = `<i class="fa-regular fa-moon pe-3 ms-auto">`;
  } else {
    darkmode.innerHTML = `<i class="fa-solid fa-sun pe-3 ms-auto"></i>`;
  }
  console.log("sss");
};

// bag matjer
let Locksprod = document.querySelectorAll(".product i");
let Locknav = document.querySelector(".num");
let Lockelement = document.querySelector("nav .fa-lock");
let offcanvasLock = document.querySelector(".offCanvABody");
let imgprods = document.querySelectorAll(".product img");
let names = document.querySelectorAll(".product .card-title");
let pricess = document.querySelectorAll(".product .card-subtitle");
let prod = document.querySelector(".offCanvABody .prod");
console.log(Locksprod);
let index = 1;
for (let i = 0; i < Locksprod.length; i++) {
  console.log(i);
  // if (index >= 6) break;
  Locksprod[i].onclick = (_) => {
    console.log("kkk");
    Locknav.style.opacity = "1";
    Locknav.innerHTML = index++;

    offcanvasLock.innerHTML += `<div class="  d-flex align-items-center g-4 border p-2 mb-3 ">
                                   <div class=" col-4"> <img src="${imgprods[i].src}" alt="" class="img-fluid w-50"></div>
                                   <div class=" col-6"> <div class=" mb-2"><h5>${names[i].innerText}</h5></div> <div></h6>${pricess[i].innerText}</h6></div> </div>
                                   <div id="btnnn" class=" col-3"><i class="fa-solid fa-trash"></i></div>
                                 </div>`;
  };
}

// const collec = offcanvasLock.children;
// console.log(collec);


// for (let index = 0; index < collec.length; index++) {
//   const element = collec[index];
//   console.log(element);
//   let btnn = element.children[2];
//   console.log(btnn);
//   btnn.onclick = _=>{
//     console.log("ddd");
//   }
  
// }

// collec.forEach(element => {
//     console.log(element.children[3]);
    // element.children[3].onclick = _=>{
    //   element.remove();
    // }
    
  // });





  // console.log(element[i].children[3]);

