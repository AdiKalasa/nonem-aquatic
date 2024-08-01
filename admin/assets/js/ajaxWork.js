function parseHari(idx){
  switch(idx){
    case 1: return "Senin";
    case 2: return "Selasa";
    case 3: return "Rabu";
    case 4: return "Kamis";
    case 5: return "Jum'at";
    case 6: return "Sabtu";
    case 7: return "Minggu";
    default: return "Sabtu";
  }
}
function parseBulan(idx){
  switch(idx){
    case 1: return "Januari";
    case 2: return "February";
    case 3: return "Maret";
    case 4: return "April";
    case 5: return "Mei";
    case 6: return "Juni";
    case 7: return "Juli";
    case 8: return "Agustus";
    case 9: return "September";
    case 10: return "November";
    case 11: return "Oktober";
    case 12: return "Desember";
    default: return "Agustus";
  }
}

//*************************************** DKLSA ************************/

function funfactShow() {
  $.ajax({
    url: "./show/funfactShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function funfactDelete(id) {
  $.ajax({
    url: "./delete/funfactDelete.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      new PUM("Berhasil menghapus Fun Fact", 1);
      $("form").trigger("reset");
      funfactShow();
    },
  });
}

function funfactUpdateForm(id) {
  $.ajax({
    url: "./update form/funfactUpdateForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function funfactUpdate() {
  let id = $("#ff-id").val();
  let judul = $("#ff-judul").val();
  let lf = $("#link_foto").val();
  let funfact = $("#ff-funfact").val();
  let fd = new FormData();
  fd.append("id", id);
  fd.append("judul", judul);
  fd.append("lf", lf);
  fd.append("funfact", funfact);

  $.ajax({
    url: "./update/funfactUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Fun Fact", 1);
      $("form").trigger("reset");
      funfactShow();
    },
  });
}
function funfactCreate() {
  let judul = $("#judul").val();
  let lf = $("#link_foto").val();
  let funfact = $("#funfact").val();
  let upload = $("#upload").val();
  let d = new Date();
  let waktu = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(
    2,
    "0"
  )}-${String(d.getDate()).padStart(2, "0")} ${String(d.getHours()).padStart(
    2,
    "0"
  )}:${String(d.getMinutes()).padStart(2, "0")}:${String(
    d.getSeconds()
  ).padStart(2, "0")}`;
  let fd = new FormData();
  fd.append("judul", judul);
  fd.append("lf", lf);
  fd.append("funfact", funfact);
  fd.append("waktu", waktu);
  fd.append("upload", upload);
  $.ajax({
    url: "./create/funfactCreate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil membuat Fun Fact", 1);
      $("form").trigger("reset");
      funfactShow();
    },
  });
}

//*********************  PEMBERITAHUAN  *******************************/
function announcementShow() {
  $.ajax({
    url: "./show/announcementShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function announcementUpdate() {
  let p1 = $("#p-pemberitahuan_1").val();
  let p2 = $("#p-pemberitahuan_2").val();
  let d = new Date();
  let waktu = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(
    2,
    "0"
  )}-${String(d.getDate()).padStart(2, "0")} ${String(d.getHours()).padStart(
    2,
    "0"
  )}:${String(d.getMinutes()).padStart(2, "0")}:${String(
    d.getSeconds()
  ).padStart(2, "0")}`;
  let fd = new FormData();
  fd.append("p1", p1);
  fd.append("p2", p2);
  fd.append("w", waktu);

  $.ajax({
    url: "./update/announcementUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Pemberitahuan",1);
      $("form").trigger("reset");
      announcementShow();
    },
  });
}

