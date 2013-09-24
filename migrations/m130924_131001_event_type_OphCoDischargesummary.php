<?php 
class m130924_131001_event_type_OphCoDischargesummary extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCoDischargesummary'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Communication events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCoDischargesummary', 'name' => 'Discharge summary','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCoDischargesummary'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Charges',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Charges','class_name' => 'Element_OphCoDischargesummary_Charges', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Activity',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Activity','class_name' => 'Element_OphCoDischargesummary_Activity', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Eye care',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Eye care','class_name' => 'Element_OphCoDischargesummary_EyeCare', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Medications',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Medications','class_name' => 'Element_OphCoDischargesummary_Medications', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Follow up',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Follow up','class_name' => 'Element_OphCoDischargesummary_FollowUp', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$this->createTable('et_ophcodischargesummary_charges', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'charged' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcodischargesummary_charges_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcodischargesummary_charges_cui_fk` (`created_user_id`)',
				'KEY `et_ophcodischargesummary_charges_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcodischargesummary_charges_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_charges_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_charges_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcodischargesummary_activity', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'resume_normal_activity' => 'tinyint(1) unsigned NOT NULL',
				'posturing' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'avoid_strenuous_activity' => 'tinyint(1) unsigned NOT NULL',
				'bend_with_knees_not_waist' => 'tinyint(1) unsigned NOT NULL',
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcodischargesummary_activity_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcodischargesummary_activity_cui_fk` (`created_user_id`)',
				'KEY `et_ophcodischargesummary_activity_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcodischargesummary_activity_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_activity_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_activity_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcodischargesummary_eyecare', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'wear_eye_shield_until' => 'date DEFAULT NULL',
				'wear_shield_when_sleeping' => 'tinyint(1) unsigned NOT NULL',
				'do_not_use_pad_or_shield' => 'tinyint(1) unsigned NOT NULL',
				'wash_your_hands' => 'tinyint(1) unsigned NOT NULL',
				'do_not_rub_your_eye' => 'tinyint(1) unsigned NOT NULL',
				'do_not_rub_your_eye' => 'tinyint(1) unsigned NOT NULL',
				'wash_eye_shield' => 'tinyint(1) unsigned NOT NULL',
				'keep_water_out_of_your_eye' => 'tinyint(1) unsigned NOT NULL',
				'wear_glasses' => 'tinyint(1) unsigned NOT NULL',
				'dont_contaminate' => 'tinyint(1) unsigned NOT NULL',
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcodischargesummary_eyecare_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcodischargesummary_eyecare_cui_fk` (`created_user_id`)',
				'KEY `et_ophcodischargesummary_eyecare_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcodischargesummary_eyecare_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_eyecare_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_eyecare_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcodischargesummary_medications', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medications_unchanged' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcodischargesummary_medications_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcodischargesummary_medications_cui_fk` (`created_user_id`)',
				'KEY `et_ophcodischargesummary_medications_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcodischargesummary_medications_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_medications_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_medications_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcodischargesummary_medication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcodischargesummary_medication_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcodischargesummary_medication_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcodischargesummary_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcodischargesummary_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcodischargesummary_route', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcodischargesummary_route_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcodischargesummary_route_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcodischargesummary_route_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcodischargesummary_route_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcodischargesummary_frequency', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcodischargesummary_frequency_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcodischargesummary_frequency_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcodischargesummary_frequency_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcodischargesummary_frequency_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcodischargesummary_duration', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcodischargesummary_duration_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcodischargesummary_duration_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcodischargesummary_duration_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcodischargesummary_duration_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcodischargesummary_medication_item', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'medication_id' => 'int(10) unsigned NOT NULL',
				'route_id' => 'int(10) unsigned NOT NULL',
				'frequency_id' => 'int(10) unsigned NOT NULL',
				'duration_id' => 'int(10) unsigned NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcodischargesummary_medications_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcodischargesummary_medications_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcodischargesummary_medications_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcodischargesummary_medications_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcodischargesummary_followup', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'local_name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'local_datetime' => 'date DEFAULT NULL',
				'local_location' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'orbis_name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'orbis_datetime' => 'date DEFAULT NULL',
				'orbis_location' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcodischargesummary_followup_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcodischargesummary_followup_cui_fk` (`created_user_id`)',
				'KEY `et_ophcodischargesummary_followup_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcodischargesummary_followup_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_followup_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcodischargesummary_followup_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('et_ophcodischargesummary_charges');
		$this->dropTable('et_ophcodischargesummary_activity');
		$this->dropTable('et_ophcodischargesummary_eyecare');
		$this->dropTable('et_ophcodischargesummary_medications');
		$this->dropTable('ophcodischargesummary_medication_item');
		$this->dropTable('ophcodischargesummary_duration');
		$this->dropTable('ophcodischargesummary_frequency');
		$this->dropTable('ophcodischargesummary_route');
		$this->dropTable('ophcodischargesummary_medication');
		$this->dropTable('et_ophcodischargesummary_followup');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCoDischargesummary'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}
