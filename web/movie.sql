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
    movie_id        SERIAL          NOT NULL,
    movie_title     varchar(30)     NOT NULL,
    movie_year      varchar(20)     NOT NULL,
    movie_desc      varchar(500)    NOT NULL,
    movie_digital   BOOL            NOT NULL,
    movie_rating_id int             NOT NULL,
    movie_runtime   int             NOT NULL,
    genre_id        int             NOT NULL,
    family_id       int             NOT NULL,
    user_id         int             NOT NULL,
    location_id     int             NOT NULL,
    PRIMARY KEY (movie_id)
);

CREATE TABLE Genre (
    genre_id        SERIAL          NOT NULL,
    genre_name      varchar(100)    NOT NULL,
    PRIMARY KEY (genre_id)
);

CREATE TABLE Location (
    location_id     SERIAL          NOT NULL,
    location_name   varchar(100)    NOT NULL,
    PRIMARY KEY (location_id)
);

ALTER TABLE Movies
ADD FOREIGN KEY (genre_id) REFERENCES Genre(genre_id);

ALTER TABLE Movies
ADD FOREIGN KEY (family_id) REFERENCES Family(family_id);

ALTER TABLE Movies
ADD FOREIGN KEY (user_id) REFERENCES Users(user_id);

ALTER TABLE Movies
ADD FOREIGN KEY (location_id) REFERENCES Location(location_id);
