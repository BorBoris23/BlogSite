<?php

use App\Pages\Profile\ProfileRouteManager;
use App\Pages\Home\HomeRouteManager;
use App\Pages\Admin\AdminRouteManager;
use App\Pages\UserMenu\UserMenuRouteManager;
use App\Pages\Post\PostRouteManager;
use App\Pages\Rules\RulesRouteManager;
use App\Pages\WriteNewPost\WriteNewPostRoteManager;

$HomeRouteManager = new HomeRouteManager();

$AdminRouteManager = new AdminRouteManager();

$UserMenuRouteManager = new UserMenuRouteManager();

$ProfilePRouteManager = new ProfileRouteManager();

$PostRouteManager = new PostRouteManager();

$RolesRouteManager = new RulesRouteManager();

$WriteNewPostRoutManager = new WriteNewPostRoteManager();
