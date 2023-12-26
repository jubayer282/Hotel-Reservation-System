<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://picsum.photos/500/300" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title text-uppercase mb-0"><?php echo $row['title'] ?: "Suite Name" ?></h3>
    <span class="h5 font-weight-bold text-muted mb-0">৳<?php echo $row['price'] ?: "___" ?>/DAY</span>
    <p class="card-text"><?php echo substr($row['description'],0,100) ?: "Suite Description" ?>...</p>
    <a href="<?php echo get_permalink('suite') . intval($row['id']); ?>" class="btn btn-primary">View Details</a>
    <?php if( is_admin() ) { ?>
      <a href="<?php echo get_permalink('suite-edit') . intval($row['id']); ?>" class="btn btn-primary">Edit</a>
    <?php } ?>
  </div>
</div>