create table TOURLOCATIONBYAREA(
id int PRIMARY KEY,
name varchar2(50 char) NOT NULL,
division varchar2(50 char) NOT NULL,
district varchar2(50 char) NOT NULL,
placetype varchar2(50 char) NOT NULL,
safety varchar2(50 char) NOT NULL,
Accomodation varchar2(50 char) NOT NULL,
travelvia varchar2(50 char) NOT NULL,
Recommendation varchar2(250 char)
)

CREATE SEQUENCE seq_id
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 1000; 


INSERT INTO TOURLOCATIONBYAREA
VALUES (seq_id.nextval,'JAFLONG','SYLHET','SYLHET','HILL,LAKE,WATERFALL','SAFE','HOTEL,MOTEL','BUS,AIR','GO TO HELL'); 
commit
