INSERT INTO `Education` (`StudentID`, `StartDate`, `EndDate`, `Program`, `UGProgram`) VALUES 
('00000001', '2017-02-08', '2017-06-24', 'MPH', 'Computer Science'), 
('00000002', '2017-02-17', '2017-11-11', 'Phd', 'Arts and Science');

INSERT INTO `Funding` (`Amount`, `Source`, `StudentID`) VALUES 
('1000', 'Microsoft', '00000001'), 
('2000', 'Google', '00000002');

INSERT INTO `Future` (`Employment`, `FurtherStudies`, `StudentID`) VALUES 
('Honeybun development', NULL, '00000001'), 
(NULL, 'Napkin Optimization', '00000002');

INSERT INTO `Organization` (`OrganizationName`, `OrganizationID`, `StreetNameNumber`, `City`, `Province`, `Country`, `ZipPostalCode`) VALUES 
('Macrosoft', '001', '123 sesame st', 'Cornwall', 'Ontario', 'Canada', 'a1b2c3'), 
('Hoogle', '001', '1 Bluejays way', 'Toronto', 'Ontario', 'Canada', 'l3n4k3');

INSERT INTO `Practicum` (`ProjectTitle`, `OrganizationID`, `Paid`, `Description`, `PreceptorName`, `Contact`, `StudentID`, `DominantCompetencyCategory`, `AppliedProgramArea1`, `AppliedProgramArea2`, `AppliedProgramArea3`, `Population`, `Task1`, `Task2`, `Task3`, `Role`) VALUES 
('Honey Bun Analysis', '001', '1', 'Looked at the quality of honey buns', 'Alex Adesei', 'Mr. Tam', '00000001', 'Food Analysis', 'Quality Assurance', 'Foodie Test', 'Yum Factor', '???', 'Fish', 'Frog', 'Sheep', 'Taster'), 
('Napkin Developer', '002', '0', 'Testing the strength of napkins', 'Enoch Tam', 'Mr. Karson', '00000002', 'Testing', 'Froggy', 'Tigers', 'Giants', 'Rawr', 'pooop', 'lele', 'memes production', 'meme gens');

INSERT INTO `PracticumMSC` (`Facility`, `StudentEval`, `StudentID`) VALUES ('Engineering', 'IT was pretty good', '00000001'), ('meme making', 'meh it was trash', '00000002');

INSERT INTO `Student` (`StudentID`, `FName`, `LName`, `GraduatingYear`, `CurrentEmployer`, `CurrentJobTitle`, `QueensEmail`, `OtherEmail`, `OpenComments`, `Program`) VALUES
 ('00000001', 'Rayo', 'Chung', '2018', 'RBC', 'Banker', 'rayo@queensu.ca', 'rayo@hotmail.com', 'i love the bank', 'computer science'), 
('00000002', 'Enoch', 'Tam', '2017', 'Nest', 'Android Developer', 'enoch@queensu.ca', 'etam@gmail.com', 'i love the surface book', 'train science');