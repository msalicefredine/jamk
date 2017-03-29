insert into employee values (1,60000,'Andrea');
insert into employee values (2,60000,'Bob');
insert into employee values (3,45000,'Clyde');
insert into employee values (4,50000,'Daniella');
insert into employee values (5,55000,'Karen');
insert into employee values (6,75000,'Lauren');
insert into employee values (7,80000,'Monica');
insert into employee values (8,64000,'Nathan');
insert into employee values (9,56000,'Otis');
insert into employee values (10,90000,'Peter');
insert into employee values (11,40000,'Quinn');
insert into employee values (12,90000,'Rachel');
insert into employee values (13,85000,'Sebastian');
insert into employee values (14,40000,'Trevor');
insert into employee values (15,65000,'Ursula');

insert into manager values (1,1);
insert into manager values (2,2);
insert into manager values (10,10);
insert into manager values (12,12);

insert into client values (4989907582686720,'6049413902','Forsythe');
insert into client values (4959838800592759,'7780964161','Georgia');
insert into client values (7826913623678846,'7781323698','Harrison');
insert into client values (1119174113759682,'7787489586','Iris');
insert into client values (3872447749286203,'7780201024','Vivian');
insert into client values (1694005478739191,'6045529300','Winona');
insert into client values (7942843977867974,'6042736472','Xander');
insert into client values (1530780613611425,'6047202350','Yolanda');
insert into client values (3886592480862634,'6042560842','Zakir');
insert into client values (1983871238118716,'6044859199','Archie');
insert into client values (1930098787904585,'6049201820','Betty');
insert into client values (4323974896890768,'2062330645','Cheryl');
insert into client values (6121338926447611,'2065615375','Danny');
insert into client values (4390261429185836,'7806902720','Erika');
insert into client values (6045614986952549,'7803002886','Forsythe');
insert into client values (3215647287542314,'7800340317','Gertrude');
insert into client values (1349693474168826,'2067409864','Hiram');
insert into client values (8246708693847125,'9495043803','Isabella');
insert into client values (7606523045420307,'9493269528','Jughead');
insert into client values (5442651079172545,'9495295417','Kevin');
insert into client values (8085048284303867,'4035837839','Lana');
insert into client values (1227351045289570,'4033662028','Melody');
insert into client values (6126807063796692,'4039849611','Nora');
insert into client values (7996676903756684,'4030132779','Ophelia');
insert into client values (4207757043993619,'4037436304','Polly');
insert into client values (3872931953962434,'7786485332','Quentin');
insert into client values (1504044092136631,'7787701670','Ronnie');
insert into client values (4215807674358893,'6043173329','Sophia');
insert into client values (8773701527287601,'2060952317','Tanya');
insert into client values (1117768195235324,'6045816714','Julia');

insert into roomtype values ('SINGLE','SINGLE',1,100);
insert into roomtype values ('SINGLE-2','SINGLE',2,110);
insert into roomtype values ('DOUBLE','DOUBLE',2,140);
insert into roomtype values ('QUEEN','QUEEN',2,180);
insert into roomtype values ('KING','KING',1,190);
insert into roomtype values ('DELUXE','KING',1,400);
insert into roomtype values ('DUMMY','NONE',0,0);

insert into stay values (1,'Credit','Y',240,'20110101','20110102','09:00PM','12:00PM',8,9);
insert into stay values (2,'Cash','Y',600,'20130101','20130102','09:00PM','12:00PM',1,1);
insert into stay values (3,'Cheque','Y',400,'20140101','20140102','09:00PM','12:00PM',1,1);
insert into stay values (4,'Credit','N',800,'20170501','20170607','06:00PM',NULL,1,NULL);
insert into stay values (5,'Credit','N',450,'20170331','20170413','05:00PM',NULL,1,NULL);
insert into stay values (6,'Credit','Y',450,'20160101','20160102','09:00PM','12:00PM',3,5);
insert into stay values (7,'Credit','Y',800,'20150405','20150410','03:00PM','11:30PM',4,7);
insert into stay values (8,'Credit','Y',360,'20160214','20160217','04:00PM','10:00AM',14,12);
insert into stay values (9,'Credit','Y',500,'20170101','20170110','07:00PM','9:45AM',11,5);
insert into stay values (10,'Credit','Y',1200,'20170305','20170323','08:00PM','11:45AM',1,14);
insert into stay values (11,'Credit','Y',850,'20170909','20171010','09:00PM','9:00AM',14,6);
insert into stay values (12,'Credit','Y',500,'20170101','20170115','09:00PM','11:30AM',1,2);
insert into stay values (13,'Credit','N',450,'20170328','20170410','09:00PM',NULL,1,NULL);
insert into stay values (14,'Credit','Y',450,'20170202','20170203','09:00PM','10:00AM',1,3);
insert into stay values (15,'Credit','N',450,'20170329','20170415','07:45PM',NULL,1,NULL);

insert into room values (100,'SINGLE');
insert into room values (102,'SINGLE');
insert into room values (103,'SINGLE');
insert into room values (104,'SINGLE');
insert into room values (105,'SINGLE');
insert into room values (106,'DOUBLE');
insert into room values (107,'DOUBLE');
insert into room values (108,'DOUBLE');
insert into room values (109,'DOUBLE');
insert into room values (110,'DOUBLE');
insert into room values	(111,'SINGLE-2');
insert into room values	(112,'SINGLE-2');
insert into room values	(113,'SINGLE-2');
insert into room values	(114,'SINGLE-2');
insert into room values	(115,'SINGLE-2');
insert into room values (200,'QUEEN');
insert into room values (201,'QUEEN');
insert into room values (202,'QUEEN');
insert into room values (203,'QUEEN');
insert into room values (204,'QUEEN');
insert into room values (205,'KING');
insert into room values (206,'KING');
insert into room values (207,'KING');
insert into room values (300,'DELUXE');
insert into room values (301,'DELUXE');


insert into reservation values (1,100,4989907582686720,'20110101','20110102',1);
insert into reservation values (2,205,4989907582686720,'20130101','20130102',2);
insert into reservation values (3,106,4989907582686720,'20140101','20140102',3);
insert into reservation values (4,111,4989907582686720,'20170501','20170607',4);
insert into reservation values (5,200,4989907582686720,'20170101','20170102',5);
insert into reservation values (6,300,4989907582686720,'20170101','20170102',6);
insert into reservation values (7,115,1694005478739191,'20150405','20150410',7);
insert into reservation values (8,107,6126807063796692,'20160214','20160217',8);
insert into reservation values (9,200,1227351045289570,'20170101','20170110',9);
insert into reservation values (10,202,1504044092136631,'20170305','20170323',10);
insert into reservation values (11,301,8773701527287601,'20170909','20171010',11);
insert into reservation values (12,203,1349693474168826,'20170101','20170115',12);
insert into reservation values (13,103,8773701527287601,'20170328','20170410',13);
insert into reservation values (14,108,1530780613611425,'20170202','20170203',14);
insert into reservation values (15,113,7942843977867974,'20170329','20170415',15);

insert into discounts values (1,1,10);
insert into discounts values (1,2,15);
insert into discounts values (2,3,5);
insert into discounts values (2,4,10);
insert into discounts values (10,7,25);
insert into discounts values (10,6,20);
insert into discounts values (10,15,10);
insert into discounts values (12,9,20);
insert into discounts values (12,13,5);

commit;