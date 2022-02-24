<?php
use Phinx\Seed\AbstractSeed;

class PostsSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return ['UsersSeeder'];
    }

    public function run()
    {

        $data = [
            [
                'heading'           => 'heading1',
                'shortDescription'  => 'shortDescription shortDescription shortDescription shortDescription',
                'content'           => 'many content many content many content many content many content many content',
                'pathToImg'    => 'img/posts-img/house-6934535__340.jpg',
                'user_id'           => '2',
                'published'         => '1'
            ],
            [
                'heading'           => 'heading2',
                'shortDescription'  => 'shortDescription shortDescription shortDescription shortDescription',
                'content'           => 'many content many content many content many content many content many content',
                'pathToImg'    => 'img/posts-img/italy-6728318__340.jpg',
                'user_id'           => '2',
                'published'         => '1'

            ],
            [
                'heading'           => 'heading3',
                'shortDescription'  => 'shortDescription shortDescription shortDescription shortDescription',
                'content'           => 'many content many content many content many content many content many content',
                'pathToImg'    => 'img/posts-img/mountains-6933693__340.jpg',
                'user_id'           => '3',
                'published'         => '1'
            ],
            [
                'heading'           => 'heading4',
                'shortDescription'  => 'shortDescription shortDescription shortDescription shortDescription',
                'content'           => 'many content many content many content many content many content many content',
                'pathToImg'    => 'img/posts-img/sea-6944490__340.jpg',
                'user_id'           => '4',
                'published'         => '1'
            ],
            [
                'heading'           => 'heading5',
                'shortDescription'  => 'shortDescription shortDescription shortDescription shortDescription',
                'content'           => 'many content many content many content many content many content many content',
                'pathToImg'    => 'img/posts-img/town-6947538__340.jpg',
                'user_id'           => '5',
                'published'         => '1'
            ],
            [
                'heading'           => 'heading6',
                'shortDescription'  => 'shortDescription shortDescription shortDescription shortDescription',
                'content'           => 'many content many content many content many content many content many content',
                'pathToImg'    => 'img/posts-img/winter-6928797__340.jpg',
                'user_id'           => '5',
                'published'         => '1'
            ]
        ];

        $posts = $this->table('posts');
        $posts->insert($data)
            ->saveData();
    }
}