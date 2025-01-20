USE test_ia;

CREATE TABLE utilisateurs (
    user VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE
);

INSERT INTO utilisateurs (user, password, is_admin) VALUES ('admin', 'admin', TRUE),(2,'test', 'test', FALSE);
GRANT ALL PRIVILEGES ON test_ia.utilisateurs TO 'pi'@'%';
FLUSH PRIVILEGES;
