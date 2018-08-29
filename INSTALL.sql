USE cakephp_cart;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(191) NOT NULL,
    body TEXT,
    in_stock SMALLINT,
    price_eur SMALLINT,
    weight_kg SMALLINT,
    length_cm SMALLINT,
    age_years SMALLINT,
    sex VARCHAR(6) NOT NULL,
    photo_url VARCHAR(255),
    published BOOLEAN DEFAULT FALSE,
    UNIQUE KEY (slug)
) CHARSET=utf8mb4;

INSERT INTO products (title, slug, body, in_stock, price_eur, weight_kg, length_cm, age_years, sex, photo_url, published)
VALUES
('Doris the Elephant', 'doris_the_elephant', 'A fantastic old elephant to match your largest dreams.', 3, 299, 6600, 5500, 62, 'female', 'elephant.jpg', 1);

INSERT INTO products (title, slug, body, in_stock, price_eur, weight_kg, length_cm, age_years, sex, photo_url, published)
VALUES
('Morris the Cat', 'morris_the_cat', 'A fantastic cute cat to match your sweetest dreams.', 25, 19, 4, 34, 3, 'male', 'cat.jpg', 1);