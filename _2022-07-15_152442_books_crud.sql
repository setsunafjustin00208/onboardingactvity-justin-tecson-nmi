/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ books_crud /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE books_crud;

DROP TABLE IF EXISTS authors;
CREATE TABLE `authors` (
  `author_id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS books;
CREATE TABLE `books` (
  `book_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `publication_date_n_time` datetime NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO authors(author_id,fname,lname,mname,description,date_created,date_updated) VALUES(1,'sample','sample','sample',X'73616d706c65','2022-07-14 00:00:00','2022-07-15 08:53:58'),(2,'sample2','sample2','sample2',X'73616d706c6532','2022-07-14 00:00:00','2022-07-15 05:44:56'),(3,'sample3','sample3','sample3',X'73616d706c6533','2022-07-14 00:00:00','2022-07-15 05:45:00'),(4,'sample4','sample4','sample4',X'73616d706c6534','2022-07-14 00:00:00','2022-07-15 05:45:10'),(5,'sample5','sample5','sample5',X'73616d706c6535','2022-07-14 00:00:00','2022-07-15 05:45:14'),(6,'sample6','sample6','sample6',X'73616d706c6536','2022-07-14 00:00:00','2022-07-15 05:45:24'),(7,'sample6','sample5','sample5',X'73616d706c6535','2022-07-14 00:00:00','2022-07-14 00:00:00'),(8,'sample7','sample7','sample7',X'73616d706c6537','2022-07-14 00:00:00','2022-07-14 00:00:00'),(9,'sample8','sample8','sample8',X'73616d706c6538','2022-07-14 00:00:00','2022-07-14 00:00:00'),(11,'sample10','sample10','sample10',X'73616d706c65313232','2022-07-14 00:00:00','2022-07-15 05:47:14'),(12,'sample11','sample11','sample11',X'73616d706c653131','2022-07-14 00:00:00','2022-07-14 00:00:00'),(13,'sample12','sample12','sample12',X'73616d706c653132','2022-07-14 00:00:00','2022-07-14 00:00:00'),(15,'sample14','sample14','sample14',X'73616d706c653134','2022-07-14 00:00:00','2022-07-14 00:00:00'),(16,'sample15','sample15','sample15',X'73616d706c653135','2022-07-14 00:00:00','2022-07-14 00:00:00'),(17,'sample16','sample16','sample16',X'73616d706c653136','2022-07-14 00:00:00','2022-07-14 00:00:00'),(18,'sample18','sample18','sample18',X'73616d706c653138','2022-07-14 00:00:00','2022-07-14 00:00:00'),(19,'sample19','sample19','sample19',X'73616d706c653139','2022-07-14 00:00:00','2022-07-14 00:00:00');

INSERT INTO books(book_id,name,author,description,publication_date_n_time,date_created,date_updated) VALUES(2,'book2','sample sample sample',X'626f6f6b32','2019-01-14 18:45:00','2022-07-14','2022-07-15'),(3,'book1','sample sample sample',X'626f6f6b31','2022-05-17 14:55:00','2022-07-15','2022-07-15'),(4,'book11','sample sample sample',X'626f6f6b3131','2022-07-23 14:56:00','2022-07-15','2022-07-15');
INSERT INTO users(user_id,username,password,date_created) VALUES(1,'book_keeper','book_keeper_access','2022-07-13 08:32:07');