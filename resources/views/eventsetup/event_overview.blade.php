<div class="setting-form">
    <form>
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3>Personal Info</h3>
            </div>
            <div class="prsnl-info">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>User Name*</label>
                            <input class="payment-input" type="text" name="username" value="{{ Auth::user()->username}}" placeholder="User Name" disabled required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Full Name*</label>
                            <input class="payment-input" data-language="en" type="text" name="fullname" placeholder="Full Name" value="{{ Auth::user()->fullname }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input class="payment-input" type="email" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}" required disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Phone Number*</label>
                            <input class="payment-input" type="tel" placeholder="017xxxxxxxx" value="{{ Auth::user()->mobile }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                            <label>Country*</label>
                            <input class="payment-input" data-language="en" type="text" name="country" placeholder="Country" value="{{ Auth::user()->country }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Organaization*</label>
                            <input class="payment-input" data-language="en" type="text" name="organaization" placeholder="Organaization" value="{{ Auth::user()->organization }}" required>
                        </div>
                    </div>
                </div>
                <div class="add-crdt-amnt">
                    <button class="setting-save-btn" type="submit">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>