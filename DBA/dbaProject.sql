
--PROJECT SCHEMA

--schema

CREATE TABLE Student (
    StudentID INT PRIMARY KEY,
    Name VARCHAR(100),
    Address VARCHAR(255),
    Contact VARCHAR(15),
    Gender CHAR(1),
    DateOfBirth DATE
);

drop table Student;

CREATE TABLE Course (
    CourseID INT PRIMARY KEY,
    Name VARCHAR(100)
);

drop table Course;

CREATE TABLE Enrollment (
    EnrollmentID INT PRIMARY KEY,
    StudentID INT,
    FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
    CourseID INT,
    Semester VARCHAR(10),
    Years INT,
    FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
);

drop table Enrollment;

drop table Fee;
CREATE TABLE Fee (
    FeeID INT PRIMARY KEY,
    StudentID INT,
    EnrollmentID INT,
    Amount DECIMAL(10, 2),
    Date DATE,
    DueDate DATE,
    Penalty DECIMAL(10, 2),
    FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
    FOREIGN KEY (EnrollmentID) REFERENCES Enrollment(EnrollmentID)
);

drop table Assessment;

CREATE TABLE Assessment (
    AssessmentID INT PRIMARY KEY,
    CourseID INT,
    Name VARCHAR(100),
    Weightage INT,
    FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
);

-- Inserting into student table--
INSERT INTO Student (StudentID, Name, Address, Contact, Gender, DateOfBirth)
VALUES 
('2021', 'John Doe', '123 Main St, Lahore', '+923001234567', 'M', '2000-01-01'),
('2022', 'Jane Smith', '456 Elm St, Karachi', '+923009876543', 'F', '2000-02-02'),
('2023', 'Ahmed Khan', '789 Pine St, Islamabad', '+923004321098', 'M', '2000-03-03'),
('2024', 'Sara Ali', '321 Oak St, Multan', '+923007654321', 'F', '2000-04-04'),
('2025', 'Muhammad Ali', '654 Maple St, Faisalabad', '+923002109876', 'M', '2000-05-05');
select * from Student ;

 


-- Inserting into Course table
INSERT INTO Course (CourseID, Name)
VALUES 
(1, 'Computer Science'),
(2, 'Physics'),
(3, 'Chemistry'),
(4, 'Biology'),
(5, 'Mathematics');
select * from Course;

 




-- Inserting into Enrollment table with soft delete flag
INSERT INTO Enrollment (EnrollmentID, StudentID, CourseID, Semester, Years)
VALUES 
(1, 2021, 1, 'Fall', 2024),
(2, 2022, 2, 'Spring', 2024),
(3, 2023, 3, 'Fall', 2024),
(4, 2024, 4, 'Spring', 2024),
(5, 2025, 5, 'Fall', 2024);
select * from Enrollment;

 


-- Inserting into Fee table
INSERT INTO Fee (FeeID, StudentID, EnrollmentID, Amount, Date, DueDate, Penalty)
VALUES 
(1, '2021', 1, 10000.00, '2024-01-01', '2024-02-01', 1000.00),
(2, '2022', 2, 50000.00, '2024-02-02', '2024-03-02', 5000.00),
(3, '2023', 3, 30000.00, '2024-03-03', '2024-04-03', 3000.00),
(4, '2024', 4, 80000.00, '2024-04-04', '2024-05-04', 6000.00),
(5, '2025', 5, 50000.00, '2024-05-05', '2024-06-05', 5000.00);
select * from Fee;

 


-- Inserting into Assessment table
INSERT INTO Assessment (AssessmentID, CourseID, Name, Weightage)
VALUES 
(101, 1, 'Midterm Exam', 50),
(102, 2, 'Final Exam', 50),
(103, 3, 'Project', 30),
(104, 4, 'Quiz', 20),
(105, 5, 'Assignment', 10);

select * from Assessment;





 

--Store Procedures

/* creating stored procedures that will show
enrolled course and student id */
create procedure colldata
as 
begin
select 
enrollment.studentid,Student.Name,Enrollment.CourseID,Course.Name
from Enrollment
inner join
student on Enrollment.StudentID=student.StudentID
inner join
course on enrollment.CourseID=Course.CourseID
end
 

exec colldata
 

/*Creating stored procedure that will show the courses
with student id can find the course thorugh giving 
specific student ID*/

CREATE PROCEDURE EnrolledCourses
    @StudentID INT
AS
BEGIN
    SELECT
        Enrollment.StudentID,
        Student.Name AS StudentName,
        Enrollment.CourseID,
        Course.Name AS CourseName
    FROM
        Enrollment
    INNER JOIN
        Student ON Enrollment.StudentID = Student.StudentID
    INNER JOIN
        Course ON Enrollment.CourseID = Course.CourseID
    WHERE
        Enrollment.StudentID = @StudentID;
