CREATE DATABASE IF NOT EXISTS example_database;
USE example_database;

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
titleSuggestion varchar(20),
linkSuggestion varchar(20),
pictureSuggestionDirectory varchar(40),
primary key	(suggestionId)
);

CREATE TABLE IF NOT EXISTS mood_vote
(
idMood bigint,
FOREIGN KEY (idMood) REFERENCES mood(moodId)
);

CREATE TABLE IF NOT EXISTS suggestion_markers
(
idSuggestion bigint,
idMood bigint,
FOREIGN KEY (idMood) REFERENCES mood(moodId),
FOREIGN KEY (idSuggestion) REFERENCES suggestion(suggestionId)
);

INSERT INTO mood (name, pictureMoodDirectory) VALUES ('tense', 'mood_images/tense.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('nervous', 'mood_images/nervous.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('stressed', 'mood_images/stressed.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('upset', 'mood_images/upset.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('sad', 'mood_images/sad.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('depressed', 'mood_images/depressed.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('bored', 'mood_images/bored.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('fatigued', 'mood_images/fatigued.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('alert', 'mood_images/alert.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('excited', 'mood_images/excited.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('elated', 'mood_images/elated.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('happy', 'mood_images/happy.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('contented', 'mood_images/contented.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('serene', 'mood_images/serene.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('relaxed', 'mood_images/relaxed.jpg'); 
INSERT INTO mood (name, pictureMoodDirectory) VALUES ('calm', 'mood_images/calm.jpg'); 