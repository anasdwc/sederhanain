<?php
/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2019-01-30 00:58
 * @File name           : detail_template.php
 */

?>

<div class="container">

    <div class="line-gmd">
        <p class="line-gmd-p">
            <i class="fas fa-bookmark"></i>&nbsp&nbsp<?= $gmd_name ?>
            <!-- <p><?php echo $subjects ?></p> -->
        </p>
    </div>

    <div class="flex flex-wrap">
        <div class="w-64 mb-2">
            <div class="bg-image p-12 rounded">
                <div class="shadow">
                  <?= $image; ?>
                </div>
            </div>
        </div>
        
        <div class="flex-1 p-0 px-md-4">
            <div class="detail-title">
                <div class="detail-subject"><?php echo ($subjects) ? "{$subjects}" : '' ?></div>
                <h4 class="mb-2 theme-color"><?= $title; echo ($edition) ? " - {$edition}" : '' ?></h4>
                <p class="detail-authors"><?php echo $authors ?></p>
            </div>
            <hr class="theme-borderColor">
            <p class="text-grey-darker theme-color">
              <?= $notes ? $notes : '<i>'.__('Description Not Available').'</i>'; ?>
            </p>
            <hr class="theme-borderColor">

            <h5 class="mt-4 mb-1 green-color"><?= __('Availability'); ?></h5>
          <?= ($availability) ? "<div class='table-availability theme-color'> {$availability} </div>" : '<p class="text-grey-dark">' . __('No copy data') . '</p>'; ?>

            <h5 class="mt-4 mb-1 green-color"><?= __('Detail Information'); ?></h5>
            <dl class="row">
                <dt class="col-sm-3 theme-color"><?= __('Call Number'); ?></dt>
                <dd class="col-sm-9 theme-color">
                    <div><?php echo ($call_number) ? $call_number : '-'; ?></div>
                </dd>
                <dt class="col-sm-3 theme-color"><?= __('Publisher'); ?></dt>
                <dd class="col-sm-9 theme-color">
                    <span itemprop="publisher" property="publisher" itemtype="http://schema.org/Organization"
                          itemscope><?php echo $publish_place ?></span> :
                    <span itemprop="publisher" property="publisher"><?php echo $publisher_name ?></span>.,
                    <span itemprop="datePublished" property="datePublished"><?php echo $publish_year ?></span>
                </dd>
                <dt class="col-sm-3 theme-color"><?= __('Collation'); ?></dt>
                <dd class="col-sm-9 theme-color">
                    <div itemprop="numberOfPages"
                         property="numberOfPages"><?php echo ($collation) ? $collation : '-'; ?></div>
                </dd>
                <dt class="col-sm-3 theme-color"><?= __('Language'); ?></dt>
                <dd class="col-sm-9 theme-color">
                    <div>
                        <meta itemprop="inLanguage" property="inLanguage"
                              content="<?php echo $language_name ?>"/><?php echo $language_name ?></div>
                </dd>
                <dt class="col-sm-3 theme-color"><?= __('ISBN/ISSN'); ?></dt>
                <dd class="col-sm-9 theme-color">
                    <div itemprop="isbn" property="isbn"><?php echo ($isbn_issn) ? $isbn_issn : '-'; ?></div>
                </dd>
            </dl>

            <h5 class="mt-4 mb-1 green-color"><?= __('File Attachment'); ?></h5>
            <div itemprop="associatedMedia">
              <?= !$file_att ? '<i class="theme-color">'.__('No Data').'</i>' : $file_att ; ?>
            </div>
        </div>
    </div>
</div>
