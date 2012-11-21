<?php
App::uses('AppHelper', 'View/Helper');
class PermissionHelper extends AppHelper {
	var $helpers = array('Form');
	const COLS_LIMIT = 3;
	
	function buildTablePermission($data) {
		$permissions = $data['Rol']['permissions'];
		$permissionsChecked = Set::extract('/Privilege/privilege_id', $data);
		$output = '<fieldset><legend>' . __('Privilegios', true) . '</legend><table class="permissions-privileges"><tbody>';
		$indices=array_keys($permissions);
		$i=0;
		foreach ($permissions as $group) {
			$counter = 0;
			$output .= '<tr><td colspan="3" class="permission-group">' . $group['name'] . '<label class="link-tool-permission"><input class="click-tool-permission" type="checkbox" value="'.$indices[$i].'">Seleccionar todo</label></td></tr>';
			foreach ($group['privileges'] as $privilege) {
				if ($counter == 0) {
					$output .= '<tr>';
				}
				$checked = (boolean) (in_array($privilege['id'], $permissionsChecked));				
				$output .= "<td>" . $this->Form->input('Privilege.' . $privilege['id'] . '.group_id', 
									array('type' => 'checkbox', 'label' => $privilege['label'],
										 'checked' => $checked, 'value' => $privilege['id'], 'class'=>$indices[$i])) . "</td>";
				
				if ($counter == PermissionHelper::COLS_LIMIT-1) {
					$output .= '</tr>';
					$counter = 0;
				}else {
					$counter++;	
				}
			}
			$output .= '</tr>';
			$i++;
		}
		$output .= '</tbody></table></fieldset>';
		return $output;
	}
}