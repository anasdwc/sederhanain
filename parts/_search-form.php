<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-25T10:31:54+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _search-form.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T16:53:56+07:00

?>
<div class="search" id="search-wraper" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Search Title -->
                <div class="search-title">
                    <?php if ($_GET['search']) {
                        ?>
                        <h3>Cari Koleksi Yang Kamu Butuhkan</h3>
                    <?php } else {?>
                        <h2>
                        Selamat Datang <?php echo ($_SESSION['m_name']) ? $_SESSION['name'] : 'Pemustaka'; ?> <br>di Perpustakaan <?php echo $sysconf['library_name']; ?>
                        </h2>
                        <h3>Cari Koleksi Yang Kamu Butuhkan</h3>
                    <?php } ?>
                </div>
                <!-- Search -->
                <div class="search-box mx-auto">
                    <form class="" action="index.php" method="get" @submit.prevent="searchSubmit">
                        <input type="hidden" name="search" value="search">
                        <input ref="keywords" value="<?= htmlentities(getQuery('keywords')) ?>" v-model.trim="keywords"
                                @focus="searchOnFocus" @blur="searchOnBlur" type="text" id="search-input"
                                name="keywords" class="input-transparent w-100" autocomplete="off"
                                placeholder="<?= __('Enter keyword...');?>"/>
                    </form>
                    <div class="advanced-search-wraper">
                        <a class="advanced-search" data-toggle="modal" data-target="#adv-modal"><?= __('Advanced Search');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
