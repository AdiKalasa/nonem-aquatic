let PEMBERITAHUAN1 = "Pemberitahuan 1";
let TENTANGKAMI = "Tentang kita";

document.querySelector("#pemberitahuan1").textContent=PEMBERITAHUAN1;
document.querySelector("#tentangkami").textContent=TENTANGKAMI;



if((document.location.href).includes("katikan")){
    document.querySelector("#mainpage").textContent="katikannn";
}else{
    document.querySelector("#mainpage").textContent="jawwwaaaaaaaaaa";
}