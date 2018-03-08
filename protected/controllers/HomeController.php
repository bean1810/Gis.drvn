<?php
/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 2/23/14
 * Time: 12:57 PM
 */
class HomeController extends Controller
{
    public function init()
    {
        Functions::startup();
        $this->layout = "tcdbLayout";
    }

    public function actionIndex()
    {
        $filename = Yii::getPathOfAlias('webroot').'/assets/js/tcdb/content.txt';
        $openFile = fopen($filename,"r");
        $TinhThanhpho = array();
        $Dvql = array();
        $Sohieutuyen = array();
        while($line = fgets($openFile)){
            $words = explode('|',$line);
            $nameThanhpho = $this->Checkprovince($words[4]);
            if(!in_array($nameThanhpho,$TinhThanhpho)){
                array_push($TinhThanhpho,$nameThanhpho);
            }
            if(!in_array($words[12],$Dvql)){
                array_push($Dvql,$words[12]);
            }
            if(!in_array($words[16],$Sohieutuyen)){
                array_push($Sohieutuyen,$words[16]);
            }
        }
        $this->render('index',array('thanhpho' => $TinhThanhpho,'dvql' => $Dvql, 'sotuyen' => $Sohieutuyen));
    }

    public function actionDownload()
    {
        $detect = new Mobile_Detect();
        $report = "";
        $isMobile = "";
        if($detect ->isMobile())$isMobile = true;
        /*IOS -> true*/
        if($detect -> isiOS())$report = true;
        /*Android -> false*/
        if($detect -> isAndroidOS())$report = false;
        $this->layout = "new_layout";
        $this->render('download',array('report' => $report,'isMobile' => $isMobile));
    }
    public function actionLogin()
    {
        if (isset(Yii::app()->session['auth_user']) && (Yii::app()->session['auth_user'] != "")) {
            return $this->redirect(Yii::app()->getBaseUrl(true) . "/admin");
        }
        $this->layout = "backend";
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $model = new Auth_userModel();
            $info = $model->find("username = '" . Functions::locDau($_POST['username']) . "' and password = '" . Auth::hashCode($_POST['username'], $_POST['password']) . "'");
            if ($info) {
                Yii::app()->session['auth_user'] = $info['id'];
                $this->redirect(Yii::app()->getBaseUrl(true) . "/admin");
                return;
            }
        }
        $this->render('login', array());
    }

    public function actionLogout()
    {
        Yii::app()->session->clear();
        $this->redirect(Yii::app()->getBaseUrl(true));
    }

    public function actionBuilding()
    {
        $this->render('building', array());
    }
    private function Checkprovince($words){
        $nameThanhpho = "";
        if($words === "AG"){
            $nameThanhpho = "An Giang";
        }elseif($words === "BL"){
            $nameThanhpho = "Bạc Liêu";
        }elseif($words === "BR"){
            $nameThanhpho = "Bà Rịa Vũng Tàu";
        }elseif($words === "BC"){
            $nameThanhpho = "Bắc cạn";
        }elseif($words === "BG"){
            $nameThanhpho = "Bắc Giang";
        }elseif($words === "BN"){
            $nameThanhpho = "Bắc Ninh";
        }elseif($words === "BT"){
            $nameThanhpho = "Bến Tre";
        }elseif($words === "BD"){
            $nameThanhpho = "Bình Dương";
        }elseif($words === "BH"){
            $nameThanhpho = "Bình Định";
        }elseif($words === "BP"){
            $nameThanhpho = "Bình Phước";
        }elseif($words === "BT"){
            $nameThanhpho = "Bình Thuận";
        }elseif($words === "CM"){
            $nameThanhpho = "Cà Mau";
        }elseif($words === "CB"){
            $nameThanhpho = "Cao Bằng";
        }elseif($words === "CT"){
            $nameThanhpho = "Cần Thơ";
        }elseif($words === "DN"){
            $nameThanhpho = "Đà Nẵng";
        }elseif($words === "DL"){
            $nameThanhpho = "Đăk Lăk";
        }elseif($words === "DG"){
            $nameThanhpho = "Đắc Nông";
        }elseif($words === "DB"){
            $nameThanhpho = "Điện Biên";
        }elseif($words === "DI"){
            $nameThanhpho = "Đồng Nai";
        }elseif($words === "DT"){
            $nameThanhpho = "Đồng Tháp";
        }elseif($words === "GL"){
            $nameThanhpho = "Gia Lai";
        }elseif($words === "HG"){
            $nameThanhpho = "Hà Giang";
        }elseif($words === "HM"){
            $nameThanhpho = "Hà Nam";
        }elseif($words === "HN"){
            $nameThanhpho = "Hà Nội";
        }elseif($words === "HT"){
            $nameThanhpho = "Hà Tĩnh";
        }elseif($words === "HD"){
            $nameThanhpho = "Hải Dương";
        }elseif($words === "HP"){
            $nameThanhpho = "Hải Phòng";
        }elseif($words === "HU"){
            $nameThanhpho = "Hậu Giang";
        }elseif($words === "HB"){
            $nameThanhpho = "Hòa Bình";
        }elseif($words === "HY"){
            $nameThanhpho = "Hưng Yên";
        }elseif($words === "KH"){
            $nameThanhpho = "Khánh Hòa";
        }elseif($words === "KG"){
            $nameThanhpho = "Kiên Giang";
        }elseif($words === "KT"){
            $nameThanhpho = "Kom Tum";
        }elseif($words === "LC"){
            $nameThanhpho = "Lai Châu";
        }elseif($words === "LO"){
            $nameThanhpho = "Lào Cai";
        }elseif($words === "LA"){
            $nameThanhpho = "Long An";
        }elseif($words === "ND"){
            $nameThanhpho = "Nam Định";
        }elseif($words === "NA"){
            $nameThanhpho = "Nghệ An";
        }elseif($words === "NB"){
            $nameThanhpho = "Ninh Bình";
        }elseif($words === "NT"){
            $nameThanhpho = "Ninh Thuận";
        }elseif($words === "PT"){
            $nameThanhpho = "Phú Thọ";
        }elseif($words === "PY"){
            $nameThanhpho = "Phú Yên";
        }elseif($words === "QB"){
            $nameThanhpho = "Quảng Bình";
        }elseif($words === "QN"){
            $nameThanhpho = "Quảng Nam";
        }elseif($words === "QU"){
            $nameThanhpho = "Quảng Ngãi";
        }elseif($words === "QH"){
            $nameThanhpho = "Quảng Ninh";
        }elseif($words === "QT"){
            $nameThanhpho = "Quảng Trị";
        }elseif($words === "ST"){
            $nameThanhpho = "Sóc Trăng";
        }elseif($words === "SL"){
            $nameThanhpho = "Sơn La";
        }elseif($words === "TI"){
            $nameThanhpho = "Tây Ninh";
        }elseif($words === "TB"){
            $nameThanhpho = "Thái Bình";
        }elseif($words === "TN"){
            $nameThanhpho = "Thái Nguyên";
        }elseif($words === "TH"){
            $nameThanhpho = "Thanh Hóa";
        }elseif($words === "TT"){
            $nameThanhpho = "Thừa Thiên Huế";
        }elseif($words === "TG"){
            $nameThanhpho = "Tiền Giang";
        }elseif($words === "TV"){
            $nameThanhpho = "Trà Vinh";
        }elseif($words === "TQ"){
            $nameThanhpho = "Tuyên Quang";
        }elseif($words === "VL"){
            $nameThanhpho = "Vĩnh Long";
        }elseif($words === "VP"){
            $nameThanhpho = "Vĩnh Phúc";
        }elseif($words === "YB"){
            $nameThanhpho = "Yên Bái";
        }elseif($words === "HC"){
            $nameThanhpho = "Hồ Chí Minh";
        }
        return $nameThanhpho;
    }
}