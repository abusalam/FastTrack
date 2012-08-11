CREATE TABLE IF NOT EXISTS slideshow (
  id int(11) NOT NULL AUTO_INCREMENT,
  image varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  url varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  price varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id)
);


DROP TABLE slideshow;