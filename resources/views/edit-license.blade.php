<x-layout>
    <h3 class="text-dark mb-4"><i class="fas fa-key px-2 text-primary"></i>Update License</h3>
    <div class="row mb-3">
        <div class="col-lg-8 col-xl-12">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">License Settings</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="form-check form-switch mb-2" style="font-size: 1.2rem;"><input class="form-check-input" type="checkbox" id="license_switch" checked="" name="license_switch"><label class="form-check-label text-success" for="license_switch"><strong>the license is enabled, it is not expired, it has been used on 0 out of 0 computers</strong></label></div>
                                        <p class="mb-1">If the license is enabled the compiled bot can be used with it.&nbsp;If the license is disabled or expired the compiled bot stops working.&nbsp;You can enable and disable licenses anytime. Keep in mind that also the expiry date of the license must be in the future for a license to be valid</p>
                                        <hr>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_product_name"><strong>Product Name</strong></label><input class="form-control" type="text" id="username-2" placeholder="Product Name" name="license_product_name" required=""></div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_expiry_date"><strong>Expiry Date</strong></label><input class="form-control" type="date" name="license_expiry_date" required=""></div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_allowed_activations"><strong>Allowed Activations</strong></label><span class="p-1 small">(<a href="#">click to reset</a>)</span><input class="form-control" type="number" placeholder="0" name="license_allowed_activations" min="1" max="1000000" required=""></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_key"><strong>License Key</strong></label><input class="form-control" type="text" id="username-1" placeholder="License Key" name="license_key" required=""></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_customer_name"><strong>Customer Name</strong></label><input class="form-control" type="text" id="username-4" placeholder="Customer Name" name="license_customer_name" required=""></div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_customer_email"><strong>Customer Email</strong></label><span class="p-1 small">(optional)</span><input class="form-control" type="email" id="email" placeholder="Customer Email" name="license_customer_email"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><label class="form-label text-primary" for="license_notes"><strong>Notes</strong></label><span class="p-1 small">(optional)</span><textarea class="form-control" id="signature" rows="5" name="license_notes" placeholder="Notes"></textarea></div>
                                <div class="mb-3"><button class="btn btn-primary" type="submit">Update License</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>