//*********************  TENTANG  *******************************/
function aboutShow() {
  $.ajax({
    url: "./show/aboutShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function aboutUpdate() {
  let d = new Date();
  let w = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(
    2,
    "0"
  )}-${String(d.getDate()).padStart(2, "0")} ${String(d.getHours()).padStart(
    2,
    "0"
  )}:${String(d.getMinutes()).padStart(2, "0")}:${String(
    d.getSeconds()
  ).padStart(2, "0")}`;
  let fd = new FormData();
  fd.append("t1", $("#t-tentang-1").val());
  fd.append("t2", $("#t-tentang-2").val());
  fd.append("t3", $("#t-tentang-3").val());
  fd.append("t4", $("#t-tentang-4").val());
  fd.append("w", w);

  $.ajax({
    url: "./update/aboutUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Tentang",1);
      $("form").trigger("reset");
      aboutShow();
    },
  });
}

//*********************  Katalog Ikan  *******************************/

function katikanShow() {
  $.ajax({
    url: "./show/katikanShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function katikanCreate() {
  let fd = new FormData();
  let jenis = $("#jenis").val();
  let variasi = $("#variasi").val();
  let nama = jenis+" "+variasi;
  let iid = nama.toLocaleLowerCase();
  iid = iid.split(" ");
  let mainId = `${iid[0][0]}${iid[0][Math.floor(iid[0].length / 2)]}${
    iid[0][iid[0].length - 1]
  }`;
  if (iid.length > 1) {
    console.log(mainId);
    iid.shift();
    iid = iid.join("");
    mainId += `-${iid[0]}${iid[Math.floor(iid.length / 2)]}${
      iid[iid.length - 1]
    }`;
  }
  iid = mainId;
  let makanan = $("#makanan").val();
  let lf = $("#link_foto").val();
  let upload = $("#upload").val();
  let katikan_stok = $("#katikan-stok").val();
  for (let i = 1; i <= Number(katikan_stok); i++) {
    fd.append(`tr-${i}-uk`, $(`#tr-katikan-stok-${i} #stok-uk`).val());
    fd.append(`tr-${i}-hr`, $(`#tr-katikan-stok-${i} #stok-hr`).val());
    fd.append(`tr-${i}-st`, $(`#tr-katikan-stok-${i} #stok-st`).val());
    fd.append(`sid-${i}`, `${iid}-${i}`);
  }
  fd.append("iid", iid);
  fd.append("jenis", jenis);
  fd.append("variasi", variasi);
  fd.append("nama", nama);
  fd.append("makanan", makanan);
  fd.append("lf", lf);
  fd.append("katikan_stok", katikan_stok);
  fd.append("upload", upload);
  $.ajax({
    url: "./create/katikanCreate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil menambahkan Katalog Ikan",1);
      $("form").trigger("reset");
      katikanShow();
    },
  });
}
function katikanDelete(iid) {
  console.log(iid);
  $.ajax({
    url: "./delete/katikanDelete.php",
    method: "post",
    data: { record: iid },
    success: function (data) {
      new PUM("Berhasil menghapus Katalog Ikan",1);
      $("form").trigger("reset");
      katikanShow();
    },
  });
}

function katikanUpdateForm(id) {
  $.ajax({
    url: "./update form/katikanUpdateForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function katikanUpdate() {
  let iid = $("#iid").val();
  let jenis = $("#jenis").val();
  let variasi = $("#variasi").val();
  let nama = jenis+" "+variasi;
  let lf = $("#link_foto").val();
  let makanan = $("#makanan").val();
  let fd = new FormData();
  fd.append("iid", iid);
  fd.append("nama", nama);
  fd.append("lf", lf);
  fd.append("makanan", makanan);
  fd.append("jenis", jenis);
  fd.append("variasi", variasi);
  $.ajax({
    url: "./update/katikanUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Katalog Ikan",1);
      $("form").trigger("reset");
      katikanShow();
    },
  });
}

