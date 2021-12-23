<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/head.php';
?>
<div class="container">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/header.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/navigation.php';
    ?>
    <h1 class="">Authorization</h1>
    <form name="authorization" class="" action="#" method="post">
        <input type="text" placeholder="Enter your user name ore email" class="" required name='loginOreEmail'>
        <input type="password" placeholder="Enter your password" class="" required name='password'>
        <input type="hidden" name="action_name" value="user_auth">
        <button class="button" type="submit">Sign up</button>
    </form>
</div>

