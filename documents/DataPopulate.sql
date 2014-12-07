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
INSERT INTO `TEAM`(`team_id`,`name`) VALUES (1,'Dallas Mavericks');
INSERT INTO `TEAM`(`team_id`,`name`) VALUES (2,'LA Lakers');

/*
	Table : NEWS
 */
INSERT INTO `NEWS`(`news_id`,`title`,`content`,`date`) VALUES (1, 'Knicks-Mavericks Preview', 'With their offense misfiring since a six-game win streak, the Dallas Mavericks are on the verge of losing three straight for only the second time in 21 months.\nThe Mavericks, however, may not need to kick things into high gear Wednesday night against the New York Knicks, who have found virtually no success on the road this season and may be without an ailing Carmelo Anthony.\nDuring its recent winning streak, Dallas (10-5) - which leads the NBA with an average of 109.3 points - scored 118.6 per game, though that number was significantly bumped by three contests ending with point totals of 123, 131 and 140.\nDallas, which beat Philadelphia by 53 and the Los Angeles Lakers by 34 in that span, then ran into a wall Saturday at Houston in a 95-92 loss. The difference came from 3-point range, where the teams shot a combined 21 for 81 with 15 of those 3s made by the Rockets.\nAfter being held below 100 points for only the third time this season, the Mavs returned to that plateau Monday at home against Indiana but managed only one field goal over the final 7:17 to walk away with a 111-100 loss.\n"You cannot always try to outscore the other team every single night," said center Tyson Chandler, the NBA Defensive Player of the Year in 2011-12. "Some nights, you are going to rely on your defense."','2014-11-25 14:11:00');

/*
	Table : ROASTER
 */
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (1,'Chandler','Parsons','Male',NULL,NULL,NULL,NULL,NULL,1);
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (2,'Raymond','Felton','Male',NULL,NULL,NULL,NULL,NULL,1);
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (3,'Kobe','Bryant','Male',NULL,NULL,NULL,NULL,NULL,2);
INSERT INTO `ROASTER`(`player_id`,`first_name`,`last_name`,`gender`,`weight`,`height`,`born_date`,`born_place`,`college`,`team_id`) VALUES (4,'Jeremy','Lin','Male',NULL,NULL,NULL,NULL,NULL,2);

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