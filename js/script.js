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
async function sleep(mil) {
  return new Promise((res, rej) => {
    setTimeout(() => res(), mil);
  });
}

console.log(`Render code: woi`);