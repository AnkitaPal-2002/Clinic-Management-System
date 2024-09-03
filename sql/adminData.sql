ALTER TABLE `cms`.`admins` CHANGE `ald` `ald` INT(11) NOT NULL AUTO_INCREMENT FIRST;

-- hash value of 1234 is $2y$10$nxEPUC4DcH4eq26vEi53T.zjcdNTOmPnqVTJTozJJhrzdO5KvrU.C
INSERT INTO cms.admins (aUserName, ald, email, password)
VALUES ('admin', '1', 'admin.clinic@gmail.com', '$2y$10$nxEPUC4DcH4eq26vEi53T.zjcdNTOmPnqVTJTozJJhrzdO5KvrU.C');