<?php

class DefaultController extends BaseEventTypeController
{
	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	public function actionAddMedication()
	{
		$medication = new OphCoDischargesummary_Medication_Item;
		$this->renderPartial('_medication_item',array('medication'=>$medication));
	}

	public function getMedications($element)
	{
		if (!empty($_POST)) {
			$medications = array();

			if (!empty($_POST['medication_id'])) {
				foreach ($_POST['medication_id'] as $i => $medication_id) {
					$medication = new OphCoDischargesummary_Medication_Item;
					$medication->medication_id = $medication_id;
					$medication->route_id = $_POST['route_id'][$i];
					$medication->frequency_id = $_POST['frequency_id'][$i];
					$medication->duration_id = $_POST['duration_id'][$i];

					$medications[] = $medication;
				}
			}

			return $medications;
		}

		return OphCoDischargesummary_Medication_Item::model()->findAll(array('order'=>'display_order','condition'=>'element_id=:element_id','params'=>array('element_id'=>$element->id)));
	}
}
