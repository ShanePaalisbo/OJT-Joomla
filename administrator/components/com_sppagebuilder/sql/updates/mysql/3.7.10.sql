-- 3.7.10 

ALTER TABLE `#__spmedia` MODIFY `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `#__spmedia` MODIFY `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `#__sppagebuilder` MODIFY `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `#__sppagebuilder` MODIFY `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `#__sppagebuilder` MODIFY `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `#__sppagebuilder_sections` MODIFY `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `#__sppagebuilder_addons` MODIFY `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00';


UPDATE `#__spmedia` SET `created_on` = '1970-01-01 00:00:00' WHERE `created_on` = '0000-00-00 00:00:00';
UPDATE `#__spmedia` SET `modified_on` = '1970-01-01 00:00:00' WHERE `modified_on` = '0000-00-00 00:00:00';

UPDATE `#__sppagebuilder` SET `created_on` = '1970-01-01 00:00:00' WHERE `created_on` = '0000-00-00 00:00:00';
UPDATE `#__sppagebuilder` SET `modified` = '1970-01-01 00:00:00' WHERE `modified` = '0000-00-00 00:00:00';
UPDATE `#__sppagebuilder` SET `checked_out_time` = '1970-01-01 00:00:00' WHERE `checked_out_time` = '0000-00-00 00:00:00';

UPDATE `#__sppagebuilder_sections` SET `created` = '1970-01-01 00:00:00' WHERE `created` = '0000-00-00 00:00:00';
UPDATE `#__sppagebuilder_addons` SET `created` = '1970-01-01 00:00:00' WHERE `created` = '0000-00-00 00:00:00';