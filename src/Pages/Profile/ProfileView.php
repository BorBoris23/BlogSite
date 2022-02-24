<?php
namespace App\Pages\Profile;

use App\Pages\PagesWithExceptionView;

class ProfileView extends PagesWithExceptionView
{
    private $author;
    private $subscriber;
    private $posts;
    private $subscription;

    public function __construct($model)
    {
        parent::__construct($model);
        $this->subscriber = $model->subscriber;
        $this->author = $model->author;
        $this->posts = $this->author->posts;
        $this->subscription = $model->currentSubscription;
    }

    public function renderContent()
    {
        return
            $this->renderProfileBlock() .'
            <div class="container">
                <div class="row mb-2">
                    '.$this->renderPostsList().'
                 </div>
            </div>';
    }

    private function renderProfileBlock()
    {
        return '
          <article class="blog-post">
            <h2 class="blog-post-title">'.$this->author->name.'</h2>
            <p class="blog-post-meta">'.$this->author->aboutMe.'</p>
            <p>My email - '.$this->author->email.' </p>
            <img class="avatar" src="'.$this->author->pathToAvatar.'">
            '.$this->subscribe().'
            <hr>
          </article>';
    }

    private function renderPostsList()
    {
        $result = '';
        foreach ($this->posts as $post) {
                $result .= '
                <div class="col-md-2">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <a href="/post?postId='.$post['id'].'">'.$post->heading.'</a>
                            <div class="mb-1 text-muted">'.$post->shortDescription.'</div>
                            <div class="mb-1 text-muted">'.$post->created.'</div>
                        </div>
                    </div>
                </div>';
        }
        return $result;
    }

    private function subscribe()
    {
        return '
            <form name="subscription" class="subscription" action="#" method="post">
                '.( (is_null($this->subscription)) ? '
                
                <input type="hidden" name="subscriber_id" value="'.$this->subscriber->id.'">
                <input type="hidden" name="action_name" value="subscribe">
                <button id="subscribe" type="submit" class="btn btn-primary">Subscribe</button>' :

                '<input type="hidden" name="subscriber_id" value="'.$this->subscriber->id.'">
                <input type="hidden" name="action_name" value="unsubscribe">
                <button id="unsubscribe" type="submit" class="btn btn-primary">Unsubscribe</button>').'
            </form>';
    }
}
