INSERT INTO Kullanici VALUES (1, 0, 'kerem');
INSERT INTO Kullanici (kullanici_tipi, kullanici_parolasi) VALUES (1, 'ogulcan');
INSERT INTO Kullanici (kullanici_tipi, kullanici_parolasi) VALUES (2, 'oguzmert');
INSERT INTO Kullanici (kullanici_tipi, kullanici_parolasi) VALUES (0, 'burak');

INSERT INTO Kisi VALUES (1, 'Behlul Kerem', 'Sisman', 1995-01-18, 'TOBB ETU', 'E');
INSERT INTO Kisi VALUES (2, 'Ogulcan', 'Altinbek', 1995-01-18, 'TOBB ETU', 'E');
INSERT INTO Kisi VALUES (3, 'Oguz Mert', 'Caylar', 1995-01-18, 'Baglica', 'E');
INSERT INTO Kisi VALUES (4, 'Emin Burak', 'Duman', 1995-01-18, 'Incek', 'E');

INSERT INTO Ders  VALUES (1, 'Turkce', 'Anadilimizin temellerinin atilmasi.', 5, 6);
INSERT INTO Ders (ders_adi, ders_icerigi, ders_katSayisi, ders_saatSayisi) VALUES ('Matematik', 'Matematigin temellerinin atilmasi.', 4, 6);
INSERT INTO Ders (ders_adi, ders_icerigi, ders_katSayisi, ders_saatSayisi) VALUES ('Tarih', 'Tarih bilgisinin temellerinin atilmasi.', 3, 4);
INSERT INTO Ders (ders_adi, ders_icerigi, ders_katSayisi, ders_saatSayisi) VALUES ('Fen Bilgisi', 'Bilimsel arastirma temellerinin atilmasi.', 4, 6);
INSERT INTO Ders (ders_adi, ders_icerigi, ders_katSayisi, ders_saatSayisi) VALUES ('Cografya', 'Cevresel farkindalik temellerinin atilmasi.', 3, 4);

INSERT INTO Ogrenci VALUES (1, 6, 'C');
INSERT INTO Ogrenci VALUES (4, 7, 'B');

INSERT INTO Ogretmen VALUES (3);

INSERT INTO Veli VALUES (2,4);

INSERT INTO Ders_Programi VALUES (1, 7, 'B', 1, 'null', 1723);
INSERT INTO Ders_Programi VALUES (2, 7, 'B', 1, 'null', 1723);

INSERT INTO Ders_Programi VALUES (3, 6, 'C', 1, 'null', 1723);
INSERT INTO Ders_Programi VALUES (4, 6, 'C', 1, 'null', 1723);
INSERT INTO Ders_Programi VALUES (5, 6, 'C', 1, 'null', 1723);

INSERT INTO Sinif VALUES (6, 'C', 3);
INSERT INTO Sinif VALUES (7, 'B', 3);


INSERT INTO Sinif_Ders_Programi VALUES (7, 'B', 1);
INSERT INTO Sinif_Ders_Programi VALUES (7, 'B', 2);
INSERT INTO Sinif_Ders_Programi VALUES (7, 'B', 3);
INSERT INTO Sinif_Ders_Programi VALUES (7, 'B', 4);
INSERT INTO Sinif_Ders_Programi VALUES (7, 'B', 5);
INSERT INTO Sinif_Ders_Programi VALUES (6, 'C', 1);
INSERT INTO Sinif_Ders_Programi VALUES (6, 'C', 2);
INSERT INTO Sinif_Ders_Programi VALUES (6, 'C', 3);
INSERT INTO Sinif_Ders_Programi VALUES (6, 'C', 4);
INSERT INTO Sinif_Ders_Programi VALUES (6, 'C', 5);


INSERT INTO Duyuru VALUES (100000, 1, 6, 'C', 0, 1, 'Sinav tarihleri aciklandi', 'Ilk sinaviniz Ocakin son gunu', 2018-01-30);

INSERT INTO Duyuru (ders_id, sinif_id, sube_id, ilgili, duyuru_tipi, duyuru_basligi, duyuru_icerigi, duyuru_tarihi) VALUES (1, 6, 'C', 0, 0, 'Somestr', 'Yeni donem basladi', 2018-01-31);

