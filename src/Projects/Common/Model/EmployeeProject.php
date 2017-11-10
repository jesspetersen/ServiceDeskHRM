<?php
/**
 * Created by PhpStorm.
 * User: Thilina
 * Date: 8/19/17
 * Time: 5:58 PM
 */

namespace Projects\Common\Model;

use Classes\IceResponse;
use Model\BaseModel;

class EmployeeProject extends BaseModel
{
    public $table = 'EmployeeProjects';

    public function getAdminAccess()
    {
        return array("get","element","save","delete");
    }

    public function getManagerAccess()
    {
        return array("get","element","save","delete");
    }

    public function getUserAccess()
    {
        return array("get");
    }

    public function getUserOnlyMeAccess()
    {
        return array("element","save","delete");
    }

    public function executePreSaveActions($obj)
    {
        if (empty($obj->status)) {
            $obj->status = "Current";
        }
        return new IceResponse(IceResponse::SUCCESS, $obj);
    }

    public function executePreUpdateActions($obj)
    {
        if (empty($obj->status)) {
            $obj->status = "Current";
        }
        return new IceResponse(IceResponse::SUCCESS, $obj);
    }

    public function addEmployeeClientRows() {
        $projectClient = new \Projects\Common\Model\Client();
        $projectInterface = new \Projects\Common\Model\EmployeeProject();
        $projectEmployee = new \Employees\Common\Model\Employee();
        
        foreach ($projectClient->find('id like ? order by id', array('%')) as $client) {
            $employeeClientArray = $projectInterface->find("client like ? order by id", array('' + $client->id));
            $employeesToAddArray = $projectEmployee->find('id like ? order by id', array('%'));
            foreach ($projectEmployee->find('id like ? order by id', array('%')) as $employee) {
                foreach ($employeeClientArray as $row) {
                    if ($row->employee == $employee->id) {
                        $rowToRemove = array_search($row, $employeeClientArray);
                        unset($employeeClientArray[$rowToRemove]);
                        $employeeToRemove = array_search($employee, $employeesToAddArray);
                        unset($employeesToAddArray[$employeeToRemove]);
                    }
                }
            }
            foreach ($employeesToAddArray as $employee) {
                $projectAdapter = new \Projects\Common\Model\EmployeeProject();
                $projectAdapter->id = null;
                $projectAdapter->employee = $employee->id;
                $projectAdapter->client = $client->id;
                $projectAdapter->account = 'false';
                $projectAdapter->training = 'false';
                $projectAdapter->details = null;
                $saveStatus = $projectAdapter->save();
            }
        }
    }
}