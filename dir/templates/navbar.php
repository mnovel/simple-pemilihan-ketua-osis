<?php error_reporting(0) ?>
<?php if ($_SESSION['role'] == 'admin') { ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ACCOUNT SETTINGS</li>
        <li class="nav-item <?= $selectMenu == 'Candidate Menu' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $selectMenu == 'Candidate Menu' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                    Candidate Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/" class="nav-link <?= $title == 'Candidate' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Candidate</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/addCandidate" class="nav-link <?= $title == 'Add Candidate' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Candidate</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/editCandidate" class="nav-link <?= $title == 'Edit Candidate' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit Candidate</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?= $selectMenu == 'Admin Menu' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $selectMenu == 'Admin Menu' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Admin Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/admin" class="nav-link <?= $title == 'Admin' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/addAdmin" class="nav-link <?= $title == 'Add Admin' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/editAdmin" class="nav-link <?= $title == 'Edit Admin' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit Admin</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?= $selectMenu == 'Moderator Menu' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $selectMenu == 'Moderator Menu' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                    Moderator Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/moderator" class="nav-link <?= $title == 'Moderator' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Moderator</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/addModerator" class="nav-link <?= $title == 'Add Moderator' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Moderator</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/editModerator" class="nav-link <?= $title == 'Edit Moderator' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit Moderator</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?= $selectMenu == 'User Menu' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $selectMenu == 'User Menu' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    User Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/user" class="nav-link <?= $title == 'User' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/addUser" class="nav-link <?= $title == 'Add User' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin/editUser" class="nav-link <?= $title == 'Edit User' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit User</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">WEB SETTINGS</li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/admin/profile" class="nav-link <?= $title == 'Profile' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="<?= constant("url") ?>/admin/schedule" class="nav-link <?= $title == 'Schedule' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>
                    Schedule
                </p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="<?= constant("url") ?>/admin/className" class="nav-link <?= $title == 'Class' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Class
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/admin/settings" class="nav-link <?= $title == 'Settings' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Settings
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/admin/logLogin" class="nav-link <?= $title == 'Log Login' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                    Log Login
                </p>
            </a>
        </li>

    </ul>
<?php } else if ($_SESSION['role'] == 'moderator') { ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MODERATOR MENU</li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/moderator/" class="nav-link <?= $title == 'Absent' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>
                    Absent
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/moderator/scanner" class="nav-link <?= $title == 'Scanner' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-scanner"></i>
                <p>
                    Scanner
                </p>
            </a>
        </li>
    </ul>
<?php  } else if ($_SESSION['role'] == 'user') { ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">USER MENU</li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/user/index" class="nav-link <?= $title == 'Vote' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-vote-yea"></i>
                <p>
                    Vote
                </p>
            </a>
        </li>
    </ul>
<?php } else { ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MENU</li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/index" class="nav-link <?= $title == 'Quick Qount' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-poll-h"></i>
                <p>
                    Quick Qount
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= constant("url") ?>/qrcode" class="nav-link <?= $title == 'Qr Code' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-qrcode"></i>
                <p>
                    Qr Code
                </p>
            </a>
        </li>
        <li class="nav-item <?= $selectMenu == 'Moderator Menu' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $selectMenu == 'Moderator Menu' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-sign-in-alt"></i>
                <p>
                    Login
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/admin" target="_blank" class="nav-link <?= $title == 'Moderator' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/moderator" target="_blank" class="nav-link <?= $title == 'Add Moderator' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Moderator</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= constant("url") ?>/user" target="_blank" class="nav-link <?= $title == 'Edit Moderator' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
<?php } ?>