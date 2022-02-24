<?php
namespace App\Pages\Admin;

use App\Pages\Admin\AdminControllers\CommentManagementControllers\CheckOreDeleteCommentController;
use App\Pages\Admin\AdminControllers\PostManagementControllers\PostManagementController;
use App\Pages\Admin\AdminControllers\PostManagementControllers\PublishedNewPostController;
use App\Pages\Admin\AdminControllers\UserManagementControllers\UserManagementController;
use App\Pages\Admin\AdminControllers\UserManagementControllers\UserRoleChangeController;
use App\Pages\Admin\AdminControllers\CommentManagementControllers\CommentManagementController;
use App\Pages\Admin\AdminControllers\MainAdminController;
use App\RouteManager;

class AdminRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('admin', [MainAdminController::class, 'admin']);
        $this->router->get('userManagement', [UserManagementController::class, 'userManagement']);
        $this->router->get('commentManagement', [CommentManagementController::class, 'commentManagement']);
        $this->router->get('postManagement', [PostManagementController::class, 'postManagement']);

        $this->router->post('admin', [UserRoleChangeController::class, 'changeUserRole']);
        $this->router->post('commentManagement', [CheckOreDeleteCommentController::class, $this->whichCallbackToCall()]);
        $this->router->post('postManagement', [PublishedNewPostController::class, 'publishedPost']);
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
