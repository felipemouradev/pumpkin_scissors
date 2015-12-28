-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'usuarios'
-- 
-- ---

DROP TABLE IF EXISTS `usuarios`;
    
CREATE TABLE `usuarios` (
  `PK_usuario` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  `login` VARCHAR(50) NULL DEFAULT NULL,
  `senha` VARCHAR(300) NULL DEFAULT NULL,
  `email` VARCHAR(200) NULL DEFAULT NULL,
  `flAtivo` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`PK_usuario`)
);

-- ---
-- Table 'permissoes'
-- 
-- ---

DROP TABLE IF EXISTS `permissoes`;
    
CREATE TABLE `permissoes` (
  `PK_permissao` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `controller` VARCHAR(100) NULL DEFAULT NULL,
  `action` VARCHAR(100) NULL DEFAULT NULL,
  `descricao` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`PK_permissao`)
);

-- ---
-- Table 'grupos'
-- 
-- ---

DROP TABLE IF EXISTS `grupos`;
    
CREATE TABLE `grupos` (
  `PK_grupo` VARCHAR NULL AUTO_INCREMENT DEFAULT NULL,
  `nome_grupo` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`PK_grupo`)
);

-- ---
-- Table 'permissao_grupos'
-- 
-- ---

DROP TABLE IF EXISTS `permissao_grupos`;
    
CREATE TABLE `permissao_grupos` (
  `PK_permissao_grupo` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `FK_grupo` INTEGER NULL DEFAULT NULL,
  `FK_permissao` INTEGER NULL DEFAULT NULL,
  `flPermissao` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`PK_permissao_grupo`)
);

-- ---
-- Table 'usuario_grupos'
-- 
-- ---

DROP TABLE IF EXISTS `usuario_grupos`;
    
CREATE TABLE `usuario_grupos` (
  `PK_usuario_grupo` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `PK_usuario` INTEGER NULL DEFAULT NULL,
  `PK_grupo` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`PK_usuario_grupo`)
);

-- ---
-- Table 'fornecedores'
-- 
-- ---

DROP TABLE IF EXISTS `fornecedores`;
    
CREATE TABLE `fornecedores` (
  `PK_fornecedor` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `nome` INTEGER NULL DEFAULT NULL,
  `cnpj` VARCHAR(300) NULL DEFAULT NULL,
  `telefone` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`PK_fornecedor`)
);

-- ---
-- Table 'produtos'
-- 
-- ---

DROP TABLE IF EXISTS `produtos`;
    
CREATE TABLE `produtos` (
  `PK_produto` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `FK_fornecedor` INTEGER NULL DEFAULT NULL,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `codigo` VARCHAR(100) NULL DEFAULT NULL,
  `descricao` MEDIUMTEXT NULL DEFAULT NULL,
  `valor_custo` DOUBLE NULL DEFAULT NULL,
  `valor_final` DOUBLE NULL DEFAULT NULL,
  `quantidade` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`PK_produto`)
);

-- ---
-- Table 'vendas'
-- 
-- ---

DROP TABLE IF EXISTS `vendas`;
    
CREATE TABLE `vendas` (
  `PK_venda` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `FK_usuario` INTEGER NULL DEFAULT NULL,
  `FK_cliente` INTEGER NULL DEFAULT NULL,
  `tipo_pagamento` INTEGER NULL DEFAULT NULL COMMENT '1=>A vista, 2=> Parcelado',
  `flPaga` INTEGER NULL DEFAULT 0,
  PRIMARY KEY (`PK_venda`)
);

-- ---
-- Table 'venda_comodite'
-- 
-- ---

DROP TABLE IF EXISTS `venda_comodite`;
    
CREATE TABLE `venda_comodite` (
  `PK_venda_comodite` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `FK_venda` INTEGER NULL DEFAULT NULL,
  `FK_chave` INTEGER NULL DEFAULT NULL COMMENT 'Pode ser FK_produto  ou FK_servico',
  `quantidade` INTEGER NULL DEFAULT NULL,
  `flComodite` INTEGER NULL DEFAULT 1 COMMENT '1=>Produto, 2=>Servico',
  PRIMARY KEY (`PK_venda_comodite`)
);

-- ---
-- Table 'clientes'
-- 
-- ---

DROP TABLE IF EXISTS `clientes`;
    
CREATE TABLE `clientes` (
  `PK_cliente` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `nome` INTEGER NULL DEFAULT NULL,
  `cpf` INTEGER NULL DEFAULT NULL,
  `telefone` INTEGER NULL DEFAULT NULL,
  `email` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`PK_cliente`)
);

-- ---
-- Table 'pagar_contas'
-- 
-- ---

DROP TABLE IF EXISTS `pagar_contas`;
    
