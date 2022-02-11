<?php
use Phinx\Seed\AbstractSeed;

class CommentsSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UsersSeeder',
            'PostsSeeder'
        ];
    }

    public function run()
    {
        $data = [
            [
                'content'   => 'comment №1 from a user with an id-2 to an article with an id-1',
                'user_id'   => '2',
                'post_id'   => '1',
                'isChecked' => '0'
            ],
            [
                'content'   => 'comment №2 from a user with an id-2 to an article with an id-1',
                'user_id'   => '2',
                'post_id'   => '1',
                'isChecked' => '1'
            ],
            [
                'content'   => 'comment №1 from a user with an id-3 to an article with an id-1',
                'user_id'   => '3',
                'post_id'   => '1',
                'isChecked' => '1'
            ],
            [
                'content'   => 'comment №1 from a user with an id-4 to an article with an id-2',
                'user_id'   => '4',
                'post_id'   => '2',
                'isChecked' => '1'
            ],
            [
                'content'   => 'comment №1 from a user with an id-4 to an article with an id-3',
                'user_id'   => '4',
                'post_id'   => '3',
                'isChecked' => '1'
            ],
            [
                'content'   => 'comment №2 from a user with an id-4 to an article with an id-3',
                'user_id'   => '4',
                'post_id'   => '3',
                'isChecked' => '1'
            ],
            [
                'content'   => 'comment №3 from a user with an id-4 to an article with an id-3',
                'user_id'   => '4',
                'post_id'   => '3',
                'isChecked' => '1'
            ]
        ];

        $posts = $this->table('comments');
        $posts->insert($data)
            ->saveData();
    }
}