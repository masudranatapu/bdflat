DROP FUNCTION IF EXISTS fnStripTags;
DELIMITER $$
CREATE FUNCTION fnStripTags(Dirty varchar(4000) ) RETURNS varchar(4000)
    DETERMINISTIC
BEGIN
  DECLARE iStart, iEnd, iLength int;
    WHILE Locate( '<', Dirty ) > 0 And Locate( '>', Dirty, Locate( '<', Dirty )) > 0 DO
      BEGIN
        SET iStart = Locate( '<', Dirty ), iEnd = Locate( '>', Dirty, Locate('<', Dirty ));
        SET iLength = ( iEnd - iStart) + 1;
        IF iLength > 0 THEN
          BEGIN
            SET Dirty = Insert( Dirty, iStart, iLength, ' ');
          END;
        END IF;
      END;
    END WHILE;
    RETURN Dirty;
END$$

/****************/


CREATE FUNCTION fnStripTags(Dirty VarChar(4000))
  RETURNS NVarChar(4000)
  DETERMINISTIC
  NO SQL
BEGIN
  DECLARE iStart, iEnd, iLength int;
    WHILE Locate( '<', Dirty ) > 0 And Locate( '>', Dirty, Locate( '<', Dirty )) > 0 DO
      BEGIN
        SET iStart = Locate( '<', Dirty ), iEnd = Locate( '>', Dirty, Locate('<', Dirty ));
        SET iLength = ( iEnd - iStart) + 1;
        IF iLength > 0 THEN
          BEGIN
            SET Dirty = Insert( Dirty, iStart, iLength, ' ');
          END;
        END IF;
      END;
    END WHILE;
    RETURN Dirty;
END
/


