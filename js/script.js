function scanPage() {
  const qrystr = new URLSearchParams(window.self.location.search);
  const page_qrystr = qrystr.get("page");
  let prev_page = document.getElementById("home-page");
  if (page_qrystr != null) {
    prev_page = document.getElementById(`${page_qrystr}-page`);
    if (page_qrystr.includes("kat")) {
      document.querySelector(".dropdown").classList.add("nyala");
    }
  }
  prev_page.classList.add("nyala");
  if (page_qrystr === "katikan") {
    renderKatikan();
  } else if (page_qrystr === "katumpan") {
    renderKatumpan();
  } else if (page_qrystr === "katdekorasi") {
    // renderKatdekorasi();
  } else if (page_qrystr === "kegiatan") {
    renderKegiatan();
  } else if (page_qrystr === "perawatan") {
    renderPerawatan(qrystr);
  }

  function renderKatdekorasi() {
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
}

function pindah(tujuan) {
  console.log(tujuan);
  prev_page.classList.remove("nyala");
  if (tujuan.classList.contains("sub-nav")) {
    document.querySelector(".dropdown").classList.add("nyala");
  }
  tujuan.classList.add("nyala");

  if (
    prev_page.classList.contains("sub-nav") &&
    !tujuan.classList.contains("sub-nav")
  ) {
    document.querySelector(".dropdown").classList.remove("nyala");
  }
  prev_page = tujuan;
  document.querySelector(".row .leftcolumn .card h1").textContent =
    tujuan.textContent;
}

function geserAtas() {
  window.scrollBy(0, -5000);
}

let clicked = false;
function slide(direction) {
  if (clicked) {
    return;
  }
  clicked = true;

  // cari data
  let jenis = document.getElementById("pilih-jenis").value;
  let data;
  for (let i = 0; i < dataPerawatan.length; i++) {
    if (jenis === dataPerawatan[i].jenis) {
      data = dataPerawatan[i];
      break;
    }
  }
  if (data == null) {
    console.log("data not found");
    return;
  }

  let idx_img_post = idx_perawatan;
  let mainImg = document.querySelector("img.main");
  let secImg = document.querySelector("img.sec");
  let nama = document.querySelector(".perawatan .jenis");

  if (direction === "l") {
    idx_perawatan--;
    idx_perawatan = idx_perawatan < 0 ? data.gambar.length - 1 : idx_perawatan;
  } else {
    idx_perawatan++;
    idx_perawatan = idx_perawatan > data.gambar.length - 1 ? 0 : idx_perawatan;
  }
  mainImg.src = data.gambar[idx_perawatan];
  secImg.src = data.gambar[idx_img_post];
  nama.textContent = data.nama[idx_perawatan];

  if (direction === "l") {
    mainImg.classList.add("img-rm");
    secImg.classList.add("img-rs");
  } else {
    mainImg.classList.add("img-lm");
    secImg.classList.add("img-ls");
  }

  setTimeout(() => {
    mainImg.classList.remove("img-rm");
    secImg.classList.remove("img-rs");
    mainImg.classList.remove("img-lm");
    secImg.classList.remove("img-ls");
    clicked = false;
  }, 1000);
}

async function sleep(mil) {
  return new Promise((res, rej) => {
    setTimeout(() => res(), mil);
  });
}

scanPage();
console.log(`Render code: ${renderCode}`);