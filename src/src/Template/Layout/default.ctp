<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title') ?>
        </title>
        <!-- Meta -->
        <?= $this->Html->meta('icon') ?>
        <?= $this->fetch('meta') ?>       

        <!-- CSS -->
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('default.css') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <!-- Header -->
        <header role="banner">
            <div class="top-header">
                <?= $this->Html->image('logo.png', ['id' => 'logo-main', 'alt' => '', 'width' => '200px']); ?>
            </div>
            <nav id="navbar-primary" class="navbar navbar-default" role="navigation">
                <div class="top-header">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                                <?php if (isset($loggedInUser) && isset($loggedInUser['rights']) && $this->Authorize->hasRight($loggedInUser['rights'], null, 'dashboard', 'index')) : ?>  
                                    <li><a href="/dashboard">Control Panel</a></li>
                                <?php endif; ?> 
                                <?php if (!isset($loggedInUser)) : ?>
                                    <li><a href="#" data-toggle="modal" data-target="#loginModal"><b>Login</b></a> </li>                  
                                <?php else : ?>
                                    <li><a href="/account/logout"><b>Logout</b></a> </li>  
                                <?php endif; ?> 
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Body Content -->
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>                 
        </div>
        <!-- Footer -->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                    </div>                        
                    <div class="col-xs-12 col-sm-6">
                        <ul class="list-inline pull-right footer-socials">
                            <li>
                                <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Email" target="_blank" href="mailto:andrew.klitbo+COM@gmail.com">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </li>
                            <li>
                                <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linked In" target="_blank" href="https://linkedin.com/in/andrewklitbo">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Github" target="_blank" href="https://github.com/AKlitbo">
                                    <i class="fa fa-github"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Login Modal -->
        <?php if (!isset($loggedInUser)) : ?>
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="loginmodal-container ">
                        <div class="modal-body">                
                            <?= $this->Html->image('logo.png', ['alt' => '', 'class' => 'img-responsive']); ?> 
                            <hr />
                            <?=
                            $this->Form->create(null, [
                                'type' => 'post',
                                'url'  => '/account/login']);
                            ?>   
                            <div class="form-group">
                                <label class="sr-only" for="username">Email Address</label>
                                <input type="email" class="form-control" name="username" id="username" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>                                </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block login loginmodal-submit">Sign in</button>
                            </div>
                            <div class="login-help">
                                <a href="/account/register">Register</a> - <a href="/account/forgot">Forgot Password</a>
                            </div>
                            </form>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?> 
        <?= $this->Html->script('jquery-2.2.4.min'); ?>
        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
