<h2><a href="<?php print $url ?>"><?php print __('Links Matic') ?></a>. <?php print __('Settings job') ?></h2>
<?php print $tabs; ?>

<form accept-charset="UTF-8" method="post" id="tag">
    <div class="cm-edit">
        <fieldset>    
            <?php
            // Categories
            $job_listing_category = $this->mp->job_listing_type();
            ?>
            <label class="inline-edit-interval"> 
                <span class="title"><?php print __('Job type') ?></span>         
                <select name="job_type" class="interval">
                    <?php
                    foreach ($job_listing_category as $item) {
                        $key = $item->term_id;
                        $name = $item->name;
                        $selected = ($key == $ss['job_type']) ? 'selected' : '';
                        ?>
                        <option value="<?php print $key ?>" <?php print $selected ?> ><?php print $name ?></option>                                
                        <?php
                    }
                    ?>                          
                </select>                     
                <span class="inline-edit"><?php print __('Default job type. If input data is empty') ?></span> 
            </label>
            <br /><br />
            <div class="label">
                <?php print __('Job expired days') ?>
            </div>
            <input type="text" name="job_expired" class="title" value="<?php print $ss['job_expired'] ?>" style="width:90%">
            <br /><br />


            <h2>Job type alias keys</h2>
            <p>Enter coma separated alias for job types.</p>
            <?php
            $this->mp->job_types_form($job_listing_category, $ss['job_type_alias']);
            ?>

            <?php wp_nonce_field('ml-nonce', 'ml-nonce'); ?>
            <br />
            <input type="submit" name="options" id="edit-submit" value="<?php echo __('Save') ?>" class="button-primary">  

        </fieldset>
    </div>
</form>