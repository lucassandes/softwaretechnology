create table mood
{
moodId long,
name varchar[20],
primary key	(moodId)
};

create table suggestion
{
suggestionId long,
titleSuggestion varchar[20],
linkSuggestion varchar[20],
pictureSuggestionDirectory varchar[40],
primary key	(suggestionId)
};

create table mood_vote
{
idMood long,
idSuggestion long,
FOREIGN KEY (idMood) REFERENCES mood(moodId),
FOREIGN KEY (idSuggestion) REFERENCES suggestion(suggestionId)
};