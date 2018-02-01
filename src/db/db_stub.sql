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
