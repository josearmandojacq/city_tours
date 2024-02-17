CREATE TABLE tours
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    start_city  VARCHAR(255),
    end_city    VARCHAR(255),
    description TEXT NULL,
    date        DATETIME,
    price       DECIMAL(10, 2),
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE users
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    email      VARCHAR(255),
    password   VARCHAR(255),
    role       VARCHAR(255) DEFAULT 'user',
    created_at DATETIME     DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE travels
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    tour_id        INT,
    departure_time TIME,
    arrival_time   TIME,
    stops          VARCHAR(255),
    created_at     DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at     DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tour_id) REFERENCES tours (id)
);

CREATE TABLE buses
(
    id              INT AUTO_INCREMENT PRIMARY KEY,
    register_plate  VARCHAR(255),
    power_outlet    BOOLEAN,
    wlan            BOOLEAN,
    seats           INT,
    air_conditioner BOOLEAN,
    toilet          BOOLEAN,
    availability    DATETIME,
    tour_id         INT,
    booked          BOOLEAN,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tour_id) REFERENCES tours (id)
);

CREATE TABLE bookings
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT,
    tour_id    INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (tour_id) REFERENCES tours (id)
);

CREATE TABLE accommodations
(
    id              INT AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(255),
    type            VARCHAR(255),
    city            VARCHAR(255),
    available_rooms INT,
    tour_id         INT,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tour_id) REFERENCES tours (id)
);

CREATE TABLE images
(
    id               INT AUTO_INCREMENT PRIMARY KEY,
    name             VARCHAR(255),
    tour_id          INT,
    bus_id           INT,
    accommodation_id INT,
    created_at       DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at       DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tour_id) REFERENCES tours (id),
    FOREIGN KEY (bus_id) REFERENCES buses (id),
    FOREIGN KEY (accommodation_id) REFERENCES accommodations (id)
);