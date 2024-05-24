create table if not exists article(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    content TEXT,
    created_at timestamp default current_timestamp,
    primary key(id)
);