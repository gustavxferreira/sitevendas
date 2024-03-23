-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema controlestoque
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controlestoque
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controlestoque` DEFAULT CHARACTER SET utf8 ;
USE `controlestoque` ;

-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_cidade` (
  `cid_codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `cid_descricao` VARCHAR(40) NOT NULL,
  `cid_uf` CHAR(2) NOT NULL,
  PRIMARY KEY (`cid_codigo`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_usuario` (
  `usu_codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` VARCHAR(45) NOT NULL,
  `usu_login` VARCHAR(80) NOT NULL,
  `usu_senha` TEXT NOT NULL,
  `usu_nivel` CHAR(1) NOT NULL,
  PRIMARY KEY (`usu_codigo`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;

INSERT INTO tbl_usuario (usu_nome, usu_login, usu_senha, usu_nivel) VALUES ('admin', 'admin', '$2y$10$D/OTXQMlhUUj4IIFalH5BuK9l2JNVIQSxExzEHhlYQdQ14WnzGnXy', '1');


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_cliente` (
  `cli_codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` VARCHAR(40) NULL DEFAULT NULL,
  `cli_endereco` VARCHAR(75) NULL DEFAULT NULL,
  `cli_numero` VARCHAR(10) NULL DEFAULT NULL,
  `cli_complemento` VARCHAR(20) NULL DEFAULT NULL,
  `cli_bairro` VARCHAR(30) NULL DEFAULT NULL,
  `cli_cep` CHAR(10) NULL DEFAULT NULL,
  `cli_fonecel` VARCHAR(16) NULL DEFAULT NULL,
  `cli_valor_total` VARCHAR(45) NULL DEFAULT NULL,
  `cli_cpf` VARCHAR(14) NULL DEFAULT NULL,
  `cli_rg` VARCHAR(20) NULL DEFAULT NULL,
  `cli_datanasc` DATE NULL DEFAULT NULL,
  `cli_email` VARCHAR(60) NULL DEFAULT NULL,
  `tbl_cidade_cid_codigo` INT(11) NULL DEFAULT NULL,
  `tbl_usuario_usu_codigo` INT(11) NOT NULL,
  PRIMARY KEY (`cli_codigo`),
  INDEX `fk_tbl_cliente_tbl_cidade_idx` (`tbl_cidade_cid_codigo` ASC) ,
  INDEX `fk_tbl_cliente_tbl_usuario1_idx` (`tbl_usuario_usu_codigo` ASC) ,
  CONSTRAINT `fk_tbl_cliente_tbl_cidade`
    FOREIGN KEY (`tbl_cidade_cid_codigo`)
    REFERENCES `controlestoque`.`tbl_cidade` (`cid_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_cliente_tbl_usuario1`
    FOREIGN KEY (`tbl_usuario_usu_codigo`)
    REFERENCES `controlestoque`.`tbl_usuario` (`usu_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_pedido` (
  `ped_codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `ped_data` DATE NOT NULL,
  `ped_hora` TIME NOT NULL,
  `ped_valortotal` DECIMAL(10,2) NOT NULL,
  `ped_valorfrete` DECIMAL(10,2) NOT NULL,
  `ped_status` CHAR(1) NOT NULL,
  `ped_formapagto` CHAR(1) NOT NULL,
  `ped_observacao` TEXT NOT NULL,
  `tbl_cliente_cli_codigo` INT(11) NOT NULL,
  PRIMARY KEY (`ped_codigo`),
  INDEX `fk_tbl_pedido_tbl_cliente1_idx` (`tbl_cliente_cli_codigo` ASC) ,
  CONSTRAINT `fk_tbl_pedido_tbl_cliente1`
    FOREIGN KEY (`tbl_cliente_cli_codigo`)
    REFERENCES `controlestoque`.`tbl_cliente` (`cli_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_categoria` (
  `cat_codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `cat_descricao` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`cat_codigo`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_produto` (
  `prod_codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `prod_descricao` VARCHAR(40) NOT NULL,
  `prod_valor` DECIMAL(10,2) NOT NULL,
  `prod_quantidade` INT(100) NOT NULL,
  `prod_tipo` VARCHAR(5) NOT NULL,
  `prod_obs` TEXT NOT NULL,
  `tbl_categoria_cat_codigo` INT(11) NOT NULL,
  `prod_imagem` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`prod_codigo`),
  INDEX `fk_tbl_produto_tbl_categoria1_idx` (`tbl_categoria_cat_codigo` ASC) ,
  CONSTRAINT `fk_tbl_produto_tbl_categoria1`
    FOREIGN KEY (`tbl_categoria_cat_codigo`)
    REFERENCES `controlestoque`.`tbl_categoria` (`cat_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`produtos_do_pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`produtos_do_pedidos` (
  `idprodped` INT(11) NOT NULL AUTO_INCREMENT,
  `tbl_pedido_ped_codigo` INT(11) NULL DEFAULT NULL,
  `tbl_produto_prod_codigo` INT(11) NULL DEFAULT NULL,
  `itens_quantidade` DECIMAL(5,2) NULL DEFAULT NULL,
  `itens_valor` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idprodped`),
  INDEX `fk_tbl_produto_has_tbl_pedido_tbl_pedido1_idx` (`tbl_pedido_ped_codigo` ASC) ,
  INDEX `fk_tbl_produto_has_tbl_pedido_tbl_produto1_idx` (`tbl_produto_prod_codigo` ASC),
  CONSTRAINT `fk_tbl_produto_has_tbl_pedido_tbl_pedido1`
    FOREIGN KEY (`tbl_pedido_ped_codigo`)
    REFERENCES `controlestoque`.`tbl_pedido` (`ped_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_produto_has_tbl_pedido_tbl_produto1`
    FOREIGN KEY (`tbl_produto_prod_codigo`)
    REFERENCES `controlestoque`.`tbl_produto` (`prod_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_carrinho` (
  `car_id` INT(11) NOT NULL AUTO_INCREMENT,
  `car_sessao` VARCHAR(80) NOT NULL,
  `car_quantidade` INT(1) NULL DEFAULT NULL,
  `car_valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `car_data` DATE NULL DEFAULT NULL,
  `tbl_produto_prod_codigo` INT(11) NOT NULL,
  PRIMARY KEY (`car_id`),
  INDEX `fk_tbl_carrinho_tbl_produto1_idx` (`tbl_produto_prod_codigo` ASC),
  CONSTRAINT `fk_tbl_carrinho_tbl_produto1`
    FOREIGN KEY (`tbl_produto_prod_codigo`)
    REFERENCES `controlestoque`.`tbl_produto` (`prod_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_entrega` (
  `end_codigo` INT(11) NOT NULL,
  `end_endereco` VARCHAR(50) NOT NULL,
  `end_bairro` VARCHAR(45) NOT NULL,
  `end_cep` CHAR(10) NOT NULL,
  `tbl_cidade_cid_codigo` INT(11) NOT NULL,
  PRIMARY KEY (`end_codigo`),
  INDEX `fk_tbl_entrega_tbl_cidade1_idx` (`tbl_cidade_cid_codigo` ASC),
  CONSTRAINT `fk_tbl_entrega_tbl_cidade1`
    FOREIGN KEY (`tbl_cidade_cid_codigo`)
    REFERENCES `controlestoque`.`tbl_cidade` (`cid_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `controlestoque`.`tbl_imagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controlestoque`.`tbl_imagem` (
  `img_cod` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NULL DEFAULT NULL,
  `tbl_produto_prod_codigo` INT(11) NOT NULL,
  `path` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`img_cod`, `tbl_produto_prod_codigo`),
  INDEX `fk_tbl_imagem_tbl_produto1_idx` (`tbl_produto_prod_codigo` ASC),
  CONSTRAINT `fk_tbl_imagem_tbl_produto1`
    FOREIGN KEY (`tbl_produto_prod_codigo`)
    REFERENCES `controlestoque`.`tbl_produto` (`prod_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
