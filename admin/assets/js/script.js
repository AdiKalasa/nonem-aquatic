let csl_prev_elm = document.getElementById("csl-spawn");
csl_prev_elm.classList.add("spotlight");
function changeSpotlight(elm) {
  elm.classList.add("spotlight");
  csl_prev_elm.classList.remove("spotlight");
  csl_prev_elm = elm;
}
function changeImage(){
  document.getElementById('image_shown').src = document.getElementById('link_foto').value;
}
function dropDown(dd) {
  document
    .querySelector(`.ddc-${dd}`)
    .classList.toggle("dropdown-content-show");
}

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("main-content").style.marginLeft = "250px";
  document.getElementById("main").style.display = "none";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.getElementById("main").style.display = "block";
}

class PUM {
  static pum_id = 0;
  static ref_pum = document.querySelector(".pum");
  constructor(msg, type) {
    PUM.pum_id++;
    this.elm = document.createElement("p");
    this.elm.id = `pum-${PUM.pum_id}`;
    this.elm.classList.add("pum-card");
    this.elm.classList.add(`pum-type-${type}`);
    this.elm.textContent = msg;
    this.deleted = false;
    this.elm.onclick = () => this.hideAndDelete();
    PUM.ref_pum.prepend(this.elm);
    console.log(`PUM-${type}: ${msg}`);
    setTimeout(() => {
      this.hideAndDelete();
    }, msg.length * 250);
  }
  hideAndDelete() {
    if (this.deleted) {
      return;
    }
    this.elm.classList.add("pum-hide");
    this.deleted = true;
    setTimeout(() => {
      PUM.ref_pum.removeChild(this.elm);
    }, 200);
  }
}

//**************************** Border ***************************/

let katikan_stokx = 1;
function tKatikanStokClose(idx_tr) {
  if (idx_tr < katikan_stokx) {
    for (let i = idx_tr; i < katikan_stokx; i++) {
      document.querySelector(`#tr-katikan-stok-${idx_tr} #stok-uk`).value =
        document.querySelector(`#tr-katikan-stok-${idx_tr + 1} #stok-uk`).value;
      document.querySelector(`#tr-katikan-stok-${idx_tr} #stok-hr`).value =
        document.querySelector(`#tr-katikan-stok-${idx_tr + 1} #stok-hr`).value;
      document.querySelector(`#tr-katikan-stok-${idx_tr} #stok-st`).value =
        document.querySelector(`#tr-katikan-stok-${idx_tr + 1} #stok-st`).value;
    }
  }
  document
    .querySelector("#t-katikan-stok tbody")
    .removeChild(document.getElementById(`tr-katikan-stok-${katikan_stokx}`));
  katikan_stokx--;

  document.getElementById("katikan-stok").value = katikan_stokx;
}
function tKatikanStok() {
  katikan_stokx++;
  let tr = document.createElement("tr");
  tr.id = `tr-katikan-stok-${katikan_stokx}`;

  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");
  let td4 = document.createElement("td");

  let i1 = document.createElement("input");
  i1.type = "text";
  i1.required = true;
  i1.id = "stok-uk";
  let i2 = document.createElement("input");
  i2.type = "number";
  i2.required = true;
  i2.id = "stok-hr";
  let i3 = document.createElement("input");
  i3.type = "number";
  i3.required = true;
  i3.id = "stok-st";
  let i4 = document.createElement("span");
  i4.type = "button";
  i4.classList.add("close");
  i4.innerHTML = "&times;";
  let idx_tr = katikan_stokx;
  i4.addEventListener("click", () => {
    tKatikanStokClose(idx_tr);
  });

  td1.append(i1);
  td2.append(i2);
  td3.append(i3);
  td4.append(i4);

  tr.append(td1);
  tr.append(td2);
  tr.append(td3);
  tr.append(td4);
  document.getElementById("katikan-stok").value = katikan_stokx;
  document.querySelector("#t-katikan-stok tbody").append(tr);
}

function gantiFotoModal(lokasi){
  document.querySelector("#ModalLiatFoto-img").src = lokasi;
}

