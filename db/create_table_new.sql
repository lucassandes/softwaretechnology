CREATE DATABASE IF NOT EXISTS st;
USE st;

DROP TABLE IF EXISTS mood_vote;
DROP TABLE IF EXISTS suggestion_markers;
DROP TABLE IF EXISTS suggestion;
DROP TABLE IF EXISTS mood;

CREATE TABLE IF NOT EXISTS mood
(
moodId bigint AUTO_INCREMENT,
name varchar(20),
pictureMoodDirectory varchar(40),
primary key	(moodId)
);

CREATE TABLE IF NOT EXISTS suggestion
(
suggestionId bigint AUTO_INCREMENT,
titleSuggestion varchar(500),
linkSuggestion varchar(200),
pictureSuggestionDirectory varchar(40),
reportNumber bigint DEFAULT 0,
primary key	(suggestionId)
);

CREATE TABLE IF NOT EXISTS mood_vote
(
idMood bigint,
voteTime timestamp DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (idMood) REFERENCES mood(moodId)
);

CREATE TABLE IF NOT EXISTS suggestion_markers
(
idSuggestion bigint,
idMood bigint,
FOREIGN KEY (idMood) REFERENCES mood(moodId),
FOREIGN KEY (idSuggestion) REFERENCES suggestion(suggestionId)
);

INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (1,'tense', 'images/content/mood_images/tense.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (2,'nervous', 'images/content/mood_images/nervous.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (3,'stressed', 'images/content/mood_images/stressed.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (4,'upset', 'images/content/mood_images/upset.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (5,'sad', 'images/content/mood_images/sad.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (6,'depressed', 'images/content/mood_images/depressed.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (7,'bored', 'images/content/mood_images/bored.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (8,'fatigued', 'images/content/mood_images/fatigued.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (9,'alert', 'images/content/mood_images/alert.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (10,'excited', 'images/content/mood_images/excited.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (11,'elated', 'images/content/mood_images/elated.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (12,'happy', 'images/content/mood_images/happy.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (13,'contented', 'images/content/mood_images/contented.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (14,'serene', 'images/content/mood_images/serene.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (15,'relaxed', 'images/content/mood_images/relaxed.jpg'); 
INSERT INTO mood (moodId, name, pictureMoodDirectory) VALUES (16,'calm', 'images/content/mood_images/calm.jpg'); 

INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (1, 'Everything will be fine!','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (2, 'Nervous because of an exam? Well, if you feel like you did everything you can, everything will be fine... if not, what are you doing here, go back and learn some more!','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (3, 'You should visit Margit Sziget where you can just sit and relax a bit.','https://www.google.hu/maps/place/Margit-sziget/@47.5268906,19.0309662,14z/data=!3m1!4b1!4m2!3m1!1s0x4741dbfc77cfaad7:0x689f7bae3aa650fd',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (4, 'Deep breathing and counting to 10 should help.','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (5, 'Try talking about your problems with somebody you trust. Or, you could start writing your feelings in a journal.','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (6, 'Try something new, something spontaneous what you never tried before. For example, gather a few friend and try laser tag! It is like paintball but without pain.','http://laserforce.hu/',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (7, 'Have you ever tried an escape room game? If not, that should help with your boredom!','http://www.szabaduloszoba.hu/',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (8, 'You should try going to a coffee shop, for example to Warmcup.','http://welovebudapest.com/kavezok.ettermek/kavezok/warmcup',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (9, 'Try the game in the link if you want a challenge your alertness!','http://www.echalk.co.uk/amusements/Games/pilotTrainer/pilotTrainer.html',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (10, 'Share your excitment with someone!','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (11, 'How about meeting with your friends? Maybe your good mood will rub on them too! You could rent a fun tabletop game from szellemlovas to play with them!','http://www.szellemlovas.hu/tarsasjatekok/',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (12, 'Try doing some volunteer work, and spread the happiness!','http://www.onkentes.hu/kereskinal',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (13, 'Have you ever tried old-school role-playing games? It is like reading a book but you control the hero. One of the oldest one is Dungeon and Dragons, or you could try a hungarian one called MAGUS.','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (14, 'Good for you!','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (15, 'Try to suggest tips for people who are stressed, how to be as relaxed as you!','',''); 
INSERT INTO suggestion (suggestionId, titleSuggestion, linkSuggestion, pictureSuggestionDirectory) VALUES (16, 'Just to see how calm you are, play Dark Souls, and try to maintain your calm.','',''); 

INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (1, 1); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (2, 2); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (3, 3); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (4, 4); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (5, 5); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (6, 6); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (7, 7); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (8, 8); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (9, 9); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (10, 10); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (11, 11); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (12, 12); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (13, 13); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (14, 14); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (15, 15); 
INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES (16, 16); 