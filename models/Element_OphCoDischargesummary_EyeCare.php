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
 * This is the model class for table "et_ophcodischargesummary_eyecare".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $wear_eye_shield_until
 * @property integer $wear_shield_when_sleeping
 * @property integer $do_not_use_pad_or_shield
 * @property integer $wash_your_hands
 * @property integer $do_not_rub_your_eye
 * @property integer $wash_eye_shield
 * @property integer $keep_water_out_of_your_eye
 * @property integer $wear_glasses
 * @property integer $dont_contaminate
 * @property string $comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCoDischargesummary_EyeCare extends BaseEventTypeElement
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
		return 'et_ophcodischargesummary_eyecare';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, wear_eye_shield_until, wear_shield_when_sleeping, do_not_use_pad_or_shield, wash_your_hands, do_not_rub_your_eye, wash_eye_shield, keep_water_out_of_your_eye, wear_glasses, dont_contaminate, comments, ', 'safe'),
			array('wear_eye_shield_until, wear_shield_when_sleeping, do_not_use_pad_or_shield, wash_your_hands, do_not_rub_your_eye, wash_eye_shield, keep_water_out_of_your_eye, wear_glasses, dont_contaminate', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, wear_eye_shield_until, wear_shield_when_sleeping, do_not_use_pad_or_shield, wash_your_hands, do_not_rub_your_eye, wash_eye_shield, keep_water_out_of_your_eye, wear_glasses, dont_contaminate, comments, ', 'safe', 'on' => 'search'),
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
			'wear_eye_shield_until' => 'Wear eye shield until',
			'wear_shield_when_sleeping' => 'Wear shield when sleeping',
			'do_not_use_pad_or_shield' => 'Do not use pad or shield',
			'wash_your_hands' => 'Wash your hands before and after touching your eye and instilling medications',
			'do_not_rub_your_eye' => 'Do not rub your eye',
			'wash_eye_shield' => 'Wash eye shield with soap and water if dirty',
			'keep_water_out_of_your_eye' => 'Keep water out of your eye',
			'wear_glasses' => 'Wear glasses when awake for safety',
			'dont_contaminate' => 'Take care not to contaminate the medicine dropper or tip by touching it to your eye',
			'comments' => 'Comments',
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
		$criteria->compare('wear_eye_shield_until', $this->wear_eye_shield_until);
		$criteria->compare('wear_shield_when_sleeping', $this->wear_shield_when_sleeping);
		$criteria->compare('do_not_use_pad_or_shield', $this->do_not_use_pad_or_shield);
		$criteria->compare('wash_your_hands', $this->wash_your_hands);
		$criteria->compare('do_not_rub_your_eye', $this->do_not_rub_your_eye);
		$criteria->compare('wash_eye_shield', $this->wash_eye_shield);
		$criteria->compare('keep_water_out_of_your_eye', $this->keep_water_out_of_your_eye);
		$criteria->compare('wear_glasses', $this->wear_glasses);
		$criteria->compare('dont_contaminate', $this->dont_contaminate);
		$criteria->compare('comments', $this->comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}
?>
