--createdb Projet_DelobelleDurot

DROP VIEW IF EXISTS etatSalle;
DROP VIEW IF EXISTS contenu;
DROP VIEW IF EXISTS listeSalle;
DROP TABLE IF EXISTS lot;
DROP TABLE IF EXISTS palette;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS salle;


CREATE TABLE salle(numero VARCHAR PRIMARY KEY, capacite INT, temp FLOAT);
CREATE TABLE palette(code VARCHAR PRIMARY KEY, lieu VARCHAR REFERENCES salle);
CREATE TABLE produit(code VARCHAR PRIMARY KEY, libelle VARCHAR, temp_min FLOAT, temp_max FLOAT);
CREATE TABLE lot(produit VARCHAR REFERENCES produit, support VARCHAR REFERENCES palette, quantite INT NOT NULL, PRIMARY KEY(produit,support));


INSERT INTO salle (numero, capacite,temp) VALUES ('A10',4,7),('B08',2,10),('C42',5,20);
INSERT INTO produit (code, libelle, temp_min, temp_max) VALUES  ('AE58FA','Eclair au chocolat',4,8),
								('CF2FE8','Croissant',8,16),
								('G2HISP','Baguette',6,12), 
								('QSD487','Pain au chocolat',5,14);
INSERT INTO palette VALUES 	('BB08','A10'),
				('1705','A10'),
				('ESX3','B08'),
				('NATE','B08'),
				('DSCD',NULL);
INSERT INTO lot VALUES('AE58FA','BB08',30),
			('G2HISP','NATE',50),
			('G2HISP','1705',80),
			('CF2FE8','NATE',30),
			('CF2FE8','1705',40),
			('QSD487','DSCD',30);

CREATE OR REPLACE VIEW listeSalle AS(SELECT * from salle ORDER BY temp ASC, capacite DESC);


CREATE OR REPLACE VIEW contenu AS(
SELECT salle.numero, salle.temp AS TempSalle,salle.capacite, palette.code AS palette, produit.code AS produit, produit.temp_min, produit.temp_max, lot.quantite, 
CAST(CASE WHEN (produit.temp_min <= salle.temp AND produit.temp_max >= salle.temp) THEN TRUE ELSE FALSE END AS BOOLEAN) etat
FROM salle, produit, palette, lot 
WHERE lot.support = palette.code 
AND palette.lieu = salle.numero 
AND produit.code = lot.produit)
ORDER BY salle.numero;


CREATE OR REPLACE VIEW etatSalle AS(
SELECT DISTINCT salle.numero, salle.temp AS TempSalle, salle.capacite, 
CAST(CASE WHEN salle.capacite IN(SELECT COUNT(DISTINCT p1.code) FROM salle as s1, palette as p1  WHERE s1.numero=p1.lieu GROUP BY s1.numero) THEN TRUE ELSE FALSE END AS BOOLEAN)pleine
FROM salle , palette
WHERE palette.lieu = salle.numero)
ORDER by salle.numero;


