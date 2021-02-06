-- Structure and data taken from zen-cart
-- Licensed under GNU Public License.
-- Contributed by Stephanie Tea

CREATE TABLE names (
  name_id int(11) NOT NULL auto_increment,
  name varchar(64) NOT NULL default '',
  language varchar (64) NOT NULL default '',
  name_meaning varchar (255) NOT NULL default '', 
  alternate_spelling varchar (100) NOT NULL default '',
  PRIMARY KEY  (name_id)
) ENGINE=InnoDb;

--  is there any way to reference multiple countries 
-- do we need to add a gender field or character field (asian names have multiple meanings
-- reference alternate spelling with their corresponding meaning in database
-- should we include associated meanings of names for languages like Greek, Hebrew, etc
-- double check for every sql insert, there's a corresponding row in the excel sheet

INSERT INTO names VALUES (1, 'Aarav', 'Sanskrit', 'melodious music', 'आरव्)');
INSERT INTO names VALUES (2, 'Aaryan', 'Sanskrit', 'honorable, high-born', 'आर्यन');
INSERT INTO names VALUES (4, 'Abhinav', 'Sanskrit', 'young, new, fresh, modern', 'अभिनव');
INSERT INTO names VALUES (5, 'Adam', 'Hebrew', 'ground, earth, soil', 'אֲדָמָה');
INSERT INTO names VALUES (6, 'Adele', 'German', 'noble kind or type', '');
INSERT INTO names VALUES (7, 'Adrian', 'Latin', 'from Hadria', '');
INSERT INTO names VALUES (8, 'Ai', 'Chinese', 'love, affection', '爱');
INSERT INTO names VALUES (9, 'Aidan', 'Irish', 'little fire, intelligent', '');
INSERT INTO names VALUES (10, 'Aino', 'Finnish', 'the only one', '');
INSERT INTO names VALUES (11, 'Alejandro', 'Spanish', 'defender of mankind', '');
INSERT INTO names VALUES (12, 'Alexander','Greek', 'defending men', 'Ἀλέξανδρος');
INSERT INTO names VALUES (13, 'Alexandra', 'Greek', '', '');
INSERT INTO names VALUES (14, 'Ali', 'Arabic', 'lofty, sublime', 'عليّ');

INSERT INTO names VALUES (15, 'Alisa', 'Russian', 'noble', 'Алиса');
INSERT INTO names VALUES (16, 'Aikaterini', 'Greek', 'pure', 'Αικατερίνη');
INSERT INTO names VALUES (17, 'Alonso', 'Spanish', '', '');
INSERT INTO names VALUES (18, 'Amanda', 'Latin', 'worthy to be loved', '');
INSERT INTO names VALUES (19, 'Amelia', 'Latin', 'work', '');
INSERT INTO names VALUES (20, 'Amina', 'Arabic', 'truthful', 'अमीना');
INSERT INTO names VALUES (21, 'An', 'Chinese', 'peace, quiet', '安');
INSERT INTO names VALUES (22, 'An Na', 'Chinese', 'peace, quiet, graceful', '安納');
INSERT INTO names VALUES (23, 'Ananya', 'Sanskrit', 'unique', 'अनन्य');
INSERT INTO names VALUES (24, 'Anastasiya', 'Russian', 'resurrection', 'Анастасия');
INSERT INTO names VALUES (25, 'Andreea', 'Romanian', 'courageous and strong', '');
INSERT INTO names VALUES (26, 'Andrei', 'Romanian', 'strong, manly, brave', '');
INSERT INTO names VALUES (27, 'Andriy', 'Ukrainian', 'manly, strong, warrior', 'Андрій');
INSERT INTO names VALUES (28, 'Angeliki', 'Greek', 'angel-like', 'Αγγελική');
INSERT INTO names VALUES (29, 'Anika', 'Sanskrit', 'graceful, brilliant', 'अनिका');
INSERT INTO names VALUES (30, 'Anna', 'Latin', '', '');
INSERT INTO names VALUES (31, 'Antonella', 'Italian', 'worthy of praise', '');
INSERT INTO names VALUES (32, 'Antonia', 'Latin', 'priceless, praiseworthy', '');
INSERT INTO names VALUES (33, 'Aofie', 'Irish', 'beauty', '');
INSERT INTO names VALUES (34, 'Aradhya', 'Sanskrit', 'to be worshipped', 'अराध्या');
INSERT INTO names VALUES (35, 'Ariel', 'Hebrew', 'lion of God', 'אֲרִיאֵל');
INSERT INTO names VALUES (36, 'Arnav', 'Sanskrit', 'ocean, sea', '');
INSERT INTO names VALUES (37, 'Arthur', 'Irish', 'noble strength, a bear', '');
INSERT INTO names VALUES (38, 'Asahi', 'Japanese', 'morning sunshine', '朝陽');
INSERT INTO names VALUES (39, 'Ashanti', 'Akan', 'strong African woman', '');
INSERT INTO names VALUES (40, 'Asher', 'Hebrew', 'happy, blessed', 'אָשֵׁר');
INSERT INTO names VALUES (41, 'Athanasios', 'Greek', 'immortal', 'Αθανάσιος');
INSERT INTO names VALUES (42, 'Ava', 'Hebrew', 'life', 'חַוָּה');
INSERT INTO names VALUES (43, 'Avigail', 'Hebrew', 'father''s joy', 'אֲבִיגַיִל');
INSERT INTO names VALUES (44, 'Ayala', 'Hebrew', 'doe', 'אַיֶלֶת');
INSERT INTO names VALUES (45, 'Ayana', 'Swahili', 'beautiful flower, wildflower', '');
INSERT INTO names VALUES (46, 'Azibo', 'Egyptian', 'earth', '');

INSERT INTO names VALUES (47, 'Bảo', 'Vietnamese', 'treasure, jewel', '寶');
INSERT INTO names VALUES (48, 'Bao', 'Chinese', 'precious treasure', '宝');
INSERT INTO names VALUES (49, 'Ben', 'Hebrew', 'son of', 'בֶּן');
INSERT INTO names VALUES (50, 'Bernardo', 'Portuguese', 'strong as a bear', '');
INSERT INTO names VALUES (51, 'Binh', 'Vietnamese', 'level, even, peaceful', '平');
INSERT INTO names VALUES (52, 'Bohdan', 'Ukrainian', 'gift of God', 'Богдан');
INSERT INTO names VALUES (53, 'Bowen', 'Chinese', 'abundant, rich, literate', '博文');
INSERT INTO names VALUES (54, 'Bram', 'Irish', 'raven', '');
INSERT INTO names VALUES (56, 'Brandon', 'English', 'broom covered hill', '');
INSERT INTO names VALUES (57, 'Bruno', 'German', 'brown', '');
INSERT INTO names VALUES (58, 'Cam', 'English', '', '');
INSERT INTO names VALUES (59, 'Cam', 'Vietnamese', 'orange fruit', '柑');
INSERT INTO names VALUES (60, 'Canh', 'Vietnamese', 'scenery, view, landscape', '景');
INSERT INTO names VALUES (61, 'Charlie','English', '', '');
INSERT INTO names VALUES (62, 'Charlotte','French', '', '');
INSERT INTO names VALUES (63, 'Chau', 'Vietnamese', 'pearl, gem', '珠');
INSERT INTO names VALUES (64, 'Chi', 'Vietnamese', 'branch', '枝');
INSERT INTO names VALUES (65, 'Chloe','Greek', 'green shoot, blooming', 'Χλόη');
INSERT INTO names VALUES (66, 'Christos', 'Greek', 'annointed', 'Χρήστος');
INSERT INTO names VALUES (67, 'Clara','Latin', 'clear, bright, famous', '');
INSERT INTO names VALUES (68, 'Conor', 'Irish', 'strong willed, hound lover', '');
INSERT INTO names VALUES (69, 'Cora', 'Greek', 'maiden', 'Κόρη');
INSERT INTO names VALUES (70, 'Cristian', 'Spanish', '', '');

INSERT INTO names VALUES (71, 'Daan', 'Dutch', 'God is my judge', '');
INSERT INTO names VALUES (72, 'Daisy', 'English', '', '');
INSERT INTO names VALUES (73, 'Dakari', 'Egyptian', 'happy', '');
INSERT INTO names VALUES (74, 'Daniil', 'Russian', 'God is my judge', 'Данііл');
INSERT INTO names VALUES (75, 'Danylo', 'Ukrainian', 'God is my judge', 'Данило');
INSERT INTO names VALUES (76, 'Daria', 'Persian', 'wealthy, great', '');
INSERT INTO names VALUES (77, 'Darius', 'Persian', 'possessor of good', '');
INSERT INTO names VALUES (78, 'Davi', 'Portuguese', '', '');
INSERT INTO names VALUES (79, 'David', 'Hebrew', 'beloved, loved by God', 'דָּוִיד');
INSERT INTO names VALUES (80, 'Devansh', 'Sanskrit', 'part of god', 'देवांश');
INSERT INTO names VALUES (81, 'Dhruv', 'Sanskrit', 'northern star, constant', 'ध्रुव');
INSERT INTO names VALUES (82, 'Diego', 'Spanish', 'supplanter', '');
INSERT INTO names VALUES (83, 'Dimitra', 'Greek', 'follower of Demeter', 'Δήμητρα');
INSERT INTO names VALUES (84, 'Dimitrios', 'Greek', 'follower of Demeter', 'Δημήτριος');
INSERT INTO names VALUES (85, 'Drew', 'English', '', '');

INSERT INTO names VALUES (86, 'Eléa', 'French', '', '');
INSERT INTO names VALUES (87, 'Eleana', 'Greek', 'daughter of the sun', 'Ælĭānus');
INSERT INTO names VALUES (88, 'Eleni', 'Greek', '', '');
INSERT INTO names VALUES (89, 'Elias', 'Greek', 'my God is the Lord', 'Ηλίας');
INSERT INTO names VALUES (90, 'Ella', 'French', 'other, foreign', '');
INSERT INTO names VALUES (91, 'Ellie', 'English', 'light', '');
INSERT INTO names VALUES (92, 'Elliot', 'French', 'my God is Yahweh', '');
INSERT INTO names VALUES (93, 'Elyna', 'French', '', '');
INSERT INTO names VALUES (94, 'Emeka', 'Igbo', 'great deeds', '');
INSERT INTO names VALUES (95, 'Emil', 'Latin', 'rival, of the Aemilus family', '');
INSERT INTO names VALUES (96, 'Emilia', 'Latin', 'rival, of the Aemilus family', '');
INSERT INTO names VALUES (97, 'Emily', 'Latin', 'rival, of the Aemilus family', '');
INSERT INTO names VALUES (98, 'Emma', 'German', 'universal, whole', '');
INSERT INTO names VALUES (99, 'Ethan', 'Hebrew', 'enduring, solid, firm', 'אֵיתָן');
INSERT INTO names VALUES (100, 'Everly', 'English', '', '');
INSERT INTO names VALUES (101, 'Fatima', 'Arabic', 'chaste, motherly', ' فَاطِمَة');

INSERT INTO names VALUES (102, 'Felix', 'Latin', 'lucky, successful', '');
INSERT INTO names VALUES (103, 'Finn', 'German', 'from Finland', '');
INSERT INTO names VALUES (104, 'Fletcher', 'English', 'arrow maker', '');
INSERT INTO names VALUES (105, 'Florencia', 'Spanish', '', '');
INSERT INTO names VALUES (106, 'Frederik', 'Danish', 'peaceful ruler', '');
INSERT INTO names VALUES (107, 'Freja', 'Danish', 'lady, mistress', '');
INSERT INTO names VALUES (108, 'Furaha', 'Swahili', 'delight', '');
INSERT INTO names VALUES (109, 'Gabriel', 'Hebrew', 'God''s bravest man', ' גַּבְרִיאֵל');
INSERT INTO names VALUES (110, 'Gabriela', 'Italian', 'God is my strength', '');
INSERT INTO names VALUES (111, 'Georgia', 'Greek', 'farmer', 'Γεωργία');
INSERT INTO names VALUES (112, 'Georgios', 'Greek', 'farmer', 'Γεώργιος');
INSERT INTO names VALUES (113, 'Giovanna', 'Italian', 'God is gracious', '');
INSERT INTO names VALUES (114, 'Grace', 'Latin', 'grace', '');
INSERT INTO names VALUES (115, 'Greyson', 'English', 'son of the grey haired one', '');

INSERT INTO names VALUES (116, 'Hailey', 'English', 'hay meadow', '');
INSERT INTO names VALUES (117, 'Hanna', 'Ukranian', '', 'Ганна');
INSERT INTO names VALUES (118, 'Hannah', 'Hebrew', 'favor, grace', 'חַנָּה');
INSERT INTO names VALUES (119, 'Harini', 'Sanskrit', 'deer like', 'हरीनी');
INSERT INTO names VALUES (120, 'Harper', 'English', 'harp player', '');
INSERT INTO names VALUES (121, 'Harrison', 'English', 'son of Harry', '');
INSERT INTO names VALUES (122, 'Heitor', 'Portuguese', '', '');
INSERT INTO names VALUES (123, 'Helmi', 'Finnish', 'pearl', '');
INSERT INTO names VALUES (124, 'Henry', 'German', 'home ruler', '');
INSERT INTO names VALUES (125, 'Hinata', 'Japanese', 'sunny place', '日向');
INSERT INTO names VALUES (126, 'Hiroto', 'Japanese', 'big flight', '大翔');
INSERT INTO names VALUES (127, 'Hua', 'Chinese', 'flower, blossom', '花');
INSERT INTO names VALUES (128, 'Huang', 'Chinese', 'phoenix', '凰');
INSERT INTO names VALUES (129, 'Hui', 'Chinese', 'intelligent, wise', '慧');
INSERT INTO names VALUES (130, 'Hüseyn', 'Arabic', 'father of many', 'إبراهيم');

INSERT INTO names VALUES (131, 'Ian', 'Scottish Gaelic', 'God is gracious', '');
INSERT INTO names VALUES (132, 'Ibrahim', 'Arabic', 'father of many', 'إبراهيم');

INSERT INTO names VALUES (133, 'Ida', 'German', 'work, labor', '');
INSERT INTO names VALUES (134, 'Ife', 'Yoruba', 'love', '');

INSERT INTO names VALUES (135, 'Ilmari', 'Finish', 'air, space, weather', '');
INSERT INTO names VALUES (136, 'Imani', 'Swahili', 'faith', '');
INSERT INTO names VALUES (137, 'Imene', 'Arabic', 'dream, faith', 'إيمان')
;
INSERT INTO names VALUES (138, 'Immanuel', 'Hebrew', 'God is with us', 'עִמָּנוּאֵל');
INSERT INTO names VALUES (139, 'Ines', 'Italian', 'sacred, chaste, pure', '');
INSERT INTO names VALUES (140, 'Iniko', 'Efik', 'born during troubled times', '');
INSERT INTO names VALUES (141, 'Ioana', 'Romanian', 'God is gracious', '');
INSERT INTO names VALUES (142, 'Ionut', 'Romanian', 'God is gracious', '');
INSERT INTO names VALUES (143, 'Isaac', 'Hebrew', 'he will laugh', 'יִצְחָק');
INSERT INTO names VALUES (144, 'Isabella', 'Spanish', 'pledged to God', '');
INSERT INTO names VALUES (145, 'Isadora', 'Greek', 'gift of Isis', 'Ἰσίδωρος');
INSERT INTO names VALUES (146, 'Isak', 'Swedish', 'he will laugh', '');
INSERT INTO names VALUES (147, 'Ishan', 'Sanskrit', 'wealthy', '');
INSERT INTO names VALUES (148, 'Isla', 'Gaelic', 'island', '');
INSERT INTO names VALUES (149, 'Issa', 'Swahili', 'salvation, protection', '');
INSERT INTO names VALUES (150, 'Itai', 'Hebrew', 'with me', 'איתי');

INSERT INTO names VALUES (151, 'Jack', 'English', 'son of Jack', '');
INSERT INTO names VALUES (152, 'Jade', 'Spanish', 'jade', '');
INSERT INTO names VALUES (153, 'James', 'Hebrew', 'supplanter', 'יעקב');
INSERT INTO names VALUES (154, 'János', 'Hungarian', '', '');
INSERT INTO names VALUES (155, 'Jayden', 'English', '', '');
INSERT INTO names VALUES (156, 'Jesse', 'Hebrew', 'God''s gift', 'יִשַׁי');
INSERT INTO names VALUES (157, 'Johannes', 'Greek', 'God is gracious', 'Ἰωάννης');
INSERT INTO names VALUES (158, 'Josefa', 'Portuguese', 'God shall add', '');
INSERT INTO names VALUES (159, 'Juhani', 'Finnish', 'God is gracious', '');
INSERT INTO names VALUES (160, 'Julia','Latin', 'youth', '');
INSERT INTO names VALUES (161, 'Kaito','Japanese', 'ocean, Ursa Major', '海斗');

INSERT INTO names VALUES (162, 'Karima', 'Arabic', '', 'كريمة');

INSERT INTO names VALUES (163, 'Karla', 'German', 'free man, strong', '');
INSERT INTO names VALUES (164, 'Kostantina', 'Greek', 'steadfast', '');
INSERT INTO names VALUES (165, 'Konstantinos', 'Greek', 'steadfast', '');

INSERT INTO names VALUES (166, 'Laine', 'Estonian', 'wave', '');
INSERT INTO names VALUES (167, 'Lan', 'Chinese', 'orchid, elegant', '兰');
INSERT INTO names VALUES (168, 'Lan', 'Chinese', 'mountain mist', '岚');
INSERT INTO names VALUES (169, 'Landon', 'GBR', 'long hill', '');
INSERT INTO names VALUES (170, 'Lea', 'Hebrew', 'weary', 'לֵאָה');
INSERT INTO names VALUES (171, 'Leo', 'Latin', 'lion', '');
INSERT INTO names VALUES (172, 'Leon', 'Greek', 'lion', 'Λέων');
INSERT INTO names VALUES (173, 'Levi', 'Hebrew', 'attached', 'לֵוִי');
INSERT INTO names VALUES (174, 'Liam', 'Irish', 'determined, protector', '');
INSERT INTO names VALUES (175, 'Lily', 'English', 'lily', '');
INSERT INTO names VALUES (176, 'Lina', 'Arabic', 'palm tree', 'लीना');
INSERT INTO names VALUES (177, 'Linnea', 'Swedish', 'lime tree', '');
INSERT INTO names VALUES (178, 'Lishan', 'Amharic', 'award', 'ሊሻን');
INSERT INTO names VALUES (179, 'Logan', 'Scottish Gaelic', 'little hollow', '');
INSERT INTO names VALUES (180, 'Louis', 'French', 'famous warrior', '');
INSERT INTO names VALUES (181, 'Louise', 'French', 'famous warrior', '');
INSERT INTO names VALUES (182, 'Lucas', 'Latin', 'from Luciana', '');
INSERT INTO names VALUES (183, 'Luiza', 'Polish', 'famous warrior', '');
INSERT INTO names VALUES (184, 'Lulit', 'Amharic', 'pearl', 'ሉሊት');
INSERT INTO names VALUES (185, 'Lumusi', 'Ewe', 'born face down', '');
INSERT INTO names VALUES (186, 'Luna', 'Latin', 'the moon', '');
INSERT INTO names VALUES (187, 'Lungile', 'Zulu', 'correct, right, good', '');
INSERT INTO names VALUES (188, 'Lutfi', 'Arabic', 'gentle', 'لطفيّ');

INSERT INTO names VALUES (189, 'Luuk', 'Dutch', 'from Luciana', '');
INSERT INTO names VALUES (190, 'Lydia', 'Greek', 'from Lydia', 'Λυδία');

INSERT INTO names VALUES (191, 'Mael','Welsh', 'prince', '');
INSERT INTO names VALUES (192, 'Mahammad', 'Azerbaijani', '', '');
INSERT INTO names VALUES (193, 'Maite', 'Spanish', 'beloved harvester', '');
INSERT INTO names VALUES (194, 'Makena', 'Kikuyu', 'happy one', '');
INSERT INTO names VALUES (195, 'Maksym', 'Polish', '', 'Максим');
INSERT INTO names VALUES (196, 'Malak', 'Arabic', 'angel', 'ملك');

INSERT INTO names VALUES (197, 'Manuela', 'Spanish', 'God is with us', '');
INSERT INTO names VALUES (198, 'Maria Fernanda', 'Spanish', '', '');
INSERT INTO names VALUES (199, 'Maria Jose', 'Spanish', '', '');
INSERT INTO names VALUES (200, 'Marie', 'French', 'of the sea, bitter', '');
INSERT INTO names VALUES (201, 'Mariya', 'Russian', 'beloved', 'Мария');
INSERT INTO names VALUES (202, 'Martin', 'Latin', 'of Mars, warlike', '');
INSERT INTO names VALUES (203, 'Martina', 'Latin', 'of Mars, warlike', '');
INSERT INTO names VALUES (204, 'Maryam', 'Arabic', 'sea, flower, bitter', 'مريم');

INSERT INTO names VALUES (205, 'Matias', 'Finnish', 'gift of God', '');
INSERT INTO names VALUES (206, 'Matilda', 'German', 'mighty in battle', '');
INSERT INTO names VALUES (207, 'Matteo','Italian', 'gift of God', '');
INSERT INTO names VALUES (208, 'Matviy', 'Ukranian', 'bitter', 'Матвій');
INSERT INTO names VALUES (209, 'Mavuto', 'Chewa', 'troubles, problems', '');
INSERT INTO names VALUES (210, 'Maya', 'Hebrew', 'water', 'מַיָּה');
INSERT INTO names VALUES (211, 'Melissa', 'Greek', 'bee', 'Μέλισσα');
INSERT INTO names VALUES (212, 'Meriem', 'Turkish', '', '');
INSERT INTO names VALUES (213, 'Mia','Italian', 'mine, bitter', '');
INSERT INTO names VALUES (214, 'Miguel', 'Spanish', 'who is like God', '');
INSERT INTO names VALUES (215, 'Mikael', 'Swedish', 'who is like God', '');
INSERT INTO names VALUES (216, 'Mila','Slavic languages', 'dear one', '');
INSERT INTO names VALUES (217, 'Minato','Japanese', 'port, harbor, ocean', '湊');
INSERT INTO names VALUES (218, 'Minenhle', 'Zulu', 'beautiful day', '');
INSERT INTO names VALUES (219, 'Minori','Japanese', 'abundant', '穣');
INSERT INTO names VALUES (220, 'Mirembi', 'Ganda', 'peace', '');
INSERT INTO names VALUES (221, 'Mitsuki', 'Japanese', 'beautiful moon', '美月');
INSERT INTO names VALUES (222, 'Moshe', 'Hebrew', 'drawn from the water', 'מֹשֶׁה');
INSERT INTO names VALUES (223, 'Murad', 'Arabic', 'wish, desire', 'مراد');

INSERT INTO names VALUES (224, 'Mykhailo', 'Ukranian', '', 'Михайло');
INSERT INTO names VALUES (225, 'Mykyta', 'Ukranian', '', 'Микита');

INSERT INTO names VALUES (227, 'Natalia', 'Latin', 'born on Christmas day', '');
INSERT INTO names VALUES (228, 'Nathaniel', 'Hebrew', 'given of God', 'נְתַנְאֵל');
INSERT INTO names VALUES (229, 'Navya', 'Sanskrit', 'to be praised', 'नव्या');
INSERT INTO names VALUES (230, 'Neo', 'Tswana', 'gift', '');
INSERT INTO names VALUES (231, 'Nicolas', 'Spanish', 'victorious people', '');
INSERT INTO names VALUES (232, 'Nikita', 'Ukranian', 'unconquerable', 'Нікіта');
INSERT INTO names VALUES (233, 'Nikolaos', 'Greek', 'victorious people', 'Νικόλαος');
INSERT INTO names VALUES (234, 'Nilay', 'Sanskrit', 'house', 'निलय');
INSERT INTO names VALUES (235, 'Noa', 'Hebrew', 'motion, movement', 'נוֹעָה');
INSERT INTO names VALUES (236, 'Noah', 'Hebrew', 'rest, repose', 'נֹחַ');
INSERT INTO names VALUES (237, 'Noam', 'Hebrew', 'pleasantness', 'נוֹעַם');
INSERT INTO names VALUES (238, 'Noélie', 'French', 'born at Christmas', '');
INSERT INTO names VALUES (239, 'Noemi', 'Italian', 'pleasant, delightful', '');
INSERT INTO names VALUES (240, 'Nuray', 'Turkish', 'bright moon', '');

INSERT INTO names VALUES (241, 'Olavi', 'Finnish', 'heir', '');
INSERT INTO names VALUES (242, 'Oleksandr', 'Ukranian', 'defender of mankind', 'Олександр');
INSERT INTO names VALUES (243, 'Oliver', 'Latin', 'olive tree', '');
INSERT INTO names VALUES (244, 'Oliva', 'Latin', 'olive tree', '');
INSERT INTO names VALUES (245, 'Omar', 'Arabic', 'flourishing', 'عمر');

INSERT INTO names VALUES (246, 'Onni', 'Finnish', 'happiness, luck', '');
INSERT INTO names VALUES (247, 'Ori', 'Hebrew', 'my light', 'אוֹרִי');
INSERT INTO names VALUES (248, 'Opal', 'English', 'gem, precious stone', '');
INSERT INTO names VALUES (249, 'Oscar', 'Celtic languages', 'deer lover', '');
INSERT INTO names VALUES (250, 'Owen', 'English', 'well born, of noble birth', '');

INSERT INTO names VALUES (251, 'Panagiotis', 'Greek', 'all holy', 'Παναγιώτης');
INSERT INTO names VALUES (252, 'Paraskevi', 'Greek', 'preparation', 'Παρασκευή');
INSERT INTO names VALUES (253, 'Paul','Latin', 'small, humble', '');
INSERT INTO names VALUES (254, 'Pedro', 'Portuguese', 'rock, stone', '');
INSERT INTO names VALUES (255, 'Phoenix', 'Greek', 'dark red', 'φοῖν');
INSERT INTO names VALUES (256, 'Polina', 'Russian', 'destroyer', 'Полина');
INSERT INTO names VALUES (257, 'Pranav', 'Sanskrit', 'sacred', 'प्रणव');
INSERT INTO names VALUES (258, 'Quinn', 'Irish', 'fifth', '');
INSERT INTO names VALUES (259, 'Raphael', 'Hebrew', 'God heals', 'רְפָאֵל');
INSERT INTO names VALUES (260, 'Raul', 'Italian', 'wise wolf', '');
INSERT INTO names VALUES (261, 'Ren', 'Japanese', 'lotus, water lily', '蓮');
INSERT INTO names VALUES (262, 'Ridhi', 'Sanskrit', 'prosperity, success', 'रिधि');
INSERT INTO names VALUES (263, 'Rin', 'Japanese', 'cool, digified', '凛');
INSERT INTO names VALUES (264, 'Rosa', 'Spanish', 'rose', '');
INSERT INTO names VALUES (265, 'Rukiya', 'Swahili', 'rising up', '');
INSERT INTO names VALUES (266, 'Ryan', 'Irish', 'little king', '');

INSERT INTO names VALUES (267, 'Samuel','Hebrew', 'God has heard', 'שְׁמוּאֵל');
INSERT INTO names VALUES (268, 'Sanvi', 'Sanskrit', 'knowledge', 'सन्वी');
INSERT INTO names VALUES (269, 'Sem', 'Dutch', 'name, renown', '');
INSERT INTO names VALUES (270, 'Shaurya', 'Sanskirt', 'power', 'शौर्य');
INSERT INTO names VALUES (271, 'Shira', 'Hebrew', 'singing', 'שִׁירָה');
INSERT INTO names VALUES (272, 'Shreya', 'Sanskrit', 'superior, best', '');
INSERT INTO names VALUES (273, 'Shufen','Chinese', 'good fragrance', '淑芬');
INSERT INTO names VALUES (274, 'Shuhui','Chinese', 'good intelligence', '淑惠');
INSERT INTO names VALUES (275, 'Silvia', 'Latin', 'from the woods', '');
INSERT INTO names VALUES (276, 'Sofia','Greek', 'wisdom', 'Σοφία');
INSERT INTO names VALUES (277, 'Sofiya', 'Ukrainian', 'wisdom', 'Софія');
INSERT INTO names VALUES (278, 'Sophie','French', 'wisdom', '');
INSERT INTO names VALUES (279, 'Stefan', 'Romanian', 'crown, garland', '');

INSERT INTO names VALUES (280, 'Talia', 'Hebrew', 'dew from heaven', 'טַלְיָא');
INSERT INTO names VALUES (281, 'Tatiana', 'Russian', 'fairy princess', 'Татьяна');
INSERT INTO names VALUES (282, 'Tatsuki', 'Japanese', 'tree', '樹');
INSERT INTO names VALUES (283, 'Tejas', 'Sanskrit', 'effulgent, radiant splendor', '');
INSERT INTO names VALUES (284, 'Tess', 'English', 'harvester, reaper', '');
INSERT INTO names VALUES (285, 'Theo', 'English', 'God''s gift', '');
INSERT INTO names VALUES (286, 'Thomas', 'Greek', 'twin', '');
INSERT INTO names VALUES (287, 'Tobias', 'Greek', 'God is good', '');
INSERT INTO names VALUES (288, 'Tomas', 'Swedish', 'twin', '');
INSERT INTO names VALUES (289, 'Trisha', 'English', 'noble', '');
INSERT INTO names VALUES (290, 'Tsumugi', 'Japanese', 'soft thin woven cloth', '紬');
INSERT INTO names VALUES (291, 'Tumaini', 'Swahili', 'hope', '');

INSERT INTO names VALUES (292, 'Ughur', 'Azerbaijani', '', '');
INSERT INTO names VALUES (293, 'Uta', 'Japanese', 'song', '唄');
INSERT INTO names VALUES (294, 'Valentina', 'Latin', 'strong', '');
INSERT INTO names VALUES (295, 'Vasileios', 'Greek', 'royal, kingly', 'Βασίλειος');
INSERT INTO names VALUES (296, 'Vasiliki', 'Greek', 'king, queen', 'Βασιλική');
INSERT INTO names VALUES (297, 'Veronika', 'Latin', 'victory bringer', '');
INSERT INTO names VALUES (298, 'Vicente', 'Spanish', 'to conquer, victory', '');
INSERT INTO names VALUES (299, 'Victor', 'Latin', 'to conquer, victory', '');
INSERT INTO names VALUES (300, 'Viktoriya', 'Ukrainian', 'to conquer, victory', 'Вікторія');
INSERT INTO names VALUES (301, 'Viljami', 'Finnish', 'determined protector', '');
INSERT INTO names VALUES (302, 'William', 'German', 'determined protector', '');
INSERT INTO names VALUES (303, 'Willow', 'English', 'willow tree', '');

INSERT INTO names VALUES (304, 'Xavier', 'Basque', 'new house', '');
INSERT INTO names VALUES (305, 'Ximena', 'Spanish', 'listening intently', '');
INSERT INTO names VALUES (306, 'Xiulan', 'Chinese', 'beautiful orchid', '秀兰');
INSERT INTO names VALUES (307, 'Yael', 'Hebrew', 'mountain goat', 'יָעֵל');
INSERT INTO names VALUES (308, 'Yamato', 'Japanese', 'great harmony', '大和');
INSERT INTO names VALUES (309, 'Yasemine', 'Arabic', 'jasmine flower', 'ياسمين');

INSERT INTO names VALUES (310, 'Yewubdar', 'Amharic', 'beautiful beyond limits', 'የውብዳር');
INSERT INTO names VALUES (311, 'Yonatan', 'Hebrew', 'God has given', 'יוֹנָתָן');
INSERT INTO names VALUES (312, 'Yosef', 'Hebrew', 'God shall add', 'יוֹסֵף');
INSERT INTO names VALUES (313, 'Yu', 'Chinese', 'pleasant, delightful', '愉');
INSERT INTO names VALUES (314, 'Yu', 'Chinese', 'jade, precious stone, gem', '玉 ');
INSERT INTO names VALUES (315, 'Yu', 'Chinese', 'rain', '雨');
INSERT INTO names VALUES (316, 'Yua', 'Chinese', 'to tie up love', '結愛');
INSERT INTO names VALUES (317, 'Yui', 'Chinese', 'to tie or bind up clothes', '結衣');
INSERT INTO names VALUES (318, 'Yuzuki', 'Japanese', 'tender moon', '結月');
INSERT INTO names VALUES (319, 'Zahra', 'Arabic', 'shining, flower', 'زهراء');
INSERT INTO names VALUES (320, 'Zeynab', 'Persian', 'fragrant flower', 'زینب');

INSERT INTO names VALUES (321, 'Zoey', 'English', 'life', '');

INSERT INTO names VALUES (322, 'Aaliyah', 'Arabic', 'high exalted one', 'عالية')
;
INSERT INTO names VALUES (323, 'Abeba', 'Amharic', 'flower', 'አበባ');
INSERT INTO names VALUES (324, 'Abena', 'Akan', 'born on Tuesday', '');
INSERT INTO names VALUES (325, 'Aberash', 'Amharic', 'giving off light, shining', 'አበራሽ');
INSERT INTO names VALUES (326, 'Adebayo', 'Yoruba', 'crown meets joy', '');
INSERT INTO names VALUES (327, 'Aisha', 'Arabic', 'alive', 'عائشة');

INSERT INTO names VALUES (328, 'Ananna', 'Igbo', 'father''s daughter', '');
INSERT INTO names VALUES (329, 'Asha', 'Swahili', 'life', '');
INSERT INTO names VALUES (330, 'Berko', 'Akan', 'first born', '');
INSERT INTO names VALUES (331, 'Chi', 'Igbo', 'god, spiritual being', '');
INSERT INTO names VALUES (332, 'Chiamaka', 'Igbo', 'God is beautiful', '');
INSERT INTO names VALUES (333, 'Chidike', 'Igbo', 'God is strong', '');
INSERT INTO names VALUES (334, 'Chike', 'Igbo', 'God''s power', '');
INSERT INTO names VALUES (335, 'Chipo', 'Shona', 'gift', '');
INSERT INTO names VALUES (336, 'Dakarai', 'Shona', 'happiness', '');
INSERT INTO names VALUES (337, 'Dumisani', 'Zulu', 'give praise', '');
INSERT INTO names VALUES (338, 'Esi', 'Akan', 'bornon Sunday', '');
INSERT INTO names VALUES (339, 'Halima', 'Arabic', 'gentle', 'حليمة');

INSERT INTO names VALUES (340, 'Ife', 'Yoruba', 'love', '');
INSERT INTO names VALUES (341, 'Imani', 'Arabic', 'faith', 'إيمان');

INSERT INTO names VALUES (342, 'Jabir', 'Arabic', 'comforter', 'جابر');

INSERT INTO names VALUES (343, 'Jamila', 'Swahili', 'beautiful', '');
INSERT INTO names VALUES (344, 'Kalifa', 'Somali', 'chaste, holy', '');
INSERT INTO names VALUES (345, 'Kamau', 'Kikuyu', 'quiet warrior', '');
INSERT INTO names VALUES (346, 'Khadija', 'Arabic', 'premature child', 'خديجة')
;
INSERT INTO names VALUES (347, 'Kofi', 'Akan', 'born on Friday', '');
INSERT INTO names VALUES (348, 'Kojo', 'Akan', 'born on Monday', '');
INSERT INTO names VALUES (349, 'Kwame', 'Akan', 'born on Saturday', '');
INSERT INTO names VALUES (350, 'Lateefa', 'Arabic', 'gentle', 'لطيفة');

INSERT INTO names VALUES (351, 'Lesedi', 'Tswana', 'light', '');
INSERT INTO names VALUES (352, 'Lulu', 'Arabic', 'pearls', 'لؤلؤ');

INSERT INTO names VALUES (353, 'Maha', 'Arabic', 'ornx', 'مها');

INSERT INTO names VALUES (354, 'Malika', 'Arabic', 'queen', 'ملكة');

INSERT INTO names VALUES (355, 'Mosi', 'Swahili', 'born first', '');
INSERT INTO names VALUES (356, 'Nala', 'Swahili', 'gift', '');
INSERT INTO names VALUES (357, 'Nia', 'Swahili', 'purpose', '');
INSERT INTO names VALUES (358, 'Obi', 'Igbo', 'heart', '');
INSERT INTO names VALUES (359, 'Olufemi', 'Yoruba', 'beloved by God', '');
INSERT INTO names VALUES (360, 'Olujimi', 'Yoruba', 'given by God', '');
INSERT INTO names VALUES (361, 'Rashid', 'Arabic', 'rightly guided', 'راشد');

INSERT INTO names VALUES (362, 'Salih', 'Arabic', 'virtuous', 'صالح');

INSERT INTO names VALUES (363, 'Salim', 'Arabic', 'safe, secure, at peace', 'سالم');

INSERT INTO names VALUES (364, 'Sefu', 'Swahili', 'sword', '');
INSERT INTO names VALUES (365, 'Taj', 'Arabic', 'crown', 'تاج');

INSERT INTO names VALUES (366, 'Taliba', 'Arabic', 'seeker of knowledge', 'طالب');

INSERT INTO names VALUES (367, 'Titilayo', 'Yoruba', 'eternal happiness', '');
INSERT INTO names VALUES (368, 'Wasswa', 'Ganda', 'first of twins', '');
INSERT INTO names VALUES (369, 'Yaa', 'Akan', 'born on Thursday', '');
INSERT INTO names VALUES (370, 'Zola', 'Xhosa', 'peaceful', '');
INSERT INTO names VALUES (371, 'Zuri', 'Swahili', 'beautiful', '');

INSERT INTO names VALUES (372, 'Bao', 'Chinese', 'praise, honor', '褒');
INSERT INTO names VALUES (373, 'Bao', 'Chinese', 'bud', '苞');
INSERT INTO names VALUES (374, 'Hua', 'Chinese', 'splendid, illustrious', '华');
INSERT INTO names VALUES (375, 'Huang', 'Chinese', 'bright,shining, luminous', '煌');
INSERT INTO names VALUES (376, 'Hui', 'Chinese', 'brightness', '辉');
INSERT INTO names VALUES (377, 'Hinata', 'Japanese', 'toward the sun', '陽向');
INSERT INTO names VALUES (378, 'Hinata', 'Japanese', 'sunflower', '向日葵');
INSERT INTO names VALUES (379, 'Kaito', 'Japanese', 'ocean, soar', '海翔');
INSERT INTO names VALUES (380, 'Ren', 'Japanese', 'love', '恋');





