-- Patient table creation

CREATE TABLE cms.Patients (
    pId INT AUTO_INCREMENT NOT NULL UNIQUE,
    pUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    age INT NOT NULL ,
    email VARCHAR(50) NOT NULL UNIQUE,
    contact BIGINT(50) NOT NULL,
    password VARCHAR(160) NOT NULL,
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Doctor table creation

CREATE TABLE cms.Doctors (
    dId INT AUTO_INCREMENT NOT NULL UNIQUE,
    dUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    doctorName VARCHAR(50) NOT NULL,
    doctorSpecialist VARCHAR(50) NOT NULL,
    doctorContacts BIGINT,
    doctorEmail VARCHAR(50) NOT NULL UNIQUE,
    doctorPassword VARCHAR(150) NOT NULL,
    doctorFess INT NOT NULL,
    doctorExperience INT NOT NULL,
    doctorDescription VARCHAR(500),
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


-- Appointment table creation

CREATE TABLE cms.Appointments (
    appointmentId INT NOT NULL PRIMARY KEY,
    dUserName VARCHAR(50) NOT NULL,
    pUserName VARCHAR(50) NOT NULL,
    appointmentReason VARCHAR(500) NOT NULL,
    appointmentDate DATE NOT NULL,
    appointmentTime TIME NOT NULL,
    appointmentStatus INT CHECK (appointmentStatus IN (1, 0, -1)),
    FOREIGN KEY (dUserName) REFERENCES Doctors(dUserName) ON DELETE CASCADE,
    FOREIGN KEY (pUserName) REFERENCES Patients(pUserName) ON DELETE CASCADE
);


-- Admin table creation

CREATE TABLE cms.Admins (
    aUserName VARCHAR(50) NOT NULL PRIMARY KEY,
    ald INT AUTO_INCREMENT NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(160) NOT NULL
);

--Move the attribute aId at first
ALTER TABLE `admins` CHANGE `ald` `ald` INT(11) NOT NULL AUTO_INCREMENT FIRST;

--Insertion of the data in admin table
-- hash value of 1234 is $2y$10$nxEPUC4DcH4eq26vEi53T.zjcdNTOmPnqVTJTozJJhrzdO5KvrU.C
INSERT INTO admins (aUserName, ald, email, password)
VALUES ('admin', '1', 'admin.clinic@gmail.com', '$2y$10$nxEPUC4DcH4eq26vEi53T.zjcdNTOmPnqVTJTozJJhrzdO5KvrU.C');
