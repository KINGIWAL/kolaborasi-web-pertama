CREATE TABLE `pembelian` (
    `id` int NOT NULL AUTO_INCREMENT,
    `Nama` varchar(30) NOT NULL,
    `Barang` varchar(30) NOT NULL,
    `Jumlah` int NOT NULL,
    `Kualitas` enum('Rendah', 'Sedang', 'Tinggi') NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci