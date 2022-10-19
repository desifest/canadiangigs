<h2><a href="<?php print $url ?>"><?php print __('Links Matic') ?></a>. <?php print __('Settings job type') ?></h2>
<?php print $tabs; ?>

<form accept-charset="UTF-8" method="post" id="tag">
    <div class="cm-edit">
        <fieldset>    
            <div class="label">
                <?php print __('Job expired days') ?>
            </div>
            <input type="text" name="job_expired" class="title" value="<?php print $ss['job_expired'] ?>" style="width:90%">
            <br /><br />
            <h2>Job Type</h2>
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

            <h3>Blacklist words</h3>
            <?php
            $job_black_alias = $ss['job_black_alias'] ? htmlspecialchars(base64_decode($ss['job_black_alias'])) : '';
            ?>
            <textarea name="job_black_alias" style="width:90%" rows="3"><?php print $job_black_alias; ?></textarea>                               
           
            <br />
            
            <h3>Whitelist words (exclude blacklist)</h3>
            <?php
            $job_white_alias = $ss['job_white_alias'] ? htmlspecialchars(base64_decode($ss['job_white_alias'])) : '';
            ?>
            <textarea name="job_white_alias" style="width:90%" rows="3"><?php print $job_white_alias; ?></textarea>                               
             <p>Enter coma separated alias words.</p>
            <br />
           

            <h2>Job type alias keys</h2>
            <p>Enter coma separated alias for job types.</p>
            <?php
            $this->mp->job_types_form($job_listing_category, $ss['job_type_alias']);
            ?>


            <h2>Job category alias keys</h2>
            <p>Enter coma separated alias for job types.</p>
            <?php
            $job_listing_category = $this->mp->job_listing_category();
            $this->mp->job_types_form($job_listing_category, $ss['job_category_alias'], 'category');
            ?>

            <?php wp_nonce_field('ml-nonce', 'ml-nonce'); ?>
            <br />
            <input type="submit" name="options" id="edit-submit" value="<?php echo __('Save') ?>" class="button-primary">  


        </fieldset>
    </div>
</form>