<tr>
    <th scope="row"><?php echo $id; ?></th>
    <td><?php echo $first_name; ?></td>
    <td><?php echo $last_name; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $login; ?></td>
    <td>
        <button type="button" class="btn btn-danger goa_booking_delete_agent_button" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent" data-agent-id="<?php echo $id; ?>" data-agent-login="<?php echo $login; ?>">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>