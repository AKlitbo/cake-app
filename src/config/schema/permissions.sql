--
-- Table structure for table `permissions`
--
CREATE TABLE `permissions` (
  `id` smallint(11) UNSIGNED NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` smallint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Default data for table `permissions`
--
INSERT INTO `permissions` (`id`, `prefix`, `controller`, `action`, `description`) VALUES
(1, NULL, 'Dashboard', 'index', 'Dashboard'),
(2, 'Admin', 'Users', 'index', 'View Users'),
(3, 'Admin', 'Users', 'view', 'View User'),
(4, 'Admin', 'Users', 'add', 'Create User'),
(5, 'Admin', 'Users', 'edit', 'Edit User'),
(6, 'Admin', 'Users', 'delete', 'Delete User'),
(7, 'Admin', 'Roles', 'index', 'View Roles'),
(8, 'Admin', 'Roles', 'view', 'View Role'),
(9, 'Admin', 'Roles', 'add', 'Create Role'),
(10, 'Admin', 'Roles', 'edit', 'Edit Role'),
(11, 'Admin', 'Roles', 'delete', 'Delete Role'),
(12, 'Admin', 'Permissions', 'index', 'View Permissions'),
(13, 'Admin', 'Permissions', 'add', 'Create Permission'),
(14, 'Admin', 'Permissions', 'edit', 'Edit Permission'),
(15, 'Admin', 'Permissions', 'delete', 'Delete Permission'),
(16, 'Admin', 'RolePermissions', 'index', 'View RolePermissions'),
(17, 'Admin', 'RolePermissions', 'add', 'Create RolePermissions'),
(18, 'Admin', 'RolePermissions', 'edit', 'Edit RolePermissions'),
(19, 'Admin', 'RolePermissions', 'delete', 'Delete RolePermissions');