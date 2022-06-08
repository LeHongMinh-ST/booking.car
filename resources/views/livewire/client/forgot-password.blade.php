<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
            <div class="mb-4">
                <h3>Quên mật khẩu?</h3>
                <small>Vui lòng nhập địa chỉ email để lấy lại mật khẩu!</small>
            </div>
            <form action="#" method="post">
                <div class="form-group last mb-3" style="border-radius: 10px">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" wire:model="email" id="email">
                    @error('email')
                    <p style="color: #ff7171">{{ $message }}</p>
                    @enderror
                </div>

                <input type="button" wire:click="sendLinkForgotPassword" value="Gửi" class="btn btn-block btn-primary mb-3">

                <div>
                    <p><a href="{{ route('login.form') }}">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
