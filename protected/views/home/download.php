<?php
if ($report == 1) {
    header("refresh:2;url=https://itunes.apple.com/us/app/id1146854597?mt=8");
} elseif ($report == 0) {
    header("refresh:2;url=https://play.google.com/store/apps/details?id=com.map.goong.v2");
}
//?>
<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 9/22/2017
 * Time: 2:09 PM
 */
?>

<section id="main">
    <div class="main-container container">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 text-main">
            <div class="text-h1">
                <h1>GeoCoding</h1>
            </div>
            <div class="text-h5">
                <h5>Chuyển tọa độ của bạn thành địa chỉ tương xứng hoặc địa chỉ của bạn thành tọa độ. API geocoding của
                    chúng tôi cung cấp mã hóa địa lý vĩnh viễn trên toàn lãnh thổ Việt Nam. Chạy những nhóm truy vấn,lưu
                    trữ kết quả và sử dụng chúng trên bản đồ hoặc bất cứ đâu mà bạn muốn.</h5>
            </div>
            <div class="main-contact">
                <div class="button-contact">
                    <a href="<?= Yii::app()->getBaseUrl(true) ?>/contact">Liên hệ với chúng tôi</a>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm col-md-7 col-lg-6 features-main">
            <div class="map-mini">
                <div class="map-mini-demo">
                    <div class="shadow-blue"></div>
                    <img id="image-main" src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/ipad1.png" alt=""/>

                </div>

            </div>
        </div>
    </div>
</section>


<section id="services">
    <div class="container services-container">
        <div class="jumbotron text-center">
            <h1>Chúng tôi cung cấp 2 gói tuỳ chọn geocoder </h1>

            <p>Gói cơ bản giá theo từng request và gói cao cấp dùng trọn gói cho doanh nghiệp. Geocoder của chúng tôi có
                thể sử dụng với bất cứ bản đồ nào chỉ cần kết quả được hiện thỉ lên trên bản đồ.</p>
        </div>
    </div>
</section>


<section id="feature">
    <div class="container-fluid changecontainer">
        <div class="row">
            <div class="col-md-6">
                <div class="feature-image">
                    <div id="feature-image-one" class="relative z1">
                        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/screen-3.png" alt=""/>
                    </div>
                    <div id="feature-image-two" class="relative z2">
                        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/screen-2.png" alt=""/>
                    </div>
                    <div id="feature-image-three" class="relative z3">
                        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/screen-1.png" alt=""/>
                    </div>
                </div>
            </div>
            <!--            <div class="col-sm-2"></div>-->
            <div class="col-md-6 relative feature-text">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>Tính Năng</h1>

                        <p>Gợi ý tự động : tự động gợi ý và trả về kết quả phù hợp nhất.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>Hiệu năng cao : API miễn phí hỗ trợ 600 yêu cầu mỗi phút. Doanh nghiệp bắt đầu với 1200 yêu
                            cầu
                            mỗi phút và phạm vi lên đến 30,000+.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>Lọc theo loại: lọc kết quả chỉ bao gồm địa phận tại Việt Nam,POIs,các địa điểm và hơn
                            thế.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>Lưu trữ kết quả: Những khách hang doanh nghiệp có thể lưu lại kết quả vĩnh viễn.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>Geocoding hàng loạt: Những khách hang doanh nghiệp có thể truy vẫn lên tới 50 địa điểm cho
                            mỗi
                            yêu cầu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="data">
    <div class="pattern-2"></div>
    <div class="container-fluid changecontainer">
        <div class="row">
            <div class="col-md-6 col-md-push-6">
                <div class="data-image relative">
                    <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/group-4.png" alt=""/>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-6 data-text">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>Dữ liệu vượt trội</h1>

                        <p>Địa điểm toàn Việt Nam: Phạm vi bao phủ tất cả các thành phố và tỉnh thành tại Việt Nam.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>Kết quả cấp địa chỉ: Kết quả chính xác cho các địa chỉ cá nhân tại 54 tỉnh thành.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>POIs: Hỗ trợ tên doanh nghiệp, mốc ranh giới và các điểm POIs.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>Dữ liệu mở: Khi một dữ liệu mới được phát hành, những khách hang của chúng tôi sẽ nhận được nó trong ngày, không phải trong tuần.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pattern-3"></div>
