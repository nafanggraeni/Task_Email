    <?= $this->extend('base') ?>
    <?= $this->section('content') ?>
    <form action="/product/create" method="POST">
    <div><input type="email" name="email"placeholder="Enter email address"/></div>
       <div><input type="name" name="name"placeholder="Enter your name"/></div>
       <div><button class="btn btn-primary text-dark" type="submit">
                    submit </button></div>
                </form>
    <?= $this->endSection() ?>

