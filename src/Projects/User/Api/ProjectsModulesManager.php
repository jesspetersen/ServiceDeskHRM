<?php
/**
 * Created by PhpStorm.
 * User: Thilina
 * Date: 8/19/17
 * Time: 6:03 PM
 */

namespace Projects\User\Api;

use Classes\AbstractModuleManager;

class ProjectsModulesManager extends AbstractModuleManager
{

    public function initializeUserClasses()
    {
        if (defined('MODULE_TYPE') && MODULE_TYPE != 'admin') {
            $this->addUserClass("EmployeeProject");
            //221017 JEP Add client model to model definitions
            $this->addUserClass("EmployeeClient");
            $this->addUserClass("Client");
        }
    }

    public function initializeFieldMappings()
    {
    }

    public function initializeDatabaseErrorMappings()
    {
    }

    public function setupModuleClassDefinitions()
    {
        //121017 JEP Add client model to module definitions
        $this->addModelClass('Client');
        $this->addModelClass('EmployeeProject');
    }
}