</section>


<section id="develop">
    <div class="container-fluid changecontainer">
        <div class="row">
            <div class="col-md-6">
                <div class="develop-image relative">
                    <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/board-code.png" alt=""/>
                </div>
            </div>
            <div class="col-md-6 relative develop-text">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>Thiết kế cho người phát triển</h1>

                        <p>API Geocoding của chúng tôi đơn giản, hiểu quả dễ sử dụng cho mọi khách hàng, mọi nền tảng.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <p>API đơn giản để xác thực và trả về kết quả ở định dạng JSON.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="package">
    <div class="container">
        <div class="row">
            <div class="jumbotron text-center">
                <h1>So sánh giá các gói dịch vụ</h1>
                <p>Các dịch vụ được dùng: <b>Maps Directions API; Maps Geocoding API; Maps Geolocation API; Maps Road API</b>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3>GOOGLE</h3>
                        <p>TIÊU CHUẨN</p>
                    </div>
                    <div class="panel-body">
                        <p>Miễn phí 2500 yêu cầu
                            mỗi ngày</p>
                        <p>$ 0.50 USD / 1.000 yêu cầu bổ sung, lên đến 100.000 yêu cầu mỗi ngày.</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3>GOOGLE</h3>
                        <p>CAO CẤP</p>
                    </div>
                    <div class="panel-body">
                        <p>Giá dựa trên lượng yêu cầu.</p>
                        <P>Tính năng nâng cao</P>
                        <p>Truy vẫn mỗi giây</p>
                        <p>Tính năng dẫn đường</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-default panel-goong text-center">
                    <div class="panel-heading">
                        <h3>GOONG</h3>
                        <p>TIÊU CHUẨN</p>
                    </div>
                    <div class="panel-body">
                        <p>Miễn phí 5000 yêu cầu
                            mỗi ngày.</p>
                        <p>$ 0.2 USD / 1.000 yêu cầu bổ sung, lên đến 100.000 yêu cầu mỗi ngày.</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-default panel-goong text-center">
                    <div class="panel-heading">
                        <h3>GOONG</h3>
                        <p>CAO CẤP</p>
                    </div>
                    <div class="panel-body">
                        <p>Giá dựa trên lượng yêu cầu.</p>
                        <p>Tính năng nâng cao</p>
                        <p>Truy vẫn mỗi giây</p>
                        <p>Tính năng dẫn đường</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="download">
    <div class="container download-container">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                <ul class="download-ul">
                    <li>Trang chủ</li>
                    <li>Dịch vụ</li>
                    <li>Live map</li>
                </ul>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-3 col-lg-5">
                <ul class="download-ul">
                    <li>Điều khoản & Chính sách</li>
                    <li>Hỗ trợ</li>
                </ul>
            </div>
            <div class="hidden-xs col-sm-1 col-md-3 col-lg-2"></div>
            <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3 download-button">
                <div class="row">
                    <p>Cài đặt tại App Store và Google Play</p>
                </div>

                <div class="row">
                    <img class="apple imagefluid"
                         src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/apple-store.png" alt=""/>
                    <img class="android imagefluid"
                         src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/Services/google-store.png" alt=""/>
                </div>
            </div>
        </div>

    </div>


</section>

<script type="text/javascript">
    $(document).ready(function () {
        function checkWidth() {
            var windowsize = $(window).width();
            if (windowsize <= 1365) {
                $('.changecontainer').each(function () {
                    $(this).addClass('container-fluid').removeClass('container');
                })
            } else if (windowsize > 1365) {
                $('.changecontainer').each(function () {
                    $(this).addClass('container').removeClass('container-fluid');
                })
            }
        }

        // Execute on load
        checkWidth();
        // Bind event listener
        $(window).resize(checkWidth);
    })
</script>