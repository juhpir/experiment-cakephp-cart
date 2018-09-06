USE cakephp_cart;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(191) NOT NULL,
    body TEXT,
    in_stock SMALLINT  NOT NULL,
    price_eur DECIMAL( 10, 2 ) NOT NULL,
    weight_kg DECIMAL( 10, 1 ),
    length_cm SMALLINT,
    age_years DECIMAL( 3, 1 ),
    sex VARCHAR(6) NOT NULL,
    photo_url VARCHAR(255),
    published BOOLEAN DEFAULT FALSE,
    UNIQUE KEY (slug)
) CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `title`, `slug`, `body`, `in_stock`, `price_eur`, `weight_kg`, `length_cm`, `age_years`, `sex`, `photo_url`, `published`) VALUES
(1, 'Elly the Elephant', 'Elly_the_Elephant', 'A fantastic old elephant to match your largest dreams.', 3, '299.99', '6600.0', 5500, '62.0', 'female', 'elephant.jpg', 1),
(2, 'Carlos the Cat', 'Carlos_the_Cat', 'A fantastic cute cat to match your sweetest dreams.', 25, '19.00', '4.0', 34, '3.0', 'male', 'cat.jpg', 1),
(3, 'Muppe the Dog', 'Muppe-the-Dog', 'Muppe makes it happen. In every corner and even on sofa.', 4, '1.25', '9.3', 123, '5.0', 'male', 'dog.jpg', 1),
(4, 'Reddy the Ant', 'Reddy-the-Ant', 'This ant is small enough. Believe it or not!', 4364, '0.01', '0.0', 0, '0.1', 'other', 'ant.jpg', 1),
(5, 'Barry the Beaver', 'Barry-the-Beaver', 'Professional gardener services at your disposal', 12, '104.23', '8.0', 85, '4.0', 'male', 'beaver.jpg', 1),
(6, 'Edward the Elk', 'Edward-the-Elk', 'Get now pricey traffic operator services for your summer cottage road!', 545, '1000.00', '1300.0', 304, '7.0', 'male', 'elk.jpg', 1),
(7, 'Dolly the Dinosaur', 'Dolly-the-Dinosaur', 'Dolly is a best to cook you a breakfast. Makes omelette with dinosaur\'s eggs.', 2, '350.14', '28403.2', 20000, '99.9', 'female', 'dinosaur.jpg', 1),
(8, 'Frederik the Fox', 'Frederik-the-Fox', 'No comments', 23, '5.80', '8.0', 124, '1.0', 'male', 'fox.jpg', 1),
(9, 'Sandra the Squirrel', 'Sandra-the-Squirrel', 'Welcomes you eating the nuts.', 34, '12.42', '0.2', 12, '1.4', 'female', 'squirrel.jpg', 1),
(10, 'Harry the Hamster', 'Harry-the-Hamster', '', 3463, '8.80', '0.1', NULL, '0.5', 'male', 'hamster.jpg', 1),
(11, 'Beatrice the Bunny', 'Beatrice-the-Bunny', '', 345, '12.53', '3.4', 67, '1.2', 'female', 'bunny.jpg', 1),
(12, 'Helena the Hedgehog', 'Helena-the-Hedgehog', '', 56, '2.23', '0.2', 10, '2.0', 'other', 'hedgehog.jpg', 1),
(13, 'Sally the Salmon', 'Sally-the-Salmon', '', 2, '12.32', '7.0', 30, '2.4', 'female', 'salmon.jpg', 1),
(14, 'Patrik the Panda', 'Patrik-the-Panda', '', 5, '7000.54', '644.0', 256, '7.0', 'male', 'panda.jpg', 1),
(15, 'Sam the Shark', 'Sam-the-Shark', '', 3, '854.23', '1200.4', 400, '3.0', 'male', 'shark.jpg', 1),
(16, 'Sonya the Sheep', 'Sonya-the-Sheep', '', 34, '56.34', '5.0', 60, '0.2', 'female', 'sheep.jpg', 1),
(17, 'Sebastian the Snake', 'Sebastian-the-Snake', '', 34, '86.32', '0.6', 234, '2.0', 'male', 'snake.jpg', 1),
(18, 'Stephen the Spider', 'Stephen-the-Spider', '', 3, '235.34', '0.6', 23, '0.8', 'male', 'spider.jpg', 1),
(19, 'Sue the Swan', 'Sue-the-Swan', '', 34, '353.34', '9.3', 134, '8.3', 'female', 'swan.jpg', 1),
(20, 'Walter the Wasp', 'Walter-the-Wasp', '', 32767, '1.50', '0.1', 3, '0.5', 'other', 'wasp.jpg', 1),
(21, 'Terry the Tiger', 'Terry-the-Tiger', '', 3, '3434.34', '845.0', 344, '4.0', 'male', 'tiger.jpg', 1),
(22, 'Fiona the Fish', 'Fiona-the-Fish', '', 345, '23.32', '0.6', 34, '2.3', 'female', 'fish.jpg', 1);