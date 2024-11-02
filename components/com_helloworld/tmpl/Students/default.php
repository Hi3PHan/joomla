<?php

use Joomla\CMS\Language\Text;

/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2020 John Smith. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<h2> fdasas</h2>

<?php defined('_JEXEC') or die; ?>

<h2>Danh sách sinh viên</h2>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Quê Quán</th>
        <th>Lớp</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($this->students) && is_array($this->students)): ?>
        <?php foreach ($this->students as $student): ?>
            <tr>
                <td><?php echo $student->Masv; ?></td>
                <td><?php echo $student->Tensv; ?></td>
                <td><?php echo $student->Gioitinh; ?></td>
                <td><?php echo $student->Ngaysinh; ?></td>
                <td><?php echo $student->Que; ?></td>
                <td><?php echo $student->Lop; ?></td>

            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Không có sinh viên nào.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>