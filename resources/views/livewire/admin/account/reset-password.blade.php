<form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="resetPassword">
    <!--begin::Modal header-->
    <div class="modal-header" id="kt_modal_add_customer_header">
        <!--begin::Modal title-->
        <h2 class="fw-bolder">Đặt lại mật khẩu</h2>
        <!--end::Modal title-->
        <!--begin::Close-->
        <div wire:click="$emit('closeModelReset')" id="kt_modal_add_customer_close"
             class="btn btn-icon btn-sm btn-active-icon-primary">
            <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
            <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                               fill="#000000">
                                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                <rect fill="#000000" opacity="0.5"
                                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                      x="0" y="7" width="16" height="2" rx="1"></rect>
                                            </g>
                                        </svg>
                                    </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
    </div>
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body py-10 px-lg-17">
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}"
             data-kt-scroll-max-height="auto"
             data-kt-scroll-dependencies="#kt_modal_add_customer_header"
             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
             data-kt-scroll-offset="300px">
            <!--begin::Input group-->

            <div class="fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-6 fw-bold mb-2">Mật khẩu mới</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="password" wire:model="password" class="form-control form-control-solid">
                @error('password')
                <div class="fv-plugins-message-container">
                    <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>

            <div class="fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-6 fw-bold mb-2">Nhập lại mật khẩu</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="password" wire:model="password_confirmation" class="form-control form-control-solid">
                @error('password_confirmation')
                <div class="fv-plugins-message-container">
                    <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Modal body-->
            <!--begin::Modal footer-->
            <div class="modal-footer flex-center">
                <!--begin::Button-->
                <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                    <span class="indicator-label">Đặt lại</span>
                </button>

                <button wire:click="$emit('closeModelReset')" type="reset"
                        id="kt_modal_add_customer_cancel" class="btn btn-white me-3">Huỷ
                </button>
                <!--end::Button-->
            </div>
        </div>
    </div>
    <!--end::Modal footer-->
</form>

