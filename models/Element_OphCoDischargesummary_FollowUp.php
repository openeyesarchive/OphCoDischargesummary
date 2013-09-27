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
 * This is the model class for table "et_ophcodischargesummary_followup".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $local_name
 * @property string $local_date
 * @property string $local_time
 * @property string $local_location
 * @property string $orbis_name
 * @property string $local_date
 * @property string $local_time
 * @property string $orbis_location
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCoDischargesummary_FollowUp extends BaseEventTypeElement
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
		return 'et_ophcodischargesummary_followup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, local_name, local_date, local_time, local_location, orbis_name, orbis_date, orbis_time, orbis_location, ', 'safe'),
			array('local_name, local_date, local_time, local_location, orbis_name, orbis_date, orbis_time, orbis_location, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, local_name, local_date, local_time, local_location, orbis_name, orbis_datetime, orbis_time, orbis_location, ', 'safe', 'on' => 'search'),
			array('local_time', 'date', 'format' => 'HH:mm'),
			array('orbis_time', 'date', 'format' => 'HH:mm'),
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
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'local_name' => 'Local name',
			'local_date' => 'Local date',
			'local_time' => 'Time',
			'local_location' => 'Local location',
			'orbis_name' => 'ORBIS name',
			'orbis_date' => 'ORBIS date',
			'orbis_time' => 'Time',
			'orbis_location' => 'ORBIS location',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('local_name', $this->local_name);
		$criteria->compare('local_date', $this->local_date);
		$criteria->compare('local_time', $this->local_time);
		$criteria->compare('local_location', $this->local_location);
		$criteria->compare('orbis_name', $this->orbis_name);
		$criteria->compare('orbis_date', $this->local_date);
		$criteria->compare('orbis_time', $this->local_time);
		$criteria->compare('orbis_location', $this->orbis_location);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function afterFind()
	{
		$this->local_time = substr($this->local_time,0,5);
		$this->orbis_time = substr($this->orbis_time,0,5);
	}
}
?>