END;
 

EXEC EnrolledCourses @StudentID = 2023;
 

/*all Data of enrollment table*/
create procedure ALLDATA
as
begin
select *from Enrollment
end
 

exec ALLDATA
 

Views

create view studentData
as
select Student.StudentID,Student.Name,Enrollment.CourseID,Enrollment.Semester from 

Student join Enrollment on Student.StudentID=Enrollment.StudentID

 

select * from studentData
 

alter view studentData
as
select Student.StudentID,Student.Name,Enrollment.CourseID,Enrollment.Semester, Enrollment.Year from
Student join Enrollment on Student.StudentID=Enrollment.StudentID 
 

select * from studentData
 
create view CO_AS
with schemabinding 
as
select Assessment.Weightage from 
dbo.Assessment join dbo.Course on Assessment.CourseID=Course.CourseID
 

select * from CO_AS
 

--Indexes

create nonclustered index IX_tblEnrollment_Semester
on Enrollment(Semester)
 

/*Finding the id of COURSE using clustered index*/
create clustered index IX_Course_ID
on Course(CourseID);
 


Removing The Error 
/*Finding the id of COURSE using clustered index*/
create clustered index IX_Course_ID
on Course(CourseID);
 

 

create unique index UIX_tblStudent_StudentID_Name
on Student(StudentID,Name)
 



/* Creating unique index */

create unique nonclustered index IX_CS_ID
on Course( CourseID);
 



INSERT INTO Course (CourseID, Name)
VALUES 
(3, 'Chemistry')

 
INSERT INTO Course (CourseID, Name)
VALUES 
(7, 'Chemistry')

 




--DML TRIGGERS
--WITH THE CONCEPT OF SOFT DELETE

-- Usage of DML Triggers (as per your project idea) for maintaining the integrity of the
--information on the database.

drop trigger studentDuplicateID;

CREATE TRIGGER studentDuplicateID
ON Student
INSTEAD OF INSERT 
AS
BEGIN
    DECLARE @existingCount INT;

    SELECT @existingCount = COUNT(*)
    FROM Student
    WHERE StudentID IN (SELECT StudentID FROM INSERTED);

    IF @existingCount > 1 
    BEGIN
        THROW 50000, 'Duplicate StudentID. Cannot insert.', 1;
    END
END;


-- to check the trigger activity Inserting some duplicate data into student table
INSERT INTO Student (StudentID, Name, Address, Contact, Gender, DateOfBirth)
VALUES 
('2021', 'New Student', '789 New St, Karachi', '+923005678901', 'F', '2000-07-07');

select * from Student;

 

drop trigger StudentAuditTrail;
--student audit detials
CREATE TRIGGER StudentAuditTrail
ON Student
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    INSERT INTO StudentAudit (ActionType, StudentID, Name, ModifiedDate)
    SELECT
        CASE
            WHEN EXISTS (SELECT * FROM INSERTED) AND EXISTS (SELECT * FROM DELETED) THEN 'Update'
            WHEN EXISTS (SELECT * FROM INSERTED) THEN 'Insert'
            WHEN EXISTS (SELECT * FROM DELETED) THEN 'Delete'
        END,
        COALESCE(i.StudentID, d.StudentID),
        COALESCE(i.Name, d.Name),
        GETDATE()
    FROM INSERTED i
    FULL OUTER JOIN DELETED d ON i.StudentID = d.StudentID;
END;

create table StudentAudit(
 ActionType varchar(255),
 StudentID int ,
 FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
 Name varchar(255),
 ModifiedDate varchar(255)
);

drop table StudentAudit;

select * from StudentAudit;

-- Insert a new student
INSERT INTO Student (StudentID, Name, Address, Contact, Gender, DateOfBirth)
VALUES ('2026', 'New Student', '123 Test St', '+1234567890', 'M', '2000-01-01');

 

-- Update an existing student
UPDATE Student
SET Name = 'Updated Student'
WHERE StudentID = '2026';

-- Delete a student
DELETE FROM Student
WHERE StudentID = '2026';

--soft delete


CREATE TABLE softDeleteStudent (
    StudentID INT PRIMARY KEY,
    Name VARCHAR(100),
    Address VARCHAR(255),
    Contact VARCHAR(15),
    Gender CHAR(1),
    DateOfBirth DATE
);

-- Create a trigger for soft delete
CREATE TRIGGER SoftDeleteStudentTrigger
ON Student
INSTEAD OF DELETE
AS
BEGIN
    -- Insert the deleted records into the clone table
    INSERT INTO softDeleteStudent
    SELECT * FROM deleted;

    DELETE FROM Student
    WHERE StudentID IN (SELECT StudentID FROM deleted);
END;
-- Delete a record from the Student table (soft delete)
DELETE FROM Student
WHERE StudentID = '2021';
select * from softDeleteStudent;
 

