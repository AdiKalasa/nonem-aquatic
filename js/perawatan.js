function renderPerawatan(qrystr) {
  let jenis = qrystr.get("jenis");
  jenis = jenis === null ? "Discus" : jenis;
  console.log(`query jenis: ${jenis}`);
  jenisPerawatan({ value: jenis });
  setInterval(() => slide("r"), 4000);
}

let idx_perawatan = 0;
function jenisPerawatan(elm) {
  idx_perawatan = 0;
  console.log(`jenis masuk ${elm.value}`);
  let data;
  for (let i = 0; i < dataPerawatan.length; i++) {
    if (elm.value === dataPerawatan[i].jenis) {
      data = dataPerawatan[i];
      break;
    }
  }
  if (data == null) {
    document.querySelector(".isNotFound").innerHTML =
      "<h1> Maaf data belum ada atau sedang dalam perbaikan</h1>";
    return;
  }
  let img = document.querySelector(".slider .slider-img img.main");
  let imgs = document.querySelector(".slider .slider-img img.sec");
  let nama = document.querySelector(".perawatan .jenis");
  let info1 = document.querySelector(".perawatan .info-1");
  let info2 = document.querySelector(".perawatan .info-2");
  let info3 = document.querySelector(".perawatan .info-3");
  let info4 = document.querySelector(".perawatan .info-4");
  let info5 = document.querySelector(".perawatan .info-5");
  let info6 = document.querySelector(".perawatan .info-6");

  img.src = data.gambar[idx_perawatan];
  imgs.src = data.gambar[idx_perawatan + 1];
  nama.textContent = data.nama[idx_perawatan];
  info1.textContent = data.info1;
  info2.textContent = data.info2;
  info3.textContent = data.info3;
  info4.textContent = data.info4;
  info5.textContent = data.info5;
  info6.textContent = data.info6;

  // document.querySelector('.perawatan #pilih-jenis').value = elm.value;
}
