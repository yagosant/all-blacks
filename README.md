# all-blacks

# Crie um novo schema chamado allblocks

CREATE SCHEMA `allblacks` ;
# Crie a tabela torcedores

CREATE TABLE `torcedores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOCUMENTO` varchar(15) DEFAULT NULL,
  `NOME` varchar(60) DEFAULT NULL,
  `DATAHORAINSERT` datetime DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CEP` varchar(20) DEFAULT NULL,
  `ENDERECO` varchar(50) DEFAULT NULL,
  `BAIRRO` varchar(30) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `ATIVO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

