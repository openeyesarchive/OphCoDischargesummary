<?php

class m130927_151151_missing_times extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('et_ophcodischargesummary_followup','local_datetime','local_date');
		$this->addColumn('et_ophcodischargesummary_followup','local_time','time NOT NULL');

		$this->renameColumn('et_ophcodischargesummary_followup','orbis_datetime','orbis_date');
		$this->addColumn('et_ophcodischargesummary_followup','orbis_time','time NOT NULL');
	}

	public function down()
	{
		$this->renameColumn('et_ophcodischargesummary_followup','local_date','local_datetime');
		$this->dropColumn('et_ophcodischargesummary_followup','local_time');

		$this->renameColumn('et_ophcodischargesummary_followup','orbis_date','orbis_datetime');
		$this->dropColumn('et_ophcodischargesummary_followup','orbis_time');
	}
}
