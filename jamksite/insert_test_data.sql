insert into employee values (1,60000,'Andrea');
insert into employee values (2,60000,'Bob');
insert into employee values (3,45000,'Clyde');
insert into employee values (4,50000,'Daniella');
insert into employee values (5,55000,'Eric');

insert into manager values (1,1);
insert into manager values (2,2);

insert into client values (4444444444444444,'6041234567','Forsythe');
insert into client values (4444444444444443,'7781234567','Georgia');
insert into client values (4444444444444442,'7784567123','Harrison');
insert into client values (4444444444444441,'7784567123','Iris');
insert into client values (4444444444444440,'7785671234','Julia');

insert into roomtype values ('SINGLE','SINGLE',1,100);
insert into roomtype values ('SINGLE-2','SINGLE',2,110);
insert into roomtype values ('DOUBLE','DOUBLE',2,140);
insert into roomtype values ('QUEEN','QUEEN',2,180);
insert into roomtype values ('KING','KING',1,190);
insert into roomtype values ('DUMMY','NONE',0,0);

insert into stay values (1,'Credit','Y',240,'20110101','20110102','09:00PM','12:00PM',1,1);
insert into stay values (2,'Cash','Y',600,'20130101','20130102','09:00PM','12:00PM',1,1);
insert into stay values (3,'Cheque','Y',400,'20140101','20140102','09:00PM','12:00PM',1,1);
insert into stay values (4,'Credit','N',800,'20170501','20170607','09:00PM',NULL,1,NULL);
insert into stay values (5,'Credit','N',450,'20170101','20170102','09:00PM',NULL,1,NULL);

insert into room values (100,'SINGLE');
insert into room values (101,'SINGLE');
insert into room values (102,'DOUBLE');
insert into room values	(103,'SINGLE-2');
insert into room values (104,'QUEEN');
insert into room values (200,'KING');

insert into reservation values (1,100,4444444444444444,'20110101','20110102',1);
insert into reservation values (2,102,4444444444444444,'20130101','20130102',2);
insert into reservation values (3,103,4444444444444444,'20140101','20140102',3);
insert into reservation values (4,104,4444444444444444,'20170501','20170607',4);
insert into reservation values (5,200,4444444444444444,'20170101','20170102',5);

insert into discounts values (1,1,10);
insert into discounts values (1,2,15);
insert into discounts values (2,3,5);
insert into discounts values (2,4,10);