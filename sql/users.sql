create table users
(
    id                  int auto_increment
        primary key,
    username            char(255) null,
    hashed_password     char(255) null,
    authorization_level int       null
);

INSERT INTO wms.users (id, username, hashed_password, authorization_level) VALUES (1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 5);
INSERT INTO wms.users (id, username, hashed_password, authorization_level) VALUES (2, '1', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 1);
