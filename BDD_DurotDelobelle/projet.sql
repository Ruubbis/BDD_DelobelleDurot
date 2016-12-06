--createdb Projet_DelobelleDurot

DROP TABLE IF EXISTS salle CASCADE;
DROP TABLE IF EXISTS palette CASCADE;
DROP TABLE IF EXISTS produit CASCADE;
DROP TABLE IF EXISTS stock;

CREATE TABLE salle(numero VARCHAR PRIMARY KEY, capacite INT, temp FLOAT);
CREATE TABLE palette(code VARCHAR PRIMARY KEY, lieu VARCHAR REFERENCES salle);
CREATE TABLE produit(code VARCHAR PRIMARY KEY, libelle VARCHAR, temp_min FLOAT, temp_max FLOAT);
CREATE TABLE stock(produit VARCHAR REFERENCES produit, support VARCHAR REFERENCES palette, quantite INT NOT NULL, PRIMARY KEY(produit,support));


INSERT INTO salle (numero, capacite,temp) VALUES ('A10',3,7),('B08',2,10),('C42',5,20);
INSERT INTO produit (code, libelle, temp_min, temp_max) VALUES  ('AE58FA','Eclair au chocolat',4,8),
								('CF2FE8','Croissant',8,16),
								('G2HISP','Baguette',6,12), 
								('QSD487','Chocolatine',5,14);
INSERT INTO palette VALUES 	('BB08','A10'),
				('1705','A10'),
				('ESX3','B08'),
				('NATE','B08'),
				('DSCD', NULL);
INSERT INTO stock VALUES('AE58FA','BB08',30),
			('G2HISP','NATE',50),
			('G2HISP','1705',80),
			('CF2FE8','NATE',30),
			('CF2FE8','1705',40);


CREATE OR REPLACE VIEW listeSalle AS(SELECT * from salle ORDER BY temp ASC, capacite DESC);


CREATE OR REPLACE VIEW contenu AS(
SELECT salle.numero, salle.temp AS TempSalle, palette.code AS palette, produit.code AS produit, produit.temp_min, produit.temp_max, stock.quantite 
FROM salle, produit, palette, stock 
WHERE stock.support = palette.code 
AND palette.lieu = salle.numero 
AND produit.code = stock.produit)
ORDER BY salle.numero;

SELECT * from contenu WHERE numero = 'A10';
-- numero | tempsalle | palette | produit | temp_min | temp_max | quantite 
----------+-----------+---------+---------+----------+----------+----------
-- A10    |         7 | BB08    | AE58FA  |        4 |        8 |       30
-- A10    |         7 | 1705    | G2HISP  |        6 |       12 |       80
-- A10    |         7 | 1705    | CF2FE8  |        8 |       16 |       40


