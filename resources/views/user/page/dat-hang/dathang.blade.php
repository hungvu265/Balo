<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <base href="{{asset('')}}">
    <link href='assetsUser/css/style2.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src='assetsUser/js/script2.js'></script>
    <script src='assetsUser/js/script3.js'></script>




</head>

@if(count($errors)>0)
 		<div class= "alert alert-danger">
			 <ul>
				 @foreach ($errors->all() as $error)
				 <li> {{$error}} </li>
				 @endforeach
			</ul>
		</div>
@endif
<body data-no-turbolink="">
	<header class="banner">
		<div class="wrap">
			<div class="logo logo--left ">

                <h1 class="shop__name">
                    <div class="logo_top col-lg-3 col-md-3">

                        <a href="trangchu" class="logo-wrapper ">
                            <img style="width: 90px;" src="{{ asset('images/logo.png') }}" alt="logo ">
                        </a>

                    </div>
                </h1>

            </div>
		</div>
	</header>


	<div class="content">
		<!-- <form action="{{route('dat-hang')}}" data-tg-refresh="checkout" id="checkoutForm" method="post" data-define="{
				loadingShippingErrorMessage: 'Không thể load phí vận chuyển. Vui lòng thử lại',
				loadingReductionCodeErrorMessage: 'Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại',
				submitingCheckoutErrorMessage: 'Có lỗi xảy ra khi xử lý. Vui lòng thử lại',
				requireShipping: true,
				requireDistrict: false,
				requireWard: false,
				shouldSaveCheckoutAbandon: true}" action="/checkout/c68a360ec1344491884313dbb3c67508" data-bind-event-submit="handleCheckoutSubmit(event)" data-bind-event-keypress="handleCheckoutKeyPress(event)" data-bind-event-change="handleCheckoutChange(event)">

            <input type="hidden" name="_method" value="patch"> -->

            <form class="beta-form-checkout" action="{{route('dat-hang')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="wrap">
                    <main class="main">
                        <header class="main__header">
                            <div class="logo logo--left ">

                                <h1 class="shop__name">
                                    <div class="logo_top col-lg-3 col-md-3">

                                        <a href="trangchu" class="logo-wrapper ">
                                            <img style="width: 90px;" src="{{ asset('images/logo.png') }}" alt="logo ">
                                        </a>

                                    </div>
                                </h1>

                            </div>
                        </header>

                        <div class="main__content">
                            <article class="animate-floating-labels row">
                                <div class="col col--two">
                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>

                                                    Thông tin nhận hàng

                                                </h2>


                                                <ul>
                                                    @if(Auth::check())
                                                        <li><a class="text-color">{{Auth::user()->ten}}</a>
                                                        <li><a class="text-color" href="dangxuat" title="Đăng xuất">Đăng Xuất</a>
                                                    @else
                                                        <li><a class="text-color" href="dangnhapdangky" title="Đăng nhập">Đăng nhập hoặc Đăng ký</a>
                                                    @endif
                                                </ul>


                                            </div>
                                        </div>

                                            <div class="section__content">
                                                <div class="fieldset">
                                                    <!-- <div class="field " data-bind-class="{'field--show-floating-label': email}">
                                                        <div class="field__input-wrapper">
                                                            <label for="email" class="field__label">
                                                                Email<span style="color: red">*</span><br>
                                                                <span style="color: red; font-size: 15px"></span>
                                                            </label>

                                                            <input @if(Auth::check()) name="email2" @else name="email" @endif  id="email" type="email" class="field__input" required="" @if(Auth::check()) value="{{Auth::user()->email}}" @endif>

                                                        </div>

                                                    </div> -->



                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.name}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingName" class="field__label">Họ và tên người nhận hàng<span style="color: red">*</label>
                                                            <input name="hoten" id="hoten" type="text" class="field__input" required="" @if(Auth::check()) value="{{Auth::user()->ten}}" @endif>
                                                        </div>

                                                    </div>

                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.gender}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingGender" class="field__label">Giới tính</label>
                                                            @if(Auth::check())
                                                                @if(Auth::user()->gioi_tinh=="Nam")
                                                                    <input type="radio" name="gioitinh" value="Nam" id="gioitinh" checked > Nam
                                                                    <input type="radio" name="gioitinh" value="Nữ" id="gioitinh" > Nữ
                                                                @elseif(Auth::user()->gioi_tinh=="Nữ")
                                                                    <input type="radio" name="gioitinh" value="Nam" id="gioitinh" > Nam
                                                                    <input type="radio" name="gioitinh" value="Nữ" id="gioitinh"  checked> Nữ
                                                                @else
                                                                    <input type="radio" name="gioitinh" value="Nam" id="gioitinh" > Nam
                                                                    <input type="radio" name="gioitinh" value="Nữ" id="gioitinh"> Nữ
                                                                @endif
                                                            @else
                                                                <input type="radio" name="gioitinh" value="Nam" id="gioitinh" > Nam
                                                                <input type="radio" name="gioitinh" value="Nữ" id="gioitinh"> Nữ
                                                            @endif

                                                        </div>

                                                    </div>

                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.phone}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingPhone" class="field__label">
                                                                Số điện thoại người nhận<span style="color: red">*
                                                            </label>
                                                                <span style="color:red;"></span>
                                                                <span style="color: red; font-size: 15px"></span>
                                                            <input name="sdt" id="sdt" type="tel" class="field__input" required="" maxlength="10" @if(Auth::check()) value="{{Auth::user()->sdt}}" @endif>
                                                        </div>

                                                    </div>



                                                    <div class="field " data-bind-class="{'field--show-floating-label': billing.address}">
                                                        <div class="field__input-wrapper">
                                                            <label for="billingAddress" class="field__label">
                                                                Địa chỉ nhận hàng<span style="color: red">*</span > <span style="font-size: 15px">(Đường/Hẻm, Phường/Xã, Quận/Huyện, Tỉnh/TP)</span >
                                                                <span style="color: red"></span ><br>
                                                                <span style="color: red; font-size: 15px"></span>
                                                            </label>
                                                            <textarea name="diachi" id="diachi" type="text" class="field__input" required=""></textarea>
                                                        </div>

                                                    </div>



                                                    <div class="field " data-bind-class="{'field--show-floating-label': note}">
                                                        <div class="field__input-wrapper">
                                                            <label for="note" class="field__label">
                                                                Ghi chú (tùy chọn)
                                                            </label>
                                                            <textarea name="ghichu" id="ghichu" type="text" class="field__input" ></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </form> -->

                                    </section>

                                </div>
                                <div class="col col--two">
