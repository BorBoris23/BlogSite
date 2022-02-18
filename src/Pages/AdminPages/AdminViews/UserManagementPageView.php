<?php
namespace App\Pages\AdminPages\AdminViews;

use App\Pages\PagesWithExceptionView;


class UserManagementPageView extends PagesWithExceptionView
{
    private $pagination;
    private $users;
    private $roles;
    private $pageName;

    public function __construct($model, $pagination)
    {
        parent::__construct($model);
        $this->pageName = '/userManagement';
        $this->model = $model;
        $this->pagination = $pagination;
        $this->users = $model->users;
        $this->roles = $model->roles;
    }

    public function renderContent()
    {
        return '<div class="users_container">'.$this->renderUsersListItems().'</div>'.$this->pagination->renderUmPagination($this->pageName);
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
                            (in_array($role['name'],$this->model->getUserRoles($user->login)) ? 'checked' : '') . '  name="' . $role->name . '"
                             '.( ($user->name === 'SuperAdmin') ? 'disabled' : '').' value="checkbox_change" > ' . $role->name . ' <br>
                         </div>';
        }
        return $result;
    }

    public function renderNavigation()
    {
        return '<div class="nav-scroller py-1 mb-2">
                        <nav class="nav d-flex justify-content-between">
                            <a class="p-2 link-secondary" href="/">Main</a>
                            '.$this->renderAdminItem().'
                            <a class="p-2 link-secondary" href="/rules">Rules</a>
                        </nav>
                    </div>';

    }

    private function renderAdminItem()
    {
        $result = '';
        if(!empty($this->model->currentUser)) {
            if($this->model->currentUser->login === 'SuperAdmin') {
                $result = '<a class="p-2 link-secondary" href="/admin">AdminPages</a>';
            }
        }
        return $result;
    }


}

