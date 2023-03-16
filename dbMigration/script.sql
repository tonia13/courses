CREATE TABLE courses (
    id BIGINT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    status ENUM('Published','Pending'),
    is_premium BOOLEAN,
    created_at DATETIME,
    deleted_at DATETIME,
    PRIMARY KEY (id)
);