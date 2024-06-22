<div class="stickcompare stickcompare_new cp-desktop spaceInDown" >
    <a class="clearall"><i class="zmdi zmdi-close"></i>Thu gọn</a>
    <ul class="listcompare" data-catename="Đồng hồ thời trang">
        @for ($i = 0; $i < 3; $i++)
            <li class="compare_item">
                <a>
                    <img class = "i-item" src="/assets/theme/images/icon/empty.png" alt="">
                    <h3 class="h-item">Thêm sản phẩm</h3>
                </a>
                <span class="remove-ic-compare" data-i = {{$i}} style="display: none;"><i class="fa fa-times" aria-hidden="true"></i></span>
            </li>
        @endfor
    </ul>
    <div class="closecompare doss">
        <a href="" data-route="{{ route('storeSession') }}" class="start-compare">So sánh
            ngay</a>
        <a class="txtremoveall">Xóa tất cả sản phẩm</a>
    </div>
</div>
{{-- popup count  --}}
<div class="popup-button">
    <a id="ss-now" style="display: none;">
        <span>So sánh <label class="count-ss"></label></span>
    </a>
</div>