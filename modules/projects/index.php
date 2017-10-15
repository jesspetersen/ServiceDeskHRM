<?php
/*
This file is part of iCE Hrm.

iCE Hrm is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

iCE Hrm is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with iCE Hrm. If not, see <http://www.gnu.org/licenses/>.

------------------------------------------------------------------

Original work Copyright (c) 2012 [Gamonoid Media Pvt. Ltd]  
Developer: Thilina Hasantha (thilina.hasantha[at]gmail.com / facebook.com/thilinah)
 */

$moduleName = 'projects';
define('MODULE_PATH',dirname(__FILE__));
include APP_BASE_PATH.'header.php';
include APP_BASE_PATH.'modulejslibs.inc.php';
?><div class="span9">
			  
	<ul class="nav nav-tabs" id="modTab" style="margin-bottom:0px;margin-left:5px;border-bottom: none;">
		<!--121017 JEP add client tab-->
		<li class="active"><a id="tabClient" href="#tabPageClient"><?=t('Clients')?></a></li>
		<!--121017 JEP remove project tab-->
		<!--<li class="active"><a id="tabEmployeeProject" href="#tabPageEmployeeProject"><?=t('My Projects')?></a></li>-->
	</ul>
	 
	<!--121017 JEP Remove employment tab data-->
	<!--<div class="tab-content">
		<div class="tab-pane active" id="tabPageEmployeeProject">
			<div id="EmployeeProject" class="reviewBlock" data-content="List" style="padding-left:5px;">
		
			</div>
			<div id="EmployeeProjectForm" class="reviewBlock" data-content="Form" style="padding-left:5px;display:none;">
		
			</div>
		</div>
	</div>-->

	<!--121017 JEP Add client tab data-->
	<div class="tab-content">
		<div class="tab-pane active" id="tabPageClient">
			<div id="Client" class="reviewBlock" data-content="List" style="padding-left:5px;">
		
			</div>
			<div id="ClientForm" class="reviewBlock" data-content="Form" style="padding-left:5px;display:none;">
		
			</div>
		</div>
	</div>

</div>
<script>
var modJsList = new Array();

//121017 JEP Remove employeeproject permissions and functions
/*modJsList['tabEmployeeProject'] = new EmployeeProjectAdapter('EmployeeProject','EmployeeProject');

<?php if(isset($modulePermissions['perm']['Add Projects']) && $modulePermissions['perm']['Add Projects'] == "No"){?>
modJsList['tabEmployeeProject'].setShowAddNew(false);
<?php }?>
<?php if(isset($modulePermissions['perm']['Delete Projects']) && $modulePermissions['perm']['Delete Projects'] == "No"){?>
modJsList['tabEmployeeProject'].setShowDelete(false);
<?php }?>
<?php if(isset($modulePermissions['perm']['Edit Projects']) && $modulePermissions['perm']['Edit Projects'] == "No"){?>
modJsList['tabEmployeeProject'].setShowEdit(false);
<?php }?>*/

//121017 JEP Add client permissions and functions
modJsList['tabClient'] = new ClientAdapter('Client','Client');

<?php if(isset($modulePermissions['perm']['Add Clients']) && $modulePermissions['perm']['Add Clients'] == "No"){?>
modJsList['tabClient'].setShowAddNew(false);
<?php }?>

<?php if(isset($modulePermissions['perm']['Delete Clients']) && $modulePermissions['perm']['Delete Clients'] == "No"){?>
modJsList['tabClient'].setShowDelete(false);
<?php }?>

<?php if(isset($modulePermissions['perm']['Edit Clients']) && $modulePermissions['perm']['Edit Clients'] == "No"){?>
modJsList['tabClient'].setShowSave(false);
<?php }?>

//121017 JEP Remove employee project tab data
//var modJs = modJsList['tabEmployeeProject'];
//121017 JEP Add client tab data
var modJs = modJsList['tabClient'];

</script>
<?php include APP_BASE_PATH.'footer.php';?>      
