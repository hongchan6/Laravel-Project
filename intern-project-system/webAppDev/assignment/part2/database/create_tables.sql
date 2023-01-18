drop table if exists PROJECT;
drop table if exists STUDENT;
drop table if exists APPLICATION;
drop table if exists PROJECTASSIGNMENT;


create table PROJECT (    
    projectID integer not null primary key autoincrement,    
    projectTitle varchar(15) not null,
    description TEXT not null,  
    comName varchar(30) not null,
    location varchar(20) not null,
    major varchar(30) not null,
    numOfStudentRequired integer default 0,
	numOfApplicant integer default 0,
	numOfAvailableSlot integer default 0
);


create table STUDENT (    
    studentID integer not null primary key autoincrement,
    firstName varchar(20) not null,
    lastName varchar(20) not null,
	numOfApplication integer default 0
);

create table APPLICATION (
    applicationID integer not null primary key autoincrement,  
    studentID integer not null REFERENCES STUDENT(studentID),
    projectID integer not null REFERENCES PROJECT(projectID),
	justification TEXT not null,
	preference integer not null
);

create table PROJECTASSIGNMENT (
    pjAssignmentID integer not null primary key autoincrement,  
    projectID integer not null REFERENCES PROJECT(projectID),
	applicationID integer not null REFERENCES APPLICATION(applicationID)
);

INSERT INTO PROJECT(projectID, projectTitle, description, comName, location, major, numOfStudentRequired, numOfApplicant, numOfAvailableSlot) VALUES
	('1001', 'Project 01', 'TBC','Apple Co', 'Gold Coast', 'Data Analytics', 5, 4, 1),
	('1002', 'Project 02', 'TBC','Cherry Co','Gold Coast', 'Software Development and Support', 3, 3, 0),
	('1003', 'Project 03', 'TBC','Banana Co','Logan', 'Network and Security', 3, 1, 2),
	('1004', 'Project 04', 'TBC','Apple Co','Brisbane', 'Network and Security', 5, 2, 3),
	('1005', 'Project 05', 'TBC','Kiwi Co','Gold Coast', 'Data Analytics', 6, 0, 6),
	('1006', 'Project 06', 'TBC','Kiwi Co', 'Brisbane','Data Analytics', 7, 0, 7),
	('1007', 'Project 07', 'TBC','Banana Co', 'Brisbane','Software Development and Support', 3, 0, 3),
	('1008', 'Project 08', 'TBC','Apple Co', 'Brisbane','Network and Security', 3, 0, 3),
	('1009', 'Project 09', 'TBC','Apple Co', 'Gold Coast','Network and Security', 8, 0, 8),
	('1010', 'Project 10', 'TBC','Kiwi Co','Gold Coast', 'Data Analytics', 4, 0, 4);

INSERT INTO STUDENT(studentID, firstName, LastName, numOfApplication) VALUES
	('1', 'John','Smith', 3),
	('2', 'Adam','Islam', 2),
	('3', 'Gemma','Rose', 2),
	('4', 'Angela','Koo', 2),
	('5', 'David','Bean', 1);

INSERT INTO APPLICATION(applicationID, studentID, projectID, justification, preference) VALUES
	('1', '1', '1001','1 hello hello hello hello','1'),
	('2', '2', '1001','2 hello hello hello hello','1'),
	('3', '3', '1001','3 hello hello hello hello','1'),
	('4', '4', '1002','4 hello hello hello hello','1'),
	('5', '5', '1002','5 hello hello hello hello','1'),
	('6', '1', '1002','6 hello hello hello hello','2'),
	('7', '1', '1003','7 hello hello hello hello','3'),
	('8', '4', '1001','8 hello hello hello hello','1'),
	('9', '3', '1004','9 hello hello hello hello','2'),
	('10', '2', '1004','10 hello hello hello hello','2');

INSERT INTO PROJECTASSIGNMENT(pjAssignmentID, projectID, applicationID) VALUES
	('1', '1001','1'),
	('2', '1001','2'),
	('3', '1001','3'),
	('4', '1002','4'),
	('5', '1002','5'),
	('6', '1001','8'),
	('7', '1002','6'),
	('8', '1003','7'),
	('9', '1004','9'),
	('10', '1004','10');