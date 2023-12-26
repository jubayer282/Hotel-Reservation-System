<?php
/**
* Template Name: Display All Orders List
* */

if ( is_admin() AND isset($_POST['services-submit']) ) {
    $title = $_POST['service-title'];
    $price = intval( $_POST['service-price'] );

    add_services( $title, $price );
}

$service = get_row( 'additional_services', 'title' );

if (is_admin()) {
?>

<form action="#" method="POST">
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add New Services</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" name="services-submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-title">Title</label>
                                <input type="text" id="input-title" class="form-control" name="service-title" placeholder="Enter Service Title" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-price">Price</label>
                                <input type="number" id="input-price" class="form-control" name="service-price" placeholder="Enter Service Price" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php } ?>

<div class="row">
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card">
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <?php echo is_admin() ? '<th scope="col" class="text-right">Action</th>' : '' ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($additional_services = $service->fetch(PDO::FETCH_ASSOC) ) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $additional_services['title']; ?></th>
                                <td>৳ <?php echo $additional_services['price']; ?> Per Guest</td>

                                <?php if (is_admin()) { ?>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('delete', $additional_services['id'], 'services' ) ?>">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>