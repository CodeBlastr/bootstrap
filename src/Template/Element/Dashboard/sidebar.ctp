<?= @$contextMenu['prepend'] ? $contextMenu['prepend'] : null; ?>
<?php if (@$contextMenu['reset'] === true) : else : ?>
    <div class="list-group-item">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'dashboard', 'action' => 'index']) ?>"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
    </div>
    <a href="#collapseTwo" class=" list-group-item ">Orders</a>

    <div class="list-group-item <?= @$_GET['role'] === 'customer' || @$_GET['equals']['role'] === 'customer' ? 'active' : null; ?>">
        <a href="#collapseThree" data-toggle="collapse"> <span class="glyphicon glyphicon-user"></span> Customers <span class="caret"></span></a>
        <ul id="collapseThree" class="collapse <?= @$_GET['role'] === 'customer' || @$_GET['equals']['role'] === 'customer' ? 'in' : null; ?> list-unstyled">
            <li><a href="<?= $this->Url->build(['prefix' => 'dashboard', 'plugin' => 'CodeBlastrUsers', 'controller' => 'users', 'action' => 'index', '?' => ['filter' => 'equals', 'equals' => ['role' => 'customer']]]) ?>">Customer List</a></li>
            <li><a href="<?= $this->Url->build(['plugin' => 'CodeBlastrUsers', 'controller' => 'users', 'action' => 'add', '?' => ['role' => 'customer']]) ?>">Add Customer</a></li>
        </ul>
    </div>
<?php endif; ?>
<?php //@$contextMenu['append'] ? $contextMenu['append'] : null; ?>