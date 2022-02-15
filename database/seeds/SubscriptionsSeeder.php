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
                'subscriberUser_id'   => '2',
                'authorUser_id'   => '4'
            ],
            [
                'subscriberUser_id'   => '2',
                'authorUser_id'   => '3'
            ],
            [
                'subscriberUser_id'   => '3',
                'authorUser_id'   => '2'
            ],
            [
                'subscriberUser_id'   => '4',
                'authorUser_id'   => '5'
            ],
            [
                'subscriberUser_id'   => '4',
                'authorUser_id'   => '2'
            ],
            [
                'subscriberUser_id'   => '4',
                'authorUser_id'   => '3'
            ],
            [
                'subscriberUser_id'   => '4',
                'authorUser_id'   => '5'
            ]
        ];

        $posts = $this->table('subscriptions');
        $posts->insert($data)
            ->saveData();
    }
}
