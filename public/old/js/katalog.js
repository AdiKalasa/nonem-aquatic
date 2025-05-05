//************************** FISH DETAIL *******************************/
let fishDetailShown = false;
function detailIkan(nama, makanan, uk, st, hr, foto) {
  // parse paramete
  let ukp = uk.split(";");
  let stp = st.split(";");
  let hrp = hr.split(";");
  if (fishDetailShown) {
    return;
  }
  fishDetailShown = true;
  let fd = document.querySelector(".fish-detail");
  let cc = document.getElementsByClassName("card-catalog");
  let fdn = document.querySelector(".fish-detail #fd-name");
  let fdf = document.querySelector(".fish-detail #fd-food");
  let fds = document.querySelector(".fish-detail #fd-size");
  let fdst = document.querySelector(".fish-detail #fd-stok");
  let fdp = document.querySelector(".fish-detail #fd-price");
  let fdi = document.querySelector(".fish-detail #fd-img");
  let fdlb = document.querySelector(".fish-detail #fd-linkbeli");

  // disable card-cat focus and blur card
  Array.from(cc).forEach((elm) => {
    elm.classList.remove("enable-cc");
    elm.classList.add("blur");
  });
  fdn.textContent = nama;
  fdf.textContent = makanan;
  fdi.src = foto;
  fds.innerHTML = "";
  for (let i = 0; i < ukp.length - 1; i++) {
    let elm_opt_size = document.createElement("option");
    elm_opt_size.value = `${hrp[i]},${stp[i]},${ukp[i].replace(" ", "")}`;
    elm_opt_size.textContent = ukp[i];
    fds.append(elm_opt_size);
  }
  fdp.textContent = `Rp ${parseInt(hrp[0]).toLocaleString()}/ekor`;
  fdst.textContent = `${parseInt(stp[0]).toLocaleString()} ekor`;
  fdlb.href = `https://api.whatsapp.com/send?phone=6281584872770&text=${nama
    .split(" ")
    .join("+")}+u+${ukp[0].split(" ").join("+")}`;
  fd.style.display = "flex";
  fd.classList.remove("pop-out");
  fd.classList.add("pop-in");
}
async function tutupFishDetail() {
  fishDetailShown = false;
  let fd = document.querySelector(".fish-detail");
  let cc = document.getElementsByClassName("card-catalog");
  Array.from(cc).forEach((elm) => {
    elm.classList.add("enable-cc");
  });

  fd.classList.add("pop-out");
  fd.classList.remove("pop-in");
  await sleep(90);
  fd.style.display = "none";
}

//************************** FOOD DETAIL *******************************/
let foodDetailShown = false;
function detailKeperluan(nama, harga, lokasi_foto, stok, keterangan) {
  if (foodDetailShown) {
    return;
  }
  foodDetailShown = true;
  let fd = document.querySelector(".food-detail");
  let cc = document.getElementsByClassName("card-catalog");
  let fdn = document.querySelector(".food-detail #fd-name");
  let fdst = document.querySelector(".food-detail #fd-stok");
  let fdp = document.querySelector(".food-detail #fd-price");
  let fdi = document.querySelector(".food-detail #fd-img");
  let fdii = document.querySelector(".food-detail #fd-info");
  let fdlb = document.querySelector(".food-detail #fd-linkbeli");

  // disable card-cat focus and blur card
  Array.from(cc).forEach((elm) => {
    elm.classList.remove("enable-cc");
  });
  fdn.textContent = nama;
  fdi.src = lokasi_foto;
  fdp.textContent = `Rp ${parseInt(harga).toLocaleString()}`;
  fdst.textContent = `${stok.toLocaleString()} buah`;
  fdii.textContent = keterangan;
  fdlb.href = `https://api.whatsapp.com/send?phone=6281584872770&text=${nama
    .split(" ")
    .join("+")}`;
  fd.style.display = "flex";
  fd.classList.remove("pop-out");
  fd.classList.add("pop-in");
}
async function tutupFoodDetail() {
  foodDetailShown = false;
  let fd = document.querySelector(".food-detail");
  let cc = document.getElementsByClassName("card-catalog");
  Array.from(cc).forEach((elm) => {
    elm.classList.add("enable-cc");
  });
  fd.classList.add("pop-out");
  fd.classList.remove("pop-in");
  await sleep(90);
  fd.style.display = "none";
}

function ubahInfo(data) {
  data = data.value;
  let fdp = document.querySelector(".fish-detail #fd-price");
  let fdst = document.querySelector(".fish-detail #fd-stok");
  let fdlb = document.querySelector(".fish-detail #fd-linkbeli");
  let fdn = document.querySelector(".fish-detail #fd-name");
  fdp.textContent = `Rp ${parseInt(data.split(",")[0]).toLocaleString()}/ekor`;
  fdst.textContent = `${parseInt(data.split(",")[1]).toLocaleString()} ekor`;
  fdlb.href = `https://api.whatsapp.com/send?phone=6281584872770&text=${fdn.textContent
    .split(" ")
    .join("+")}+u+${data.split(",")[2].split(" ").join("+")}`;
}