<!--
                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                                                    Vận chuyển
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="section__content" data-tg-refresh="refreshShipping" id="shippingMethodList" data-define="{isAddressSelecting: true, shippingMethods: []}">
                                            <div class="alert alert--loader spinner spinner--active hide" data-bind-show="isLoadingShippingMethod">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                    <use href="#spinner"></use>
                                                </svg>
                                            </div>


                                            <div class="alert alert-retry alert--danger hide" data-bind-event-click="handleShippingMethodErrorRetry()" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; isLoadingShippingError">
                                                <span data-bind="loadingShippingErrorMessage">Không thể load phí vận chuyển. Vui lòng thử lại</span> <i class="fa fa-refresh"></i>
                                            </div>


                                            <div class="alert alert--info" data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
                                                Vui lòng nhập thông tin giao hàng
                                            </div>
                                        </div>
                                    </section> -->

                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                    Thanh toán
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="section__content">

                                            <div class="content-box">

                                                <div class="content-box__row">
                                                    <div class="radio-wrapper">
                                                        <div class="radio__input">
                                                            <input name="paymentMethod" value="COD" type="radio" class="input-radio" data-bind="paymentMethod" checked="">
                                                        </div>
                                                        <label for="paymentMethod-293126" class="radio__label">
                                                            <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                                            <span class="radio__label__accessory">
                                                                <span class="radio__label__icon">
                                                                    <i class="payment-icon payment-icon--4"></i>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>

                                                    <div class="content-box__row__desc" data-bind-show="paymentMethod == 293126">
                                                        <p>COD</p>

                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <br>
                                        <span style="font-size:19px;font-weight:bold;">Hoặc thanh toán online với vnpay</span><br>
                                        <div class="col-md-12">
                                            <div class="section__content">
                                                <div class="content-box" style="width: 30%">
                                                    <div class="content-box__row">
                                                        <div class="radio-wrapper">
                                                            <div class="radio__input">
                                                                <input name="paymentMethod" value="COD" type="radio" class="input-radio" data-bind="paymentMethod" checked="">
                                                            </div>
                                                            <label for="paymentMethod-293126" class="radio__label">
                                                                <span class="radio__label__primary">
                                                                    <img style="width: 50px;" src="data:image/png;base64,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">
                                                                </span>
                                                                <span class="radio__label__accessory">
                                                                <span class="radio__label__icon">
                                                                    <i class="payment-icon payment-icon--4"></i>
                                                                </span>
                                                            </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </section>
                                </div>
                            </article>

                            <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                                <button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
                                    <button type="submit" class="spinner-label">ĐẶT HÀNG</button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                        <use href="#spinner"></use>
                                    </svg>
                                </button>

                                <a href="giohang" class="previous-link">
                                    <i class="previous-link__arrow">❮</i>
                                    <span class="previous-link__content">Quay về giỏ hàng</span>
                                </a>

                            </div>

                            <div id="common-alert" data-tg-refresh="refreshError">


                                <div class="alert alert--danger hide-on-desktop hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
                            </div>
                        </div>
                    </main>


                    @if(Session::has('cart'))

                            <aside class="sidebar">
                                <div class="sidebar__header">
                                    <h2 class="sidebar__title">
                                        Tổng số lượng ({{Session('cart')->tongSL}} sản phẩm)
                                    </h2>
                                </div>
                                <div class="sidebar__content">
                                    <div id="order-summary" class="order-summary order-summary--is-collapsed">
                                        <div class="order-summary__sections">
                                            <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                                <table class="product-table">
                                                    <!-- <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                                    <thead class="product-table__header">
                                                        <tr>
                                                            <th>
                                                                <span class="visually-hidden">Ảnh sản phẩm</span>
                                                            </th>
                                                            <th>
                                                                <span class="visually-hidden">Mô tả</span>
                                                            </th>
                                                            <th>
                                                                <span class="visually-hidden">Sổ lượng</span>
                                                            </th>
                                                            <th>
                                                                <span class="visually-hidden">Đơn giá</span>
                                                            </th>
                                                        </tr>
                                                    </thead> -->
                                                    <tbody>
                                                        @foreach($product_cart as $product)

                                                                <tr class="product">
                                                                    <td class="product__image">
                                                                        <div class="product-thumbnail">
                                                                            <div class="product-thumbnail__wrapper" data-tg-static="">

                                                                                <img src="anh_sp/{{$product['hinh_anh']}}" alt="" class="product-thumbnail__image">

                                                                            </div>
                                                                            <span class="product-thumbnail__quantity">{{$product['so_luong']}}</span>
                                                                        </div>
                                                                    </td>
                                                                    <th class="product__description">
                                                                        <span class="product__description__name">
                                                                            {{$product['item']['ten_sp']}}
                                                                        </span>

                                                                        <span class="product__description__property">
                                                                            {{$product['item']['mau_sac']}}
                                                                        </span>


                                                                    </th>
                                                                    @if($product['item']['giam_gia']>0)
                                                                        <td class="product__price">
                                                                            {{number_format($product['so_luong']*($product['item']['gia']*((100-$product['item']['giam_gia'])/100)),0,",",".")}} đ
                                                                        </td>
                                                                    @else
                                                                        <td class="product__price">
                                                                            {{number_format($product['so_luong']*$product['item']['gia'],0,",",".")}} đ
                                                                        </td>
                                                                    @endif
                                                                </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- <div class="order-summary__section order-summary__section--discount-code" data-tg-refresh="refreshDiscount" id="discountCode">
                                                <h3 class="visually-hidden">Mã khuyến mại</h3>
                                                <div class="edit_checkout animate-floating-labels">
                                                    <div class="fieldset">
                                                        <div class="field  ">
                                                            <div class="field__input-btn-wrapper">
                                                                <div class="field__input-wrapper">
                                                                    <label for="reductionCode" class="field__label">Nhập mã giảm giá</label>
                                                                    <input name="reductionCode" id="reductionCode" type="text" class="field__input" autocomplete="off" data-bind-disabled="isLoadingReductionCode" data-bind-event-keypress="handleReductionCodeKeyPress(event)" data-define="{reductionCode: null}" data-bind="reductionCode">
                                                                </div>
                                                                <button class="field__input-btn btn spinner btn--disabled" type="button" data-bind-disabled="isLoadingReductionCode || !reductionCode" data-bind-class="{'spinner--active': isLoadingReductionCode, 'btn--disabled': !reductionCode}" data-bind-event-click="applyReductionCode()" disabled="">
                                                                    <span class="spinner-label">Áp dụng</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                                        <use href="#spinner"></use>
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <p class="field__message field__message--error field__message--error-always-show hide" data-bind-show="!isLoadingReductionCode &amp;&amp; isLoadingReductionCodeError" data-bind="loadingReductionCodeErrorMessage">Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element" data-define="{subTotalPriceText: '950.000₫'}" data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                                                <table class="total-line-table">
                                                    <!-- <caption class="visually-hidden">Tổng giá trị</caption>
                                                        <thead>
                                                            <tr>
                                                                <td><span class="visually-hidden">Mô tả</span></td>
                                                                <td><span class="visually-hidden">Giá tiền</span></td>
                                                            </tr>
                                                        </thead> -->
                                                        <tbody class="total-line-table__tbody">
                                                            <tr class="total-line total-line--subtotal">
                                                                <th class="total-line__name">
                                                                    Tạm tính
                                                                </th>
                                                                <td class="total-line__price">{{number_format(Session('cart')->tongTien,0,",",".")}} đ</td>
                                                            </tr>

                                                            <!-- <tr class="total-line total-line--shipping-fee">
                                                                <th class="total-line__name">
                                                                    Phí vận chuyển
                                                                </th>
                                                                <td class="total-line__price" data-bind="getTextShippingPrice()">-</td>
                                                            </tr> -->

                                                        </tbody>
                                                        <tfoot class="total-line-table__footer">
                                                            <tr class="total-line payment-due">
                                                                <th class="total-line__name">
                                                                    <span class="payment-due__label-total">
                                                                        Tổng cộng
                                                                    </span>
                                                                </th>
                                                                <td class="total-line__price">
                                                                    <span class="payment-due__price">{{number_format(Session('cart')->tongTien,0,",",".")}} đ</span>
                                                                </td>
                                                            </tr>
                                                        </tfoot>

                                                </table>
                                            </div>
                                            <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                                <button onclick="datHangCOD()" class="btn btn-checkout spinner" >
                                                    <span class="spinner-label">ĐẶT HÀNG</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                        <use href="#spinner"></use>
                                                    </svg>
                                                </button>


                                                <a href="giohang" class="previous-link">
                                                    <i class="previous-link__arrow">❮</i>
                                                    <span class="previous-link__content">Quay về giỏ hàng</span>
                                                </a>

                                            </div>
                                            <span style="font-size:16px; color: red">(Chú ý: Vui lòng kiểm tra thông tin kỹ lưỡng trước khi ĐẶT HÀNG !)</span>

                                            <!-- <div id="common-alert-sidebar" data-tg-refresh="refreshError">
                                                <div class="alert alert--danger hide-on-mobile hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </aside>
                    @endif
                </div>
            </form>

        </form>
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="spinner">
				<svg viewBox="0 0 30 30">
					<circle stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-dasharray="85%" cx="50%" cy="50%" r="40%">
						<animateTransform attributeName="transform" type="rotate" from="0 15 15" to="360 15 15" dur="0.7s" repeatCount="indefinite"></animateTransform>
					</circle>
				</svg>
			</symbol>
		</svg>
	</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Đặt hàng cod -->
