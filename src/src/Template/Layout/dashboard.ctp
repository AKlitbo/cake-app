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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

        <!-- CSS -->
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('dashboard/main.css') ?>
        <?= $this->Html->css('dashboard/theme.css') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <div class="wrapper dk" id="wrap">
            <div id="top">
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container-fluid">
                        <header class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="/home" class="navbar-brand">
                                <?= $this->Html->image('logo.png', ['alt' => '', 'height' => '50px']); ?>
                            </a>
                        </header>
                        <div class="topnav">
                            <div class="btn-group">
                                <a href="/account/logout" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                    <i class="fa fa-power-off"></i>&nbsp;Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="left">
                <div class="media user-media">
                    <div class="user-wrapper">
                        <a class="user-link" href="/admin/users/view/<?= $loggedInUser['id'] ?>">
                            <img class="media-object img-thumbnail user-img" alt="User Picture" src="https://placeholdit.imgix.net/~text?txtsize=8&txt=64%C3%9764&w=64&h=64">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading"><?= $loggedInUser['display_name'] ?></h5>
                            <ul class="list-unstyled user-info">
                                <li><a href="/admin/roles/view/<?= $loggedInUser['role_id'] ?>"><?= $loggedInUser['role']['name'] ?></a></li>
                                <li>Last Login : <br />
                                    <small><i class="fa fa-calendar"></i>&nbsp;<?= isset($loggedInUser['last_login']) ? $loggedInUser['last_login']->nice() : '' ?></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul id="menu">  
                    <li class="nav-header">Main Menu</li>                 
                    <li>
                        <a href="/dashboard">   
                            <i class="fa fa-dashboard"></i>&nbsp;Dashboard                               
                        </a>
                    </li>        
                    <li class="nav-divider"></li>  
                    <li class="nav-header">Authoring</li>                          
                    <li>
                        <a href="#">   
                            <i class="fa fa-copy"></i>&nbsp;Pages                             
                        </a>
                    </li>                                     
                    <li>
                        <a href="#">   
                            <i class="fa fa-object-group"></i>&nbsp;Media                                
                        </a>
                    </li>                                       
                    <li>
                        <a href="#">   
                            <i class="fa fa-book"></i>&nbsp;Posts                                
                        </a>
                    </li>                                    
                    <li>
                        <a href="#">  
                            <i class="fa fa-comments"></i>&nbsp;Comments                               
                        </a>
                    </li>   
                    <li class="nav-divider"></li>  
                    <li class="nav-header">Administration</li>
                    <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'users', 'index') || $this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'users', 'add')) : ?>
                        <li class="dropdown">
                            <a href="javascript:;" data-toggle="collapse" data-target="#users">
                                <i class="fa fa-users"></i>&nbsp;Users
                                <span class="fa arrow"></span>
                            </a>
                            <ul id="users" class="collapse">
                                <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'users', 'index')) : ?>
                                    <li>
                                        <a href="/admin/users"> 
                                            <i class="fa fa-users"></i>&nbsp;All Users    
                                        </a>
                                    </li>  
                                <?php endif; ?> 
                                <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'users', 'add')) : ?>
                                    <li>
                                        <a href="/admin/users/add"> 
                                            <i class="fa fa-plus"></i>&nbsp;Add User   
                                        </a>
                                    </li>  
                                <?php endif; ?>  
                            </ul>
                        </li> 
                    <?php endif; ?> 
                    <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'roles', 'index') || $this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'roles', 'add')) : ?>
                        <li class="dropdown">
                            <a href="javascript:;" data-toggle="collapse" data-target="#roles">
                                <i class="fa fa-id-card"></i>&nbsp;Roles
                                <span class="fa arrow"></span>
                            </a>
                            <ul id="roles" class="collapse">
                                <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'roles', 'index')) : ?>
                                    <li>
                                        <a href="/admin/roles"> 
                                            <i class="fa fa-id-card"></i>&nbsp;All Roles    
                                        </a>
                                    </li>  
                                <?php endif; ?> 
                                <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'roles', 'add')) : ?>
                                    <li>
                                        <a href="/admin/roles/add"> 
                                            <i class="fa fa-plus"></i>&nbsp;Add Role   
                                        </a>
                                    </li>  
                                <?php endif; ?>  
                            </ul>
                        </li> 
                    <?php endif; ?> 
                    <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'permissions', 'index') || $this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'permissions', 'add')) : ?>
                        <li class="dropdown">
                            <a href="javascript:;" data-toggle="collapse" data-target="#permissions">
                                <i class="fa fa-eye"></i>&nbsp;Permissions
                                <span class="fa arrow"></span>
                            </a>
                            <ul id="permissions" class="collapse">
                                <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'permissions', 'index')) : ?>
                                    <li>
                                        <a href="/admin/permissions"> 
                                            <i class="fa fa-eye"></i>&nbsp;All Permissions    
                                        </a>
                                    </li>  
                                <?php endif; ?> 
                                <?php if ($this->Authorize->hasRight($loggedInUser['rights'], 'admin', 'permissions', 'add')) : ?>
                                    <li>
                                        <a href="/admin/permissions/add"> 
                                            <i class="fa fa-plus"></i>&nbsp;Add Permission   
                                        </a>
                                    </li>  
                                <?php endif; ?>  
                            </ul>
                        </li> 
                    <?php endif; ?> 
                </ul>
            </div>
            <div id="content">
                <div class="main-bar">
                    <h3>
                        <i class="fa <?= isset($icon) ? $icon : '' ?>"></i>&nbsp;
                        <?= isset($title) ? $title : '{NO TITLE SET FOR VIEW}' ?>
                    </h3>
                </div>
                <div class="inner bg-light lter">  
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?> 
                </div>         
            </div>
        </div>        
        <footer class="footer bg-dark dker">           
            <p>
                <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Email" target="_blank" href="mailto:andrew.klitbo+COM@gmail.com">
                    <i class="fa fa-envelope"></i>
                </a>
                <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linked In" target="_blank" href="https://linkedin.com/in/andrewklitbo">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Github" target="_blank" href="https://github.com/AKlitbo">
                    <i class="fa fa-github"></i>
                </a>
            </p>
        </footer>
        <!-- JavaScript -->
        <?= $this->Html->script('jquery-2.2.4.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
        <?= $this->Html->script('app.js'); ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
