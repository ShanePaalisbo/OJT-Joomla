ALTER TABLE `#__sppagebuilder` ADD `attribs` varchar(5120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]' AFTER `checked_out_time`;
ALTER TABLE `#__sppagebuilder` MODIFY `asset_id` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `#__sppagebuilder` MODIFY `title` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__sppagebuilder` MODIFY `view_id` bigint(20) NOT NULL DEFAULT '0';
ALTER TABLE `#__sppagebuilder` MODIFY `og_title` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__sppagebuilder` MODIFY `og_image` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__sppagebuilder` MODIFY `og_description` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__sppagebuilder` MODIFY `language` char(7) NOT NULL DEFAULT '';

--
ALTER TABLE `#__spmedia` ADD `media_attr` varchar(5120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '{}' AFTER `type`;
ALTER TABLE `#__spmedia` MODIFY `title` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__spmedia` MODIFY `path` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__spmedia` MODIFY `thumb` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__spmedia` MODIFY `alt` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__spmedia` MODIFY `caption` varchar(2048) NOT NULL DEFAULT '';
ALTER TABLE `#__spmedia` MODIFY `extension` varchar(100) NOT NULL DEFAULT '';

--
ALTER TABLE `#__sppagebuilder_languages` MODIFY `title` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `#__sppagebuilder_languages` MODIFY `version` varchar(255) NOT NULL DEFAULT '';

--
ALTER TABLE `#__sppagebuilder_sections` CHANGE `section` `section` MEDIUMTEXT NOT NULL;
ALTER TABLE `#__sppagebuilder_sections` MODIFY `title` varchar(255) NOT NULL DEFAULT '';

--
ALTER TABLE `#__sppagebuilder_addons` CHANGE `code` `code` MEDIUMTEXT NOT NULL;
ALTER TABLE `#__sppagebuilder_addons` MODIFY `title` varchar(255) NOT NULL DEFAULT '';