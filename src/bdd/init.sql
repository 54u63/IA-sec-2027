CREATE DATABASE IF NOT EXISTS test_ia;
USE test_ia;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE
);

INSERT INTO utilisateurs (id,user, password, is_admin) VALUES (1,'admin', 'admin', TRUE);
INSERT INTO utilisateurs (id,user, password, is_admin) VALUES (2,'test', 'test', FALSE);
GRANT ALL PRIVILEGES ON test_ia.utilisateurs TO 'pi'@'%';
FLUSH PRIVILEGES;
