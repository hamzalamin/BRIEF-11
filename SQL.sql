CREATE DATABASE brief11;

CREATE TABLE users (
    user_id INT PRIMARY KEY,
    name VARCHAR(225),
    email VARCHAR(225),
    password VARCHAR(225), 
    role BOOLEAN DEFAULT 0
);

CREATE TABLE category (
    category_id INT PRIMARY KEY,
    category_name VARCHAR(225),
    category_date DATE 
);

CREATE TABLE wiki (
    id INT PRIMARY KEY,
    name VARCHAR(225),
    contenu TEXT,
    user_id INT,
    category_id INT,
    wiki_date DATE,
    is_hide BOOLEAN DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES category(category_id)
);

CREATE TABLE tag (
    tag_id INT PRIMARY KEY,
    tag_name VARCHAR(225),
    tag_date DATE 
);

CREATE TABLE wikiTag (
    wiki_id INT,
    tag_id INT,
    FOREIGN KEY (wiki_id) REFERENCES wiki(id),
    FOREIGN KEY (tag_id) REFERENCES tag(tag_id)
);
