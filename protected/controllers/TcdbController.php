<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 11/20/2017
 * Time: 2:49 PM
 */
class TcdbController extends Controller
{
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
        $this->layout = 'tcdbLayout';
        $this->render('index',array('thanhpho' => $TinhThanhpho,'dvql' => $Dvql, 'sotuyen' => $Sohieutuyen));
    }
    public  function actionUpdateFile()
    {
        $this->layout = 'bridge';
        $this->render('update',array());
    }
    public function actionConvert()
    {
        $this->layout = 'bridge';
        $this->render('convertGeo',array());
    }
    public function actionPrintImage()
    {
        $this->layout = 'bridge';
        $this->render('storeImage',array());
    }
    public function actionSource()
    {
        $this->layout = 'bridge';
        $this->render('source',array());
    }
    public function actionCrawler()
    {
        $this->layout = 'bridge';
        $this->render('crawler',array());
    }
}