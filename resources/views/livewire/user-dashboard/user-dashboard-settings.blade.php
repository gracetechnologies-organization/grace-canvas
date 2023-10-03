<div>
    <div class="container custom-user-dashboard-container">
        @include('components.user-dashboard-heading')
        <div class="row">
            <!-- Add Bootstrap classes for responsive design -->
            <div class="col-lg-3 col-md-3 col-sm-6">
                @include('components.user-dashboard-sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="content">
                    <div id="dataContainer">
                        <div class="row ">
                            <div class="col-lg-9 col-sm-12">
                                <div class="p-3 mb-4 card custome-card-border">
                                    <h5 class="card-header custome-color">Profile Information</h5>
                                    <!-- Account setting -->
                                    <form action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="mt-3 mb-3">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                autocomplete="name">
                                            <error :messages="$errors - > updatePassword - > get('name')" class="mt-2" />
                                        </div>
                                        <div>
                                            <button type="submit" class="float-end custom-button-css me-2">Update</button>
                                        </div>
                                    </form>
                                    <!-- /Account -->
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-12">
                                <div class="p-3 mb-4 card custome-card-border">
                                    <h5 class="card-header custome-color">Update Password</h5>
                                    <!-- Account setting -->
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="mt-3 mb-3">
                                            <label for="current password" class="form-label">Current Password</label>
                                            <input id="current_password" name="current_password" type="password"
                                                class="form-control" autocomplete="current-password">
                                            <error :messages="$errors - > updatePassword - > get('current_password')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="pwd" class="form-label">New Password</label>
                                            <input id="password" name="password" type="password" class="form-control"
                                                autocomplete="new-password">
                                            <error :messages="$errors - > updatePassword - > get('password')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="pwd" class="form-label">Password Confirmation</label>
                                            <input id="password_confirmation" name="password_confirmation"
                                                class="form-control" type="password"
                                                autocomplete="Password Confirmation">
                                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="custom-button-css me-2 float-end">Update</button>
                                        </div>
                                    </form>
                                    <!-- /Account -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>