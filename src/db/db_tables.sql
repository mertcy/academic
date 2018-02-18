CREATE DATABASE db_academic;
USE db_academic;

CREATE TABLE Kullanici (
    kullanici_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    kullanici_tipi INT NOT NULL,
    kullanici_parolasi VARCHAR(55),

    PRIMARY KEY (kullanici_id)
);

CREATE TABLE Kisi (
    kisi_id INT UNSIGNED NOT NULL,
    kisi_adi VARCHAR(37) NOT NULL,
    kisi_soyadi VARCHAR(37) NOT NULL,
    kisi_dogumTarihi DATE NOT NULL,
    kisi_adresi VARCHAR(137) NOT NULL,
    kisi_cinsiyeti CHAR(1) NOT NULL,

    FOREIGN KEY (kisi_id) REFERENCES Kullanici(kullanici_id),

    PRIMARY KEY (kisi_id)
);

CREATE TABLE Ogretmen (
    ogretmen_id INT UNSIGNED NOT NULL,

    FOREIGN KEY (ogretmen_id) REFERENCES Kisi(kisi_id),

    PRIMARY KEY (ogretmen_id)
);

CREATE TABLE Sinif (
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    ogretmen_id INT UNSIGNED NOT NULL,

    FOREIGN KEY (ogretmen_id) REFERENCES Ogretmen(ogretmen_id),

    PRIMARY KEY (sinif_id, sube_id)
);

CREATE TABLE Ogrenci (
    ogrenci_id INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,

    FOREIGN KEY (ogrenci_id) REFERENCES Kisi(kisi_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),

    PRIMARY KEY (ogrenci_id)
);

CREATE TABLE Yoklama (
    ogrenci_id INT UNSIGNED NOT NULL,
    gun DATE NOT NULL,
    devam DOUBLE UNSIGNED NOT NULL,

    FOREIGN KEY (ogrenci_id) REFERENCES Ogrenci(ogrenci_id),

    PRIMARY KEY (ogrenci_id, gun)
);

CREATE TABLE Belge (
    ogrenci_id INT UNSIGNED NOT NULL,
    belge_tipi SMALLINT UNSIGNED NOT NULL,

    FOREIGN KEY (ogrenci_id) REFERENCES Ogrenci(ogrenci_id),

    PRIMARY KEY (ogrenci_id, belge_tipi)
);

CREATE TABLE Veli (
    veli_id INT UNSIGNED NOT NULL,
    ogrenci_id INT UNSIGNED NOT NULL,

    FOREIGN KEY (veli_id) REFERENCES Kisi(kisi_id),
    FOREIGN KEY (ogrenci_id) REFERENCES Ogrenci(ogrenci_id),

    PRIMARY KEY (veli_id)
);

CREATE TABLE Ders (
    ders_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ders_adi VARCHAR(37) NOT NULL,
    ders_icerigi VARCHAR(137) NOT NULL,
    ders_katSayisi INT UNSIGNED NOT NULL,
    ders_saatSayisi INT UNSIGNED NOT NULL,

    PRIMARY KEY (ders_id)
);

CREATE TABLE Sinif_Ders_Programi (
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    ders_id INT UNSIGNED NOT NULL,

    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),
    FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),

    PRIMARY KEY (sinif_id, sube_id, ders_id)
);

CREATE TABLE Ders_Programi (
    ders_programId INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    ders_gunu INT UNSIGNED NOT NULL,
    ders_tarihi DATE NOT NULL,
    ogretmen_id INT UNSIGNED NOT NULL,

    FOREIGN KEY (ders_programId) REFERENCES Ders(ders_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),
    #FOREIGN KEY (ogretmen_id) REFERENCES Ogretmen(ogretmen_id),

    PRIMARY KEY (ders_programId, sinif_id, sube_id, ders_gunu)
);

CREATE TABLE Ogretmen_Ders_Programi (
    ogretmen_id INT UNSIGNED NOT NULL,
    ders_programId INT UNSIGNED NOT NULL,

    FOREIGN KEY (ogretmen_id) REFERENCES Ogretmen(ogretmen_id),
    #FOREIGN KEY (ders_programId) REFERENCES Ders_Programi(ders_programId),

    PRIMARY KEY (ogretmen_id, ders_programId)
);

CREATE TABLE Agirlikli_Ortalama (
    ogrenci_id INT UNSIGNED NOT NULL,
    not_degeri DOUBLE UNSIGNED NOT NULL,

    FOREIGN KEY (ogrenci_id) REFERENCES Ogrenci(ogrenci_id),

    PRIMARY KEY (ogrenci_id)
);

CREATE TABLE Okudugu_Kitaplar (
    ogrenci_id INT UNSIGNED NOT NULL,
    kitap_adi VARCHAR(137) NOT NULL,
    kitap_yazari VARCHAR(137) NOT NULL,
    sayfa_sayisi INT UNSIGNED NOT NULL,

    FOREIGN KEY (ogrenci_id) REFERENCES Ogrenci(ogrenci_id),

    PRIMARY KEY (ogrenci_id, kitap_adi, kitap_yazari)
);

CREATE TABLE Odev (
    odev_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ders_id INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
    odev_no SMALLINT UNSIGNED NOT NULL,
    odev_verilisTarihi DATE NOT NULL,
    odev_teslimTarihi DATE NOT NULL,
    notlandirma_tipi SMALLINT UNSIGNED NOT NULL,
    not_yuzdesi DOUBLE UNSIGNED NOT NULL,

    #FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),
    #FOREIGN KEY (duyuru_tipi) REFERENCES Ders_Duyurusu(duyuru_tipi),

    PRIMARY KEY (odev_id, ders_id, sinif_id, sube_id, duyuru_tipi, odev_no)
);