INSERT INTO Duyuru (ders_id, sinif_id, sube_id, ilgili, duyuru_tipi, duyuru_basligi, duyuru_icerigi, duyuru_tarihi) VALUES (1, 6, 'C', 0, 2, 'Ilk odev verildi', 'Ilk odeviniz Subatin basina', 2018-01-31);

INSERT INTO Duyuru (ders_id, sinif_id, sube_id, ilgili, duyuru_tipi, duyuru_basligi, duyuru_icerigi, duyuru_tarihi) VALUES (1, 6, 'C', 0, 3, 'Ilk quiz vakti', 'Ilk quiziniz Subatin basina', 2018-01-31);

INSERT INTO Duyuru (ders_id, sinif_id, sube_id, ilgili, duyuru_tipi, duyuru_basligi, duyuru_icerigi, duyuru_tarihi) VALUES (1, 6, 'C', 0, 4, 'Ilk dokuman verildi', 'Ilk dokumaniniz Subatin basina', 2018-01-31);

INSERT INTO Duyuru (ders_id, sinif_id, sube_id, ilgili, duyuru_tipi, duyuru_basligi, duyuru_icerigi, duyuru_tarihi) VALUES (1, 6, 'C', 0, 5, 'Ilk etkinlik', 'Ilk etkinlik Martta', 2018-01-31);

ALTER TABLE `Ogretmen` ADD `brans` VARCHAR(25) NOT NULL AFTER `ogretmen_id`;

UPDATE `Ogretmen` SET `brans` = 'FenBilgisi' WHERE `Ogretmen`.`ogretmen_id` = 3;

ALTER TABLE `Quiz` ADD `link` VARCHAR(100) NOT NULL AFTER `not_yuzdesi`;



INSERT INTO `ders` (`ders_id`, `ders_adi`, `ders_icerigi`, `ders_katSayisi`, `ders_saatSayisi`) VALUES ('6', 'Muzik', 'Muzik Egitimi', '3', '3');

INSERT INTO `ders` (`ders_id`, `ders_adi`, `ders_icerigi`, `ders_katSayisi`, `ders_saatSayisi`) VALUES ('7', 'Beden Egitimi', 'Beden Egitiminin Temelleri', '2', '2');

INSERT INTO `ders` (`ders_id`, `ders_adi`, `ders_icerigi`, `ders_katSayisi`, `ders_saatSayisi`) VALUES ('8', 'SosyalBilgiler', 'Sosyal Bilgi Egitimi', '3', '3');

ALTER TABLE `sinif_ders_programi`
ADD `ders_zamani` INT(11) NOT NULL AFTER `ders_id`;

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '1', '1');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '2', '2');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '3', '3');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '4', '4');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '5', '5');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '6', '6');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '7', '7');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('6', 'C', '8', '8');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '1', '5');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '2', '4');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '3', '3');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '4', '2');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '5', '1');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '6', '8');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '7', '6');

INSERT INTO `sinif_ders_programi` (`sinif_id`, `sube_id`, `ders_id`, `ders_zamani`) VALUES ('7', 'B', '8', '7');

UPDATE `Ders` SET `ders_adi` = 'FenBilgisi' WHERE `Ders`.`ders_id` = 4;

UPDATE `Ders` SET `ders_adi` = 'BedenEgitimi' WHERE `Ders`.`ders_id` = 7;

INSERT INTO Iletisim VALUES (3, 3125547, 245, 'deneme@gmail.com');

INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'ahmet');
INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'arda');
INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'fatih');
INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'muhammed');
INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'rabia');
INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'ekin');
INSERT INTO `Kullanici` (`kullanici_id`, `kullanici_tipi`, `kullanici_parolasi`) VALUES (NULL, '0', 'nursel');

INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('5', 'Ahmet Selim', 'Kaya', '1995-02-13', 'ANKARA', 'E');
INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('6', 'Arda', 'Eyüpoğlu', '1995-02-13', 'ANKARA', 'E');
INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('7', 'Fatih Erdem', 'Kızılkaya', '1995-02-13', 'ANKARA', 'E');
INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('8', 'Muhammed Ertuğrul', 'Güngör', '1995-02-13', 'ANKARA', 'E');
INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('9', 'Rabia', 'Özkan', '1995-02-13', 'ANKARA', 'K');
INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('10', 'Ekin Mert ', 'Temizkan', '1995-02-13', 'ANKARA', 'E');
INSERT INTO `Kisi` (`kisi_id`, `kisi_adi`, `kisi_soyadi`, `kisi_dogumTarihi`, `kisi_adresi`, `kisi_cinsiyeti`) VALUES ('11', 'Nursel ', 'Toplar', '1995-02-13', 'ANKARA', 'K');

INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('5', '6', 'C');
INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('6', '6', 'C');
INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('7', '6', 'C');
INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('8', '7', 'B');
INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('9', '7', 'B');
INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('10', '7', 'B');
INSERT INTO `Ogrenci` (`ogrenci_id`, `sinif_id`, `sube_id`) VALUES ('11', '7', 'B');

DROP TABLE Duyuru;
CREATE TABLE Duyuru (
    duyuru_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    sinif_id INT UNSIGNED NOT NULL,
    sube_id CHAR(1) NOT NULL,
		ilgili SMALLINT UNSIGNED NOT NULL, /* 1: only parents will see, 0: both student and parent will see */
    duyuru_tipi SMALLINT UNSIGNED NOT NULL,
		/* 0: general, 1: exam, 2:homework, 3: quiz, 4: document, 5: activity, 6: trip, 7: meeting */
    duyuru_basligi VARCHAR(137) NOT NULL,
    duyuru_icerigi VARCHAR(255) NOT NULL,
    duyuru_tarihi TIMESTAMP NOT NULL,

    #FOREIGN KEY (sinif_id) REFERENCES Sinif(sinif_id),
    #FOREIGN KEY (sube_id) REFERENCES Sinif(sube_id),

    PRIMARY KEY (duyuru_id, sinif_id, sube_id)
);

INSERT INTO `geziler` (`sinif_id`, `sube_id`, `gezi_basligi`, `gezi_icerigi`, `gezi_tarihi`) VALUES ('6', 'C', 'Anitkabir', 'Anitkabire gidilecek', '2018-02-08');

ALTER TABLE `Toplanti` ADD `toplanti_baslik` VARCHAR(25) NOT NULL AFTER `katilim_durumu`, ADD `toplanti_icerik` VARCHAR(200) NOT NULL AFTER `toplanti_baslik`;

