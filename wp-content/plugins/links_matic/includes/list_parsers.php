<h2><a href="<?php print $url ?>"><?php print __('Links Matic Parsers') ?></a>. <?php print __('Campaigns') ?></h2>
<?php print $tabs; ?>
<?php print $filters ?>
<?php print $type_filters ?>

<?php
if (sizeof($campaigns) > 0) {
    ?>
    <?php print $pager ?>
    <form accept-charset="UTF-8" method="post" >
        <div class="bulk-actions-holder">
            <select name="bulkaction" class="bulk-actions">
                <option value=""><?php print __('Bulk actions') ?></option>
                <?php foreach ($this->bulk_actions_parser as $act_key => $act_name) { ?>                    
                    <option value="<?php print $act_key ?>">
                        <?php print $act_name ?>
                    </option>                                
                <?php } ?>                       
            </select>
            <input type="submit" id="edit-submit" value="<?php echo __('Submit') ?>" class="button-primary">  
        </div>
        <table id="feeds" class="wp-list-table widefat striped table-view-list">
            <thead>
            <td class="manage-column column-cb check-column" ><input type="checkbox" id="cb-select-all-1"></td>
            <?php $this->sorted_head('id', 'id', $orderby, $order, $page_url) ?>                                
            <?php $this->sorted_head('date', 'Date', $orderby, $order, $page_url) ?> 
            <?php $this->sorted_head('title', 'Title', $orderby, $order, $page_url) ?>
            <?php $this->sorted_head('type', 'Type', $orderby, $order, $page_url) ?>  
            <?php $this->sorted_head('status', 'State', $orderby, $order, $page_url) ?>       
            <th><?php print __('URL') ?></th> 
            <th><?php print __('Urls') ?></th> 
            <th><?php print __('Arhive') ?></th>         
            <th><?php print __('Parsed') ?></th>  
            <th><?php print __('Linked') ?></th>  
            <?php /* ?><th><?php print __('Last log') ?></th> <?php */ ?>

            </thead>
            <tbody>
                <?php
                foreach ($campaigns as $parser) {
                    $options = unserialize($parser->options);
                    ?>
                    <tr> 
                        <th  class="check-column" ><input type="checkbox" name="bulk-<?php print $parser->id ?>"></th>
                        <td><?php print $parser->id ?></td>
                        <td><?php print $this->mp->curr_date($parser->date) ?></td>
                        <td>
                            <?php print $parser->title ?><br />                    
                            <?php
                            $parser_actions = $this->parser_actions($parser);
                            $parser_url = $url . '&cid=' . $parser->id;
                            $action_links = $this->get_filters($parser_actions, $parser_url, $curr_tab = 'none', $front_slug = 'home', $name = 'tab', '', false);
                            print $action_links;
                            ?>
                        </td>
                        <td><?php print $this->parser_types[$parser->type] ?></td>
                        <td class="nowrap"><i class="sticn st-<?php print $parser->status ?>"></i><?php print $this->camp_state[$parser->status]['title'] ?></td>
                        <td><a href="<?php print $parser->site ?>"><?php print $parser->site ?></a></td>                                
                        <td><?php print $this->mp->get_urls_count(-1, $parser->id) ?></td>
                        <td><?php print $this->mp->get_urls_count(-1, $parser->id, 1) ?></td>
                        <td><?php print $this->mp->get_urls_count(-1, $parser->id, -1, 1) ?></td>
                        <td><?php print $this->mp->get_urls_count(-1, $parser->id, -1, -1, 1) ?></td>
                         <?php /* ?><td><?php print $this->get_last_log(0, $parser->id) ?></td> <?php */ ?>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>    
    </form>
    <?php print $pager ?>
    <?php
} else {
    ?>
    <p><?php print __('The parsers not found') ?></p>
    <?php
}
?>