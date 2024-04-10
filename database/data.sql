use eindopdracht;

--
-- Table structure for table `family`
--
CREATE TABLE family
(
    family_id   INT NOT NULL,
    family_name VARCHAR(255),
    address     VARCHAR(255),
    PRIMARY KEY (family_id)
);

INSERT INTO family (family_id, family_name, address)
VALUES (1, 'Family1', 'Adress 1, 1111AA, Amsterdam'),
       (2, 'Family2', 'Adress 2, 2222AA, Amsterdam'),
       (3, 'Family3', 'Adress 3, 3333AA, Amsterdam');
--
-- Table structure for table `member`
--
CREATE TABLE member
(
    member_id   INT NOT NULL,
    description VARCHAR(255),
    PRIMARY KEY (member_id)
);

INSERT INTO member (member_id, description)
VALUES (1, 'Regular member'),
       (2, 'Honor member'),
       (3, 'Student member');

--
-- Table structure for table `discount`
--
CREATE TABLE discount
(
    discount_id INT NOT NULL,
    membership  VARCHAR(255),
    discount    INT,
    PRIMARY KEY (discount_id)
);

INSERT INTO discount (discount_id, membership, discount)
VALUES (1, 'Youth', 50),
       (2, 'Aspirant', 40),
       (3, 'Junior', 25),
       (4, 'Senior', 0),
       (5, 'mature', 45);
--
-- Table structure for table `financial_year`
--
CREATE TABLE financial_year
(
    financial_id INT NOT NULL,
    year         INT(4),
    PRIMARY KEY (financial_id)
);

INSERT INTO financial_year (financial_id, year)
VALUES (1, 2024),
       (2, 2023),
       (3, 2022),
       (4, 2021),
       (5, 2020);
--
-- Table structure for table `account`
--
CREATE TABLE account
(
    account_id INT NOT NULL,
    email      VARCHAR(50) UNIQUE,
    password   VARCHAR(255),
    role VARCHAR(50),
    PRIMARY KEY (account_id)
);

INSERT INTO account (account_id, email, password, role)
VALUES (1, 'user1@gmail.com', 'password', 'user'),
       (2, 'user2@gmail.com', 'password', 'user'),
       (3, 'user3@gmail.com', 'password', 'user'),
       (4, 'user4@gmail.com', 'password', 'user'),
       (5, 'user5@gmail.com', 'password', 'user'),
       (6, 'user6@gmail.com', 'password', 'user'),
       (7, 'admin1@gmail.com', 'password', 'admin');
--
-- Table structure for table `payments`
--
CREATE TABLE payments
(
    payments_id    INT NOT NULL,
    user_id        INT,
    amount         INT,
    financial_year INT,
    PRIMARY KEY (payments_id),
    FOREIGN KEY (financial_year) REFERENCES financial_year (financial_id)
);

INSERT INTO payments (payments_id, user_id, amount, financial_year)
VALUES (1, 1, 100, 1),
       (2, 1, 100, 2),
       (3, 1, 100, 3),
       (4, 1, 100, 4),
       (5, 1, 100, 5),
       (6, 2, 100, 2),
       (7, 2, 100, 3),
       (8, 2, 100, 4),
       (9, 2, 100, 5);

--
-- Table structure for table `family_member`
--
CREATE TABLE family_member
(
    id         INT NOT NULL,
    name       VARCHAR(255),
    birthday   DATE,
    family_id  INT,
    member     INT,
    discount   INT,
    account_id INT,
    payments   INT,
    PRIMARY KEY (id),
    FOREIGN KEY (family_id) REFERENCES family (family_id),
    FOREIGN KEY (member) REFERENCES member (member_id),
    FOREIGN KEY (discount) REFERENCES discount (discount_id),
    FOREIGN KEY (account_id) REFERENCES account (account_id),
    FOREIGN KEY (payments) REFERENCES payments (payments_id)
);

INSERT INTO family_member (id, name, birthday, family_id, member, discount, account_id, payments)
VALUES (1, 'User1', '1994-02-09', 1, 1, 1, 1, 1),
       (2, 'User2', '1996-05-11', 1, 2, 2, 2, 1),
       (3, 'User3', '1997-02-10', 2, 3, 3, 3, 1),
       (4, 'User4', '1983-12-24', 2, 1, 4, 4, 1),
       (5, 'User5', '2004-06-05', 3, 2, 1, 5, 1),
       (6, 'User6', '2013-09-28', 3, 3, 5, 6, 1);