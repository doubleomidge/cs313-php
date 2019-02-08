-- DROP



-- CREATE TABLE
CREATE TABLE Users (
    user_id         SERIAL          NOT NULL,
    username        varchar(15)     NOT NULL,
    user_firstname  varchar(20)     NOT NULL,
    user_lastname   varchar(20)     NOT NULL,
    user_password   varchar(15)     NOT NULL,
    family_id       int             NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE Family (
    family_id       SERIAL          NOT NULL,
    family_name     varchar(30)     NOT NULL,
    PRIMARY KEY (family_id)
);

ALTER TABLE Users
ADD FOREIGN KEY (family_id) REFERENCES Family(family_id);

CREATE TABLE Movies (
    movie_id        SERIAL          PRIMARY KEY,
    movie_title     varchar(30)     NOT NULL,
    movie_year      varchar(20)     NOT NULL,
    movie_desc      varchar(500)    NOT NULL,
    movie_digital   BOOL            NOT NULL,
    movie_rating_id int             NOT NULL,
    movie_runtime   int             NOT NULL,
    genre_id        int             NOT NULL,
    family_id       int             NOT NULL,
    user_id         int             NOT NULL,
    location_id     int             NOT NULL
);

CREATE TABLE Rating (
    rating_id       SERIAL          PRIMARY KEY,
    rating_type     varchar(10)     NOT NULL
);

CREATE TABLE Genre (
    genre_id        SERIAL          NOT NULL,
    genre_name      varchar(100)    NOT NULL,
    PRIMARY KEY (genre_id)
);

CREATE TABLE Location (
    location_id     SERIAL          NOT NULL,d
    location_name   varchar(100)    NOT NULL,
    PRIMARY KEY (location_id)
);

ALTER TABLE Movies
ADD FOREIGN KEY (genre_id) REFERENCES Genre(genre_id);

ALTER TABLE Movies
ADD FOREIGN KEY (movie_rating_id) REFERENCES Rating(rating_id);

ALTER TABLE Movies
ADD FOREIGN KEY (family_id) REFERENCES Family(family_id);

ALTER TABLE Movies
ADD FOREIGN KEY (user_id) REFERENCES Users(user_id);

ALTER TABLE Movies
ADD FOREIGN KEY (location_id) REFERENCES Location(location_id);

INSERT INTO Genre VALUES (
    DEFAULT,
    'Adventure'
),
(
    DEFAULT,
    'Action'
),
(
    DEFAULT,
    'Comedy'
),
(
    DEFAULT,
    'Crime'
),
(
    DEFAULT,
    'Drama'
),
(
    DEFAULT,
    'Fantasy'
),
(
    DEFAULT,
    'Historical'
),
(
    DEFAULT,
    'Horror'
),
(
    DEFAULT,
    'Magical'
),
(
    DEFAULT,
    'Mystery'
),
(
    DEFAULT,
    'Rom Com'
),
(
    DEFAULT,
    'Science Fiction'
),
(
    DEFAULT,
    'Thriller'
);

INSERT INTO Location VALUES (
    DEFAULT,
    'Physical in Boise'
),
(
    DEFAULT,
    'Physical in Rexburg'
),
(
    DEFAULT,
    'iTunes / Apple TV'
),
(
    DEFAULT,
    'Amazon Prime'
);

INSERT INTO Rating VALUES (
    DEFAULT,
    'G'
), (
    DEFAULT,
    'PG'
), (
    DEFAULT,
    'PG-13'
), (
    DEFAULT,
    'R'
), (
    DEFAULT,
    'NR'
);

INSERT INTO Movies VALUES (
    DEFAULT,
    'Get Smart',
    '2008',
    'Maxwell Smart, a highly intellectual but bumbling spy working for the CONTROL agency, is tasked with preventing a terrorist attack from rival spy agency KAOS.',
    TRUE,
    3,
    110,
    3,
    1,
    3,
    3
);

INSERT INTO Family VALUES (
    DEFAULT,
    'King'
);

INSERT INTO Users VALUES (
    DEFAULT,
    'abby_loo',
    'Abby',
    'Loosle',
    'pass',
    1
);