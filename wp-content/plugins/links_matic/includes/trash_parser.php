<h2><a href="<?php print $url ?>"><?php print __('Links Matic Parser') ?></a>. <?php print __('Trash') ?></h2>


<?php if ($cid) { ?>
    <h3><?php print __('Campaign') ?>: [<?php print $cid ?>] <?php print $campaign->title ?></h3>
    <?php
}

print $tabs;

if ($cid) {
    $status = $campaign->status;

    // Move to trash
    if ($status != 2) {
        $title = __('Move the campaign to trush');
        $status = 2;
        $button = __('Move to trash');
    } else {
        //Restore
        $title = __('Restore campaign from trash');
        $status = 1;
        $button = __('Restore from trash');
    }
    ?>
    <p><?php print $title ?></p>
    <form accept-charset="UTF-8" method="post" id="campaign">
        <div class="cm-edit inline-edit-row">
            <fieldset>
                <input type="hidden" name="id" value="<?php print $cid ?>">
                <input type="hidden" name="trash" value="1" >
                <input type="hidden" name="status" value="<?php print $status ?>" >
                <?php wp_nonce_field('ml-nonce', 'ml-nonce'); ?>
                <br />
                <input type="submit" name="options" id="edit-submit" value="<?php print $button ?>" class="button">  
            </fieldset>
        </div>
    </form>
    <br />

    <h3>Remove all posts</h3>
    <div class="desc">Attention, this action cannot be undone.</div>
    <form accept-charset="UTF-8" method="post" id="campaign">
        <div class="cm-edit inline-edit-row">
            <fieldset>
                <input type="hidden" name="id" value="<?php print $cid ?>">
                <input type="hidden" name="remove_all_posts" value="1" >                
                <?php wp_nonce_field('ml-nonce', 'ml-nonce'); ?>
                
                <input type="submit" name="options" id="edit-submit" value="Remove all posts" class="button">  
            </fieldset>
        </div>
    </form>
<?php } ?>