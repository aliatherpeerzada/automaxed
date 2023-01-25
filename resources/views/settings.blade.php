<x-layout>

    <h3 class="text-dark mb-4"><i class="fas fa-cog px-2 text-primary"></i>Settings</h3>
    <div class="row mb-3">
        <div class="col-lg-8 col-xl-12">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">System Settings</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-xxl-12">
                                        <div class="mb-3"><label class="form-label text-primary" for="admin_company_name"><strong>Name of your Company or Brand</strong></label><input class="form-control" type="text" id="username-2" placeholder="Name of your Company or Brand" name="admin_company_name" required=""></div>
                                        <p class="mb-3">This name will be displayed at the login screen of this licensing web app and inside the footer text. The name is only used to personalize your experience. You can change it anytime you want.</p>
                                        <div class="mb-3"><button class="btn btn-primary mb-3" type="submit">Save System Settings</button></div>
                                        <hr>
                                    </div>
                                </div>
                            </form>
                            <div><a class="btn btn-danger w-100" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button">Edit Admin Account</a>
                                <div class="collapse p-3" id="collapse-1">
                                    <div class="w-100 align-items-center mb-3 mt-3">
                                        <h2 class="text-dark"><i class="fas fa-exclamation-triangle text-danger pe-2"></i>Proceed with Caution!</h2>
                                    </div>
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-xxl-12">
                                                <p class="mb-3">If you overwrite any of the admin credentials you need to note them down immediately. There is only 1 admin account existing and you should never loose the current username, password and secret phrase.</p>
                                            </div>
                                            <div class="col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                                                <div class="mb-3"><label class="form-label" for="admin_username"><strong>New Admin Username</strong></label><input class="form-control" type="text" placeholder="New Admin Username" name="admin_username" required=""></div>
                                            </div>
                                            <div class="col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                                                <div class="mb-3"><label class="form-label" for="admin_password"><strong>New&nbsp;Admin Password</strong></label><input class="form-control" type="text" placeholder="New Admin Password" name="admin_password" required=""></div>
                                            </div>
                                            <div class="col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                                                <div class="mb-3"><label class="form-label" for="admin_secret_phrase"><strong>New&nbsp;Secret Phrase</strong></label><input class="form-control" type="text" placeholder="New Secret Phrase" name="admin_secret_phrase" required=""></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-danger" type="submit">Update Admin Account</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>

