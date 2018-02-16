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
