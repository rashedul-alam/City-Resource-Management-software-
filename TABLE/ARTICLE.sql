create table article(
userid int NOT NULL,
articleid int PRIMARY KEY,
article varchar2(250 char) NOT NULL,
tourlocationid int NOT NULL,
posteddate date NOT NULL,
varify varchar2(50 char) NOT NULL
);

CREATE SEQUENCE seq_articleid
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 1000; 

INSERT INTO ARTICLE(userid,articleid,article,tourlocationid,posteddate,varify)
    VALUES (3001,seq_articleid.nextval,'Bisanakandi is the best place to visit',1,'25-AUG-2018','no');