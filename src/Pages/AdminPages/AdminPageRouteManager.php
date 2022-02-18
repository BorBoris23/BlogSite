<?php
namespace App\Pages\AdminPageS;

use App\Pages\AdminPages\AdminControllers\CheckOreDeleteCommentController;
use App\Pages\AdminPageS\AdminControllers\UserManagementPageController;
use App\Pages\AdminPages\AdminControllers\MainAdminPageController;
use App\Pages\AdminPageS\AdminControllers\UserRoleChangeController;
use App\Pages\AdminPageS\AdminControllers\CommentManagementPageController;
use App\RouteManager;

class AdminPageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('admin', [MainAdminPageController::class, 'admin']);
        $this->router->get('userManagement', [UserManagementPageController::class, 'userManagement']);
        $this->router->get('commentManagement', [CommentManagementPageController::class, 'commentManagement']);

        $this->router->post('admin', [UserRoleChangeController::class, 'changeUserRole']);
        $this->router->post('commentManagement', [CheckOreDeleteCommentController::class, $this->whichCallbackToCall()]);
    }
    private function whichCallbackToCall()
    {
        $callback = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->getValueFromRequestData('action_name', $_POST, null) === 'checkComment') {
                $callback = 'checkComment';
            }
            if($this->getValueFromRequestData('action_name', $_POST, null) === 'deleteComment') {
                $callback = 'deleteComment';
            }
        }
        return $callback;
    }

    private function getValueFromRequestData($key, $arr, $defaultValue)
    {
        if (array_key_exists($key, $arr)) {
            $result = $arr[$key];
            if ($result === '') {
                $result = $defaultValue;
            }
        } else {
            $result = $defaultValue;
        }
        return $result;
    }
}