CREATE TABLE `pagar_contas` (
  `PK_pagar_conta` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `codigo_nota` VARCHAR(2083) NULL DEFAULT NULL,
  `vencimento` DATETIME NULL DEFAULT NULL,
  `valor` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`PK_pagar_conta`)
);

-- ---
-- Table 'servicos'
-- 
-- ---

DROP TABLE IF EXISTS `servicos`;
    
CREATE TABLE `servicos` (
  `PK_servico` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `nome` INTEGER NULL DEFAULT NULL,
  `valor` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`PK_servico`)
);

-- ---
-- Table 'venda_parcelamentos'
-- 
-- ---

DROP TABLE IF EXISTS `venda_parcelamentos`;
    
CREATE TABLE `venda_parcelamentos` (
  `PK_venda_parcelamentos` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `FK_venda` INTEGER NULL DEFAULT NULL,
  `num_parcela` INTEGER NULL DEFAULT NULL,
  `valor_parcela` DOUBLE NULL DEFAULT NULL,
  `flPaga` INTEGER NULL DEFAULT 0,
  PRIMARY KEY (`PK_venda_parcelamentos`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `permissao_grupos` ADD FOREIGN KEY (FK_grupo) REFERENCES `grupos` (`PK_grupo`);
ALTER TABLE `permissao_grupos` ADD FOREIGN KEY (FK_permissao) REFERENCES `permissoes` (`PK_permissao`);
ALTER TABLE `usuario_grupos` ADD FOREIGN KEY (PK_usuario) REFERENCES `usuarios` (`PK_usuario`);
ALTER TABLE `usuario_grupos` ADD FOREIGN KEY (PK_grupo) REFERENCES `grupos` (`PK_grupo`);
ALTER TABLE `produtos` ADD FOREIGN KEY (FK_fornecedor) REFERENCES `fornecedores` (`PK_fornecedor`);
ALTER TABLE `vendas` ADD FOREIGN KEY (FK_usuario) REFERENCES `usuarios` (`PK_usuario`);
ALTER TABLE `vendas` ADD FOREIGN KEY (FK_cliente) REFERENCES `clientes` (`PK_cliente`);
ALTER TABLE `venda_comodite` ADD FOREIGN KEY (FK_venda) REFERENCES `vendas` (`PK_venda`);
ALTER TABLE `venda_parcelamentos` ADD FOREIGN KEY (FK_venda) REFERENCES `vendas` (`PK_venda`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `usuarios` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `permissoes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `grupos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `permissao_grupos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `usuario_grupos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `fornecedores` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `produtos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `vendas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `venda_comodite` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `clientes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pagar_contas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `servicos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `venda_parcelamentos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `usuarios` (`PK_usuario`,`nome`,`login`,`senha`,`email`,`flAtivo`) VALUES
-- ('','','','','','');
-- INSERT INTO `permissoes` (`PK_permissao`,`controller`,`action`,`descricao`) VALUES
-- ('','','','');
-- INSERT INTO `grupos` (`PK_grupo`,`nome_grupo`) VALUES
-- ('','');
-- INSERT INTO `permissao_grupos` (`PK_permissao_grupo`,`FK_grupo`,`FK_permissao`,`flPermissao`) VALUES
-- ('','','','');
-- INSERT INTO `usuario_grupos` (`PK_usuario_grupo`,`PK_usuario`,`PK_grupo`) VALUES
-- ('','','');
-- INSERT INTO `fornecedores` (`PK_fornecedor`,`nome`,`cnpj`,`telefone`,`email`) VALUES
-- ('','','','','');
-- INSERT INTO `produtos` (`PK_produto`,`FK_fornecedor`,`nome`,`codigo`,`descricao`,`valor_custo`,`valor_final`,`quantidade`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `vendas` (`PK_venda`,`FK_usuario`,`FK_cliente`,`tipo_pagamento`,`flPaga`) VALUES
-- ('','','','','');
-- INSERT INTO `venda_comodite` (`PK_venda_comodite`,`FK_venda`,`FK_chave`,`quantidade`,`flComodite`) VALUES
-- ('','','','','');
-- INSERT INTO `clientes` (`PK_cliente`,`nome`,`cpf`,`telefone`,`email`) VALUES
-- ('','','','','');
-- INSERT INTO `pagar_contas` (`PK_pagar_conta`,`codigo_nota`,`vencimento`,`valor`) VALUES
-- ('','','','');
-- INSERT INTO `servicos` (`PK_servico`,`nome`,`valor`) VALUES
-- ('','','');
-- INSERT INTO `venda_parcelamentos` (`PK_venda_parcelamentos`,`FK_venda`,`num_parcela`,`valor_parcela`,`flPaga`) VALUES
-- ('','','','','');