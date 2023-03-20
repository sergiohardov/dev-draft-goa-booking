<div class="goa-booking-plugin-settings">
    <div class="container-fluid pt-3 pb-3">
        <div class="row">
            <h1 class="text-center"><?php echo get_admin_page_title(); ?></h1>
        </div>

        <div class="row">
            <h2 class="text-center">Agents</h2>
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

        <div class="row">
            <h2 class="text-center">Clients</h2>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>First Example</td>
                        <td>Last Example</td>
                        <td>example@mdo</td>
                        <td>+380933333333</td>
                        <td>examplelogin</td>
                        <td style="width: 450px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod impedit saepe vero illo cupiditate exercitationem inventore, autem iure dolore sapiente!</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>First Example</td>
                        <td>Last Example</td>
                        <td>example@mdo</td>
                        <td>+380933333333</td>
                        <td>examplelogin</td>
                        <td style="width: 450px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod impedit saepe vero illo cupiditate exercitationem inventore, autem iure dolore sapiente!</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>First Example</td>
                        <td>Last Example</td>
                        <td>example@mdo</td>
                        <td>+380933333333</td>
                        <td>examplelogin</td>
                        <td style="width: 450px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod impedit saepe vero illo cupiditate exercitationem inventore, autem iure dolore sapiente!</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>First Example</td>
                        <td>Last Example</td>
                        <td>example@mdo</td>
                        <td>+380933333333</td>
                        <td>examplelogin</td>
                        <td style="width: 450px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod impedit saepe vero illo cupiditate exercitationem inventore, autem iure dolore sapiente!</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>