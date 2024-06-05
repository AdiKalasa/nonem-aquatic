function renderKatumpan() {
  let catalog = document.querySelector(".catalog");
  for (let i = 0; i < dataKeperluan.length; i++) {
    let cc = document.createElement("div");
    cc.classList.add("card-catalog");
    cc.classList.add("enable-cc");
    cc.onclick = () => {
      detailKeperluan(dataKeperluan[i].uid);
    };

    let img = document.createElement("img");
    img.classList.add("img-catalog");
    img.src = dataKeperluan[i].gambar;
    img.alt = `gambar keperluan ${dataKeperluan[i].nama}`;

    let title = document.createElement("h3");
    title.classList.add("title-catalog");
    title.textContent = dataKeperluan[i].nama;

    cc.append(img);
    cc.append(title);
    catalog.append(cc);
  }
}

function renderKatikan() {
  // render semua katalog
  let catalog = document.querySelector(".catalog");
  for (let i = 0; i < dataIkan.length; i++) {
    let cc = document.createElement("div");
    cc.classList.add("card-catalog");
    cc.classList.add("enable-cc");
    cc.onclick = () => {
      detailIkan(dataIkan[i].iid);
    };

    let img = document.createElement("img");
    img.classList.add("img-catalog");
    img.src = dataIkan[i].gambar;
    img.alt = `gambar ikan ${dataIkan[i].nama}`;

    let title = document.createElement("h3");
    title.classList.add("title-catalog");
    title.textContent = dataIkan[i].nama;

    cc.append(img);
    cc.append(title);
    catalog.append(cc);
  }
}

let fishDetailShown = false;
function detailIkan(iid) {
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
  let choosen = null;
  for (let i = 0; i < dataIkan.length; i++) {
    choosen = iid === dataIkan[i].iid ? dataIkan[i] : null;
    if (choosen != null) {
      break;
    }
  }
  fdn.textContent = choosen.nama;
  fdf.textContent = choosen.makanan.join(", ");
  fdi.src = choosen.gambar;
  fds.innerHTML = "";
  for (let i = 0; i < choosen.ukuran.length; i++) {
    let elm_opt_size = document.createElement("option");
    elm_opt_size.value = `${choosen.harga[i]},${choosen.stok[i]}`;
    elm_opt_size.textContent = choosen.ukuran[i];
    fds.append(elm_opt_size);
  }
  fdp.textContent = `Rp ${choosen.harga[0].toLocaleString()}/ekor`;
  fdst.textContent = `${choosen.stok[0].toLocaleString()} ekor`;
  fdlb.href = `https://api.whatsapp.com/send?phone=6281584872770&text=${choosen.nama.split(' ').join('+')}+u+${choosen.ukuran[0].split(' ').join('+')}`;
  fd.style.display = "flex";
  fd.classList.remove("pop-out");
  fd.classList.add("pop-in");
}

let foodDetailShown = false;
function detailKeperluan(iid) {
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

  // disable card-cat focus and blur card
  Array.from(cc).forEach((elm) => {
    elm.classList.remove("enable-cc");
  });
  let choosen = null;
  for (let i = 0; i < dataKeperluan.length; i++) {
    choosen = iid === dataKeperluan[i].uid ? dataKeperluan[i] : null;
    if (choosen != null) {
      break;
    }
  }
  fdn.textContent = choosen.nama;
  fdi.src = choosen.gambar;
  fdp.textContent = `Rp ${choosen.harga.toLocaleString()}`;
  fdst.textContent = `${choosen.stok.toLocaleString()} buah`;
  fdii.textContent = choosen.keterangan;
  fd.style.display = "flex";
  fd.classList.remove("pop-out");
  fd.classList.add("pop-in");
}

function ubahHarga(data) {
  data = data.value;
  let fdp = document.querySelector(".fish-detail #fd-price");
  let fdst = document.querySelector(".fish-detail #fd-stok");
  fdp.textContent = `Rp ${parseInt(data.split(",")[0]).toLocaleString()}/ekor`;
  fdst.textContent = `${parseInt(data.split(",")[1]).toLocaleString()} ekor`;
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
