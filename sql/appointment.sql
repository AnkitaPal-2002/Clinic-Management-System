CREATE TABLE cms.Appointments (
    appointmentId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    dUserName VARCHAR(50) NOT NULL,
    pUserName VARCHAR(50) NOT NULL,
    appointmentReason VARCHAR(500) NOT NULL,
    appointmentDate DATE NOT NULL,
    appointmentTime TIME NOT NULL,
    appointmentStatus INT CHECK (appointmentStatus IN (1, 0, -1)),
    FOREIGN KEY (dUserName) REFERENCES Doctors(dUserName) ON DELETE CASCADE,
    FOREIGN KEY (pUserName) REFERENCES Patients(pUserName) ON DELETE CASCADE
);
