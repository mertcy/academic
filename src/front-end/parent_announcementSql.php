<?php
  $sql = "SELECT du.duyuru_basligi, du.duyuru_icerigi, du.duyuru_tarihi
              FROM Ogrenci AS og, Duyuru AS du
              WHERE og.ogrenci_id = $current_ogrenciId
              AND og.sinif_id = du.sinif_id AND og.sube_id = du.sube_id AND du.duyuru_tipi = ";
?>
