How to format your code with Atom-beautify in Atom

1-) Install Atom-beautify in Atom->Prefences->install

2-) Install Composer (https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
Run:
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer

3-) Install PHP-CS-Fixer (https://github.com/FriendsOfPHP/PHP-CS-Fixer)
Run:
$ curl http://get.sensiolabs.org/php-cs-fixer.phar -o php-cs-fixer
$ sudo chmod a+x php-cs-fixer
$ sudo mv php-cs-fixer /usr/local/bin/php-cs-fixer


When you did these instructions, just use Cntrl+Alt+B shortcut you format your code.

--------------------------------------------------------------------------------------------------------------------
--- PHP Coding Formats ---

Variables:

Strings --> $sVariable
Integers--> $iVariable
Arrays  --> $aVariable
     .		    .
     .          .

--------------------------------------------------------------------------------------------------------------------
Create your files in the directory that relevant.
-Ex: create student.php in src/front-end
Use style files for relevant pages.
-Ex: create student.css file in src/css directory for student.php and write your <style>XXX</style> codes in there.

Write your codes simple and understandable and use indentation. Atom-beautify can be used.
--------------------------------------------------------------------------------------------------------------------

--- COMMITTING ---

DO NOT commit like: 'git add .'
You SHOULD use like: 'git add src/front-end/login.php src/css/login.css'

Follow these;

Get a list of files you want to commit

$ git status

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

modified:   file1
modified:   file2
modified:   file3
modified:   file4

Add the files to staging

$ git add file1 file2
Check to see what you are committing

$ git status

Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

    modified:   file1
    modified:   file2

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

    modified:   file3
    modified:   file4
Commit the files with a commit message

$ git commit -m "Fixed files 1 and 2"

If you accidentally commit the wrong files

$ git reset --soft HEAD~1
If you want to unstage the files and start over

$ git reset

Unstaged changes after reset:
M file1
M file2
M file3
M file4


--------------------------------------------------------------------------------------------------------------------


--- AcadeMic – Mini World Assumption ---


•	There exists a “Kullanici”.
“Kullanici” has
•	kullanici_id: int (PK)
•	kullanici_tipi: int
•	kullanici_parolasi: Password


•	There exists a “Kisi”. A “Kisi” is a “Kullanici”.
“Kisi” has
•	kisi_id: int (PK, FK = “Kullanici” - kullanici_id)
•	kisi_adi: String
•	kisi_soyadi: String
•	kisi_dogumTarihi: Date
•	kisi_adresi: String
•	kisi_cinsiyeti: char(1)


•	A “Kisi” may be either “Ogrenci”, “Ogretmen” or “Veli”.
“Ogrenci” has
•	ogrenci_id: int (PK, FK = “Kisi” - kisi_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: int (FK = “Sinif” – sube_id)
“Ogretmen” has
•	ogretmen_id: int (PK, FK = “Kisi” - kisi_id)
•	sinif_id: int (FK = “Sinif” - sinif_id)
•	sube_id: int (FK = “Sinif” - sube_id)


“Veli” has
•	veli_id: int (FK = “Kisi” - kisi_id)
•	ogrenci_id: int (FK = “Ogrenci” - ogrenci_id)
•	PK(veli_id, ogrenci_id)


•	There exists a “Sinif”. A “Sinif” has “Sinif_Ders_Programi”.
“Sinif” has
•	sinif_id: int
•	sube_id: char(1)
•	PK(sinif_id, sube_id)
•	ogretmen_id: int (FK = “Ogretmen” – ogretmen_id)


•	There exists a “Sinif_Ders_Programi”.
(for each “Ogrenci” in the same “Sinif”)
“Sinif_Ders_Programi” has
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	ders_id: int (FK = “Ders” – ders_id)
•	PK(sinif_id, sube_id, ders_id)


•	There exists a “Ders”. A “Ders” has “Ders_Programi”.
“Ders” has
•	ders_id: int (PK)
•	ders_adi: String
•	ders_icerigi: String
•	ders_katSayisi: int
•	ders_saatSayisi: int


•	There exists a “Ders_Programi”. (for each “Ders”)
“Ders_Programi” has
•	ders_programId: int (FK = “Ders” – ders_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	ders_gunu: int (1 or 2 or 3..)
•	PK(ders_programId, sinif_id, sube_id, ders_gunu)
•	ders_tarihi: Date
•	ogretmen_id: int (PK, FK = “Ogretmen” – ogretmen_id)


•	There exists a “Ogretmen_Ders_Programi”. (for each “Ogretmen”)
“Ogretmen_Ders_Programi” has
•	ogretmen_id: int (FK = “Ogretmen” – ogretmen_id)
•	ders_programId: int (FK = “Ders_Programi” – ders_programId)
•	PK(ogretmen_id, ders_programId)


•	There exists a “Agirlikli_Ortalama”.
“Agirlikli_Ortalama” has
•	ogrenci_id: int (PK, FK = “Ogrenci” – ogrenci_id)
•	not_degeri: double


•	There exists a “Okudugu_Kitaplar”.
“Okudugu_Kitaplar” has
•	ogrenci_id: int (FK = “Ogrenci” – ogrenci_id)
•	kitap_adi: String
•	kitap_yazari: String
•	PK(ogrenci_id, kitap_adi, kitap_yazari)
•	sayfa_sayisi: int


•	There exists a “Ders_Duyurusu”.
A “Ders_Duyurusu” is a “Odev”, “Quiz”, “Sinav” or “Dokuman”.
“Ders_Duyurusu” has
•	ders_duyuruId: int (PK)
•	ders_id: int (FK = “Ders” – ders_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	PK(ders_duyuruId, ders_id, sinif_id, sube_id)
•	duyuru_tipi: int (Odev:1, Quiz:2, Sinav:3, Dokuman: 4)
•	duyuru_tarihi: Date

•	There exists a “Odev”.
“Odev” has
•	odev_id: int
•	ders_id: int (FK = “Ders” – ders_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	duyuru_tipi: int (FK = “Ders_Duyurusu” – duyuru_tipi)
•	odev_no: int
•	PK(odev_id, ders_id, sinif_id, sube_id, duyuru_tipi, odev_no)
•	odev_verilisTarihi: Date
•	odev_teslimTarihi: Date
•	notlandirma_tipi: int (Odev:1, Quiz:2, Sinav:3)
•	not_yüzdesi: double


•	There exists a “Quiz”.
“Quiz” has
•	quiz_id: int
•	ders_id: int (FK = “Ders” – ders_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	duyuru_tipi: int (FK = “Ders_Duyurusu” – duyuru_tipi)
•	quiz_no: int
•	PK(quiz_id, ders_id, sinif_id, sube_id, duyuru_tipi, quiz_no)
•	quiz_tarihi: Date
•	notlandirma_tipi: int
•	not_yüzdesi: double


•	There exists a “Sinav”.
“Sinav” has
•	sinav_id: int
•	ders_id: int (FK = “Ders” – ders_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	duyuru_tipi: int (FK = “Ders_Duyurusu” – duyuru_tipi)
•	sinav_no: int
•	PK(sinav_id, ders_id, sinif_id, sube_id, duyuru_tipi, sinav_no)
•	sinav_tarihi: Date
•	notlandirma_tipi: int
•	not_yüzdesi: double


•	There exists a “Dokuman”.
“Dokuman” has
•	dokuman_id: int
•	ders_id: int (FK = “Ders” – ders_id)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	dokuman_no: int
•	PK(dokuman_id, ders_id, sinif_id, sube_id, dokuman_no)
•	dokuman_tarihi: Date
•	dokuman_basligi: String
•	dokuman_icerigi: String
•	dokuman_url: String
•	duyuru_tipi: int (FK = “Ders_Duyurusu” – duyuru_tipi)


•	There exists a “Ders_Notu”.
“Ders_Notu” has
•	ogrenci_id: int (FK = “Ogrenci” – ogrenci_id)
•	ders_id: int (FK = “Ders” – ders_id)
•	notlandirma_tipi: int (Ders Geneli: 0, Odev:1, Quiz:2, Sinav:3)
•	notlandirma_no: int (Ders Geneli:0, (odev, quiz, sinav number: 1, 2, …))
•	PK(ogrenci_id, ders_id, notlandirma_tipi, notlandirma_no)
•	not_degeri: double


•	There exists a “Sinif_Duyurusu”.
“Sinif_Duyurusu” has
•	sinif_duyuruId: int (PK)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: char(1) (FK = “Sinif” – sube_id)
•	PK(sinif_duyuruId, sinif_id, sube_id)
•	duyuru_tipi: int (Toplanti:1, Etkinlik:2)
•	duyuru_basligi: String
•	duyuru_icerigi: String
•	duyuru_tarihi: Date


•	There exists a “Toplanti”.
“Toplanti” has
•	toplanti_id: int (FK = “Sinif_Duyurusu” - sinif_duyuruId)
•	duyuru_tipi: int (FK = “Sinif_Duyurusu” – duyuru_tipi)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: int (FK = “Sinif” – sube_id)
•	toplanti_no: int
•	PK(toplanti_id, duyuru_tipi, sinif_id, sube_id, toplanti_no)
•	toplanti_tarihi: Date


•	There exists a “Etkinlik”.
“Etkinlik” has
•	etkinlik_id: int (FK = “Sinif_Duyurusu” - sinif_duyuruId)
•	duyuru_tipi: int (FK = “Sinif_Duyurusu” – duyuru_tipi)
•	sinif_id: int (FK = “Sinif” – sinif_id)
•	sube_id: int (FK = “Sinif” – sube_id)
•	etkinlik_no: int
•	PK(etkinlik_id, duyuru_tipi, sinif_id, sube_id, etkinlik_no)
•	etkinlik_tarihi: Date
