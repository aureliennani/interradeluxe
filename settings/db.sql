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
    


CREATE TABLE articles(
    aid             INT UNSIGNED NOT NULL AUTO_INCREMENT,
    published       ENUM('0','1') NOT NULL DEFAULT '0',
    deleted         ENUM('0','1') NOT NULL DEFAULT '0',
    
    title           VARCHAR(255),
    content         BLOB,
    
    url             VARCHAR(255) NOT NULL,
    
    created         DATETIME,
    modified        DATETIME,
    publish_on      DATETIME,
    
    author          INT UNSIGNED NOT NULL,
    
    cache_keywords  TEXT,
    cache_author    VARCHAR(255),
    cache_comments  INT UNSIGNED DEFAULT 0,
    cache_files     INT UNSIGNED DEFAULT 0,
    cache_images    INT UNSIGNED DEFAULT 0,
    
    
    PRIMARY KEY(aid),
    KEY(published),
    KEY(deleted),
    KEY(url),
    KEY(publish_on),
    KEY(author)
    
) DEFAULT CHARSET=utf8;

INSERT INTO articles SET
    title = 'Wonderful Tonight',
    content = 'This is some excellent content',
    url = 'wonderful_tonight',
    created = NOW(),
    modified = NOW(),
    author = 1;
        