CREATE TABLE Quiz (
    quiz_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ders_id INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
    quiz_no SMALLINT UNSIGNED NOT NULL,
    quiz_tarihi DATE NOT NULL,
    notlandirma_tipi SMALLINT UNSIGNED NOT NULL,
    not_yuzdesi DOUBLE UNSIGNED NOT NULL,

    #FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),
    #FOREIGN KEY (duyuru_tipi) REFERENCES Ders_Duyurusu(duyuru_tipi),

    PRIMARY KEY (quiz_id, ders_id, sinif_id, sube_id, duyuru_tipi, quiz_no)
);

CREATE TABLE Sinav (
    sinav_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ders_id INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
    sinav_no SMALLINT UNSIGNED NOT NULL,
    sinav_tarihi DATE NOT NULL,
    notlandirma_tipi SMALLINT UNSIGNED NOT NULL,
    not_yuzdesi DOUBLE UNSIGNED NOT NULL,

    #FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),
    #FOREIGN KEY (duyuru_tipi) REFERENCES Ders_Duyurusu(duyuru_tipi),

    PRIMARY KEY (sinav_id, ders_id, sinif_id, sube_id, duyuru_tipi, sinav_no)
);

CREATE TABLE Dokuman (
    dokuman_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ders_id INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
    dokuman_no SMALLINT UNSIGNED NOT NULL,
    dokuman_tarihi DATE NOT NULL,
    dokuman_basligi VARCHAR(137) NOT NULL,
    dokuman_icerigi VARCHAR(137) NOT NULL,
    dokuman_url VARCHAR(255) NOT NULL,

    #FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),
    #FOREIGN KEY (duyuru_tipi) REFERENCES Ders_Duyurusu(duyuru_tipi),

    PRIMARY KEY (dokuman_id, ders_id, sinif_id, sube_id, duyuru_tipi, dokuman_no)
);

CREATE TABLE Ders_Notu (
    ogrenci_id INT UNSIGNED NOT NULL,
    ders_id INT UNSIGNED NOT NULL,
    notlandirma_tipi SMALLINT UNSIGNED NOT NULL,
    notlandirma_no SMALLINT UNSIGNED NOT NULL,
    not_degeri DOUBLE UNSIGNED NOT NULL,

    #FOREIGN KEY (ogrenci_id) REFERENCES Ogrenci(ogrenci_id),
    #FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),

    PRIMARY KEY (ogrenci_id, ders_id, notlandirma_tipi, notlandirma_no)
);

CREATE TABLE Duyuru (
    duyuru_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		ders_id INT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
		ilgili SMALLINT UNSIGNED NOT NULL, /* 1: only parents will see, 0: both student and parent will see */
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
		/* 0: general, 1: exam, 2:homework, 3: quiz, 4: document, 5: activity, 6: trip, 7: meeting */
    duyuru_basligi VARCHAR(137) NOT NULL,
    duyuru_icerigi VARCHAR(255) NOT NULL,
    duyuru_tarihi DATE NOT NULL,

		FOREIGN KEY (ders_id) REFERENCES Ders(ders_id),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),

    PRIMARY KEY (duyuru_id, ders_id, sinif_id, sube_id)
);

CREATE TABLE Toplanti (
    toplanti_id INT UNSIGNED NOT NULL,
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    toplanti_tipi SMALLINT UNSIGNED NOT NULL,
    toplanti_no SMALLINT UNSIGNED NOT NULL,
    toplanti_tarihi DATE NOT NULL,
    katilim_durumu SMALLINT UNSIGNED NOT NULL,

    #FOREIGN KEY (toplanti_id) REFERENCES Sinif_Duyurusu(sinif_duyuruId),
    #FOREIGN KEY (duyuru_tipi) REFERENCES Sinif_Duyurusu(duyuru_tipi),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),

    PRIMARY KEY (toplanti_id, duyuru_tipi, sinif_id, sube_id, toplanti_tipi, toplanti_no)
);

CREATE TABLE Etkinlik (
    etkinlik_id INT UNSIGNED NOT NULL,
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
    etkinlik_tipi SMALLINT UNSIGNED NOT NULL,
    etkinlik_no SMALLINT UNSIGNED NOT NULL,
    etkinlik_tarihi DATE NOT NULL,
    katilim_durumu SMALLINT UNSIGNED NOT NULL,

    #FOREIGN KEY (etkinlik_id) REFERENCES Sinif_Duyurusu(sinif_duyuruId),
    #FOREIGN KEY (duyuru_tipi) REFERENCES Sinif_Duyurusu(duyuru_tipi),
    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),

    PRIMARY KEY (etkinlik_id, duyuru_tipi, sinif_id, sube_id, etkinlik_tipi, etkinlik_no)
);

CREATE TABLE Iletisim (
    ogretmen_id INT UNSIGNED NOT NULL,
    tel_num INT NOT NULL,
    ofis_num INT NOT NULL,
    mail_adresi VARCHAR(55),

    PRIMARY KEY (ogretmen_id)
);

CREATE TABLE geziler(
    sinif_id INT(11),
    sube_id VARCHAR(11),
    gezi_basligi VARCHAR(100),
    gezi_icerigi TEXT ,
    gezi_tarihi DATE,

);
