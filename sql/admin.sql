CREATE TABLE cms.Admins (
    aUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    ald INT AUTO_INCREMENT NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(160) NOT NULL,
    questionId INT NOT NULL, 
    securityAnswer VARCHAR(160) NOT NULL, -- Hashed or encrypted answer
    FOREIGN KEY (questionId) REFERENCES cms.SecurityQuestions(questionId)
);

-- hash value of 1234 is $2y$10$nxEPUC4DcH4eq26vEi53T.zjcdNTOmPnqVTJTozJJhrzdO5KvrU.C
INSERT INTO cms.Admins (aUserName, ald, email, password, questionId, securityAnswer)
VALUES ('admin', '1', 'admin.clinic@gmail.com', '$2y$10$nxEPUC4DcH4eq26vEi53T.zjcdNTOmPnqVTJTozJJhrzdO5KvrU.C', 1, 'Dog');

