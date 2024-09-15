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

ALTER TABLE `doctors` CHANGE `doctorContacts` `doctorContacts` BIGINT(11) NULL DEFAULT NULL;

-- set 1

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('anesthesiologist_01', 'Dr. John Doe', 'Anesthesiologists', 9876543210, 'john.anesthesiologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 500, 15, 'Expert in providing pain relief and monitoring patients during surgery.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('cardiologist_01', 'Dr. Jane Smith', 'Cardiologists', 9876543220, 'jane.cardiologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 700, 20, 'Specialist in diagnosing and treating heart diseases.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('colon_surgeon_01', 'Dr. Robert Brown', 'Colon and Rectal Surgeons', 9876543230, 'robert.colon@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 800, 10, 'Expert in treating disorders of the colon, rectum, and anus.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('critical_care_01', 'Dr. Susan Lee', 'Critical Care Medicine Specialists', 9876543240, 'susan.criticalcare@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 900, 18, 'Provides advanced care for life-threatening conditions.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('dermatologist_01', 'Dr. Emily White', 'Dermatologists', 9876543250, 'emily.dermatologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 600, 12, 'Diagnoses and treats skin conditions.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('endocrinologist_01', 'Dr. Michael Green', 'Endocrinologists', 9876543260, 'michael.endocrinologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 650, 17, 'Specializes in hormone-related diseases.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('emergency_medicine_01', 'Dr. Linda Harris', 'Emergency Medicine Specialists', 9876543270, 'linda.emergency@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 550, 14, 'Provides urgent care for acute illnesses and injuries.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('gastroenterologist_01', 'Dr. Paul King', 'Gastroenterologists', 9876543280, 'paul.gastro@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 700, 16, 'Specializes in digestive system disorders.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('geriatric_medicine_01', 'Dr. Sarah Baker', 'Geriatric Medicine Specialists', 9876543290, 'sarah.geriatric@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 600, 19, 'Focuses on elderly patient care.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('hematologist_01', 'Dr. Peter Clark', 'Hematologists', 9876543300, 'peter.hematologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 800, 22, 'Specialist in diagnosing and treating blood disorders.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('nephrologist_01', 'Dr. Lisa Davis', 'Nephrologists', 9876543310, 'lisa.nephrologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 700, 13, 'Treats diseases related to the kidneys.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('neurologist_01', 'Dr. Andrew Martin', 'Neurologists', 9876543320, 'andrew.neurologist@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 750, 18, 'Specializes in treating disorders of the nervous system.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('obstetrician_gynecologist_01', 'Dr. Maria Wilson', 'Obstetricians and Gynecologists', 9876543330, 'maria.obgyn@example.com', '$2y$10$vOWFFOkE35RBTGoF9Qv9je.ASCiuUtxk4XUbJZRTwcpY911BG1Sa.', 650, 20, "Provides care related to women\'s reproductive health.");

-- set 2

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('anesthesiologist_02', 'Dr. Julia Roberts', 'Anesthesiologists', 9876543401, 'julia.anesthesiologist@example.com', '$2y$10$XzTjKMK1YeLhuF4I3vH30.KFSoJ6z5sbAoF6TxShZbP/2bGQBl3D6', 550, 16, 'Experienced in administering anesthesia and managing pain during procedures.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('cardiologist_02', 'Dr. Thomas Green', 'Cardiologists', 9876543410, 'thomas.cardiologist@example.com', '$2y$10$k8KvBcv2ndBHQkFCt4J02.kZvSZ9e2fESd3G0AeBrYjzrxOogDRC', 720, 21, 'Expert in cardiovascular diseases and patient heart health.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('colon_surgeon_02', 'Dr. Laura Smith', 'Colon and Rectal Surgeons', 9876543420, 'laura.colonsurgeon@example.com', '$2y$10$HkD0vlpGJBrsR22.7xiXv.6OdhBHz1PHDByOzoWfZyFJq.7V1I5c.', 820, 12, 'Specializes in surgical treatments for colorectal conditions.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('critical_care_02', 'Dr. Daniel Scott', 'Critical Care Medicine Specialists', 9876543430, 'daniel.criticalcare@example.com', '$2y$10$GrFgIkRaqDpMIRoQ9KhcR.8PqXjc7BFsk8fM.V9Y0GzZI0J8Czi0', 930, 19, 'Provides intensive care and management for critical health conditions.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('dermatologist_02', 'Dr. Nicole Adams', 'Dermatologists', 9876543440, 'nicole.dermatologist@example.com', '$2y$10$A9BhlG5kkPp/b/xkUz6H5.Hr3ZkF/UYslq2G/90c1ZT7fU3hVxPC', 620, 14, 'Expert in skin conditions and dermatological treatments.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('endocrinologist_02', 'Dr. Richard Davis', 'Endocrinologists', 9876543450, 'richard.endocrinologist@example.com', '$2y$10$Dw2PzFbCm4JzU1yCSv0z3.nVvDdMkJQ4zO2/v8T1OeyDLOiV6I12', 670, 18, 'Specializes in endocrine disorders including diabetes and thyroid issues.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('emergency_medicine_02', 'Dr. Karen Wilson', 'Emergency Medicine Specialists', 9876543460, 'karen.emergency@example.com', '$2y$10$kDe2ryVLRW8Iwt4qoxXZpOXcqSDA0mSm1KpU1TWWdNn27uvk4HVe', 580, 15, 'Provides emergency care and stabilizes patients in urgent situations.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('gastroenterologist_02', 'Dr. Brian Jones', 'Gastroenterologists', 9876543470, 'brian.gastroenterologist@example.com', '$2y$10$Ea7E1mIsAT9PQdWxL8oE6OiSYH7GpRrsJ5dAdxufJ.4t64nT69Ta', 710, 17, 'Specializes in diagnosing and treating digestive disorders.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('geriatric_medicine_02', 'Dr. Emily Thompson', 'Geriatric Medicine Specialists', 9876543480, 'emily.geriatricmedicine@example.com', '$2y$10$Dp1x71Z0hJeB1hMPqTvlO.fj6Gx9Sgqz8nIr5J2g/J56kFcP7J66', 610, 20, 'Expert in elderly patient care and age-related health issues.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('hematologist_02', 'Dr. James Carter', 'Hematologists', 9876543490, 'james.hematologist@example.com', '$2y$10$LxhT1pmwAYjlsmBZn4PZQ.JTUkC2Fz6dNlMz5Zi1TI90xE9h21e6i', 820, 23, 'Specializes in blood disorders including anemia and leukemia.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('nephrologist_02', 'Dr. Olivia Martinez', 'Nephrologists', 9876543500, 'olivia.nephrologist@example.com', '$2y$10$HVX8Zk66Rxiv8N7wxlQ8YeUjqCFGvZ5eiCh8LrVHKzyVY2Leomq0', 710, 14, 'Focuses on kidney diseases and treatments.');

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('neurologist_02', 'Dr. Benjamin Lewis', 'Neurologists', 9876543510, 'benjamin.neurologist@example.com', '$2y$10$hDpTkMnH1a1HQiUVgIoJbOepR2ElA9mgkO5HqCrLgGG6B5a8r34Cm', 770, 19, "Specializes in nervous system disorders including epilepsy and Parkinson\'s disease.");

INSERT INTO cms.Doctors (dUserName, doctorName, doctorSpecialist, doctorContacts, doctorEmail, doctorPassword, doctorFess, doctorExperience, doctorDescription)
VALUES 
('obstetrician_gynecologist_02', 'Dr. Natalie Lee', 'Obstetricians and Gynecologists', 9876543520, 'natalie.obgyn@example.com', '$2y$10$R9MiQZwIsAuZ1niBFf8xu.iKDpAHzvF2NpUXxKvOx5YwMtQ9K1L7W', 670, 21, "Provides comprehensive care related to women\'s health, including reproductive and gynecological care.");

-- Set all password to 1234
UPDATE doctors SET doctorPassword = '$2y$10$yhwfDDdm0KJjDsEdXvyF/edKNutvFKdOhW753WBOxYPLXhW93ogQG';