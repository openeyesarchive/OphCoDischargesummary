<?php

class m131210_144530_soft_deletion extends CDbMigration
{
	public function up()
	{
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
	}
}
