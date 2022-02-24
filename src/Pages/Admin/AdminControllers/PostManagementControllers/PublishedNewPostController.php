<?php
namespace App\Pages\Admin\AdminControllers\PostManagementControllers;

use App\models\Post;
use App\Models\Subscription;
use App\models\User;
use App\Logger\Logger;

class PublishedNewPostController
{
    private $post;
    private $author;
    private $subscriptions;

    public function __construct()
    {
        $this->post = Post::where('id', '=', $_POST['post_id']);
        $this->author = User::where('id', '=', $_POST['author_id'])->first();
        $this->subscriptions = Subscription::where('authorUser_id', '=', $this->author->id)->get();
    }

    public function publishedPost()
    {
        $this->post->update(['published' => 1]);
        $this->sendNotification();
        header("Location: #");
        die();
    }

    private function sendNotification()
    {
        $from = 'blogSite@mail.ru';

        $title = $_POST['heading'];
        $articleName = $_POST['heading'];
        $description = $_POST['description'];

        $read = '<a href="/post?postId='.$_POST['post_id'].'">Read</a>';

        $header = "From: $from" . "\r\n" .
                  "Relay-to: $from" . "\r\n" .
                  "X-Mailer: PHP/" . phpversion();

        $subject = 'A new post has been added to the site:“'.$title.'”';
        $message = 'New article: “'.$articleName.'”,' ."\r\n".
                    $description ."\r\n".
                    $read;

        if (file_exists('src/Logger/log.txt')) {
            unlink('src/Logger/log.txt');
        }

        foreach ($this->subscriptions as $subscription) {
            $toEmails = $subscription->subscriber->email;

            $letter = array(
                'from' => $header,
                'to' => $toEmails,
                'subject' => $subject,
                'message' => $message
            );

            Logger::$logPath = $_SERVER['DOCUMENT_ROOT'].'/src/Logger/log.txt';
            Logger::log($letter);
        }
    }
}
