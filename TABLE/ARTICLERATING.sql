create table articlerating(
articleid int NOT NULL,
commentersid int NOT NULL,
comments varchar2(250 char) NOT NULL,
commentdate date NOT NULL
);

INSERT INTO ARTICLERATING(articleid,commentersid,comments,commentdate)
    VALUES (1,3001,'You are wrong','25-AUG-2018');