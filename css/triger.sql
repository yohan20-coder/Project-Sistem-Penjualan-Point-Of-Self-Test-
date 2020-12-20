DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `db_post`.`jual` AFTER INSERT
    ON `db_post`.`tb_penjualan`
    FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok - new.jumlah;
    END$$

DELIMITER ;