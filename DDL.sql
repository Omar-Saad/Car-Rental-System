CREATE
DATABASE car_rental_system;

CREATE TABLE car
(
    plate_id   int UNIQUE,
    model      VARCHAR(512) NOT NULL,
    price      float        NOT NULL,
    `year`     YEAR         NOT NULL,
    `status`   VARCHAR(512) NOT NULL,
    image_link TEXT,
    PRIMARY KEY (plate_id)
);

CREATE TABLE specs
(
    plate_id         int          NOT NULL UNIQUE,
    transmission     VARCHAR(512) NOT NULL,
    body_style       VARCHAR(512) NOT NULL,
    AC               BIT          NOT NULL,
    seats_count      INT          NOT NULL,
    engine_capacity  INT          NOT NULL,
    fuel_consumption INT          NOT NULL,
    air_bags_count   INT          NOT NULL,

    FOREIGN KEY (plate_id) REFERENCES car (plate_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (plate_id)
);

CREATE TABLE customer
(
    cust_id       int          NOT NULL UNIQUE AUTO_INCREMENT,
    ssn           int          NOT NULL UNIQUE,
    name          VARCHAR(512) NOT NULL,
    address       VARCHAR(512) NOT NULL,
    phone         VARCHAR(512) NOT NULL,
    profile_image TEXT         NOT NULL,
    email         VARCHAR(512) NOT NULL,
    `password`    VARCHAR(512) NOT NULL,

    PRIMARY KEY (cust_id)
);


CREATE TABLE admin
(
    admin_id      int          NOT NULL UNIQUE AUTO_INCREMENT,
    ssn           int          NOT NULL UNIQUE,
    name          VARCHAR(512) NOT NULL,
    profile_image TEXT         NOT NULL,
    email         VARCHAR(512) NOT NULL,
    `password`    VARCHAR(512) NOT NULL,

    PRIMARY KEY (admin_id)
);

CREATE TABLE reservation
(
    plate_id    int   NOT NULL,
    res_date    DATE  NOT NULL,
    return_date DATE  NOT NULL,
    cust_id     int   NOT NULL,
    amount_paid float NOT NULL,

    FOREIGN KEY (cust_id) REFERENCES customer (cust_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (plate_id) REFERENCES car (plate_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (plate_id, cust_id, res_date)

);

#
N:M Relation
CREATE TABLE manage
(
    admin_id int NOT NULL,
    plate_id int NOT NULL,

    FOREIGN KEY (admin_id) REFERENCES admin (admin_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (plate_id) REFERENCES car (plate_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (plate_id, admin_id)

);