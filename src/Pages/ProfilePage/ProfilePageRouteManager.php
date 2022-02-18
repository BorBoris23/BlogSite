<?php
namespace App\Pages\ProfilePage;

use App\Pages\ProfilePage\ProfilePageControllers\ProfilePageController;
use App\Pages\ProfilePage\ProfilePageControllers\ProfileController;
use App\RouteManager;

class ProfilePageRouteManager extends RouteManager
{
    public function addRoute()
    {
        $this->router->get('profile', [ProfilePageController::class, 'profile']);

        $this->router->post('profile', [ProfileController::class, $this->whichCallbackToCall()]);
    }

    private function whichCallbackToCall()
    {
        $callback = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->getValueFromRequestData('action_name', $_POST, null) === 'subscribe') {
                $callback = 'subscribe';
            }
            if($this->getValueFromRequestData('action_name', $_POST, null) === 'unsubscribe') {
                $callback = 'unsubscribe';
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