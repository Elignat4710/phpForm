<?php require ('partials/header.php'); ?>
<div class="container">
    <h2 class="text-center">All members: <?php echo count($data); ?></h2>

    <table class="table">
        <thead>
            <tr >
                <th>id</th>
                <th>Full name</th>
                <th>Report subject</th>
                <th>Photo</th>
                <th><spam class="center">Email</spam></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $user) : ?>
                <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $user['firstName'] . ' ' . $user['lastName']; ?></td>
                    <td><?php echo $user['reportSubject']; ?></td>
                    <td>
                        <img
                            src="<?php echo ! empty($user['photo']) ? $user['photo'] : 'public/image/default.png'; ?>"
                            alt=""
                            class="photo"
                        >
                    </td>
                    <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require ('partials/footer.php'); ?>
