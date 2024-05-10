
<!-- app/View/Users/login.ctp -->

<!-- <h2>Login</h2>
<?php
    echo $this->Form->create('User', array('url' => 'login'));
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?> -->

<h2>Login</h2>
<?php
    echo $this->Form->create('User', array('url' => 'login', 'id' => 'login-form'));
    echo $this->Form->input('username', array('id' => 'login-username'));
    echo $this->Form->input('password', array('id' => 'login-password'));
    echo $this->Form->end('Login');
?>
<?php echo $this->Html->script('login'); ?>

