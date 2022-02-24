<?php
namespace App\Pages\Profile\ProfileControllers;

use App\Models\Subscription;
use App\Pages\Profile\ProfileModel;

class SubscriptionsController
{
    private $model;
    private $subscriberUser_id;
    private $subscription;

    public function __construct()
    {
        $this->model = new ProfileModel($_GET['profileId']);;
        $this->subscriberUser_id = $this->model->subscriber->id;
        $this->subscription = $this->model->currentSubscription;
    }

    public function subscribe()
    {
        $authorUser_id = $_GET['profileId'];

        $table = new Subscription();
        $table->subscriberUser_id = $this->subscriberUser_id;
        $table->authorUser_id = $authorUser_id;
        $table->save();
        header("Location: #");
        die();
    }

    public function unsubscribe()
    {
        $this->subscription->delete();
        header("Location: #");
        die();
    }
}
