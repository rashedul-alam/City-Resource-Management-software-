create table account(
id int,
email varchar2(50 char) PRIMARY KEY,
name varchar2(50 char) NOT NULL,
password varchar2(50 char) NOT NULL,
address varchar2(50 char) NOT NULL,
avatar varchar2(50 char),
gender varchar2(50 char) NOT NULL,
dob date NOT NULL,
phoneno varchar2(50 char) NOT NULL,
type varchar2(50 char) NOT NULL
)

CREATE SEQUENCE seq_accountid
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 1000; 

INSERT INTO ACCOUNT(id,email,name,password,address,gender,dob,phoneno,type)
VALUES (seq_accountid.nextval,'ehtesham@gmail.com','Ehtesham','eht','Satkhira','Male','01-AUG-1996','01711167333','traveler'); 