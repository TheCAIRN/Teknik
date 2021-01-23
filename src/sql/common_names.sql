-- Structure and data taken from zen-cart
-- Licensed under GNU Public License.
-- Contributed by Stephanie Tea

CREATE TABLE names (
  name_id int(11) NOT NULL auto_increment,
  name varchar(64) NOT NULL default '',
  country_origin_country_3 char(3) NOT NULL default '',
  name_meaning varchar (255) NOT NULL default '', 
  PRIMARY KEY  (name_id)
) ENGINE=InnoDb;

--  is there any way to reference multiple countries 
-- do we need to add a gender field or character field (asian names have multiple meanings)
INSERT INTO names VALUES (1,'Ai','CHN', 'love, affection');
INSERT INTO names VALUES (2,'Alexander','USA', '');
INSERT INTO names VALUES (3,'Amelia','AUS', '');
INSERT INTO names VALUES (1,'An','CHN', 'peace, quiet');
INSERT INTO names VALUES (1,'An Na','CHN', 'peace, quiet, graceful');
INSERT INTO names VALUES (1,'Anna','FRA', '');
INSERT INTO names VALUES (1,'Asahi','JPN', 'morning sunshine');
INSERT INTO names VALUES (2,'Ava','AUS', '');
INSERT INTO names VALUES (1,'Bao','CHN', 'precious treasure');
INSERT INTO names VALUES (1,'Ben','DEU', '');
INSERT INTO names VALUES (1,'Bowen','CHN', 'abundant, rich, literate');
INSERT INTO names VALUES (3,'Charlie','AUS', '');
INSERT INTO names VALUES (4,'Charlotte','AUS', '');
INSERT INTO names VALUES (5,'Chloe','AUS', '');
INSERT INTO names VALUES (1,'Clara','DEU', '');
INSERT INTO names VALUES (1,'Elias','DEU', '');
INSERT INTO names VALUES (1,'Ella','DEU', '');
INSERT INTO names VALUES (1,'Ellie','SWE', '');
INSERT INTO names VALUES (1,'Elliot','FRA', '');
INSERT INTO names VALUES (1,'Elyna','FRA', '');
INSERT INTO names VALUES (1,'Eléa','FRA', '');
INSERT INTO names VALUES (1,'Éleana','SWE', '');
INSERT INTO names VALUES (1,'Emilia','GBR', '');
INSERT INTO names VALUES (1,'Emily','USA', '');
INSERT INTO names VALUES (1,'Emma','DEU', '');
INSERT INTO names VALUES (1,'Felix','DEU', '');
INSERT INTO names VALUES (1,'Finn','DEU', '');
INSERT INTO names VALUES (1,'Freya','SWE', '');
INSERT INTO names VALUES (1,'Gabriel','FRA', '');
INSERT INTO names VALUES (1,'Grace','AUS', '');
INSERT INTO names VALUES (1,'Hailey','SWE', '');
INSERT INTO names VALUES (1,'Hannah','DEU', '');
INSERT INTO names VALUES (1,'Harper','AUS', '');
INSERT INTO names VALUES (1,'Henry','AUS', '');
INSERT INTO names VALUES (1,'Hinata','JPN', 'sunshine, spring, bright');
INSERT INTO names VALUES (1,'Hiroto','JPN', 'big-scale future');
INSERT INTO names VALUES (1,'Hua','CHN', 'flower, blossom');
INSERT INTO names VALUES (1,'Huang','CHN', 'phoenix');
INSERT INTO names VALUES (1,'Hui','CHN', 'intelligent, wise');
INSERT INTO names VALUES (1,'Ines','SWE', '');
INSERT INTO names VALUES (1,'Isaac','USA', '');
INSERT INTO names VALUES (1,'Isabella','USA', '');
INSERT INTO names VALUES (1,'Isla','AUS', '');
INSERT INTO names VALUES (1,'Jack','AUS', '');
INSERT INTO names VALUES (1,'James','AUS', '');
INSERT INTO names VALUES (1,'Julia','FRA', '');
INSERT INTO names VALUES (1,'János','SWE', '');
INSERT INTO names VALUES (1,'Kylian','USA', '');
INSERT INTO names VALUES (1,'Lan','CHN', 'orchid, elegant or mountain mist');
INSERT INTO names VALUES (1,'Lea','DEU', '');
INSERT INTO names VALUES (1,'Leo','AUS', '');
INSERT INTO names VALUES (1,'Leon','DEU', '');
INSERT INTO names VALUES (1,'Levi','SWE', '');
INSERT INTO names VALUES (1,'Liam','FRA', '');
INSERT INTO names VALUES (1,'Lily','FRA', '');
INSERT INTO names VALUES (1,'Lina','DEU', '');
INSERT INTO names VALUES (1,'Louis','ESP', '');
INSERT INTO names VALUES (1,'Louise','FRA', '');
INSERT INTO names VALUES (1,'Lucas','AUS', '');
INSERT INTO names VALUES (1,'Lui','DEU', '');
INSERT INTO names VALUES (1,'Luna','SWE', '');
INSERT INTO names VALUES (1,'Lya','FRA', '');
INSERT INTO names VALUES (1,'Mael','FRA', '');
INSERT INTO names VALUES (1,'Matteo','DEU', '');
INSERT INTO names VALUES (1,'Matthis','ESP', '');
INSERT INTO names VALUES (1,'Mia','AUS', '');
INSERT INTO names VALUES (1,'Mila','DEU', '');
INSERT INTO names VALUES (1,'Minato','JPN', 'port, harbor, ocean');
INSERT INTO names VALUES (1,'Mio','JPN', 'water route, river, ocean');
INSERT INTO names VALUES (1,'Naël','ESP', '');
INSERT INTO names VALUES (1,'Noah','AUS', '');
INSERT INTO names VALUES (1,'Noemi','FRA', '');
INSERT INTO names VALUES (1,'Noélie','SWE', '');
INSERT INTO names VALUES (1,'Oliver','AUS', '');
INSERT INTO names VALUES (1,'Oliva','AUS', '');
INSERT INTO names VALUES (1,'Paul','DEU', '');
INSERT INTO names VALUES (1,'Raphael','FRA', '');
INSERT INTO names VALUES (1,'Ren','JPN', 'lotus');
INSERT INTO names VALUES (1,'Rin','JPN', 'cool, digified');
INSERT INTO names VALUES (1,'Samuel','FRA');
INSERT INTO names VALUES (1,'Shufen','CHN', 'good fragrance');
INSERT INTO names VALUES (1,'Shuhui','CHN', 'good intelligence');
INSERT INTO names VALUES (1,'Sofia','DEU', '');
INSERT INTO names VALUES (1,'Sophie','USA', '');
INSERT INTO names VALUES (1,'Tatsuki','JPN', 'tree');
INSERT INTO names VALUES (1,'Theo','FRA', '');
INSERT INTO names VALUES (1,'Thomas','AUS', '');
INSERT INTO names VALUES (1,'Tsumugi','JPN', 'soft thin woven cloth');
INSERT INTO names VALUES (1,'Uta','JPN', 'poetry');
INSERT INTO names VALUES (1,'William','AUS', '');
INSERT INTO names VALUES (1,'Willow','AUS', '');
INSERT INTO names VALUES (1,'Xiulan','CHN', 'beautiful orchid');
INSERT INTO names VALUES (1,'Yamato','JPN', 'great harmony');
INSERT INTO names VALUES (1,'Yu','CHN', 'pleasant, delightful, jade or precious stone');
INSERT INTO names VALUES (1,'Yua','JPN', 'to tie up love');
INSERT INTO names VALUES (1,'Yui','JPN', 'to tie or bind up clothes');
INSERT INTO names VALUES (1,'Yuzuki','JPN', 'tender moon');
