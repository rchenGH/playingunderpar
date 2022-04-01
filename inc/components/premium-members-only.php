<div class="premium-members-only-container container-fluid">
    <div class="premium-members-only-row row">
        <div class="premium-members-only-column col-12">
            <h1 class="section-title medium-large"><?php the_field('premium_members_only_title', 'option') ?></h1>
            <a href="<?php the_field('register_link', 'option') ?>">
                <button class="black-background white"><?php the_field('register_button_name', 'option') ?></button>
            </a>
        </div>
    </div>
</div>