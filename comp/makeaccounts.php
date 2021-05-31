<?php foreach(get_accounts() as $key => $account): ?>
<div class="col-12 col-md-6 col-lg-4">
    <div class="card">
      <div class="card-header">
        <h3><?php echo $account['name']?></h3>
        <h4 class="text-muted"><?php echo $account['number']?></h4>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?php echo $account['owner']?></li>
          <li class="list-group-item"><?php echo $account['amount']?></li>
          <li class="list-group-item"><?php echo $account['last_operation']?></li>
        </ul>
        <div class="row btn-toolbar mx-1">
          <a href="#" class="btn btn-primary col-3">Clôturer</a>
          <a href="#" class="btn btn-primary col-4 offset-1">Retrait/Dépot</a>
          <a href="#" class="btn btn-primary col-3 offset-1">Voir</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>