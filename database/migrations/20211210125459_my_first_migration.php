<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyFirstMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('login', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 50, 'null' => false])
            ->create();

        $table = $this->table('articles');
        $table->addColumn('heading', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('content', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->create();

        $table = $this->table('roles');
        $table->addColumn('name', 'string', ['limit' => 50, 'null' => false])
            ->create();

        $table = $this->table('users_has_roles');
        $table->addColumn('user_id', 'integer', ['null' => true])
            ->addColumn('role_id', 'integer', ['null' => true])
            ->addIndex(['user_id', 'role_id'], ['unique' => true, 'name' => 'fk_link_table_role1_idx', 'order' => ['roles_id' => 'ASC']])
            ->addForeignKey('user_id', 'users', ['id'], ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION', 'constraint' => 'fk_roles_has_users_roles'])
            ->addForeignKey('role_id', 'roles', ['id'], ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION', 'constraint' => 'fk_roles_has_users_roles1'])
            ->create();
    }
}
