<?php
  $sql = "SELECT de.ders_adi, du.duyuru_basligi, du.duyuru_icerigi, du.duyuru_tarihi
              FROM Ogrenci AS og, Ders AS de, Duyuru AS du, Sinif_Ders_Programi AS sd
              WHERE og.ogrenci_id = $current_ogrenciId AND sd.sinif_id = du.sinif_id AND sd.sube_id = du.sube_id
              AND og.sinif_id = du.sinif_id AND og.sube_id = du.sube_id
              AND sd.ders_id = du.ders_id AND sd.ders_id = de.ders_id AND du.ilgili = 0 AND du.duyuru_tipi = ";
?>