//*********************  Katalog Ikan Stok *******************************/
function katikanstokUpdateForm(iid) {
  $.ajax({
    url: "./update form/katikanstokUpdateForm.php",
    method: "post",
    data: { record: iid },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function katikanstokUpdate() {
  let iid = $("#iid").val();
  let fd = new FormData();
  let katikan_stok = $("#katikan-stok").val();
  for (let i = 1; i <= Number(katikan_stok); i++) {
    fd.append(`tr-${i}-uk`, $(`#tr-katikan-stok-${i} #stok-uk`).val());
    fd.append(`tr-${i}-hr`, $(`#tr-katikan-stok-${i} #stok-hr`).val());
    fd.append(`tr-${i}-st`, $(`#tr-katikan-stok-${i} #stok-st`).val());
    fd.append(`sid-${i}`, `${iid}-${i}`);
  }
  fd.append("iid", iid);
  fd.append("katikan_stok", katikan_stok);
  $.ajax({
    url: "./update/katikanstokUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Stok Katalog Ikan",1);
      $("form").trigger("reset");
      katikanShow();
    },
  });
}
function katikanstokEC(sid, st, stb) {
  let fd = new FormData();
  fd.append("sid", sid);
  fd.append("st", st);
  fd.append("stb", stb);
  if (st < stb) {
    let d = new Date();
    let t = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(
      2,
      "0"
    )}-${String(d.getDate()).padStart(2, "0")}`;
    let w = `${String(d.getHours()).padStart(2, "0")}:${String(
      d.getMinutes()
    ).padStart(2, "0")}:${String(d.getSeconds()).padStart(2, "0")}`;
    fd.append("terjual", Number(stb) - Number(st));
    fd.append("t", t);
    fd.append("w", w);
  }
  $.ajax({
    url: "./update/katikanstokEC.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {},
  });
}

//*********************  Katalog Keperluan *******************************/

function katuanShow() {
  $.ajax({
    url: "./show/katuanShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function katuanUpdateForm(kid) {
  $.ajax({
    url: "./update form/katuanUpdateForm.php",
    method: "post",
    data: { record: kid },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function katuanUpdate() {
  let kid = $("#kid").val();
  let nama = $("#nama").val();
  let lf = $("#link_foto").val();
  let harga = $("#harga").val();
  let stok = $("#stok").val();
  let keterangan = $("#keterangan").val();
  let fd = new FormData();
  fd.append("kid", kid);
  fd.append("nama", nama);
  fd.append("lf", lf);
  fd.append("harga", harga);
  fd.append("stok", stok);
  fd.append("keterangan", keterangan);

  $.ajax({
    url: "./update/katuanUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Katalog Keperluan",1);
      $("form").trigger("reset");
      katuanShow();
    },
  });
}
function katuanDelete(kid) {
  $.ajax({
    url: "./delete/katuanDelete.php",
    method: "post",
    data: { record: kid },
    success: function (data) {
      new PUM("Berhasil menghapus Katalog Keperluan",1);
      $("form").trigger("reset");
      katuanShow();
    },
  });
}
function katuanEC(kid, st, stb) {
  let fd = new FormData();
  fd.append("kid", kid);
  fd.append("st", st);
  if (st < stb) {
    let d = new Date();
    let t = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(
      2,
      "0"
    )}-${String(d.getDate()).padStart(2, "0")}`;
    let w = `${String(d.getHours()).padStart(2, "0")}:${String(
      d.getMinutes()
    ).padStart(2, "0")}:${String(d.getSeconds()).padStart(2, "0")}`;
    fd.append("terjual", Number(stb) - Number(st));
    fd.append("t", t);
    fd.append("w", w);
  }
  $.ajax({
    url: "./update/katuanEC.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {},
  });
}
function katuanCreate() {
  let fd = new FormData();
  let nama = $("#nama").val();
  let kid = nama.toLocaleLowerCase();
  kid = kid.split(" ");
  let mainId='';
  for (let i = 0; i < kid.length; i++) {
    if (kid[i].length > 3) {
      mainId += `${kid[i][0]}${kid[i][Math.floor(kid[i].length / 2)]}${
        kid[i][kid[i].length - 1]
      }`;
    } else {
      mainId += `${kid[i][0]}${kid[i][kid[i].length - 1]}`;
    }
    if(i===2){break};// batesin aja biar 3 kata
    if(!(i===kid.length-1)){
      mainId+='-';
    }
  }
  kid = mainId;
  let harga = $("#harga").val();
  let stok = $("#stok").val();
  let keterangan = $("#keterangan").val();
  let lf = $("#link_foto").val();
  let upload = $("#upload").val();
  fd.append("kid", kid);
  fd.append("nama", nama);
  fd.append("harga", harga);
  fd.append("stok", stok);
  fd.append("keterangan", keterangan);
  fd.append("lf", lf);
  fd.append("upload", upload);
  $.ajax({
    url: "./create/katuanCreate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil menambahkan Katalog Keperluan",1);
      $("form").trigger("reset");
      katuanShow();
    },
  });
}


