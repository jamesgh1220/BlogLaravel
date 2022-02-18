CREATE DATABASE IF NOT EXISTS bloglaravel;
USE bloglaravel;
CREATE TABLE users(
id  int(255) auto_increment not null,
name    varchar(100) not null,
lastName varchar(100) not null,
email            varchar(255) not null,
password            varchar(255) not null,
created_at          datetime,
updated_at          datetime,
remember_token      varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categories(
id                  int(255) auto_increment not null,
name                varchar(100),
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE tickets(
id              int(255) auto_increment not null,
user_id         int(255) not null,
category_id     int(255) not null,
tittle          varchar(255) not null,
description      MEDIUMTEXT,
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_entradas PRIMARY KEY(id),
CONSTRAINT fk_ticket_user FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_ticket_category FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE NO ACTION
)ENGINE=InnoDb;