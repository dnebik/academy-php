CREATE DATABASE main;

CREATE TABLE orders
(
    order_id    INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_email VARCHAR(254) NOT NULL UNIQUE,
    order_date  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users
(
    id    INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name  VARCHAR(128) NOT NULL,
    email VARCHAR(254) NOT NULL
);

ALTER TABLE orders
    ADD CONSTRAINT FK_orders_users_by_email FOREIGN KEY (order_email) REFERENCES users (email) ON UPDATE CASCADE;

INSERT INTO users (name, email)
VALUES ('Антон Васильевичь Простаков', 'antoni@gnus.com');
INSERT INTO users (name, email)
VALUES ('Владислава Сергеевна Ижевская', 'ivi@gnus.com');

INSERT INTO orders (order_email)
VALUES ('ivi@gnus.com');
INSERT INTO orders (order_email)
VALUES ('antoni@gnus.com');
INSERT INTO orders (order_email)
VALUES ('ivi@gnus.com');

ALTER TABLE orders
    DROP FOREIGN KEY FK_orders_users_by_email;