CREATE TABLE credentials(
    uid         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email       VARCHAR(100) NOT NULL,
    pswd        VARCHAR(64) NOT NULL,
    
    first_name  VARCHAR(32) NOT NULL,
    last_name   VARCHAR(32) NOT NULL,
    
    pwsecured   ENUM('0','1') DEFAULT '0' NOT NULL,
    deleted     ENUM('0','1') DEFAULT '0' NOT NULL,
    blocked     ENUM('0','1') DEFAULT '0' NOT NULL,
    
    created     DATETIME,
    modified    TIMESTAMP,
    last_login  DATETIME DEFAULT NULL,
    
    
    autohash    VARCHAR(32) DEFAULT NULL,
    autoip      VARCHAR(15) DEFAULT NULL,
    
    PRIMARY KEY(uid),
    UNIQUE(email),
    KEY(deleted),
    KEY(blocked)
) DEFAULT CHARSET=utf8;

INSERT INTO credentials SET
    email = 'admin@domain.com',
    pswd  = 'admin',
    
    first_name = 'Scotty',
    last_name  = 'Jones',
    
    created = NOW();
    