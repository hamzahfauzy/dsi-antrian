CREATE TABLE survey_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL
);

CREATE TABLE survey (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    result VARCHAR(45) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);