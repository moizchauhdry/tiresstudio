<style>
    .lightversion.search-tab .bootstrap-select .btn-info,
    .lightversion .form-control {
        margin-bottom: 5px !important;
    }
</style>

<form class="contact_form" action="#" method="post"> @csrf
    <div class="row">
        <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject *">
        </div>

        <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="name" required placeholder="Your Name *">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 form-group">
            <input type="email" class="form-control" name="email" required placeholder="Your Email *">
        </div>

        <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="phone" required placeholder="Phone Number *">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 form-group">
            <textarea class="form-control" name="message" required placeholder="Your Message *"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 form-group">
            <button type="submit" class="btn btn-primary btn-block">SUBMIT NOW</button>
        </div>
    </div>

</form>
