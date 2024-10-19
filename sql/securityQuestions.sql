CREATE TABLE cms.SecurityQuestions (
    questionId INT AUTO_INCREMENT PRIMARY KEY,
    questionText VARCHAR(255) NOT NULL
);

-- Insert demo security questions
INSERT INTO cms.SecurityQuestions (questionText)
VALUES
('What was the name of your first pet?'),
('What is your mother’s maiden name?'),
('What was the make and model of your first car?'),
('What is the name of the street you grew up on?'),
('What was the name of your elementary school?'),
('In what city were you born?'),
('What is your favorite book?'),
('What is your favorite movie?'),
('What is the name of your first employer?'),
('What is the name of your best childhood friend?');
