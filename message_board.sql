CREATE DATABASE message_board;
USE message_board;
CREATE TABLE messages (
  username LONGTEXT NOT NULL,
  message LONGTEXT NOT NULL
);
INSERT INTO messages VALUES (
  'admin','0000'
);

select * from messages;