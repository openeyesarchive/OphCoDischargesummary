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
?>

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<?php echo $form->datePicker($element, 'wear_eye_shield_until', array('maxDate' => 'today'), array('style'=>'width: 110px;'))?>
	<?php echo $form->checkBox($element, 'wear_shield_when_sleeping', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'do_not_use_pad_or_shield', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'wash_your_hands', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'do_not_rub_your_eye', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'wash_eye_shield', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'keep_water_out_of_your_eye', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'wear_glasses', array('text-align' => 'right'))?>
	<?php echo $form->checkBox($element, 'dont_contaminate', array('text-align' => 'right'))?>
	<?php echo $form->textArea($element, 'comments', array('rows' => 4, 'cols' => 80))?>
</div>
