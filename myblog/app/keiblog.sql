CREATE TABLE articles(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255),
  body TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO articles (title,body) VALUES ("今日は晴れ","いい天気でしたよ") ;
INSERT INTO articles (title,body) VALUES ("今日は雨","わるい天気でしたよ") ;
INSERT INTO articles (title,body) VALUES ("今日は雷","悪い天気でしたよ") ;
INSERT INTO articles (title,body) VALUES ("今日は快晴","いい天気でしたよ") ;
INSERT INTO articles (title,body) VALUES ("今日は霧っぽい","悪い天気でしたよ") ;
INSERT INTO articles (title,body) VALUES ("今日は大雨","かなりわるい天気でしたよ") ;

SELECT * FROM articles;