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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('wear_eye_shield_until'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->NHSDate('wear_eye_shield_until'))?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('wear_shield_when_sleeping'))?></td>
			<td><span class="big"><?php echo $element->wear_shield_when_sleeping ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('do_not_use_pad_or_shield'))?></td>
			<td><span class="big"><?php echo $element->do_not_use_pad_or_shield ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('wash_your_hands'))?></td>
			<td><span class="big"><?php echo $element->wash_your_hands ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('do_not_rub_your_eye'))?></td>
			<td><span class="big"><?php echo $element->do_not_rub_your_eye ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('do_not_rub_your_eye'))?></td>
			<td><span class="big"><?php echo $element->do_not_rub_your_eye ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('wash_eye_shield'))?></td>
			<td><span class="big"><?php echo $element->wash_eye_shield ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('keep_water_out_of_your_eye'))?></td>
			<td><span class="big"><?php echo $element->keep_water_out_of_your_eye ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('wear_glasses'))?></td>
			<td><span class="big"><?php echo $element->wear_glasses ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('dont_contaminate'))?></td>
			<td><span class="big"><?php echo $element->dont_contaminate ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->comments)?></span></td>
		</tr>
	</tbody>
</table>
