<?php

class m131205_125853_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcodischargesummary_activity_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`resume_normal_activity` tinyint(1) unsigned NOT NULL,
	`posturing` varchar(255) COLLATE utf8_bin DEFAULT '',
	`avoid_strenuous_activity` tinyint(1) unsigned NOT NULL,
	`bend_with_knees_not_waist` tinyint(1) unsigned NOT NULL,
	`comments` text COLLATE utf8_bin,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcodischargesummary_activity_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcodischargesummary_activity_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcodischargesummary_activity_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcodischargesummary_activity_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_activity_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_activity_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcodischargesummary_activity_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcodischargesummary_activity_version');

		$this->createIndex('et_ophcodischargesummary_activity_aid_fk','et_ophcodischargesummary_activity_version','id');
		$this->addForeignKey('et_ophcodischargesummary_activity_aid_fk','et_ophcodischargesummary_activity_version','id','et_ophcodischargesummary_activity','id');

		$this->addColumn('et_ophcodischargesummary_activity_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcodischargesummary_activity_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcodischargesummary_activity_version','version_id');
		$this->alterColumn('et_ophcodischargesummary_activity_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcodischargesummary_charges_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`charged` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcodischargesummary_charges_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcodischargesummary_charges_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcodischargesummary_charges_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcodischargesummary_charges_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_charges_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_charges_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcodischargesummary_charges_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcodischargesummary_charges_version');

		$this->createIndex('et_ophcodischargesummary_charges_aid_fk','et_ophcodischargesummary_charges_version','id');
		$this->addForeignKey('et_ophcodischargesummary_charges_aid_fk','et_ophcodischargesummary_charges_version','id','et_ophcodischargesummary_charges','id');

		$this->addColumn('et_ophcodischargesummary_charges_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcodischargesummary_charges_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcodischargesummary_charges_version','version_id');
		$this->alterColumn('et_ophcodischargesummary_charges_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcodischargesummary_eyecare_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`wear_eye_shield_until` date DEFAULT NULL,
	`wear_shield_when_sleeping` tinyint(1) unsigned NOT NULL,
	`do_not_use_pad_or_shield` tinyint(1) unsigned NOT NULL,
	`wash_your_hands` tinyint(1) unsigned NOT NULL,
	`do_not_rub_your_eye` tinyint(1) unsigned NOT NULL,
	`wash_eye_shield` tinyint(1) unsigned NOT NULL,
	`keep_water_out_of_your_eye` tinyint(1) unsigned NOT NULL,
	`wear_glasses` tinyint(1) unsigned NOT NULL,
	`dont_contaminate` tinyint(1) unsigned NOT NULL,
	`comments` text COLLATE utf8_bin,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcodischargesummary_eyecare_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcodischargesummary_eyecare_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcodischargesummary_eyecare_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcodischargesummary_eyecare_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_eyecare_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_eyecare_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcodischargesummary_eyecare_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcodischargesummary_eyecare_version');

		$this->createIndex('et_ophcodischargesummary_eyecare_aid_fk','et_ophcodischargesummary_eyecare_version','id');
		$this->addForeignKey('et_ophcodischargesummary_eyecare_aid_fk','et_ophcodischargesummary_eyecare_version','id','et_ophcodischargesummary_eyecare','id');

		$this->addColumn('et_ophcodischargesummary_eyecare_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcodischargesummary_eyecare_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcodischargesummary_eyecare_version','version_id');
		$this->alterColumn('et_ophcodischargesummary_eyecare_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcodischargesummary_followup_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`local_name` varchar(255) COLLATE utf8_bin DEFAULT '',
	`local_date` date DEFAULT NULL,
	`local_location` varchar(255) COLLATE utf8_bin DEFAULT '',
	`orbis_name` varchar(255) COLLATE utf8_bin DEFAULT '',
	`orbis_date` date DEFAULT NULL,
	`orbis_location` varchar(255) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`local_time` time NOT NULL,
	`orbis_time` time NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcodischargesummary_followup_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcodischargesummary_followup_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcodischargesummary_followup_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcodischargesummary_followup_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_followup_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_followup_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcodischargesummary_followup_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcodischargesummary_followup_version');

		$this->createIndex('et_ophcodischargesummary_followup_aid_fk','et_ophcodischargesummary_followup_version','id');
		$this->addForeignKey('et_ophcodischargesummary_followup_aid_fk','et_ophcodischargesummary_followup_version','id','et_ophcodischargesummary_followup','id');

		$this->addColumn('et_ophcodischargesummary_followup_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcodischargesummary_followup_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcodischargesummary_followup_version','version_id');
		$this->alterColumn('et_ophcodischargesummary_followup_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcodischargesummary_medications_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`medications_unchanged` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcodischargesummary_medications_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcodischargesummary_medications_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcodischargesummary_medications_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcodischargesummary_medications_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_medications_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcodischargesummary_medications_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcodischargesummary_medications_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcodischargesummary_medications_version');

		$this->createIndex('et_ophcodischargesummary_medications_aid_fk','et_ophcodischargesummary_medications_version','id');
		$this->addForeignKey('et_ophcodischargesummary_medications_aid_fk','et_ophcodischargesummary_medications_version','id','et_ophcodischargesummary_medications','id');

		$this->addColumn('et_ophcodischargesummary_medications_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcodischargesummary_medications_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcodischargesummary_medications_version','version_id');
		$this->alterColumn('et_ophcodischargesummary_medications_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcodischargesummary_duration_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcodischargesummary_duration_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcodischargesummary_duration_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcodischargesummary_duration_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcodischargesummary_duration_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcodischargesummary_duration_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcodischargesummary_duration_version');

		$this->createIndex('ophcodischargesummary_duration_aid_fk','ophcodischargesummary_duration_version','id');
		$this->addForeignKey('ophcodischargesummary_duration_aid_fk','ophcodischargesummary_duration_version','id','ophcodischargesummary_duration','id');

		$this->addColumn('ophcodischargesummary_duration_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcodischargesummary_duration_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcodischargesummary_duration_version','version_id');
		$this->alterColumn('ophcodischargesummary_duration_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcodischargesummary_frequency_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`long_name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcodischargesummary_frequency_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcodischargesummary_frequency_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcodischargesummary_frequency_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcodischargesummary_frequency_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcodischargesummary_frequency_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcodischargesummary_frequency_version');

		$this->createIndex('ophcodischargesummary_frequency_aid_fk','ophcodischargesummary_frequency_version','id');
		$this->addForeignKey('ophcodischargesummary_frequency_aid_fk','ophcodischargesummary_frequency_version','id','ophcodischargesummary_frequency','id');

		$this->addColumn('ophcodischargesummary_frequency_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcodischargesummary_frequency_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcodischargesummary_frequency_version','version_id');
		$this->alterColumn('ophcodischargesummary_frequency_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcodischargesummary_medication_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcodischargesummary_medication_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcodischargesummary_medication_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcodischargesummary_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcodischargesummary_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcodischargesummary_medication_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcodischargesummary_medication_version');

		$this->createIndex('ophcodischargesummary_medication_aid_fk','ophcodischargesummary_medication_version','id');
		$this->addForeignKey('ophcodischargesummary_medication_aid_fk','ophcodischargesummary_medication_version','id','ophcodischargesummary_medication','id');

		$this->addColumn('ophcodischargesummary_medication_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcodischargesummary_medication_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcodischargesummary_medication_version','version_id');
		$this->alterColumn('ophcodischargesummary_medication_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcodischargesummary_medication_item_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`medication_id` int(10) unsigned NOT NULL,
	`route_id` int(10) unsigned NOT NULL,
	`frequency_id` int(10) unsigned NOT NULL,
	`duration_id` int(10) unsigned NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcodischargesummary_medications_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcodischargesummary_medications_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcodischargesummary_medications_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcodischargesummary_medications_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcodischargesummary_medication_item_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcodischargesummary_medication_item_version');

		$this->createIndex('ophcodischargesummary_medication_item_aid_fk','ophcodischargesummary_medication_item_version','id');
		$this->addForeignKey('ophcodischargesummary_medication_item_aid_fk','ophcodischargesummary_medication_item_version','id','ophcodischargesummary_medication_item','id');

		$this->addColumn('ophcodischargesummary_medication_item_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcodischargesummary_medication_item_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcodischargesummary_medication_item_version','version_id');
		$this->alterColumn('ophcodischargesummary_medication_item_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcodischargesummary_route_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcodischargesummary_route_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcodischargesummary_route_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcodischargesummary_route_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcodischargesummary_route_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcodischargesummary_route_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcodischargesummary_route_version');

		$this->createIndex('ophcodischargesummary_route_aid_fk','ophcodischargesummary_route_version','id');
		$this->addForeignKey('ophcodischargesummary_route_aid_fk','ophcodischargesummary_route_version','id','ophcodischargesummary_route','id');

		$this->addColumn('ophcodischargesummary_route_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcodischargesummary_route_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcodischargesummary_route_version','version_id');
		$this->alterColumn('ophcodischargesummary_route_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophcodischargesummary_activity','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_activity_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_charges','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_charges_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_eyecare','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_eyecare_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_followup','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_followup_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_medications','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcodischargesummary_medications_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophcodischargesummary_duration','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_duration_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_frequency','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_frequency_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_medication','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_medication_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_medication_item','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_medication_item_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_route','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcodischargesummary_route_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcodischargesummary_duration','deleted');
		$this->dropColumn('ophcodischargesummary_duration_version','deleted');
		$this->dropColumn('ophcodischargesummary_frequency','deleted');
		$this->dropColumn('ophcodischargesummary_frequency_version','deleted');
		$this->dropColumn('ophcodischargesummary_medication','deleted');
		$this->dropColumn('ophcodischargesummary_medication_version','deleted');
		$this->dropColumn('ophcodischargesummary_medication_item','deleted');
		$this->dropColumn('ophcodischargesummary_medication_item_version','deleted');
		$this->dropColumn('ophcodischargesummary_route','deleted');
		$this->dropColumn('ophcodischargesummary_route_version','deleted');

		$this->dropColumn('et_ophcodischargesummary_activity','deleted');
		$this->dropColumn('et_ophcodischargesummary_activity_version','deleted');
		$this->dropColumn('et_ophcodischargesummary_charges','deleted');
		$this->dropColumn('et_ophcodischargesummary_charges_version','deleted');
		$this->dropColumn('et_ophcodischargesummary_eyecare','deleted');
		$this->dropColumn('et_ophcodischargesummary_eyecare_version','deleted');
		$this->dropColumn('et_ophcodischargesummary_followup','deleted');
		$this->dropColumn('et_ophcodischargesummary_followup_version','deleted');
		$this->dropColumn('et_ophcodischargesummary_medications','deleted');
		$this->dropColumn('et_ophcodischargesummary_medications_version','deleted');

		$this->dropTable('et_ophcodischargesummary_activity_version');
		$this->dropTable('et_ophcodischargesummary_charges_version');
		$this->dropTable('et_ophcodischargesummary_eyecare_version');
		$this->dropTable('et_ophcodischargesummary_followup_version');
		$this->dropTable('et_ophcodischargesummary_medications_version');
		$this->dropTable('ophcodischargesummary_duration_version');
		$this->dropTable('ophcodischargesummary_frequency_version');
		$this->dropTable('ophcodischargesummary_medication_version');
		$this->dropTable('ophcodischargesummary_medication_item_version');
		$this->dropTable('ophcodischargesummary_route_version');
	}
}
