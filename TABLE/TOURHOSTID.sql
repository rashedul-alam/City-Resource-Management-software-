create table tourhostid(
  tourid int PRIMARY KEY,
  hostid int NOT NULL,
  budget int NOT NULL,
  gender varchar2(50 char) NOT NULL,
  team varchar2(50 char) NOT NULL,
  maxage int NOT NULL,
  minage int NOT NULL,
  maxpeople int NOT NULL,
  minpeople int NOT NULL,
  peoplecount int DEFAULT 0,
  startdate date NOT NULL,
  enddate date NOT NULL,
  posteddate date NOT NULL,
  tourplan varchar2(250 char) NOT NULL
);

CREATE SEQUENCE seq_tourid
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 1000; 

INSERT INTO TOURHOSTID(tourid,hostid,budget,gender,team,maxage,minage,maxpeople,minpeople,peoplecount,startdate,enddate,posteddate,tourplan)
    VALUES (seq_tourid.nextval,3001,5000,'mixed','family',70,18,30,10,0,'30-AUG-2018','05-SEP-2018','27-AUG-2018','There is no tour plan');