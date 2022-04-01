CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  secret_2fa VARCHAR(255) NOT NULL,
  cash_balance REAL DEFAULT 0.0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS cards (
  card_id INT AUTO_INCREMENT PRIMARY KEY,
  card_name VARCHAR(255) NOT NULL,
  card_rarity VARCHAR(255) CHECK (
    card_rarity IN ('common', 'rare', 'epic', 'legendary')
  ),
  card_image VARCHAR(1000) NOT NULL,
  is_offered BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS posts (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  card_id INT NOT NULL,
  post_title VARCHAR(255) NOT NULL,
  post_description VARCHAR(255) NOT NULL,
  price REAL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (card_id) REFERENCES cards (card_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS saves (
  user_id INT NOT NULL,
  post_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id, post_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (post_id) REFERENCES posts (post_id)
) ENGINE=InnoDB;

INSERT INTO
  users (username, password, secret_2fa)
VALUES
  (
    'reimarrosas@example.com',
    '$2a$10$6mDG1pAcbqmvr/kv8hU0cuuzAiURgjSR.mJGsm2B79OZlEUXaDyiu',
    'XGH3DJLAAFRC77E5'
  );

INSERT INTO
  users (username, password, secret_2fa)
VALUES
  (
    'rosasreimar@example.com',
    '$2a$10$ot8e88L7uALUypXVK26heOsPFG3O45Er/0geDuLcJLl635m2z/4ee',
    'WO6BAVZ6HKPWN73A'
  );

INSERT INTO
  cards (card_name, card_rarity, card_image)
VALUES
  (
    'Pikachu',
    'common',
    'https://images.pokemontcg.io/cel25/7_hires.png'
  );

INSERT INTO
  posts (user_id, card_id, post_title, post_description)
VALUES
  (
    1,
    1,
    'Pikachu',
    'Foo Bar Pikachu'
  );

INSERT INTO
  posts (user_id, card_id, post_title, post_description)
VALUES
  (
    2,
    1,
    'Pikachu',
    'Foo Bar Pikachu'
  );