<script>
    function datHangCOD(){
        var ten = $('#hoten').val();
        var sdt = $('#sdt').val();
        var gioitinh = $('#gioitinh').val();
        var diachi = $('#diachi').val();
        var ghichu = $('#ghichu').val();
        var formReturnHome = document.createElement('form');
        formReturnHome.method = 'GET';
        formReturnHome.action = "{{ route('dathangpaythanhcong') }}";
        document.body.appendChild(formReturnHome);

        if (ten.length < 1) {
            Swal.fire({
            icon: 'error',
            title: 'Lỗi!!!',
            text: 'Vui lòng nhập Họ tên!',
            })
            return false;
        } else if (sdt.length < 1) {
            Swal.fire({
            icon: 'error',
            title: 'Lỗi!!!',
            text: 'Vui lòng nhập Số điện thoại!',
            })
            return false;
        } else if (sdt.length > 10 && paypal_sdt.length < 10) {
            Swal.fire({
            icon: 'error',
            title: 'Lỗi!!!',
            text: 'Số điện thoại không đúng định dạng!',
            })
            return false;
        } else if (diachi.length < 1) {
            Swal.fire({
            icon: 'error',
            title: 'Lỗi!!!',
            text: 'Vui lòng nhập Địa chỉ nhận hàng!',
            })
            return false;
        } else if (diachi.length < 12) {
            Swal.fire({
            icon: 'error',
            title: 'Lỗi!!!',
            text: 'Vui lòng nhập địa chỉ nhận hàng rõ ràng hơn!',
            })
            return false;
        }

        // ajax đặt hàng
        $.ajax({
            url: "/dat-hang",
            method: "POST",
            data: {
                hoten: ten,
                sdt: sdt,
                gioitinh: gioitinh,
                diachi: diachi,
                ghichu: ghichu,
                _token: $("input[name='_token']").val(),
            },
            success: function(data) {
                //Hiện confirm box thông báo đã thành toán thành công và chuyển sang trang chủ sau khi nhấp 'OK'.
                formReturnHome.submit();
            },
            errors: function(data) {
                alert("Lỗi Tải Trang thanh toán!");
            }

        });

    }

