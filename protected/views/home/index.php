<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 11/20/2017
 * Time: 2:50 PM
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

?>
<div id="Map-content">
<section id="header">
    <div class="overlay-with-popup"></div>
    <div class="header-container show-banner">
        <div class="banner">
            <div class="banner-image"></div>
        </div>
        <div class="search-content">
            <div class="search-icon">
                <div class="search-icon-image"></div>
                <div class="search-icon-image-close"></div>
            </div>
            <div class="search-input">
                <input id="search-value" class="input-style" type="text" placeholder="Nhập thông tin tìm kiếm"/>
            </div>
            <div class="search-filter">
                <div class="search-filter-image"></div>
            </div>
        </div>
        <div class="search-advance" id="scrollbar">
            <div class="search-header-and-close">
                <span>Tìm kiếm nâng cao</span>

                <div id="search-icon-close"></div>
            </div>
            <div class="search-advance-content">
                <!--search by name-->
                <div class="search-by-name search-advance-style">
                    <input required id="search-by-name" class="input-style-advance" type="text" placeholder="Nhập tên cầu"/>
                </div>
                <!--search by Loại cầu-->
                <div class="search-by-loaicau search-advance-style">
                    <div class="icon-select">
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <select class="form-control search-advance-control" id="search-by-loaicau">
                        <option disabled value="">Chọn loại cầu</option>
                        <option value="Cầu quốc lộ">Cầu quốc lộ</option>
                        <option value="Cầu treo">Cầu treo</option>
                        <option value="Cầu địa phương">Cầu địa phương</option>
                    </select>
                </div>
                <!--search by province-->
                <div class="search-by-province search-advance-style">
                    <div class="icon-select">
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <select class="form-control search-advance-control" id="search-by-province">
                        <option disabled value="">Chọn tỉnh/thành phố</option>
                        <?php
                        for ($i = 1; $i < count($thanhpho); $i++) {
                            ?>
                            <option value="<?= $thanhpho[$i]; ?>"><?= $thanhpho[$i]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!--search by DVQL-->
                <div class="search-by-dvql search-advance-style">
                    <div class="icon-select">
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <select class="form-control search-advance-control" id="search-by-dvql">
                        <option disabled value="">Chọn đơn vị quản lý</option>
                        <?php
                        for ($i = 1; $i < count($dvql); $i++) {
                            ?>
                            <option value="<?= $dvql[$i]; ?>"><?= $dvql[$i]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!--search by hiện trạng-->
                <div class="search-by-hientrang search-advance-style">
                    <div class="icon-select">
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <select class="form-control search-advance-control" id="search-by-hientrang">
                        <option disabled value="">Chọn hiện trạng</option>
                        <option value="Không xác định">Không xác định</option>
                        <option value="Rất yếu">Rất yếu</option>
                        <option value="Yếu">Yếu</option>
                        <option value="Trung bình">Trung bình</option>
                        <option value="Tốt">Tốt</option>
                        <option value="Rất tốt">Rất tốt</option>
                    </select>
                </div>
                <!--search by số hiệu tuyếm-->
                <div class="search-by-sohieutuyen search-advance-style">
                    <div class="icon-select">
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <select class="form-control search-advance-control" id="search-by-sohieutuyen">
                        <option disabled value="">Chọn số hiệu tuyến</option>
                        <?php
                        for ($i = 1; $i < count($sotuyen); $i++) {
                            ?>
                            <option value="<?= $sotuyen[$i]; ?>"><?= $sotuyen[$i]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!--search by tai-trong-->
                <div class="search-by-taitrong search-advance-style">
                    <input id="search-by-taitrong" class="input-style-advance" type="text" placeholder="Nhập tải trọng"/>
                </div>
                <!--Search by năm khai thác-->
                <div class="search-by-namkhaithac search-advance-style">
                    <span>Năm khai thác</span>

                    <div class="seach-option-namkhaithac">
                        <div class="namkhaithac-Tu inline-block">
                            <input id="namkhaithac-Tu" class="input-style-advance input-trongkhoang-width" type="text"
                                   placeholder="Nhập số"/>
                        </div>
                        <span class="text-between">đến</span>

                        <div class="namkhaithac-Den inline-block">
                            <input id="namkhaithac-Den" class="input-style-advance input-trongkhoang-width" type="text"
                                   placeholder="Nhập số"/>
                        </div>
                    </div>
                </div>


                <!--Search by tải trọng khai thac-->
<!--                <div class="search-by-taitrongkhaithac search-advance-style">-->
<!--                    <span>Tải trọng khai thác(Tấn)</span>-->
<!---->
<!--                    <div class="seach-option-taitrongkhaithac">-->
<!--                        <div class="taitrongkhaithac-Tu inline-block">-->
<!--                            <input id="taitrongkhaithac-Tu" class="input-style-advance input-trongkhoang-width"-->
<!--                                   type="text" placeholder="Nhập tải trọng"/>-->
<!--                        </div>-->
<!--                        <span class="text-between">đến</span>-->
<!---->
<!--                        <div class="taitrongkhaithac-Den inline-block">-->
<!--                            <input id="taitrongkhaithac-Den" class="input-style-advance input-trongkhoang-width"-->
<!--                                   type="text" placeholder="Nhập tải trọng"/>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <!--Search by tải trọng khai thac-->
                <div class="search-by-chieudai search-advance-style">
                    <span>Chiều dài</span>

                    <div class="seach-option-chieudai">
                        <div class="chieudai-Tu inline-block">
                            <input id="chieudai-Tu" class="input-style-advance input-trongkhoang-width" type="text"
                                   placeholder="Nhập số"/>
                        </div>
                        <span class="text-between">đến</span>

                        <div class="chieudai-Den inline-block">
                            <input id="chieudai-Den" class="input-style-advance input-trongkhoang-width" type="text"
                                   placeholder="Nhập số"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-advance-footer">
                <div class="thong-ke-ket-qua search-advance-footer-button-style text-center">
                    <span>Thống kê</span>
                </div>
                <div class="search-advance-send search-advance-footer-button-style text-center">
                    <span>Tìm kiếm</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="map-container">
<div class="se-pre-con-1" style="display:none"></div>
    <div class="map_1">
        <div id="map">
            <section id="footer">
                <div class="container">
                    <div class="footer-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="note">
                                    <span>Chú thích</span><i class="fa fa-caret-up" style="color: #000;"></i>
                                </div>
                                <div class="info-heading">
                                    <div class="proportional info-heading-style">
                                        <span>Tỉ lệ bản đồ ~ 1:142M</span>
                                    </div>
                                    <div class="current-coordinate info-heading-style">
                                        <span id="mouse-position"></span>
                                    </div>
                                    <div class="distance info-heading-style">
                                        <span id="distance-value">5km</span>

                                        <div class="image-distance">
                                        </div>
                                    </div>
                                    <section id="tools-bar" class="right-1">
                                        <div class="tools-bar-container">
                                            <div id="zoom-in" class="tools-style">
                                                <div class="zoom-in-image"></div>
                                            </div>
                                            <div id="zoom-out" class="tools-style">
                                                <div class="zoom-out-image"></div>
                                            </div>
                                            <div id="fullscreen" class="tools-style hidden-991">
                                                <div class="fullscreen-image"></div>
                                            </div>
                                            <!--                                <div id="clean" class="tools-style">-->
                                            <!--                                    <div class="clean-image"></div>-->
                                            <!--                                </div>-->
                                            <div id="do-khoang-cach" class="tools-style tools-has-active">
                                                <div class="do-khoang-cach-image"></div>
                                            </div>
                                            <div id="do-dien-tich" class="tools-style">
                                                <div class="do-dien-tich-image"></div>
                                            </div>
                                            <div id="ve-vung" class="tools-style">
                                                <div class="ve-vung-image"></div>
                                            </div>
                                            <div id="in-hinh" class="tools-style hidden-991">
                                                <div class="in-hinh-image"></div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="panel-body note-body">
                                <div class="note-content">
                                    <div class="list-group">
                                        <!--                                <a href="#" class="list-group-item col-sm-2 list-group-item-style">-->
                                        <!---->
                                        <!--                                </a>-->
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/quocgia_2017-11-29/quocgia@2x.png"
                                                alt=""/>
                                            <span>Ranh giới quốc gia</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/thanhpho_2017-11-29/thanhpho@2x.png"
                                                alt=""/>
                                            <span>Ranh giới tỉnh/thành phố</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/quanhuyen_2017-11-29/quanhuyen@2x.png"
                                                alt=""/>
                                            <span>Ranh giới tỉnh/thành phố</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-3 margin-left-15 hidden-991">
                                            <div class="image-phuong-xa"></div>
                                            <span>Ranh giới phường/xã</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/6_2017-11-29/6@2x.png"
                                                alt=""/>
                                            <span>Cầu không thông tin</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/lytrinh_2017-11-29/lytrinh@2x.png"
                                                alt=""/>
                                            <span>Điểm lý trình</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/quoclo_2017-11-29/quoclo@2x.png"
                                                alt=""/>
                                            <span>Quốc lộ</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/tinhlo_2017-11-29/tinhlo@2x.png"
                                                alt=""/>
                                            <span>Tỉnh lộ</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/duongsat_2017-11-29/duongsat@2x.png"
                                                alt=""/>
                                            <span>Đường sắt</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 hidden-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/songho_2017-11-29/songho@2x.png"
                                                alt=""/>
                                            <span>Sông hồ</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/cautreo_2017-11-29/cautreo@2x.png"
                                                alt=""/>
                                            <span>Cầu treo</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/demxe_2017-11-29/demxe@2x.png"
                                                alt=""/>
                                            <span>Điểm đếm xe</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/1_2017-11-29/1@2x.png"
                                                alt=""/>
                                            <span>Cầu rất tốt</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/2_2017-11-29/2@2x.png"
                                                alt=""/>
                                            <span>Cầu tốt</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/3_2017-11-29/3@2x.png"
                                                alt=""/>
                                            <span>Cầu trung bình</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/4_2017-11-29/4@2x.png"
                                                alt=""/>
                                            <span>Cầu yếu</span>
                                        </div>
                                        <div
                                            class="list-group-item col-sm-2 list-group-item-style custom-width-2 display-991">
                                            <img
                                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/icon/5_2017-11-29/5@2x.png"
                                                alt=""/>
                                            <span>Cầu rất yếu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="change-style-map">
                <div class="change-style-map-checkbox" >
                    <input type='checkbox' name='thing' value='valuable' id="map-style"/><label for="map-style"></label>
                </div>
                <div class="change-style-map-text">
                    <span class="label-map-style">Vệ tinh</span>
                </div>
            </section>
        </div>
        <div id='distance' class='distance-container'></div>
        <div class='calculation-box'>
            <div id='calculated-area'></div>
        </div>
    </div>
</section>
<div class="center-container">
<div class="container-fluid">
<section id="data">
<div class="overlay"></div>
<div class="button-toggle-around">
    <div class="button-toggle" id="button-toogle"></div>
</div>
<div class="data-container">

<!--Cầu quốc lộ-->
<div class="bridge-quoc-lo">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-cau-quoc-lo" data-toggle="collapse" href="#collapse-quoc-lo">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Cầu trên quốc lộ</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-quoc-lo" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='cau-quoc-lo' value='valuable' id="cau-quoc-lo"/><label
                            for="cau-quoc-lo"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Cầu trên quốc lộ</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='tinh-trang-cau-quoc-lo' value='valuable'
                               id="tinh-trang-cau-quoc-lo"/><label
                            for="tinh-trang-cau-quoc-lo"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Tình trạng cầu trên quốc lộ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Cầu địa phương-->
<div class="bridge-diaphuong">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-cau-diaphuong" data-toggle="collapse" href="#collapse-diaphuong">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Cầu địa phương</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-diaphuong" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='Cau-diaphuong' value='valuable' id="cau-diaphuong"/><label
                            for="cau-diaphuong"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Cầu địa phương</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Cầu treo-->
<div class="bridge-treo">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-cau-treo" data-toggle="collapse" href="#collapse-treo">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Cầu treo</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-treo" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='Cau-treo' value='valuable' id="cau-treo"/><label
                            for="cau-treo"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Cầu treo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Đường quốc lộ-->
<div class="road-quoc-lo">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-duong-quoc-lo" data-toggle="collapse"
                 href="#collapse-road-quoc-lo">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Đường quốc lộ</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-road-quoc-lo" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="thong-ke-duong"/><label
                            for="thong-ke-duong"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Thống kê đường</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="tinh-trang-mat-duong"/><label
                            for="tinh-trang-mat-duong"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Tình trạng mặt đường</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Trạm thu phí (BOT)-->
<div class="tram-thu-phi-BOT">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-tram-thu-phi-BOT" data-toggle="collapse"
                 href="#collapse-tram-thu-phi-BOT">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Trạm thu phí BOT</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-tram-thu-phi-BOT" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='BOT' value='valuable' id="tram-thu-phi-BOT"/><label
                            for="tram-thu-phi-BOT"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Trạm thu phí BOT</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Trạm đếm xe-->
<div class="tram-dem-xe">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-tram-dem-xe" data-toggle="collapse" href="#collapse-tram-dem-xe">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Trạm đếm xe</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-tram-dem-xe" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="tram-dem-xe"/><label
                            for="tram-dem-xe"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Trạm đếm xe</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Lý trình-->
<div class="ly-trinh">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-ly-trinh" data-toggle="collapse" href="#collapse-ly-trinh">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Lý trình</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-ly-trinh" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='ly-trinh' value='valuable' id="ly-trinh"/><label
                            for="ly-trinh"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Lý trình</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Vật liệu mỏ-->
<div class="vat-lieu-mo">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-vat-lieu-mo" data-toggle="collapse" href="#collapse-vat-lieu-mo">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Vật liệu mỏ</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-vat-lieu-mo" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="vat-lieu-mo"/><label
                            for="vat-lieu-mo"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Vật liệu mỏ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Các lớp khác-->
<div class="cac-lop-khac">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-cac-lop-khac" data-toggle="collapse" href="#collapse-cac-lop-khac">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Các lớp khác</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-cac-lop-khac" class="panel-collapse collapse">
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="diem-chuc-nang"/><label
                            for="diem-chuc-nang"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Điểm chức năng</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="diem-dan-cu"/><label
                            for="diem-dan-cu"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Điểm dân cư</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="diem-hu-hong"/><label
                            for="diem-hu-hong"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Điểm hư hỏng</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="diem-ngap-nuoc"/><label
                            for="diem-ngap-nuoc"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Điểm ngập nước</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="diem-sut-truot"/><label
                            for="diem-sut-truot"></label>
                    </div>
                    <div class="option-text data-font-size">
                        <span>Điểm sụt trượt</span>
                    </div>
                </div>
                <div class="option-style data-font-size">
                    <div class="option-checkbox text-center">
                        <input type='checkbox' name='thing' value='valuable' id="cong"/><label for="cong"></label><!--Cống-->
                    </div>
                    <div class="option-text data-font-size">
                        <span>Cống</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Thông tin-->
<div class="thong-tin">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-cac-lop-khac" data-toggle="collapse">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Thông tin</a>
                    <i id="thong-tin-caret" class="fa fa-caret-down"></i>
                </h4>
            </div>
        </div>
        <div class="panel-body" id="thong-tin-body">

        </div>
    </div>
</div>

<!--Kết quả tìm kiếm-->
<div class="ket-qua-search">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" id="collapspe-ket-qua-search" data-toggle="collapse"
                 href="#collapse-ket-qua-search">
                <h4 class="panel-title" style="position: relative">
                    <a class="data-font-size data-title-style">Kết quả tìm kiếm</a>
                    <i class="fa fa-caret-down"></i>
                </h4>
            </div>
            <div id="collapse-ket-qua-search" class="panel-collapse collapse">

            </div>
        </div>
    </div>
</div>

</div>
</section>


</div>
</div>


<section id="direction">
    <div class="direction-container" style="display: none">
        <!--Close Button-->
        <div class="dir-close-button">
            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/close.png" alt=""/>
        </div>
        <!--Content-->
        <div class="dir-content">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li id="route-car" class="active route-vehicle"><a href="#car" data-toggle="tab"
                                                                       data-toggle="tooltip"
                                                                       data-placement="bottom"
                                                                       title="Ô tô"
                            ><img
                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/iconCar@2x.png" alt=""/></a>
                    </li>
                    <li id="route-moto" class="route-vehicle"><a href="#motobike" data-toggle="tab"
                                                                 data-toggle="tooltip"
                                                                 data-placement="bottom"
                                                                 title="Xe máy"><img
                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/iconMotor@2x.png"
                                alt=""/></a></li>
                </ul>
            </div>
            <div class="row">
                <div class="dir-box">
                    <div class="dir-exchange">
                        <div class="dir-exchange-button">
                            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/exchange_16.png"
                                 alt=""/>
                        </div>
                    </div>
                    <div id="dir-start" class="dir-input-style">
                        <label for="">Đi</label>
                        <input id="dir-start-input" type="text" placeholder="Xuất phát"/>
                    </div>
                    <div id="dir-end" class="dir-input-style">
                        <label for="">Tới</label>
                        <input id="dir-end-input" type="text" placeholder="Kết thúc"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <!--                    <div id="del-dir">-->
                    <!--                        <p>Xóa tuyến đường</p>-->
                    <!--                    </div>-->
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary dir-button">
                        <div class="loader-dir">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                        <span>Dẫn đường</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
    <!--Detail Direction-->
    <div style="display: none" class="dir-detail-around" id="scrollbar">
        <div class="dir-detail">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li id="route-fast" class="active choose-type-routing"><a href="#fastest" data-toggle="tab"
                                                                              data-toggle="tooltip"
                                                                              data-placement="bottom"
                                                                              title="Đường nhanh nhất">Nhanh nhất</a>
                    </li>
                    <li id="route-short" class="choose-type-routing"><a href="#shortest" data-toggle="tab"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        title="Đường ngắn nhất">Ngắn nhất</a></li>
                </ul>
            </div>
            <div class="row">
                <div id="short-detail">
                    <div class="tab-content">
                        <div class="tab-pane active" id="fastest">
                            <div class="panel-group panel-group-fast" id="accordion"></div>
                        </div>
                        <div class="tab-pane" id="shortest">
                            <div class="panel-group panel-group-short" id="accordion"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Direction Search Result-->

    <div class="dir-result-search">
        <div class="dir-result-search-container absolute " style="display: none">

        </div>
    </div>
</section>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo từ hệ thống</h4>
            </div>
            <div class="modal-body">
                <p>Chúng tôi đang hoàn thiện chức năng này</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</div>

<!--<div class="ui-layout-container" id="ui-layout">-->
<!--    <div id="paneNorth" class="ui-layout-north ui-layout-pane ui-layout-pane-north">-->
<!--    </div>-->
<!--    <div id="paneCenter" class="ui-layout-center ui-layout-pane ui-layout-pane-center">-->
<!--        <div class="map_1">-->
<!--            <div id="map"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--<div id="paneEast" class="ui-layout-east ui-layout-pane ui-layout-pane-east"></div>-->
<!--<div id="paneSouth" class="ui-layout-south ui-layout-pane ui-layout-pane-south">-->
<!--</div>-->
<!--<div id="paneWest" class="ui-layout-west ui-layout-pane ui-layout-pane-west"></div>-->

<!--</div>-->

<script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/tcdb/main.min.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/tcdb/submain.min.js"></script>
<script>
    $(document).ready(function () {
        $('#search-by-loaicau,#search-by-province,#search-by-dvql,#search-by-hientrang,#search-by-sohieutuyen').prop('selectedIndex',0);

        document.addEventListener('gesturestart', function (e) {
            e.preventDefault();
        });
        ButtonSearchAdvance();

        $(".note-body").hide();
        $('#data .panel-heading').each(function () {
            $(this).click(function () {
                $(this).find('i').toggleClass("fa-caret-up fa-caret-down");
            });
        });
        map.on('load', function () {
            map.dragRotate.disable();
            MeasureDistanceWithCaculate();
            ActiveTools();
            $('.mapboxgl-ctrl-bottom-right').addClass('bottom-3px');
            $(".note").click(function () {
                var note_body = $(".note-body");
                var toolBar = $("#tools-bar");
                note_body.slideToggle(100);
                $(this).find('i').toggleClass("fa-caret-up fa-caret-down");
                toolBar.toggleClass('isOut');
                var isOut = toolBar.hasClass('isOut');
                toolBar.animate({right: isOut ? '290px' : '0'}, 10);
                var toolAdvance = $('.mapboxgl-ctrl-bottom-right');
                toolAdvance.toggleClass('bottomA');
                var toolAdvanceA = toolAdvance.hasClass('bottomA');
                var getheight = $('.note-content').height();
                var bottom;
                if(getheight == "160"){
                     bottom = '151px';
                }else if(getheight=="190"){
                    bottom = "101px";
                }else if(getheight == "140"){
                    bottom = "136px";
                }
                console.log(getheight);
                toolAdvance.animate({
                    bottom: toolAdvanceA ? ''+bottom+'' : '-9px',
                    right: toolAdvanceA ? "327px" : "324px"
                }, 100)
            });
            $('.dir-close-button').click(function () {
                DirCloseWhiteButton();
            });
        });

        $('.button-toggle-around, .overlay').click(function () {
            var elementToogle = $('.data-container');
            elementToogle.width() === 0 ? $('.overlay').css('display', 'block') : $('.overlay').css('display', 'none');
            var toggleWidth = elementToogle.width() === 0 ? '290px' : "0px";
            elementToogle.animate({width: toggleWidth});
        });
    });
</script>