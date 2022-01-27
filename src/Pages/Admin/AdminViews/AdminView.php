<?php
namespace App\Pages\Admin\AdminViews;

use App\View\PageView;

class AdminView extends PageView
{
    private $adminModel;
    private $pagination;
    private $users;
    private $roles;

    public function __construct($adminModel, $pagination)
    {
        $this->adminModel = $adminModel;
        $this->pagination = $pagination;
        $this->users = $adminModel->users;
        $this->roles = $adminModel->roles;
    }

    public function renderContent()
    {
        return '<div class="users_container">'.$this->renderUsersListItems().'</div>'.$this->pagination->renderUmPagination();
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
                        <span class="">Список ролей<span class="">
                        ' . $this->renderRolesListItems($user) . '
                    </div>
                </li>';
        }
        return $result;
    }

    private function renderRolesListItems($user)
    {
        $result = '';
        foreach ($this->roles as $role) {
            $result .= '<div class="userInfo" userId="'.$user->id .'">
                        <input class="changeRole" type="checkbox" ' .
                        (in_array($role['name'],$this->adminModel->getUserRoles($user->login)) ? 'checked' : '') . '  name="' . $role->name . '"
                         '.( ($user->name === 'SuperAdmin') ? 'disabled' : '').' value="checkbox_change" > ' . $role->name . ' <br>
                    </div>';
        }
        return $result;
    }


}

