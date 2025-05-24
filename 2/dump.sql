CREATE DATABASE term;
USE term;

CREATE TABLE `collections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `collections` VALUES
(1,'Колекция 1'),
(2,'Колекция 2'),
(3,'Колекция 3'),
(4,'Колекция 4'),
(5,'Колекция 5'),
(6,'Колекция 6'),
(7,'Колекция 7');

CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `collection_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` VALUES
(1,'Табуретка 1-1',124.00,1),
(2,'Табуретка 1-2',1254.00,1),
(3,'Табуретка 1-3',124.00,1),
(4,'Табуретка 1-4',542.00,1),
(5,'Табуретка 1-5',545.00,1),
(6,'Табуретка 1-6',534.00,1),
(7,'Табуретка 2-1',235.00,2),
(8,'Табуретка 2-2',235.00,2),
(9,'Табуретка 2-3',123.00,2),
(10,'Табуретка 2-4',57.00,2),
(11,'Табуретка 2-5',89.00,2),
(12,'Табуретка 3-1',124.00,3),
(13,'Табуретка 3-2',1254.00,3),
(14,'Табуретка 3-3',124.00,3),
(15,'Табуретка 3-4',542.00,3),
(16,'Табуретка 4-1',235.00,4),
(17,'Табуретка 4-2',235.00,4),
(18,'Табуретка 4-3',123.00,4),
(19,'Табуретка 4-4',57.00,4),
(20,'Табуретка 4-5',89.00,4),
(21,'Табуретка 5-1',123.00,5),
(22,'Табуретка 5-2',57.00,5),
(23,'Табуретка 6-1',123.00,6),
(24,'Табуретка 6-2',57.00,6),
(25,'Табуретка 6-3',123.00,6),
(26,'Табуретка 7-1',123.00,7),
(27,'Табуретка 7-2',57.00,7),
(28,'Табуретка 7-3',123.00,7),
(29,'Табуретка 2-6',786.00,2),
(30,'Табуретка 7-4',7897.00,7);
