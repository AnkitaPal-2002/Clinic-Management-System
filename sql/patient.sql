CREATE TABLE cms.Patients (
    pId INT AUTO_INCREMENT NOT NULL UNIQUE,
    pUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    contact BIGINT(50) NOT NULL,
    password VARCHAR(160) NOT NULL,
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    questionId INT NOT NULL,
    securityAnswer VARCHAR(160) NOT NULL, -- Hashed or encrypted answer
    FOREIGN KEY (questionId) REFERENCES cms.SecurityQuestions(questionId)
);
