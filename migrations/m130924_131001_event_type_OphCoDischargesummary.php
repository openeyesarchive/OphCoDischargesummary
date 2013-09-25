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

		$this->insert('ophcodischargesummary_medication',array('name'=>'Intracameral Cefuroxime','display_order'=>1));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Sub-conj Cephalexin 0.25 mg','display_order'=>2));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Sub-conj Gentimicin','display_order'=>3));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Sub-conj Dexamethasone 4mg','display_order'=>4));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Sub-conj Betnesol 4mg','display_order'=>5));
		$this->insert('ophcodischargesummary_medication',array('name'=>'G. Chloramphenicol','display_order'=>6));
		$this->insert('ophcodischargesummary_medication',array('name'=>'OC Chloramphenicol','display_order'=>7));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Tetracaine 1%','display_order'=>8));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Sub-conj Cefuroxime','display_order'=>9));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Atropine (1%) Drops','display_order'=>10));
		$this->insert('ophcodischargesummary_medication',array('name'=>'Adrenaline (0.1%) Drops','display_order'=>11));

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

		$this->insert('ophcodischargesummary_route',array('name'=>'Eye','display_order'=>1));
		$this->insert('ophcodischargesummary_route',array('name'=>'IM','display_order'=>2));
		$this->insert('ophcodischargesummary_route',array('name'=>'Inhalation','display_order'=>3));
		$this->insert('ophcodischargesummary_route',array('name'=>'Intracameral','display_order'=>4));
		$this->insert('ophcodischargesummary_route',array('name'=>'Intradermal','display_order'=>5));
		$this->insert('ophcodischargesummary_route',array('name'=>'Intravitreal','display_order'=>6));
		$this->insert('ophcodischargesummary_route',array('name'=>'IV','display_order'=>7));
		$this->insert('ophcodischargesummary_route',array('name'=>'Nose','display_order'=>8));
		$this->insert('ophcodischargesummary_route',array('name'=>'Ocular Muscle','display_order'=>9));
		$this->insert('ophcodischargesummary_route',array('name'=>'PO','display_order'=>10));
		$this->insert('ophcodischargesummary_route',array('name'=>'PR','display_order'=>11));
		$this->insert('ophcodischargesummary_route',array('name'=>'PV','display_order'=>12));
		$this->insert('ophcodischargesummary_route',array('name'=>'Sub-Conj','display_order'=>13));
		$this->insert('ophcodischargesummary_route',array('name'=>'Sub-lingual','display_order'=>14));
		$this->insert('ophcodischargesummary_route',array('name'=>'Subcutaneous','display_order'=>15));
		$this->insert('ophcodischargesummary_route',array('name'=>'To Nose','display_order'=>16));
		$this->insert('ophcodischargesummary_route',array('name'=>'To skin','display_order'=>17));
		$this->insert('ophcodischargesummary_route',array('name'=>'Topical','display_order'=>18));
		$this->insert('ophcodischargesummary_route',array('name'=>'Other','display_order'=>19));
		$this->insert('ophcodischargesummary_route',array('name'=>'n/a','display_order'=>20));

		$this->createTable('ophcodischargesummary_frequency', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'long_name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
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

		$this->insert('ophcodischargesummary_frequency',array('name'=>'Every 15 mins','long_name'=>'every fifteen minute','display_order'=>1));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'1/2 hourly','long_name'=>'every half hour','display_order'=>2));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'hourly','long_name'=>'every hour','display_order'=>3));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'2 hourly','long_name'=>'every two hours','display_order'=>4));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'4-6 hourly prn','long_name'=>'every four to six hours when needed','display_order'=>5));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'5/day','long_name'=>'five times a day','display_order'=>6));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'6 hourly','long_name'=>'every 6 hours','display_order'=>7));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'qid','long_name'=>'four times a day','display_order'=>8));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'tid','long_name'=>'three times a day','display_order'=>9));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'bd','long_name'=>'twice a day','display_order'=>10));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'od','long_name'=>'once a day','display_order'=>11));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'morning','long_name'=>'in the morning','display_order'=>12));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'bedtime','long_name'=>'at bedtime','display_order'=>13));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'nocte','long_name'=>'at night','display_order'=>14));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'alt days','long_name'=>'alternate days','display_order'=>15));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'3/week','long_name'=>'three times a week','display_order'=>16));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'2/week','long_name'=>'twice a week','display_order'=>17));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'1/week','long_name'=>'once a week','display_order'=>18));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'prn','long_name'=>'when needed','display_order'=>19));
		$this->insert('ophcodischargesummary_frequency',array('name'=>'other','long_name'=>'other','display_order'=>20));

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

		$this->insert('ophcodischargesummary_duration',array('name'=>'1 day','display_order'=>1));
		$this->insert('ophcodischargesummary_duration',array('name'=>'2 days','display_order'=>2));
		$this->insert('ophcodischargesummary_duration',array('name'=>'3 days','display_order'=>3));
		$this->insert('ophcodischargesummary_duration',array('name'=>'4 days','display_order'=>4));
		$this->insert('ophcodischargesummary_duration',array('name'=>'5 days','display_order'=>5));
		$this->insert('ophcodischargesummary_duration',array('name'=>'7 days','display_order'=>6));
		$this->insert('ophcodischargesummary_duration',array('name'=>'10 days','display_order'=>7));
		$this->insert('ophcodischargesummary_duration',array('name'=>'14 days','display_order'=>8));
		$this->insert('ophcodischargesummary_duration',array('name'=>'1 month','display_order'=>9));
		$this->insert('ophcodischargesummary_duration',array('name'=>'6 weeks','display_order'=>10));
		$this->insert('ophcodischargesummary_duration',array('name'=>'Other','display_order'=>11));

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
