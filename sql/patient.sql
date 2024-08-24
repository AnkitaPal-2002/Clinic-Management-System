CREATE TABLE cms.Patients (
    pUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    pId INT AUTO_INCREMENT NOT NULL UNIQUE,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    gender VARCHAR(50),
    age INT,
    email VARCHAR(50),
    contact INT,
    password VARCHAR(160),
    createdAt TIMESTAMP
);
