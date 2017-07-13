<section class="section section--featured">
    <div class="container">
        <?php $members = get_users(); ?>
        <h2 class="section__title"><i class="icon icon-users" aria-hidden="true"></i> <?php echo count($members); ?> Membros</h2>

        <ul class="member-list list-unstyled">
            <?php foreach($members as $member):
                $gravatarSettings['size'] = 140;
                $githubUsername = get_user_meta( $member->ID, 'github_username', true);

                if ($githubUsername) {
                    $gravatarSettings['default'] = "https://github.com/{$githubUsername}.png?size=200";
                }

                $githubUrl = get_user_meta( $member->ID, 'github_url', true);
                $memberUrl = ($githubUrl) ? $githubUrl : $member->user_url;
            ?>
                <li class="member-list__item">
                    <?php if($memberUrl): ?>
                        <a href="<?php echo $memberUrl ?>" target="_blank">
                    <?php endif; ?>

                        <img src="<?php echo get_avatar_url($member->user_email, $gravatarSettings) ?>" alt="Foto do perfil de <?php echo $member->display_name ?>" class="img-circle">

                    <?php if($memberUrl): ?>
                        </a>
                    <?php endif; ?>

                    <?php if($githubUsername): ?>
                        <span class="member-list__meta">
                            <i class="icon icon-github"></i>
                            <a href="https://github.com/<?php echo $githubUsername ?>" target="_blank">
                                /<?php echo $githubUsername ?>
                            </a>
                        </span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="clearfix"></div>

        <?php if (!is_user_logged_in()): ?>
            <div class="col-md-12 text-center">
                <div class="sp"></div>
                <a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=github_oauth_redirect'); ?>" class="btn btn-primary btn-lg btn-round btn-ghost">
                    <i class="icon icon-github"></i> Quero participar
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
