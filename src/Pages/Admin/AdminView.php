<?php
namespace App\Pages\Admin;

use App\View\PageView;

class AdminView extends PageView
{
    private $adminModel;
    private $users;
    private $roles;

    public function __construct($adminModel)
    {
        $this->adminModel = $adminModel;
        $this->users = $adminModel->users;
        $this->roles = $adminModel->roles;
    }

    public function renderContent()
    {
        return '<div class="users_container">'.$this->renderUsersListItems().'</div>';
    }

    private function  renderUsersListItems()
    {
        $result = '';
        foreach ($this->users as $user) {
            $result .= '
                <li class="admin_list">
                    <div class="admin_box">
                        <div class="">
                            <span class="">Имя пользователя</span>
                            ' . $user->login . '
                        </div>
                        <div class="">
                            <span class="">Список ролей<span class="">
                            <form enctype="application/x-www-form-urlencoded" class="order-item__title changeRole" method="post" action="#">
                                ' . $this->renderRolesListItems($user->login) . '
                                <input type="hidden" name="loginId" value="' . $user->id . '">
                                <input type="hidden" name="action_name" value="checkbox_change">
                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </li>';
        }
        return $result;
    }

    private function renderRolesListItems($login)
    {
        $result = '';
        foreach ($this->roles as $role) {
            $result .= '<input type="checkbox" ' . ($this->hasUserTheDesiredRole($role['name'],
                    $this->adminModel->getUserRoles($login)) ? 'checked' : '') . '  name="' . $role->name . '"> ' . $role->name . ' <br>';
        }
        return $result;
    }

    private function hasUserTheDesiredRole($role, $userRoles)
    {
        if (in_array($role, $userRoles)) {
            return true;
        } else {
            return false;
        }
    }
}
