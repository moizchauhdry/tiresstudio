<form class="row contact_form" action="#" method="post"> @csrf
    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <input type="text" class="form-control" name="subject" required placeholder="Subject *">
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <input type="text" class="form-control" name="name" required placeholder="Your Name *">
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <input type="email" class="form-control" name="email" required placeholder="Your Email *">
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <input type="text" class="form-control" name="phone" required placeholder="Phone Number *">
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
        <textarea class="form-control" name="message" required placeholder="Your Message *"></textarea>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
        <button type="submit" class="btn btn-primary btn-block">SUBMIT NOW</button>
    </div>
</form>
