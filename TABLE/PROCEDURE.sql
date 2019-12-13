/*insertarticle*/
CREATE OR REPLACE PROCEDURE insertarticle(p_userid ARTICLE.USERID%TYPE,p_article ARTICLE.ARTICLE%TYPE,p_tourlocationid ARTICLE.TOURLOCATIONID%TYPE,p_varify ARTICLE.VARIFY%TYPE) AS
BEGIN
     INSERT INTO ARTICLE(userid,articleid,article,tourlocationid,posteddate,varify)
        VALUES(p_userid,seq_articleid.nextval,p_article,p_tourlocationid,sysdate,p_varify);
END;


/*inserttourhost*/
CREATE OR REPLACE PROCEDURE inserttourhost(p_hostid TOURHOSTID.HOSTID%TYPE,p_budget TOURHOSTID.BUDGET%TYPE,p_gender TOURHOSTID.GENDER%TYPE,p_team TOURHOSTID.TEAM%TYPE,p_maxage TOURHOSTID.MAXAGE%TYPE,p_minage TOURHOSTID.MINAGE%TYPE,p_maxpeople TOURHOSTID.MAXPEOPLE%TYPE,p_minpeople TOURHOSTID.MINPEOPLE%TYPE,p_peoplecount TOURHOSTID.PEOPLECOUNT%TYPE,p_startdate TOURHOSTID.STARTDATE%TYPE,p_enddate TOURHOSTID.ENDDATE%TYPE,p_tourplan TOURHOSTID.TOURPLAN%TYPE,p_place TOURHOSTPLACE.PLACEID%TYPE,p_placetwo TOURHOSTPLACE.PLACEID%TYPE) AS
BEGIN
    INSERT INTO TOURHOSTID(TOURID,HOSTID,BUDGET,GENDER,TEAM,MAXAGE,MINAGE,MAXPEOPLE,MINPEOPLE,PEOPLECOUNT,STARTDATE,ENDDATE,POSTEDDATE,TOURPLAN) 
        VALUES (seq_tourid.nextval,p_hostid,p_budget,p_gender,p_team,p_maxage,p_minage,p_maxpeople,p_minpeople,p_peoplecount,p_startdate,p_enddate,sysdate,p_tourplan);
    INSERT into TOURHOSTPLACE(TOURID,PLACEID)
        VALUES(seq_tourid.currval,p_place);
    INSERT into TOURHOSTPLACE(TOURID,PLACEID)
        VALUES(seq_tourid.currval,p_placetwo);    
END;  


/*selectaccount*/
CREATE OR REPLACE PROCEDURE selectaccount(p_id ACCOUNT.ID%TYPE,p_email out ACCOUNT.EMAIL%TYPE,p_name out ACCOUNT.NAME%TYPE,p_address out ACCOUNT.ADDRESS%TYPE,p_gender out ACCOUNT.GENDER%TYPE,p_dob out ACCOUNT.DOB%TYPE,p_phoneno out ACCOUNT.PHONENO%TYPE,p_type out ACCOUNT.TYPE%TYPE)AS
BEGIN
    select email,name,address,gender,dob,phoneno,type into p_email,p_name,p_address,p_gender,p_dob,p_phoneno,p_type from ACCOUNT where id=p_id;
END;


/*updatearticle*/
CREATE OR REPLACE PROCEDURE updatearticle(p_article ARTICLE.ARTICLE%TYPE,p_articleid ARTICLE.ARTICLEID%TYPE) AS
BEGIN
    UPDATE ARTICLE SET article=p_article,posteddate=sysdate WHERE articleid=p_articleid;
END;

/*inserttourhostone*/
CREATE OR REPLACE PROCEDURE inserttourhostone(p_hostid TOURHOSTID.HOSTID%TYPE,p_budget TOURHOSTID.BUDGET%TYPE,p_gender TOURHOSTID.GENDER%TYPE,p_team TOURHOSTID.TEAM%TYPE,p_maxage TOURHOSTID.MAXAGE%TYPE,p_minage TOURHOSTID.MINAGE%TYPE,p_maxpeople TOURHOSTID.MAXPEOPLE%TYPE,p_minpeople TOURHOSTID.MINPEOPLE%TYPE,p_peoplecount TOURHOSTID.PEOPLECOUNT%TYPE,p_startdate TOURHOSTID.STARTDATE%TYPE,p_enddate TOURHOSTID.ENDDATE%TYPE,p_tourplan TOURHOSTID.TOURPLAN%TYPE,p_place TOURHOSTPLACE.PLACEID%TYPE) AS
BEGIN
    INSERT INTO TOURHOSTID(TOURID,HOSTID,BUDGET,GENDER,TEAM,MAXAGE,MINAGE,MAXPEOPLE,MINPEOPLE,PEOPLECOUNT,STARTDATE,ENDDATE,POSTEDDATE,TOURPLAN) 
        VALUES (seq_tourid.nextval,p_hostid,p_budget,p_gender,p_team,p_maxage,p_minage,p_maxpeople,p_minpeople,p_peoplecount,p_startdate,p_enddate,sysdate,p_tourplan);
    INSERT into TOURHOSTPLACE(TOURID,PLACEID)
        VALUES(seq_tourid.currval,p_place);    
END; 

/*tourdelete*/
CREATE OR REPLACE PROCEDURE TOURDELETE(p_tourid TOURHOSTID.TOURID%TYPE) AS
BEGIN
    DELETE FROM TOURHOSTID where tourid=p_tourid;
    DELETE FROM TOURHOSTPLACE where tourid=p_tourid;
    DELETE FROM TOURJOIN where tourid=p_tourid;
END;