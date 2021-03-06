<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "ophcodischargesummary_medication_item".
 *
 * The followings are the available columns in table:
 * @property integer $id
 * @property integer $element_id
 * @property integer $medication_id
 * @property integer $route_id
 * @property integer $frequency_id
 * @property integer $duration_id
 * @property integer $display_order
 */

class OphCoDischargesummary_Medication_Item extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ophcodischargesummary_medication_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('medication_id, route_id, frequency_id, duration_id', 'safe'),
			array('medication_id, route_id, frequency_id, duration_id', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, medication_id, route_id, frequency_id, duration_id, display_order', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'medication' => array(self::BELONGS_TO, 'OphCoDischargesummary_Medication', 'medication_id'),
			'route' => array(self::BELONGS_TO, 'OphCoDischargesummary_Route', 'route_id'),
			'frequency' => array(self::BELONGS_TO, 'OphCoDischargesummary_Frequency', 'frequency_id'),
			'duration' => array(self::BELONGS_TO, 'OphCoDischargesummary_Duration', 'duration_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'medication_id' => 'Medication',
			'route_id' => 'Route',
			'frequency_id' => 'Frequency',
			'duration_id' => 'Duration',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name);
		$criteria->compare('medication_id', $this->medication_id);
		$criteria->compare('route_id', $this->route_id);
		$criteria->compare('frequency_id', $this->frequency_id);
		$criteria->compare('duration_id', $this->duration_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}
?>
