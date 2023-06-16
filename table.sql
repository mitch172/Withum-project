CREATE TABLE newHires (
	ID int NOT NULL auto_increment PRIMARY KEY,
	start DATE,
	name varchar(50) NOT NULL,
	nickname varchar(50) NOT NULL,
	title varchar(50) NOT NULL,
	location varchar(30) NOT NULL,
	computer varchar(30) NOT NULL,
	status varchar(20),
	serial varchar(20),
	asset varchar(10),
	tech varchar(2),
	qc varchar(2),
)

CREATE TABLE upgrades (
	ID int NOT NULL auto_increment PRIMARY KEY,
	start DATE,
	name varchar(50) NOT NULL,
	location varchar(30) NOT NULL,
	buildLocation varchar(30) NOT NULL,
	computer varchar(30) NOT NULL,
	windows varchar(2) NOT NULL,
	status varchar(20),
	serial varchar(20),
	asset varchar(10),
	tech varchar(2),
	qc varchar(2),
)