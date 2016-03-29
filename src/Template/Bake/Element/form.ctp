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
    @$sidebar['append'] .= $this->Html->link(__('Edit <%= $singularHumanName %>'), ['action' => 'edit', <%= $pk %>], ['class' => 'active disabled list-group-item']);
    @$sidebar['append'] .= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', <%= $pk %>],
                ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>), 'class' => 'btn-danger list-group-item']
            );
    @$sidebar['append'] .= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'list-group-item']);
<% else: %>
    @$sidebar['append'] .= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'active disabled list-group-item']);
<% endif; %>
    @$sidebar['append'] .= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index'], ['class' => 'list-group-item']);
<%
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
%>
    @$sidebar['append'] .= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index'], ['class' => 'list-group-item']);
    @$sidebar['append'] .= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add'], ['class' => 'list-group-item']);
<%
                    $done[] = $details['controller'];
                }
            }
        }
%>

$this->set('sidebar', $sidebar);
?>

<div class="<%= $pluralVar %> form columns">
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
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
