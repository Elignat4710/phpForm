<?php require 'partials/header.php'; ?>

<div style="width: 100%"><iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0"
        marginwidth="0"
        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=7060HollywoodBlvd,LosAngeles,CA+(My%20Business%20Name)&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
</div>

<div class="container-fluid">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>To participate in the conference, please fill out the form</strong></h2>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" class="firstForm" method="post">


                            <fieldset id="first-form">
                                <div class="form-card">
                                    <h2 class="fs-title">Step - 1</h2>

                                    <div class="form-group">
                                        <input type="text" id="firstName" name="firstName" placeholder="First Name" />
                                        <small class="correct firstName"></small>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="lastName" id="lastName" placeholder="Last Name" />
                                        <small class="correct lastName"></small>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="birthdate" id="birthdate" placeholder="Birthdate"
                                            readonly="readonly" />
                                        <small class="correct birthdate"></small>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="reportSubject" id="reportSubject"
                                            placeholder="Report Subject" />
                                        <small class="correct reportSubject"></small>
                                    </div>

                                    <div class="form-group">
                                        <select class="list-dt form-control" id="country" name="countryId">
                                            <option value="country">Country</option>
                                            <?php foreach ($data['countries'] as $country) : ?>
                                            <option value="<?php echo $country['id']; ?>">
                                                <?php echo $country['name']; ?></option>
                                            <?php endforeach; ?>
                                            <small class="correct country"></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" placeholder="Phone" />
                                        <small class="correct phone"></small>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" id="email" />
                                        <small class="correct email"></small>
                                    </div>

                                </div>
                                <button type="button" id="first-btn" name="next"
                                    class="next action-button pull-right">Next</button>
                            </fieldset>
                        </form>
                        <form id="msform" class="secondForm" method="post" enctype="multipart/form-data">
                            <fieldset id="second-form">
                                <div class="form-card">
                                    <h2 class="fs-title">Step - 2</h2>

                                    <div class="form-group">
                                        <input id="company" type="text" name="company" placeholder="Company" />
                                        <small class="correct company"></small>
                                    </div>

                                    <div class="form-group">
                                        <input id="position" type="text" name="position" placeholder="Position" />
                                        <small class="correct position"></small>
                                    </div>

                                    <div class="form-group">
                                        <textarea id="aboutMe" placeholder="About me ..."></textarea>
                                        <small class="correct aboutMe"></small>
                                    </div>

                                    <div class="form-group">
                                        <input id="photo" type="file" name="photo" />
                                        <small class="correct photo"></small>
                                    </div>

                                </div>
                                <button id="second-btn" type="button" name="next"
                                    class="next action-button pull-right">Next Step</button>
                            </fieldset>
                        </form>
                        <form id="msform" class="thirdForm" action="">
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Share with friends</h2>
                                    <div class="row col-sm-12">
                                        <div class="col-sm-6">
                                            <a class="btn btn-block btn-social btn-twitter full text-center"
                                                href="http://twitter.com/share?text=<?php echo $data['config']['text']; ?>&url=<?php echo $data['config']['link']; ?>">
                                                <span class="fa fa-twitter"></span> Share with your friends
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn btn-block btn-social btn-facebook full text-center"
                                                href="http://www.facebook.com/sharer.php?u=<?php echo $data['config']['link']; ?>">
                                                Share with your friends
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mt-3 text-center">
                                        <div class="col-sm-12">
                                            <a href="\users" class="btn btn-danger btn-block text-center">All members:
                                                <?php echo $data['count']; ?> </a>
                                        </div>
                                    </div>
                                </div>


                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require 'partials/footer.php'; ?>