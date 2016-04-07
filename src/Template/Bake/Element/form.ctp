<%
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
$pk = "\${$singularVar}->{$primaryKey[0]}";
%>

<?php
<% if (strpos($action, 'add') === false): %>
    @$contextMenu['append'] .= $this->Html->link(__('Edit <%= $singularHumanName %>'), ['action' => 'edit', <%= $pk %>], ['class' => 'active disabled list-group-item']);
    @$contextMenu['append'] .= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', <%= $pk %>],
                ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>), 'class' => 'btn-danger list-group-item']
            );
    @$contextMenu['append'] .= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'list-group-item']);
<% else: %>
    @$contextMenu['append'] .= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'active disabled list-group-item']);
<% endif; %>
    @$contextMenu['append'] .= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index'], ['class' => 'list-group-item']);
<%
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
%>
    @$contextMenu['append'] .= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index'], ['class' => 'list-group-item']);
    @$contextMenu['append'] .= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add'], ['class' => 'list-group-item']);
<%
                    $done[] = $details['controller'];
                }
            }
        }
%>

$this->set('contextMenu', $contextMenu);
?>

<div class="<%= $pluralVar %> form columns row">
    <div class="col-sm-9 col-md-7">
        <?= $this->Form->create($<%= $singularVar %>); ?>
        <fieldset>
            <legend><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></legend>
            <?php
<%
            foreach ($fields as $field) {
                if (in_array($field, $primaryKey)) {
                    continue;
                }
                if (isset($keyFields[$field])) {
                    $fieldData = $schema->column($field);
                    if (!empty($fieldData['null'])) {
%>
                echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
<%
                    } else {
%>
                echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
<%
                    }
                    continue;
                }
                if (!in_array($field, ['created', 'modified', 'updated'])) {
%>
                echo $this->Form->input('<%= $field %>');
<%
                }
            }
            if (!empty($associations['BelongsToMany'])) {
                foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
                echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
<%
                }
            }
%>
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
