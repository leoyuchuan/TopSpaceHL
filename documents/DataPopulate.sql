/*
	Data Population For Web Programming Language
	Target: MySQL
*/

/*
	Table : USER
*/
INSERT INTO `USER`(`username`,`password`,`email`,`first_name`,`last_name`,`gender`,`address`,`phone`) VALUES ('leoyuchuan','leoyuchuan','leoyuchuan@gmail.com','Yuchuan','Liu','Male',NULL,NULL);
INSERT INTO `USER`(`username`,`password`,`email`,`first_name`,`last_name`,`gender`,`address`,`phone`) VALUES ('helionitial','helionitial','helionitial@me.com','Li','He','Male',NULL,NULL);

/*
	Table : TEAM
 */
INSERT INTO `TEAM`(`team_id`,`team`) VALUES (1,'Dallas Mavericks');
INSERT INTO `TEAM`(`team_id`,`team`) VALUES (2,'Los Angeles Lakers');
INSERT INTO `TEAM`(`team_id`,`team`) VALUES (3,'Boston Celtics');
INSERT INTO `TEAM`(`team_id`,`team`) VALUES (4,'Sacramento Kings');
INSERT INTO `TEAM`(`team_id`,`team`) VALUES (5,'Chicago Bulls');

/*
	Table : NEWS
 */
INSERT INTO `NEWS`(`news_id`,`title`,`content`,`date`) VALUES (1, 'Knicks-Mavericks Preview', 'With their offense misfiring since a six-game win streak, the Dallas Mavericks are on the verge of losing three straight for only the second time in 21 months.\nThe Mavericks, however, may not need to kick things into high gear Wednesday night against the New York Knicks, who have found virtually no success on the road this season and may be without an ailing Carmelo Anthony.\nDuring its recent winning streak, Dallas (10-5) - which leads the NBA with an average of 109.3 points - scored 118.6 per game, though that number was significantly bumped by three contests ending with point totals of 123, 131 and 140.\nDallas, which beat Philadelphia by 53 and the Los Angeles Lakers by 34 in that span, then ran into a wall Saturday at Houston in a 95-92 loss. The difference came from 3-point range, where the teams shot a combined 21 for 81 with 15 of those 3s made by the Rockets.\nAfter being held below 100 points for only the third time this season, the Mavs returned to that plateau Monday at home against Indiana but managed only one field goal over the final 7:17 to walk away with a 111-100 loss.\n"You cannot always try to outscore the other team every single night," said center Tyson Chandler, the NBA Defensive Player of the Year in 2011-12. "Some nights, you are going to rely on your defense."','2014-11-25 14:11:00');
INSERT INTO `NEWS`("news_id","title","content","date") VALUES (2,'Bucks-Mavericks Preview','Monta Ellis has been on quite a roll for the Dallas Mavericks, including when he handed his former team a crushing defeat just four days ago.\nHe hopes to continue his impressive run as Dallas looks to win a fifth straight meeting with the visiting Milwaukee Bucks on Sunday night.\nEllis has three 30-point games while averaging 28.4 over his last five. He shot 14 of 22 from the field and netted 33 in Friday''s 118-106 loss to Phoenix that ended a four-game winning streak for the Mavericks (15-6).\nHe''s also delivered some clutch moments recently. Ellis hit three free throws to force overtime and made a late 3-pointer in the second OT of Tuesday''s 132-129 win over Chicago, then drained a fadeaway jumper at the buzzer in Wednesday''s 107-105 victory over Milwaukee (11-10).\nEllis, who played part of 2011-12 and all of 2012-13 with the Bucks before signing with Dallas, finished with 23 points in that contest.\nDirk Nowitzki sat out that night to rest his sore back before returning against the Suns, but he shot 2 of 10 from the field and scored a season-low 10 points.\nDallas suffered its first loss when scoring more than 100 points in part because it trailed 40-27 after one quarter.\n"When you start out giving up a 40-point first quarter, you''re just not ready to play defensively. I take responsibility for the effort," coach Rick Carlisle said. "I have got to get these guys more ready to play than I did."\nTyson Chandler recorded his fifth double-double in six games - including an 18-point, 20-rebound effort against the Bucks - with 15 points and 18 boards, but he was disappointed with the defensive performance. Dallas ranks near the bottom of the league in points allowed at 102.5 per game, including 110.0 over its last seven.\n"We''ve got to do a better job at it," Chandler said. "We''ve got to look at the tape and figure it out, but it''s been pretty consistent. So, it''s a problem that we''ve got to fix."\nMilwaukee shot 52.1 percent in Wednesday''s meeting before hitting a season-high 56.5 percent in Friday''s 109-85 win over Miami to snap a three-game losing streak.\nBrandon Knight, who scored 25 against the Mavericks, had 13 in only 20-plus minutes due to foul trouble, but Kendall Marshall came off the bench in his place and scored a career-high 20.\n"When Knight gets in trouble, Kendall steps right in and helps us find a way to win," coach Jason Kidd said.\nMilwaukee''s bench outscored Miami''s 60-18, as Khris Middleton (14 points) and Jerryd Bayless (12) also turned in solid efforts. Starters Giannis Antetokounmpo and Jabari Parker finished with 14 points apiece.\n"We have to find a way to do that for 48 minutes consistently," Marshall said. "That''s what the great teams do in this league and that''s what we''re striving to be."\nThe Bucks are allowing an average of 98.7 points, but they''ve held four of their last seven opponents under 90. They rank near the top of the league in turnovers forced per game at 16.8, just behind Dallas'' average of 18.0.\n"It really starts on the defensive end," Marshall said. "We were able to get stops and get out in transition. That makes the offense a lot easier."\nMilwaukee hasn''t beaten Dallas since Ellis scored a game-high 22 for the Bucks in a 95-90 victory Feb. 26, 2013.','2014-12-07 19:30:00');