</script>
<!-- {{-- Demo paypal --}} -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AR2AcmUID6cjIY2ymK6wWQe2yWSY--6BQu3cWkzt2HyGgRo_KcjPtNVA03Dm_LTr2Zm9QpsMYp-nTPom">
        // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>


            // Hàm khởi tạo thanh toán của paypal
            createOrder: function(data, actions) {
                    var paypal_ten = $('#hoten').val();
                    var paypal_sdt = $('#sdt').val();
                    var paypal_diachi = $('#diachi').val();

                    if (paypal_ten.length < 1) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!!!',
                        text: 'Vui lòng nhập Họ tên!',
                        })
                    return false;
                    } else if (paypal_sdt.length < 1) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!!!',
                        text: 'Vui lòng nhập Số điện thoại!',
                        })
                        return false;
                    } else if (paypal_sdt.length > 10 && paypal_sdt.length < 10) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!!!',
                        text: 'Số điện thoại không đúng định dạng!',
                        })
                        return false;
                    } else if (paypal_diachi.length < 1) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!!!',
                        text: 'Vui lòng nhập Địa chỉ nhận hàng!',
                        })
                        return false;
                    } else if (paypal_diachi.length < 12) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!!!',
                        text: 'Vui lòng nhập địa chỉ nhận hàng rõ ràng hơn!',
                        })
                        return false;
                    } else {
                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    currency_code: 'USD',
                                    value: "{{ round(Session::get('cart')->tongTien / 22790, 2) }}", // Lấy tổng thành tiền của hóa đơn để thanh toán thông qua session và chia cho 23.000 VNĐ để chuyên.

                                }
                            }]
                        });
                    }
            },

            //Hàm chạy sau khi chấp nhận thành toán của pay pal
            onApprove: function(data, actions) {

                // Authorize the transaction
                actions.order.authorize().then(function(authorization) {

                    // Get the authorization id
                    var authorizationID = authorization.purchase_units[0]
                        .payments.authorizations[0].id

                    // Call your server to validate and capture the transaction
                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID,
                            authorizationID: authorizationID
                        })

                    });
                });




                // This function captures the funds from the transaction.
                // Hàm xử lý kết quả sau khi thanh toán thành công
                return actions.order.capture().then(function(details) {

                    //Biến trạng thái của thanh toán paypal.

                    var paypal_ten = $('#hoten').val();
                    var paypal_sdt = $('#sdt').val();
                    var paypal_gioitinh = $('#gioitinh').val();
                    // var paypal_email = $('#email').val();
                    var paypal_diachi = $('#diachi').val();
                    var paypal_ghichu = $('#ghichu').val();
                    //Tạo form cho phương thức get sau khi thanh toán thành công.
                    var formReturnHome = document.createElement('form');
                    formReturnHome.method = 'GET';
                    formReturnHome.action = "{{ route('dathangpaythanhcong') }}";
                    document.body.appendChild(formReturnHome);

                    //PHương thức ajax gửi form mua hàng sau khi khách hàng chấp thuận thanh toán.
                    $.ajax({
                        url: "/dat-hang-paypal",
                        method: "POST",
                        data: {
                            hoten: paypal_ten,
                            sdt: paypal_sdt,
                            gioitinh: paypal_gioitinh,
                            diachi: paypal_diachi,
                            // email: paypal_email,
                            ghichu: paypal_ghichu,
                            _token: $("input[name='_token']").val(),

                        },
                        success: function(data) {
                            //Hiện confirm box thông báo đã thành toán thành công và chuyển sang trang chủ sau khi nhấp 'OK'.
                            formReturnHome.submit();
                        },
                        errors: function(data) {
                            alert("Lỗi Tải Trang thanh toán!");
                        }
                    });





                });


        }

        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>


</body>
</html>
