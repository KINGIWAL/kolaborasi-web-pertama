CREATE TABLE `barang_jualan` (
    `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `Nama Penjual` varchar(50) DEFAULT NULL,
    `Barang_Jualan` varchar(255) DEFAULT NULL,
    `Jumlah_Barang` int DEFAULT NULL,
    `Alamat_penjual` varchar(255) DEFAULT NULL,
    `Harga_barang` int DEFAULT NULL,
    `Gambar_barang` varchar(255) NOT NULL,
    `Keterangan_barang` varchar(255) DEFAULT NULL,
    `Jumlah_terjual` int NOT NULL,
    `Rating_barang` int NOT NULL,
    `Kategori` varchar(55) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 21 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci