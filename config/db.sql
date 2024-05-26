create table if not exists article(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    content TEXT,
    created_at timestamp default current_timestamp,
    primary key(id)
);


create table if not exists user(
    id INT NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('organisateur', 'sportif', 'spectateur') NOT NULL,
    created_at timestamp default current_timestamp,
    primary key(id)
);