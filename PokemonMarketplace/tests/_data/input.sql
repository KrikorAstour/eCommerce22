CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  secret_2fa VARCHAR(255) NOT NULL,
  cash_balance REAL DEFAULT 0.0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
  )