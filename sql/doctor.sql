CREATE TABLE cms.Doctors (
    dUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    doctorName VARCHAR(50) NOT NULL,
    dId INT AUTO_INCREMENT NOT NULL UNIQUE,
    doctorSpecialist VARCHAR(50) NOT NULL,
    doctorContacts INT,
    doctorEmail VARCHAR(50),
    doctorPassword VARCHAR(50),
    doctorFess INT,
    doctorExperience INT,
    doctorDescription VARCHAR(500),
    createdAt TIMESTAMP
);