<?php

class m131206_150645_soft_deletion extends CDbMigration
{
	public function up()
	{
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
	}

	public function down()
	{
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
	}
}
