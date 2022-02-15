<?php
namespace App\Pages\ProfilePage;

use App\Models\Subscription;
use App\Models\PageModel;
use App\Models\User;

class ProfilePageModel extends PageModel
{
    public $author;
    public $subscriber;
    public $subscriptions;
    public $currentSubscription;

    public function __construct($profileId)
    {
        parent::__construct();
        $this->author = User::find($profileId);
        $this->subscriber = $this->currentUser;
        $this->subscriptions = $this->author->subscriptions();
        $this->currentSubscription = Subscription::where('subscriberUser_id', '=', $this->subscriber->id)->first();
    }
}
