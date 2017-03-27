DROP VIEW modify_reservation;
DROP TABLE Discounts;
DROP TABLE Reservation;
DROP TABLE Room;
DROP TABLE RoomType;
DROP TABLE Stay;
DROP TABLE Client;
DROP TABLE Manager;
DROP TABLE Employee;

DROP SEQUENCE employee_sequence;
DROP SEQUENCE stay_sequence;
DROP SEQUENCE reservation_sequence;

CREATE TABLE Employee
	(eid INTEGER,
	salary INTEGER,
	name VARCHAR(40),
	PRIMARY KEY (eid));

CREATE SEQUENCE employee_sequence
START WITH 500
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER employee_trigger
  BEFORE INSERT ON EMPLOYEE
  FOR EACH ROW
   WHEN (new.eid IS NULL)
  BEGIN
   SELECT employee_sequence.nextval
   INTO :new.eid
   FROM dual;
  END;
  /

CREATE TABLE Manager
	(eid INTEGER,
	overrideCode INTEGER,
	PRIMARY KEY (eid),
FOREIGN KEY (eid) REFERENCES Employee
ON DELETE CASCADE);

CREATE TABLE Client
	(ccNum INTEGER,
	pNum VARCHAR(10),
	Name VARCHAR(40),
	PRIMARY KEY (ccNum),
	constraint cc_check CHECK (length(ccNum) = 16),
	constraint pnum_check CHECK (length(pNum) >=10));

CREATE TABLE RoomType
	(rType VARCHAR(40),
	bedType VARCHAR(40),
	numBeds INTEGER,
	rPrice INTEGER,
	PRIMARY KEY (rType));

CREATE TABLE Stay
	(stayId INTEGER,
	paymentType VARCHAR(40),
	isPaid  VARCHAR(1),
	totalCost INTEGER,
	checkinDate DATE,
	checkoutDate DATE,
	checkinTime VARCHAR(8),
	checkoutTime VARCHAR(8),
	checkinEid INTEGER NOT NULL,
	checkoutEid INTEGER,
	PRIMARY KEY (stayId),
	FOREIGN KEY (checkinEid) REFERENCES Employee (eid),
	FOREIGN KEY (checkoutEid) REFERENCES Employee (eid));

CREATE SEQUENCE stay_sequence
START WITH 500
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER stay_trigger
  BEFORE INSERT ON STAY
  FOR EACH ROW
   WHEN (new.stayid IS NULL)
  BEGIN
   SELECT stay_sequence.nextval
   INTO :new.stayid
   FROM dual;
  END;
  /

CREATE TABLE Room
	(rNum INTEGER,
	rType VARCHAR(40),
	PRIMARY KEY (rNum),
FOREIGN KEY (rType)
REFERENCES RoomType);

CREATE TABLE Reservation
	(confNo INTEGER,
	rNum INTEGER NOT NULL,
	ccNum INTEGER,
	fromDate DATE,
	toDate DATE,
	stayId INTEGER,
	PRIMARY KEY (confNo),
	FOREIGN KEY (rNum) REFERENCES Room,
	FOREIGN KEY (ccNum) REFERENCES Client
		ON DELETE CASCADE,
	FOREIGN KEY (stayId) REFERENCES Stay
		ON DELETE CASCADE,
	constraint date_check CHECK (fromDate < toDate));

CREATE SEQUENCE reservation_sequence
START WITH 500
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER reservation_trigger
  BEFORE INSERT ON RESERVATION
  FOR EACH ROW
   WHEN (new.confNo IS NULL)
  BEGIN
   SELECT reservation_sequence.nextval
   INTO :new.confNo
   FROM dual;
  END;
  /

CREATE TABLE Discounts
	(eid INTEGER,
	stayID INTEGER,
	amount INTEGER NOT NULL,
	PRIMARY KEY (eid, stayId),
	FOREIGN KEY (eid)
REFERENCES Employee
ON DELETE CASCADE,
	FOREIGN KEY (stayId)
REFERENCES Stay
ON DELETE CASCADE);

CREATE VIEW modify_reservation AS
SELECT c.name,c.ccnum,r.confno,r.fromdate,r.todate,c.pnum,rt.numbeds
from Reservation r inner join Client c on c.ccNum=r.ccNum
	inner join Room rm on r.rnum=rm.rnum
	inner join RoomType rt on rm.rtype=rt.rtype;

