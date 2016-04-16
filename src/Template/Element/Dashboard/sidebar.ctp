<?= @$contextMenu['prepend'] ? $contextMenu['prepend'] : null; ?>
<?php if (@$contextMenu['reset'] === true) : else : ?>
    <div class="list-group-item">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'dashboard', 'action' => 'index']) ?>"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
    </div>
    <a href="#collapseOrders" class=" list-group-item ">Orders</a>

    <div class="list-group-item <?= @$_GET['role'] === 'customer' || @$_GET['equals']['role'] === 'customer' || @$this->viewVars['user']->role === 'customer' ? 'active' : null; ?>">
        <a href="#collapseCustomers" data-toggle="collapse"> <span class="glyphicon glyphicon-user"></span> Customers <span class="caret"></span></a>
        <ul id="collapseCustomers" class="collapse <?= @$_GET['role'] === 'customer' || @$_GET['equals']['role'] === 'customer' || @$this->viewVars['user']->role === 'customer' ? 'in' : null; ?> list-unstyled">
            <li><a href="<?= $this->Url->build(['prefix' => 'dashboard', 'plugin' => 'CodeBlastrUsers', 'controller' => 'users', 'action' => 'index', '?' => ['filter' => 'equals', 'equals' => ['role' => 'customer']]]) ?>">Customer List</a></li>
            <li><a href="<?= $this->Url->build(['prefix' => 'dashboard', 'plugin' => 'CodeBlastrUsers', 'controller' => 'users', 'action' => 'add', '?' => ['role' => 'customer']]) ?>">Add Customer</a></li>
        </ul>
    </div>
    <div class="list-group-item <?= @$_GET['role'] === 'staff' || @$_GET['equals']['role'] === 'staff' || @$this->viewVars['user']->role === 'staff' || @$this->request->controller === 'Permissions' ? 'active' : null; ?>">
        <a href="#collapseStaff" data-toggle="collapse"> <span class="glyphicon glyphicon-briefcase"></span> Staff <span class="caret"></span></a>
        <ul id="collapseStaff" class="collapse <?= @$_GET['role'] === 'staff' || @$_GET['equals']['role'] === 'staff' || @$this->viewVars['user']->role === 'staff' || @$this->request->controller === 'Permissions' ? 'in' : null; ?> list-unstyled">
            <li><a href="<?= $this->Url->build(['prefix' => 'dashboard', 'plugin' => 'CodeBlastrUsers', 'controller' => 'users', 'action' => 'index', '?' => ['filter' => 'equals', 'equals' => ['role' => 'staff']]]) ?>">Staff List</a></li>
            <li><a href="<?= $this->Url->build(['prefix' => 'dashboard', 'plugin' => 'CodeBlastrUsers', 'controller' => 'users', 'action' => 'add', '?' => ['role' => 'staff']]) ?>">Add Staff Member</a></li>
            <li><a href="<?= '/orders/orders/commissions/' //$this->Url->build(['plugin' => 'CodeBlastrOrders', 'controller' => 'orders', 'action' => 'commissions']) ?>">Commissions</a></li>
            <li><a href="<?= $this->Url->build(['prefix' => 'dashboard', 'plugin' => 'CodeBlastrUsers', 'controller' => 'permissions', 'action' => 'index']) ?>">Permissions</a></li>
        </ul>
    </div>
<?php endif; ?>
<?php //@$contextMenu['append'] ? $contextMenu['append'] : null; ?>