//*********************  Perawatan *******************************/

function careShow() {
  $.ajax({
    url: "./show/careShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function careCreate() {
  let fd = new FormData();
  let upload = $("#upload").val();
  let jenis = $("#jenis").val();
  let data_count = $("#data-count").val();
  for (let i = 1; i <= Number(data_count); i++) {
    fd.append(`tr-${i}-j`, $(`#tr-care-data-${i} #judul`).val());
    fd.append(`tr-${i}-k`, $(`#tr-care-data-${i} #konten`).val());
  }
  fd.append("jenis", jenis);
  fd.append("upload", upload);
  fd.append("data_count", data_count);
  $.ajax({
    url: "./create/careCreate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil membuat Perawatan",1);
      $("form").trigger("reset");
      careShow();
    },
  });
}
function careUpdateForm(id) {
  $.ajax({
    url: "./update form/careUpdateForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function careUpdate() {
  let id = $("#id").val();
  let jenis = $("#jenis").val();
  let judul = $("#judul").val();
  let konten = $("#konten").val();
  let fd = new FormData();
  fd.append("id", id);
  fd.append("judul", judul);
  fd.append("jenis", jenis);
  fd.append("konten", konten);

  $.ajax({
    url: "./update/careUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Perawatan",1);
      $("form").trigger("reset");
      careShow();
    },
  });
}
function careDelete(id) {
  $.ajax({
    url: "./delete/careDelete.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      new PUM("Berhasil menghapus Perawatan",1);
      $("form").trigger("reset");
      careShow();
    },
  });
}

//*********************  Kegiatan *******************************/

function actShow() {
  $.ajax({
    url: "./show/actShow.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function actDelete(id) {
  $.ajax({
    url: "./delete/actDelete.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      new PUM("Berhasil menghapus Kegiatan",1);
      $("form").trigger("reset");
      actShow();
    },
  });
}
function actUpdateForm(id) {
  $.ajax({
    url: "./update form/actUpdateForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function actUpdate() {
  let id = $("#id").val();
  let judul = $("#judul").val();
  let lf = $("#link_foto").val();
  let tanggal_r = $("#tanggal_r").val();
  let d = new Date(tanggal_r);
  let tanggal = `${parseHari(d.getDay()+1)}, ${String(d.getDate()).padStart(2,'0')} ${parseBulan(d.getMonth()+1)} ${d.getFullYear()}`;
  let deskripsi = $("#deskripsi").val();
  let fd = new FormData();
  fd.append("id", id);
  fd.append("judul", judul);
  fd.append("lf", lf);
  fd.append("deskripsi", deskripsi);
  fd.append("tanggal", tanggal);
  fd.append("tanggal_r", tanggal_r);

  $.ajax({
    url: "./update/actUpdate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil memperbarui Kegiatan",1);
      $("form").trigger("reset");
      actShow();
    },
  });
}
function actCreate() {
  let judul = $("#judul").val();
  let lf = $("#link_foto").val();
  let tanggal_r = $("#tanggal_r").val();
  let deskripsi = $("#deskripsi").val();
  let upload = $("#upload").val();
  let d = new Date(tanggal_r);
  let fd = new FormData();
  let tanggal = `${parseHari(d.getDay()+1)}, ${String(d.getDate()).padStart(2,'0')} ${parseBulan(d.getMonth()+1)} ${d.getFullYear()}`;
  fd.append("judul", judul);
  fd.append("lf", lf);
  fd.append("deskripsi", deskripsi);
  fd.append("tanggal", tanggal);
  fd.append("tanggal_r", tanggal_r);
  fd.append("upload", upload);
  $.ajax({
    url: "./create/actCreate.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      new PUM("Berhasil menambahkan Kegiatan",1);
      $("form").trigger("reset");
      actShow();
    },
  });
}