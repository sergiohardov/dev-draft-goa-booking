<div class="goa-booking-plugin-settings">
    <div class="container-fluid pt-3 pb-3">
        <div class="row">
            <h1 class="text-center"><?php echo get_admin_page_title(); ?></h1>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-between">
                <h2 class="text-center">Agents</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddAgent">
                    <i class="bi bi-plus"></i><span><?php _e('Add Agent', 'goa-booking'); ?></span>
                </button>

                <div class="modal fade" id="modalAddAgent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php _e('Create New Agent', 'goa-booking'); ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form>

                                    <div class="mb-3">
                                        <label for="agent_login" class="form-label"><?php _e('Login', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input id="agent_login" type="text" class="form-control" placeholder="<?php _e('example', 'goa-booking'); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agent_password" class="form-label"><?php _e('Password', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input id="agent_password" type="password" class="form-control" placeholder="********">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agent_repeat_password" class="form-label"><?php _e('Repeat Password', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input id="agent_repeat_password" type="password" class="form-control" placeholder="********">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agent_email" class="form-label"><?php _e('Email', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-at"></i></span>
                                            <input id="agent_email" type="email" class="form-control" placeholder="example@mail.com">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agent_first_name" class="form-label"><?php _e('First Name', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-add"></i></span>
                                            <input id="agent_first_name" type="text" class="form-control" placeholder="<?php _e('Alex', 'goa-booking'); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agent_last_name" class="form-label"><?php _e('Last Name', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-add"></i></span>
                                            <input id="agent_last_name" type="text" class="form-control" placeholder="<?php _e('Chizas', 'goa-booking'); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agent_phone" class="form-label"><?php _e('Phone', 'goa-booking'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                            <input id="agent_phone" type="text" class="form-control" placeholder="+380 (99) 99 99 999">
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Close', 'goa-booking'); ?></button>
                                <button type="button" class="btn btn-primary"><span><?php _e('Add', 'goa-booking'); ?></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped table-sm align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Login</th>
                            <th scope="col">Bio</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $agents = goa_booking_get_agents(); ?>
                        <?php foreach ($agents as $agent) { ?>
                            <tr>
                                <th scope="row"><?php echo $agent->id; ?></th>
                                <td><?php echo $agent->first_name; ?></td>
                                <td><?php echo $agent->last_name; ?></td>
                                <td><?php echo $agent->email; ?></td>
                                <td><?php echo $agent->phone; ?></td>
                                <td><?php echo $agent->login; ?></td>
                                <td style="width: 450px"><?php echo $agent->bio; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>