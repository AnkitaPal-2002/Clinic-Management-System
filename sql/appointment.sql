CREATE TABLE cms.Appointments (
    appointmentId INT NOT NULL PRIMARY KEY,
    dUserName VARCHAR(50) NOT NULL,
    pUserName VARCHAR(50) NOT NULL,
    appointmentReason VARCHAR(50) NOT NULL,
    appointmentDate TIMESTAMP,
    appointmentTime TIMESTAMP,
    appointmentStatus INT CHECK (appointmentStatus IN (1, 0, -1)),
    FOREIGN KEY (dUserName) REFERENCES Doctors(dUserName),
    FOREIGN KEY (pUserName) REFERENCES Patients(pUserName)
);
