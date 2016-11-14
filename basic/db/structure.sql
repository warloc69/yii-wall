
drop TABLE IF EXISTS posts;
drop TABLE IF EXISTS likes;
drop TABLE IF EXISTS users;
drop type IF EXISTS mood;
CREATE  type mood as ENUM ('d','l');

drop SEQUENCE IF EXISTS  user_ids;
CREATE SEQUENCE user_ids;

drop SEQUENCE IF EXISTS post_ids;
CREATE SEQUENCE post_ids;

create table users (
  id          INTEGER PRIMARY KEY DEFAULT nextval('user_ids'),
  first_name  VARCHAR(50),
  second_name VARCHAR(50),
  beartday    DATE,
  avatar      VARCHAR(100),
  email       text not null UNIQUE,
  created_at  INTEGER
);

CREATE TABLE likes (
  post_id  INTEGER ,
  user_id INTEGER,
  type mood ,
  PRIMARY KEY (post_id,user_id)
);

create table posts (
  id integer PRIMARY KEY DEFAULT nextval('post_ids'),
  parent_id INTEGER,
  description text,
  user_id INTEGER,
  created_when DATE DEFAULT now(),
  created_at integer,
  FOREIGN KEY (user_id) REFERENCES "user"(id)
);