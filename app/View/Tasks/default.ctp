<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
    <?php echo $this->Html->meta('icon'); ?>
    <?php echo $this->Html->css('bootstrap.min'); ?> <!-- Include Bootstrap CSS -->
    <?php echo $this->Html->css('custom'); ?> <!-- Include Custom CSS -->
    <?php echo $this->Html->script('jquery.min'); ?> <!-- Include jQuery -->
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
</head>
<body>
    <div id="container">
        <header>
            <h1>Welcome to My CakePHP Application</h1>
        </header>
        <nav>
            <ul>
                <li><?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home')); ?></li>
                <li><?php echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'display', 'about')); ?></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
        <div id="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> My CakePHP Application</p>
    </footer>
    <?php echo $this->Html->script('bootstrap.min'); ?> <!-- Include Bootstrap JavaScript -->
    <?php echo $this->Html->script('custom'); ?> <!-- Include Custom JavaScript -->
</body>
</html>
