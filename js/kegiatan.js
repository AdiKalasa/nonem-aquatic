
function renderKegiatan(){
    let kegiatan = document.querySelector(".kegiatan");
    
    
    for (let i = 0; i < dataKegiatan.length; i++) {
      let cc = document.createElement("div");
      cc.classList.add("card-catalog");
    
      let img = document.createElement("img");
      img.classList.add("img-kegiatan");
      img.src = dataKegiatan[i].gambar;
      img.alt = `gambar keperluan ${dataKegiatan[i].judul}`;
    
      let tgl = document.createElement('p');
      tgl.classList.add('date-kegiatan');
      tgl.textContent = dataKegiatan[i].tanggal;

      let title = document.createElement("h3");
      title.classList.add("judul-kegiatan");
      title.textContent = dataKegiatan[i].judul;
      
      let deskripsi = document.createElement('p');
      deskripsi.classList.add("deskripsi-kegiatan")
      deskripsi.textContent = dataKegiatan[i].deskripsi;

      cc.append(img);
      cc.append(tgl);
      cc.append(title);
      cc.append(deskripsi);
      kegiatan.append(cc);
    }
  }