<?php include_partial('global/page_title', array('title' => 'View and Manage User', 'back_url' => 'userManagement/index', 'icon_class' => 'page-title-user-icon')); ?>

<?php if ($sf_user->hasFlash('successMsg')): ?>
    <div class="flash_success"><?php echo $sf_user->getFlash('successMsg'); ?></div>
<?php endif ?>

<?php
$form = new formHelper();
?>

<div class="form-container">
    <div class="form-header" style="text-align: center;">Registered User List</div>
    <table class="kt-table">
        <tr>
            <th>Sl. No.</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Action Available</th>
        </tr>
        <?php foreach ($userList as $data) { ?>
            <tr>
                <td><?php echo ++$offset; ?></td>
                <td><?php echo $data['first_name'] . $data['last_name']; ?></td>
                <td><?php echo $data['user_group']; ?></td>
                <td><?php echo $data['user_dept']; ?></td>
                <td><?php echo $data['email_address']; ?></td>
                <td style="text-align: center;"><?php echo link_to('&nbsp;', '@delete_user?id=' . $data['record_id'], array('class' => 'delete_icon', 'confirm' => 'Are you sure?', 'absolute' => true)); ?></td>
            </tr>
    <?php } ?>
    </table>
<?php echo $pagination->render(); ?>
</div>