/*
	Table : ROASTER
 */
/*
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (1,'Chandler','Parsons','Male',NULL,NULL,NULL,NULL,NULL,1);
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (2,'Raymond','Felton','Male',NULL,NULL,NULL,NULL,NULL,1);
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (3,'Kobe','Bryant','Male',NULL,NULL,NULL,NULL,NULL,2);
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (4,'Jeremy','Lin','Male',NULL,NULL,NULL,NULL,NULL,2);
*/
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (1,'Al-Farouq','Aminu',220,'Wake Forest',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (2,'J.J.','Barea',183,'Northeastern',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (3,'Tyson','Chandler',245,'None',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (4,'Jae','Crowder',228,'Marquette',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (5,'Monta','Ellis',185,'None',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (6,'Raymond','Felton',205,'North Carolina',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (7,'Devin','Harris',185,'Wisconsin',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (8,'Richard','Jefferson',230,'Arizona',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (9,'Ricky','Ledo',200,'Providence',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (10,'Jameer','Nelson',200,'St. Joseph''s',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (11,'Dirk','Nowitzki',245,'None',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (12,'Chandler','Parsons',230,'Florida',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (13,'Greg','Smith',260,'Fresno State',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (14,'Charlie','Villanueva',238,'Connecticut',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (15,'Al-Farouq','Aminu',240,'North Carolina',1);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (16,'Carlos','Boozer',258,'Duke',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (17,'Kobe','Bryant',212,'None',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (18,'Jordan','Clarkson',185,'Missouri',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (19,'Ed','Davis',240,'North Carolina',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (20,'Wayne','Ellington',200,'North Carolina',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (21,'Xavier','Henry',220,'Kansas',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (22,'Jordan','Hill',235,'Arizona',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (23,'Wesley','Johnson',215,'Syracuse',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (24,'Ryan','Kelly',230,'Duke',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (25,'Jeremy','Lin',200,'Harvard',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (26,'Steve','Nash',180,'Santa Clara',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (27,'Ronnie','Price',190,'Utah Valley University',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (28,'Julius','Randle',250,'Kentucky',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (29,'Robert','Sacre',270,'Gonzaga',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (30,'Nick','Young',210,'USC',2);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (31,'Brandon','Bass',250,'LSU',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (32,'Avery','Bradley',195,'Texas',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (33,'Vitor','Faverani',260,'None',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (34,'Jeff','Green',235,'Georgetown',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (35,'Kelly','Olynyk',238,'Gonzaga',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (36,'Dwight','Powell',240,'Stanford',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (37,'Phil','Pressey',175,'Missouri',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (38,'Rajon','Rondo',186,'Kentucky',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (39,'Marcus','Smart',220,'Oklahoma State',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (40,'Jared','Sullinger',260,'Ohio State',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (41,'Marcus','Thornton',205,'LSU',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (42,'Evan','Turner',205,'Ohio State',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (43,'Gerald','Wallace',220,'Alabama',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (44,'James','Young',215,'Kentucky',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (45,'Tyler','Zeller',250,'North Carolina',3);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (46,'Omri','Casspi',225,'None',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (47,'Darren','Collison',175,'UCLA',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (48,'DeMarcus','Cousins',270,'Kentucky',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (49,'Reggie','Evans',245,'Iowa',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (50,'Rudy','Gay',230,'Connecticut',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (51,'Ryan','Hollins',240,'UCLA',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (52,'Carl','Landry',248,'Purdue',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (53,'Ray','McCallum',190,'Detroit',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (54,'Ben','McLemore',195,'Kansas',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (55,'Eric','Moreland',218,'Oregon State',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (56,'Ramon','Sessions',190,'Nevada',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (57,'Nik','Stauskas',205,'Michigan',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (58,'Jason','Thompson',250,'Rider',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (59,'Derrick','Williams',240,'Arizona',4);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (60,'Cameron','Bairstow',250,'New Mexico',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (61,'Aaron','Brooks',161,'Oregon',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (62,'Jimmy','Butler',220,'Marquette',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (63,'Mike','Dunleavy',230,'Duke',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (64,'Pau','Gasol',250,'None',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (65,'Taj','Gibson',225,'USC',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (66,'Kirk','Hinrich',190,'Kansas',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (67,'Doug','McDermott',225,'Creighton',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (68,'Nikola','Mirotic',220,'None',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (69,'Nazr','Mohammed',250,'Kentucky',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (70,'E''Twaun','Moore',191,'Purdue',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (71,'Joakim','Noah',232,'Florida',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (72,'Derrick','Rose',190,'Memphis',5);
INSERT INTO `ROASTER`(player_id,first_name,last_name,weight,college,team_id) VALUES (73,'Tony','Snell',200,'New Mexico',5);

/*
	Table: GAME
 */
INSERT INTO `GAME`(`game_id`,`team1_id`,`team2_id`,`team1_score`,`team2_score`,`date`,`time`,`location`) VALUES (1,1,2,140,106,'2014-11-21','20:30:00','American Airlines Center');

/*
	Table : COMMENT
 */
INSERT INTO `COMMENT`(`news_id`,`comment_id`,`content`,`date`,`username`)VALUES (1,1,'LOL','2014-11-25 14:25:00','leoyuchuan');
INSERT INTO `COMMENT`(`news_id`,`comment_id`,`content`,`date`,`username`)VALUES (1,2,'Oops','2014-11-25 14:30:00','helionitial');

/*
	Table : SUBSCRIBE
 */
INSERT INTO `SUBSCRIBE`(`username`,`team_id`) VALUES ('leoyuchuan',1);
INSERT INTO `SUBSCRIBE`(`username`,`team_id`) VALUES ('helionitial',2);

/*
	Table : TEAM_IN_NEWS
 */
INSERT INTO `TEAM_IN_NEWS` (`news_id`,`team_id`) VALUES (1, 1);
INSERT INTO `TEAM_IN_NEWS` (`news_id`,`team_id`) VALUES (1, 2);

/*
	Table : PLAYER_IN_NEWS
 */
INSERT INTO `PLAYER_IN_NEWS` (`news_id`,`player_id`) VALUES (1,1);
INSERT INTO `PLAYER_IN_NEWS` (`news_id`,`player_id`) VALUES (1,2);
INSERT INTO `PLAYER_IN_NEWS` (`news_id`,`player_id`) VALUES (1,3);