CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  cash_balance REAL DEFAULT 0.0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO
  users (username, password)
VALUES
  (
    'reimarrosas@example.com',
    '$2a$10$6mDG1pAcbqmvr/kv8hU0cuuzAiURgjSR.mJGsm2B79OZlEUXaDyiu'
  );