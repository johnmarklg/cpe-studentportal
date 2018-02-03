DROP TRIGGER IF EXISTS gradesaudit_insert;

DELIMITER $$
CREATE TRIGGER `gradesaudit_insert` 
AFTER INSERT ON `grades`
FOR EACH ROW 
BEGIN
  INSERT INTO `gradesaudit` (`recordid`, `adminid`, `1st`, `2nd`, `3rd`, `action`, `logtime`) VALUES (new.`id`, new.`updatedby`, new.`1st`, new.`2nd`, new.`3rd`, 'insert', now());
END $$

DROP TRIGGER IF EXISTS gradesaudit_delete;

DELIMITER $$
CREATE TRIGGER `gradesaudit_delete` 
BEFORE DELETE ON `grades`
FOR EACH ROW 
BEGIN
  INSERT INTO `gradesaudit` (`recordid`, `adminid`, `1st`, `2nd`, `3rd`, `action`, `logtime`) VALUES (old.`id`, old.`updatedby`, old.`1st`, old.`2nd`, old.`3rd`, 'delete', now());
END $$


DROP TRIGGER IF EXISTS gradesaudit_update;

DELIMITER $$
CREATE TRIGGER `gradesaudit_update` 
AFTER UPDATE ON `grades`
FOR EACH ROW 
BEGIN
IF new.`1st` <> old.`1st` or new.`2nd` <> old.`2nd` or new.`2nd` <> old.`2nd` THEN
	INSERT INTO `gradesaudit` (`recordid`, `adminid`, `1st`, `2nd`, `3rd`, `action`, `logtime`) VALUES (new.`id`, new.`updatedby`, new.`1st`, new.`2nd`, new.`3rd`, 'update', now());
END IF;
END $$

DROP TRIGGER IF EXISTS invoice_student_insert;

DELIMITER $$
CREATE TRIGGER `invoice_student_insert` 
AFTER INSERT ON `students`
FOR EACH ROW 
BEGIN
  INSERT INTO `invoices` (`studnum`, `timestamp`) VALUES (new.`studnum`, now());
END $$

DROP TRIGGER IF EXISTS invoice_student_delete;

DELIMITER $$
CREATE TRIGGER `invoice_student_delete` 
BEFORE DELETE ON `students`
FOR EACH ROW 
BEGIN
  DELETE FROM `invoices` WHERE `studnum` = old.`studnum`;
END $$