function cek(){
  console.log(document.querySelectorAll("#tr-show-katikan-1 #td-uk ul li"))
}
function gantiEditCepatKatikan(idx){
  let uk = document.querySelectorAll(`#tr-show-katikan-${idx} #td-uk ul li`);
  let sid = document.querySelectorAll(`#tr-show-katikan-${idx} #td-uk ul p`);
  let st = document.querySelectorAll(`#tr-show-katikan-${idx} #td-st ul li`);
  let iid = document.querySelector(`#tr-show-katikan-${idx} #iidc`).textContent;
  document.getElementById("iidx").value = iid; 
  document.querySelector("#t-katikan-stok-ec tbody").innerHTML="";
  for(let i=0;i<uk.length;i++){
    let tr = document.createElement("tr");
    tr.id = `tr-katikan-stok-ep-${i}`;
    
    let td1 = document.createElement("td");
    let td1c = document.createElement("input");
    td1c.type = "text";
    td1c.disabled = true;
    td1c.value = uk[i].textContent;
    td1c.style.width = "100%";
    td1.append(td1c);
    
    let td3 = document.createElement ("td");
    let td3c = document.createElement("input");
    let td3cb = document.createElement("input");
    td3c.type = "number";
    td3cb.type = "number";
    td3c.style.width = "100%";
    td3cb.hidden = true;
    td3c.value = st[i].textContent;
    td3cb.value = st[i].textContent;
    td3c.onkeydown = function(e){
      if(e.key.toLocaleLowerCase() === "enter"){
        
        document.getElementById("petunjuk").hidden = true;
        katikanstokEC(sid[i].textContent, td3c.value, td3cb.value);
        td3cb.value = td3c.value;
      }
    }
    td3c.onfocus = function(){
      document.getElementById("petunjuk").hidden = false;
    }
    td3.append(td3c);
    td3.append(td3cb);

    let td2 = document.createElement("td");
    let td2c = document.createElement("button");
    td2c.classList = "btn btn-danger"; 
    td2c.textContent = "-";
    td2c.onclick = function(){
      let nn = Number(td3c.value)>Number(td3cb.value)?Number(td3c.value):Number(td3cb.value);
      td3c.value = nn-1;
      katikanstokEC(sid[i].textContent, td3c.value, td3cb.value);
      td3cb.value = td3c.value;
    }
    td2.append(td2c);
    
    let td4 = document.createElement("td");
    let td4c = document.createElement("button");
    td4c.classList = "btn btn-primary";
    td4c.textContent = "+";
    td4c.onclick = function(){
      let nn = Number(td3c.value)>Number(td3cb.value)?Number(td3c.value):Number(td3cb.value);
      td3c.value = nn+1;
      katikanstokEC(sid[i].textContent,td3c.value,td3cb.value);
      td3cb.value = td3c.value;
    }
    td4.append(td4c);

    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);
    console.log("bikin")

    document.querySelector("#t-katikan-stok-ec tbody").append(tr);
  }
}
function gantiEditCepatKatuan(idx){
  let nama = document.querySelector(`#tr-show-katuan-${idx} #namax`).textContent;
  let stok = document.querySelector(`#tr-show-katuan-${idx} #stokx`).textContent;
  let kid = document.querySelector(`#tr-show-katuan-${idx} #kidx`).textContent;
  document.querySelector("#t-katuan-stok-ec tbody").innerHTML="";
  
    let tr = document.createElement("tr");
    tr.id = `tr-katikan-stok-ep`;
    
    let td1 = document.createElement("td");
    let td1c = document.createElement("input");
    td1c.type = "text";
    td1c.disabled = true;
    td1c.value = nama;
    td1c.style.width = "100%";
    td1.append(td1c);
    
    let td3 = document.createElement ("td");
    let td3c = document.createElement("input");
    let td3cb = document.createElement("input");
    td3c.type = "number";
    td3cb.type = "number";
    td3c.style.width = "100%";
    td3cb.hidden = true;
    td3c.value = stok;
    td3cb.value = stok;
    td3c.onkeydown = function(e){
      if(e.key.toLocaleLowerCase() === "enter"){
        katuanEC(kid, td3c.value, td3cb.value);
        td3cb.value = td3c.value;
      }
    }
    td3.append(td3c);
    td3.append(td3cb);

    let td2 = document.createElement("td");
    let td2c = document.createElement("button");
    td2c.classList = "btn btn-danger";
    td2c.textContent = "-";
    td2c.onclick = function(){
      let nn = Number(td3c.value);
      td3c.value = nn-1;
      katuanEC(kid, td3c.value, td3cb.value);
      td3cb.value = td3c.value;
    }
    td2.append(td2c);
    
    let td4 = document.createElement("td");
    let td4c = document.createElement("button");
    td4c.classList = "btn btn-primary";
    td4c.textContent = "+";
    td4c.onclick = function(){
      let nn = Number(td3c.value);
      td3c.value = nn+1;
      katuanEC(kid,td3c.value,td3cb.value);
      td3cb.value = td3c.value;
    }
    td4.append(td4c);

    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);

    document.querySelector("#t-katuan-stok-ec tbody").append(tr);
}


let data_count = 1;
function tCareClose(idx_tr) {
  if (idx_tr < data_count) {
    for (let i = idx_tr; i < data_count; i++) {
      document.querySelector(`#tr-care-data-${idx_tr} #judul`).value =
        document.querySelector(`#tr-care-data-${idx_tr + 1} #judul`).value;
      document.querySelector(`#tr-care-data-${idx_tr} #konten`).value =
        document.querySelector(`#tr-care-data-${idx_tr + 1} #konten`).value;
    }
  }
  console.log(idx_tr);
  document
    .querySelector("#t-care-data tbody")
    .removeChild(document.getElementById(`tr-care-data-${data_count}`));
  data_count--;

  document.getElementById("data-count").value = data_count;
}
function tCare() {
  data_count++;
  let tr = document.createElement("tr");
  tr.id = `tr-care-data-${data_count}`;

  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");

  let i1 = document.createElement("input");
  i1.type = "text";
  i1.required = true;
  i1.id = "judul";
  let i2 = document.createElement("textarea");
  i2.required = true;
  i2.id = "konten";
  let i3 = document.createElement("span");
  i3.type = "button";
  i3.classList.add("close");
  i3.innerHTML = "&times;";
  let idx_tr = data_count;
  i3.addEventListener("click", () => {
    tCareClose(idx_tr);
  });

  td1.append(i1);
  td2.append(i2);
  td3.append(i3);

  tr.append(td1);
  tr.append(td2);
  tr.append(td3);
  document.getElementById("data-count").value = data_count;
  document.querySelector("#t-care-data tbody").append(tr);
}