CREATE TABLE cms.Doctors (
    dId INT AUTO_INCREMENT NOT NULL UNIQUE,
    dUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    doctorName VARCHAR(50) NOT NULL,
    doctorSpecialist VARCHAR(50) NOT NULL,
    doctorContacts INT,
    doctorEmail VARCHAR(50) NOT NULL UNIQUE,
    doctorPassword VARCHAR(50) NOT NULL,
    doctorFess INT NOT NULL,
    doctorExperience INT NOT NULL,
    doctorDescription VARCHAR(500),
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);