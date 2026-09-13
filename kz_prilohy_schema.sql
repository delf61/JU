-- Tabuľka pre ukladanie metadát o prílohách k záväzkom (Došlým faktúram)
-- Názov tabuľky musí presne zodpovedať modelu KzAttachmentModel ('kz_prilohy')

CREATE TABLE IF NOT EXISTS `kz_prilohy` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kz_b` VARCHAR(10) NOT NULL COMMENT 'Väzba na pole b (číslo dokladu) v tabuľke kz',
  `path` VARCHAR(255) NOT NULL COMMENT 'Názov fyzického súboru na disku vo writable/uploads',
  `original_name` VARCHAR(255) NOT NULL COMMENT 'Pôvodný názov nahratého súboru',
  `created_at` DATETIME DEFAULT NULL COMMENT 'Dátum a čas nahratia prílohy',
  PRIMARY KEY (`id`),
  KEY `idx_kz_b` (`kz_b`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
