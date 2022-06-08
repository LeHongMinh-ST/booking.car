<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
            <div class="mb-4">
                <h3>Đặt lại mật khẩu</h3>
            </div>
            <form action="#" method="post">
                <div class="form-group last mb-3" style="border-radius: 10px">
                    <label for="email">Mật khẩu mới</label>
                    <input type="email" disabled class="form-control" value="{{ $email }}" id="email">

                </div>

                <div class="form-group last mb-3" style="border-radius: 10px">
                    <label for="password">Mật khẩu mới</label>
                    <input type="password" class="form-control" wire:model="password" id="password">
                    @error('password')
                    <p style="color: #ff7171">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group last mb-3" style="border-radius: 10px">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control"  wire:model="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                    <p style="color: #ff7171">{{ $message }}</p>
                    @enderror
                </div>

                <input type="button" wire:click="resetPassword" value="Đặt lại" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>
</div>
