<?php
use Phinx\Seed\AbstractSeed;

class SubscriptionsSeeder extends AbstractSeed
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
                'user_id'   => '2',
                'post_id'   => '1'
            ],
            [
                'user_id'   => '2',
                'post_id'   => '1'
            ],
            [
                'user_id'   => '3',
                'post_id'   => '1'
            ],
            [
                'user_id'   => '4',
                'post_id'   => '2'
            ],
            [
                'user_id'   => '4',
                'post_id'   => '3'
            ],
            [
                'user_id'   => '4',
                'post_id'   => '3'
            ],
            [
                'user_id'   => '4',
                'post_id'   => '3'
            ]
        ];

        $posts = $this->table('subscriptions');
        $posts->insert($data)
            ->saveData();
    }
}
