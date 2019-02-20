-- DROP
DROP TABLE Family;
DROP TABLE Rating;
DROP TABLE Location;
DROP TABLE Genre;
DROP TABLE Users;
DROP TABLE Movies;
-- CREATE TABLE
CREATE TABLE Family
(
    family_id SERIAL PRIMARY KEY,
    family_name varchar(30) NOT NULL,
    family_email varchar(50) NOT NULL
);
CREATE TABLE Users
(
    user_id SERIAL PRIMARY KEY,
    username varchar(15) NOT NULL,
    user_firstname varchar(20) NOT NULL,
    user_lastname varchar(20) NOT NULL,
    user_password varchar(200) NOT NULL,
    family_id int NOT NULL REFERENCES Family(family_id)
);
CREATE TABLE Rating
(
    rating_id SERIAL PRIMARY KEY,
    rating_type varchar(10) NOT NULL
);
CREATE TABLE Genre
(
    genre_id SERIAL PRIMARY KEY,
    genre_name varchar(100) NOT NULL
);
CREATE TABLE Format
(
    format_id SERIAL PRIMARY KEY,
    format_type varchar(100) NOT NULL
);
CREATE TABLE Movies
(
    movie_id SERIAL PRIMARY KEY,
    movie_title varchar(128) NOT NULL,
    movie_year int             ,
    movie_desc varchar(500) NOT NULL,
    movie_digital BOOL NOT NULL,
    movie_yn BOOL NOT NULL,
    movie_runtime int            ,
    movie_rating_id int NOT NULL REFERENCES Rating(rating_id),
    genre_id int NOT NULL REFERENCES Genre(genre_id),
    family_id int NOT NULL REFERENCES Family(family_id),
    user_id int NOT NULL REFERENCES Users(user_id),
    format_id int NOT NULL REFERENCES Format(format_id)
);
INSERT INTO Genre
VALUES
    ( DEFAULT, 'Adventure'
),
    ( DEFAULT, 'Action'
),
    ( DEFAULT, 'Comedy'
),
    ( DEFAULT, 'Drama'
),
    ( DEFAULT, 'Fantasy'
),
    ( DEFAULT, 'Horror'
),
    ( DEFAULT, 'Musical'
),
    ( DEFAULT, 'Mystery'
),
    ( DEFAULT, 'Rom Com'
),
    ( DEFAULT, 'Science Fiction'
);
INSERT INTO Format
VALUES
    ( DEFAULT, 'Physical'
),
    ( DEFAULT, 'iTunes / Apple TV'
),
    ( DEFAULT, 'Amazon Prime'
);
INSERT INTO Rating
VALUES
    ( DEFAULT, 'G'
),
    ( DEFAULT, 'PG'
),
    ( DEFAULT, 'PG-13'
),
    ( DEFAULT, 'R'
),
    ( DEFAULT, 'NR'
);
INSERT INTO Family
VALUES
    ( DEFAULT, 'King', 'gimmethatcokezero@gmail.com'
);
INSERT INTO Users
VALUES
    ( DEFAULT, 'abby_loo', 'Abby', 'Loosle', 'pass', 1
),
    ( DEFAULT, 'boku_king', 'Chuck', 'King', 'pass', 1
);
INSERT INTO Movies
VALUES
    ( DEFAULT, 'Get Smart', 2008, 'Maxwell Smart, a highly intellectual but bumbling spy working for the CONTROL agency, is tasked with preventing a terrorist attack from rival spy agency KAOS.', TRUE, TRUE, 110, 3, 3, 1, 1, 2
),
    ( DEFAULT, 'Mama Mia!', 2008, 'The story of a bride-to-be trying to find her real father told using hit songs by the popular 1970s group ABBA.', TRUE, TRUE, 109, 3, 7, 1, 1, 2
),
    ( DEFAULT, 'The Dark Knight', 2008, 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', TRUE, TRUE, 152, 3, 2, 1, 1, 2
),
    ( DEFAULT, 'Yes Man', 2008, 'A man challenges himself to say "yes" to everything for an entire year.', TRUE, TRUE, 104, 3, 3, 1, 1, 2
);