CREATE TABLE Ogrenci_Degerlendirme (
    hafta_id INT UNSIGNED NOT NULL,
    ogrenci_id INT UNSIGNED NOT NULL,
    ders_id INT UNSIGNED NOT NULL,
    degerlendirme_tipi INT UNSIGNED NOT NULL,
    degerlendirme_puani INT UNSIGNED NOT NULL,

    PRIMARY KEY (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
);

UPDATE `Ders` SET `ders_adi` = 'FenBilgisi' WHERE `Ders`.`ders_id` = 4;
UPDATE `Ders` SET `ders_adi` = 'BedenEgitimi' WHERE `Ders`.`ders_id` = 7;




ALTER TABLE `ogrenci` ADD `klup` VARCHAR(200) NOT NULL AFTER `sube_id`;
ALTER TABLE `ogrenci` ADD `klup_icerigi` TEXT NOT NULL AFTER `klup`;

UPDATE `ogrenci` SET `klup` = 'Sivil Savunma Klubu' WHERE `ogrenci`.`ogrenci_id` = 1;
UPDATE `ogrenci` SET `klup` = 'Kutuphanecilik Klubu' WHERE `ogrenci`.`ogrenci_id` = 4;
UPDATE `ogrenci` SET `klup` = 'Kultur Ve Edebiyat Klubu' WHERE `ogrenci`.`ogrenci_id` = 5;
UPDATE `ogrenci` SET `klup` = 'Spor Klubu' WHERE `ogrenci`.`ogrenci_id` = 6;
UPDATE `ogrenci` SET `klup` = 'Resim Klubu' WHERE `ogrenci`.`ogrenci_id` = 7;
UPDATE `ogrenci` SET `klup` = 'Kizilay Klubu' WHERE `ogrenci`.`ogrenci_id` = 8;
UPDATE `ogrenci` SET `klup` = 'Muzik Klubu' WHERE `ogrenci`.`ogrenci_id` = 9;
UPDATE `ogrenci` SET `klup` = 'Cevre Klubu' WHERE `ogrenci`.`ogrenci_id` = 10;
UPDATE `ogrenci` SET `klup` = 'Yesilay Klubu' WHERE `ogrenci`.`ogrenci_id` = 11;

UPDATE `ogrenci` SET `klup_icerigi` = 'Sivil Savunma Kolu, meydana gelebilecek herhangi bir dogal afet (yangin, deprem vb.), kimyasal ve biyolojik saldiri, zehirlenme ve bogulma gibi durumlarda olusabilecek zararlari en asgariye indirmek icin gereken onlemleri almak amaciyla kurulmustur. Bu koldaki ogrenciler olusabilecek bu gibi durumlarda aktif bir sekilde gorev almaktadirlar.' WHERE `ogrenci`.`ogrenci_id` = 1;

UPDATE `ogrenci` SET `klup_icerigi` = 'Kitapligin tanitilmasi. Kitaplarin sayimi. Kitaplarin demirbas defterine islenmesi. Kitaplarin turlerine gore tasnifi. Ataturk konulu ozel gun ve haftalarda kitapligin tanitilmasi, on plana cikarilmasi. Kitaplarin ogrencilere tanitilmasi.' WHERE `ogrenci`.`ogrenci_id` = 4;

UPDATE `ogrenci` SET `klup_icerigi` = 'Kultur nedir? Kulturumuz hakkinda bilgilendirmek. Egitici kol calismalarinda ogrencilere, dayanisma ve yardimlasma aliskanligi kazandirmak. Turk Milli Egitiminin amaclarinin dogrultusunda Turk dilini sevdirmek. Kitap okuma aliskanliginin pekistirilmesi. Sanatimizi ve sanatciyi tanitmak..' WHERE `ogrenci`.`ogrenci_id` = 5;

UPDATE `ogrenci` SET `klup_icerigi` = 'Turk Milli Egitiminin genel amaclari dogrultusunda milli ve estetik duygulari kazandirmak. İnsan icin sporun onemini kazandirmak. ogrencilerin bos zamanlarini degerlendirme. Enerjilerini bosa harcamama, iyi davranislara yoneltme. ' WHERE `ogrenci`.`ogrenci_id` = 6;

UPDATE `ogrenci` SET `klup_icerigi` = 'Kizilay nedir? Kizilay’in toplumdaki oneminin vurgulanmasi. Kizilay’in toplumumuza sagladigi faydalar. İlkyardim nedir? Nasil yapilir? Kan bagisinin onemi ve kisiye kazandirdiklari. İnsan yasamini tehlikeye sokacak olan hastaliklarin taninmasi ve bunlardan korunmak. Kent kizilay merkezinin taninmasi' WHERE `ogrenci`.`ogrenci_id` = 8;

UPDATE `ogrenci` SET `klup_icerigi` = 'Resim nedir? Amaclari nelerdir? Resim yapmanin insan yasamindaki onemi nedir? Ataturk’un sanata ve sanatciya verdigi onemi. Yetenekli ogrencilerin ortaya cikmasinda yardimci olmak. Okulu guzellestirme ile ilgili calismalarin, okulu guzellestirme kolu ile birlikte yurutulmesi. ' WHERE `ogrenci`.`ogrenci_id` = 7;

UPDATE `ogrenci` SET `klup_icerigi` = 'ogrencilere okulda ve yasamlarinda is bolumunun yararlarini gostermek ve bu konuda gelismelerine yardimci olmak. Okullarimizda, milli oyunlarimizin, muzigi, giyimi ve figurleri ile yasatilmasina calismak. Okulu tanitmak, sesini duyurmak icin okul geceleri duzenlemek. Yapilan calismalarin sergilenmesi.' WHERE `ogrenci`.`ogrenci_id` = 9;

UPDATE `ogrenci` SET `klup_icerigi` = 'Temizligin insan yasamindaki onemi. Temizligin insana sagladigi yararlar. Temiz ve duzenli olmanin kisiye kazandirdigi yararlar. Okul icindeki temizligin onemli oldugunun kavramasi. Okul bahcesindeki agaclarin korunmasina uygun yerlerin agaclandirilmasi.' WHERE `ogrenci`.`ogrenci_id` = 10;

UPDATE `ogrenci` SET `klup_icerigi` = 'ulkemizdeki Yesilay durumunun ogrencilere aktarilmasi Zararli aliskanliklar hakkinda ogrencilere bilgi vermek Sigara ve alkolun zararlarini anlatan etkinlikler yapmak' WHERE `ogrenci`.`ogrenci_id` = 11;



